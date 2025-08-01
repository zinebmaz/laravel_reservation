<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;

use App\Models\Reservation;
class ReservationController extends Controller
{
     public function index()
    {
        $reservations = Reservation::with('user')->latest()->get();
        return view('admin.reservations.index', compact('reservations'));
    }
}
