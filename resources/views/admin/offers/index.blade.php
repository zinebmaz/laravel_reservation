@extends('layouts.app')

@section('content')
<style>
    /* Conteneur principal */
    .offers-container {
        max-width: 1100px;
        margin: 40px auto;
        background: white;
        padding: 20px;
        border-radius: 12px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.08);
        border-top: 5px solid #00bfff;
    }

    /* Titre */
    .offers-container h1 {
        color: #1e90ff;
        font-weight: bold;
        margin-bottom: 20px;
    }

    /* Table */
    .offers-table {
        width: 100%;
        border-collapse: collapse;
        background: white;
    }

    .offers-table thead {
        background: linear-gradient(90deg, #00bfff, #1e90ff);
        color: white;
    }

    .offers-table th, 
    .offers-table td {
        padding: 12px;
        text-align: center;
        vertical-align: middle;
        border-bottom: 1px solid #ddd;
    }

    .offers-table tr:hover {
        background: rgba(0,191,255,0.08);
    }

    /* Images */
    .offer-img {
        border-radius: 8px;
        border: 1px solid #ddd;
    }

    /* Boutons */
    .btn-custom {
        border: none;
        padding: 6px 12px;
        border-radius: 6px;
        color: white;
        font-weight: 500;
        transition: 0.3s;
    }

    .btn-add {
        background: linear-gradient(90deg, #00bfff, #1e90ff);
    }
    .btn-add:hover {
        background: linear-gradient(90deg, #1e90ff, #00bfff);
    }

    .btn-edit {
        background: #ffc107;
        color: black;
    }
    .btn-edit:hover {
        background: #e0a800;
    }

    .btn-delete {
        background: #dc3545;
    }
    .btn-delete:hover {
        background: #b02a37;
    }

    /* Pagination */
    .pagination {
        justify-content: center;
    }
</style>

<div class="offers-container">
    <h1>📦 Offers</h1>

    <a href="{{ route('admin.offers.create') }}" class="btn btn-custom btn-add mb-3">➕ Add Offer</a>

    <br /><br  />
    <div class="table-responsive">
        <table class="table offers-table">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Price</th>
                    <th>Image</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($offers as $offer)
                <tr>
                    <td>{{ $offer->title }}</td>
                    <td>{{ $offer->price }} $</td>
                    <td>
                        @if($offer->image)
                            <img src="{{ asset('assets/images/' . $offer->image) }}" width="80" class="offer-img">
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('admin.offers.edit', $offer) }}" class="btn btn-custom btn-edit btn-sm">✏ Edit</a>
                        <form action="{{ route('admin.offers.destroy', $offer) }}" method="POST" style="display:inline-block">
                            @csrf @method('DELETE')
                            <button class="btn btn-custom btn-delete btn-sm" onclick="return confirm('Delete this offer?')">🗑 Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{ $offers->links() }}
</div>
@endsection
