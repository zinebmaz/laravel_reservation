@extends('layouts.app')

@section('content')
<style>
    /* Style de la sidebar */
    .sidebar {
        height: 100vh;
        position: fixed;
        top: 0;
        left: 0;
        width: 220px;
        background-color: #343a40; /* Gris foncé Bootstrap */
        padding-top: 60px; /* pour espace depuis le haut si tu as un header */
    }

    .sidebar a {
        display: block;
        color: #ddd;
        padding: 12px 20px;
        text-decoration: none;
        font-weight: 500;
    }

    .sidebar a:hover, .sidebar a.active {
        background-color: #495057;
        color: #fff;
        text-decoration: none;
    }

    .content {
        margin-left: 220px; /* pour laisser la place à la sidebar */
        padding: 20px;
    }

    /* Responsive - sur petits écrans la sidebar devient horizontale */
    @media (max-width: 768px) {
        .sidebar {
            position: relative;
            width: 100%;
            height: auto;
            padding-top: 0;
        }
        .content {
            margin-left: 0;
        }
        .sidebar a {
            display: inline-block;
            padding: 10px 15px;
        }
    }
</style>

<div class="sidebar">
    <h3 class="text-white px-3">Admin Dashboard</h3>
    <a href="#" class="disabled" style="cursor:default;">Bienvenue <br><strong>{{ Auth::user()->name }}</strong></a>
    <a href="{{ route('admin.offers.index') }}">Gérer les Offres</a>
    <a href="{{ route('admin.offers.create') }}">Créer une Offre</a>
    <a href="{{ route('admin.reservations.index') }}">📋 Gérer les Réservations</a>

    <form action="{{ route('logout') }}" method="POST" class="mt-3 px-3">
        @csrf
        <button type="submit" class="btn btn-danger w-100">Déconnexion</button>
    </form>
</div>

<div class="content">
    <h1>Bienvenue Admin</h1>
    <p>Vous êtes connecté en tant que <strong>{{ Auth::user()->name }}</strong></p>

    {{-- Tu peux aussi ajouter ici le contenu principal du dashboard --}}
</div>
@endsection

