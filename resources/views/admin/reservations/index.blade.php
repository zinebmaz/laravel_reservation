@extends('layouts.app')

@section('content')
<style>
    /* Conteneur principal */
    .reservations-container {
        max-width: 1100px;
        margin: 40px auto;
        background: white;
        padding: 20px;
        border-radius: 12px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.08);
        border-top: 5px solid #00bfff;
    }

    /* Titre */
    .reservations-container h1 {
        color: #1e90ff;
        font-weight: bold;
        margin-bottom: 20px;
    }

    /* Table */
    .reservations-table {
        width: 100%;
        border-collapse: collapse;
        background: white;
    }

    .reservations-table thead {
        background: linear-gradient(90deg, #00bfff, #1e90ff);
        color: white;
    }

    .reservations-table th, 
    .reservations-table td {
        padding: 12px;
        text-align: center;
        vertical-align: middle;
        border-bottom: 1px solid #ddd;
    }

    .reservations-table tbody tr:nth-child(even) {
        background-color: rgba(0,191,255,0.05);
    }

    .reservations-table tbody tr:hover {
        background: rgba(0,191,255,0.15);
    }
</style>

<div class="reservations-container">
    <h1>📅 Liste des Réservations</h1>

    <div class="table-responsive">
        <table class="table reservations-table">
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
</div>
@endsection