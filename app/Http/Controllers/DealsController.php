<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Offer;

class DealsController extends Controller
{
 
    public function index()
    {
        $offers = Offer::all();
        return view('deals', compact('offers'));
    }


}
        
