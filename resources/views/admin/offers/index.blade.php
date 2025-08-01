@extends('layouts.app')

@section('content')
<h1>Offers</h1>
<a href="{{ route('admin.offers.create') }}" class="btn btn-primary mb-3">Add Offer</a>

<table class="table table-bordered">
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
                    <img src="{{ asset('assets/images/' . $offer->image) }}" width="80">
                @endif
            </td>
            <td>
                <a href="{{ route('admin.offers.edit', $offer) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('admin.offers.destroy', $offer) }}" method="POST" style="display:inline-block">
                    @csrf @method('DELETE')
                    <button class="btn btn-danger btn-sm" onclick="return confirm('Delete this offer?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{{ $offers->links() }}
@endsection