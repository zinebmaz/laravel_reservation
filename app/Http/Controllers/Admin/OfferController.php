<?php

namespace App\Http\Controllers\Admin;
use App\Models\Offer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OfferController extends Controller
{
    public function index(Request $request)
    {
         $query = Offer::query();

    // Filtrer par location si présent
    if ($request->filled('location')) {
        $query->where('location', $request->location);
    }

    // Filtrer par price range si présent
    if ($request->filled('price')) {
        $price = $request->price;

        if ($price === '100') {
            $query->whereBetween('price', [100, 250]);
        } elseif ($price === '250') {
            $query->whereBetween('price', [250, 500]);
        } elseif ($price === '500') {
            $query->whereBetween('price', [500, 1000]);
        } elseif ($price === '1000') {
            $query->whereBetween('price', [1000, 2500]);
        } elseif ($price === '2500+') {
            $query->where('price', '>=', 2500);
        }
    }

    $offers = $query->latest()->paginate(10)->withQueryString();

    return view('admin.offers.index', compact('offers'));
    }

    public function create()
    {
        return view('admin.offers.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'image' => 'nullable|image|max:2048'
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('offers', 'public');
        }

        Offer::create($data);
        return redirect()->route('admin.offers.index')->with('success', 'Offer created successfully.');
    }

    public function edit(Offer $offer)
    {
        return view('admin.offers.edit', compact('offer'));
    }

    public function update(Request $request, Offer $offer)
    {
        $data = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'image' => 'nullable|image|max:2048'
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('offers', 'public');
        }

        $offer->update($data);
        return redirect()->route('admin.offers.index')->with('success', 'Offer updated successfully.');
    }

    public function destroy(Offer $offer)
    {
        $offer->delete();
        return redirect()->route('admin.offers.index')->with('success', 'Offer deleted successfully.');
    }
}
