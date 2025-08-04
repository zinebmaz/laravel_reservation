<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Offer;

class DealsController extends Controller
{
 
    public function index(Request $request)
    {
          $offers = Offer::query();

    // Filtre par destination
    if ($request->filled('location')) {
        $offers->where('location', $request->location);
    }

    // Filtre par prix
    if ($request->filled('price')) {
        if ($request->price == "100") {
            $offers->whereBetween('price', [100, 250]);
        } elseif ($request->price == "250") {
            $offers->whereBetween('price', [250, 500]);
        } elseif ($request->price == "500") {
            $offers->whereBetween('price', [500, 1000]);
        } elseif ($request->price == "1000") {
            $offers->whereBetween('price', [1000, 2500]);
        } elseif ($request->price == "2500+") {
            $offers->where('price', '>=', 2500);
        }
    }

    $offers = $offers->latest()->get();

    return view('deals', compact('offers'));
    }


}
        
