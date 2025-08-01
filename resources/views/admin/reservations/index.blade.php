@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1>📅 Liste des Réservations</h1>
    <table class="table table-striped mt-3">
        <thead>

            <tr>
                
                <th>Nom</th>
                <th>Téléphone</th>
                <th>Invités</th>
                <th>Date arrivée</th>
                <th>Destination</th>
                <th>Admin associé</th>
                <th>Créée le</th>
            </tr>
        </thead> 
        <tbody>
            @foreach($reservations as $reservation)
                <tr>
                    
                    <td>{{ $reservation->name }}</td>
                    <td>{{ $reservation->phone }}</td>
                    <td>{{ $reservation->guests }}</td>
                    <td>{{ $reservation->check_in_date }}</td>
                    <td>{{ $reservation->destination }}</td>
                    <td>{{ $reservation->user ? $reservation->user->name : '—' }}</td>
                    <td>{{ $reservation->created_at->format('d/m/Y H:i') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection