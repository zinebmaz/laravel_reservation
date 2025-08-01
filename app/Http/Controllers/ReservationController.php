<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Reservation;
class ReservationController extends Controller
{
      public function store(Request $request)
    {
        $validated = $request->validate([
            'name'         => 'required|string|max:255',
            'phone'        => 'required|string|max:20',
            'guests'       => 'required|integer|min:1',
            'check_in_date'=> 'required|date',
            'destination'  => 'required|string|max:255',
        ]);

        $validated['user_id'] = auth()->check() ? auth()->id() : null;


        Reservation::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Votre réservation a été enregistrée avec succès !'
        ]);
    }
}
