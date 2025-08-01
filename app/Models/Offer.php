<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{

 protected $fillable = ['title', 'description', 'price', 'image'];

     public function deals()
{
    $offers = Offer::latest()->get();
    return view('deals', compact('offers'));
}
}
