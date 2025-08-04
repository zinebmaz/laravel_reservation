@extends('layouts.app')

@section('content')
<style>
    .offer-form-container {
        max-width: 800px;
        margin: 40px auto;
        background: white;
        padding: 25px;
        border-radius: 12px;
        box-shadow: 0 4px 20px rgba(0,0,0,0.1);
        border-top: 5px solid #00bfff;
    }

    .offer-form-container h1 {
        text-align: center;
        font-weight: bold;
        color: #1e90ff;
        margin-bottom: 40px;
    }

    /* Espace entre lignes */
    .offer-form-container .form-group {
        margin-bottom: 25px;
    }

    /* Grand espace entre colonnes */
    .offer-form-container .row {
        display: flex;
        gap: 40px; /* espace horizontal entre Title et Price */
        flex-wrap: wrap;
    }

    .offer-form-container label {
        font-weight: 600;
        color: #333;
        display: block;
        margin-bottom: 8px;
    }

    .offer-form-container input,
    .offer-form-container textarea {
        border-radius: 8px;
        border: 1px solid #ddd;
        transition: all 0.3s ease;
        padding: 10px;
        width: 100%;
        display: block;
    }

    .offer-form-container input:focus,
    .offer-form-container textarea:focus {
        border-color: #1e90ff;
        box-shadow: 0 0 6px rgba(30,144,255,0.3);
    }

    .offer-form-container button {
        background: linear-gradient(90deg, #00bfff, #1e90ff);
        border: none;
        padding: 12px 20px;
        font-weight: bold;
        border-radius: 8px;
        width: 100%;
        color: white;
        transition: background 0.3s ease;
        font-size: 16px;
    }

    .offer-form-container button:hover {
        background: linear-gradient(90deg, #1e90ff, #00bfff);
    }
</style>

<div class="offer-form-container">
    <h1>➕ Add Offer</h1>

    <form action="{{ route('admin.offers.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        <div class="row">
            <div class="form-group" style="flex: 1;">
                <label>Title</label>
                <input type="text" name="title" required>
            </div>

            <div class="form-group" style="flex: 1;">
                <label>Price</label>
                <input type="number" step="0.01" name="price" required>
            </div>
        </div>

        <div class="form-group">
            <label>Location</label>
            <select name="location" required>
                <option value="" disabled selected>-- Choisissez une destination --</option>
                <option value="Italy">Italy</option>
                <option value="France">France</option>
                <option value="Switzerland">Switzerland</option>
                <option value="Thailand">Thailand</option>
                <option value="Australia">Australia</option>
                <option value="India">India</option>
                <option value="Indonesia">Indonesia</option>
                <option value="Malaysia">Malaysia</option>
                <option value="Singapore">Singapore</option>
            </select>
        </div>




        <div class="form-group">
            <label>Description</label>
            <textarea name="description" rows="4" required></textarea>
        </div>

        <div class="form-group">
            <label>Image</label>
            <input type="file" name="image">
        </div>

        <div class="form-group">
            <button type="submit">💾 Save Offer</button>
        </div>
    </form>
</div>
@endsection