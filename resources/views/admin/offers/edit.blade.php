@extends('layouts.app')

@section('content')
<style>
    .edit-container {
        max-width: 700px;
        margin: 40px auto;
        background: white;
        padding: 25px 30px;
        border-radius: 12px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.08);
        border-top: 5px solid #00bfff;
    }

    .edit-container h1 {
        color: #1e90ff;
        font-weight: bold;
        margin-bottom: 25px;
        text-align: center;
    }

    form label {
        font-weight: 600;
        color: #333;
    }

    form input[type="text"],
    form input[type="number"],
    form textarea,
    form input[type="file"] {
        width: 100%;
        padding: 10px 12px;
        margin-top: 6px;
        margin-bottom: 18px;
        border: 1px solid #ccc;
        border-radius: 8px;
        font-size: 16px;
        transition: border-color 0.3s ease;
    }

    form input[type="text"]:focus,
    form input[type="number"]:focus,
    form textarea:focus,
    form input[type="file"]:focus {
        outline: none;
        border-color: #1e90ff;
        box-shadow: 0 0 8px rgba(30,144,255,0.4);
    }

    form textarea {
        resize: vertical;
        min-height: 100px;
    }

    .btn-save {
        background: linear-gradient(90deg, #00bfff, #1e90ff);
        color: white;
        border: none;
        padding: 12px 28px;
        border-radius: 8px;
        font-weight: 600;
        font-size: 18px;
        width: 100%;
        cursor: pointer;
        box-shadow: 0 5px 12px rgba(0,191,255,0.4);
        transition: background 0.3s ease;
    }

    .btn-save:hover {
        background: linear-gradient(90deg, #1e90ff, #00bfff);
    }

    .current-image {
        margin-bottom: 20px;
        text-align: center;
    }

    .current-image img {
        max-width: 180px;
        border-radius: 8px;
        border: 1px solid #ddd;
        box-shadow: 0 3px 8px rgba(0,0,0,0.1);
    }
</style>

<div class="edit-container">
    <h1>✏ Edit Offer</h1>

    <form action="{{ route('admin.offers.update', $offer) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <label for="title">Title</label>
        <input type="text" name="title" id="title" value="{{ old('title', $offer->title) }}" required>

        <label for="description">Description</label>
        <textarea name="description" id="description" required>{{ old('description', $offer->description) }}</textarea>

        <label for="price">Price ($)</label>
        <input type="number" step="0.01" name="price" id="price" value="{{ old('price', $offer->price) }}" required>

        <label for="image">Image (upload to replace current)</label>
        <input type="file" name="image" id="image" accept="image/*">

        @if($offer->image)
            <div class="current-image">
                <p>Current Image:</p>
                <img src="{{ asset('assets/images/' . $offer->image) }}" alt="Current Offer Image">
            </div>
        @endif

        <button type="submit" class="btn-save">💾 Save Changes</button>
    </form>
</div>
@endsection