@extends('layouts.app')

@section('content')
<style>
    /* Dégradé bleu ciel */
    .sidebar {
        height: 100vh;
        position: fixed;
        top: 0;
        left: 0;
        width: 240px;
        background: linear-gradient(180deg, #00bfff, #1e90ff);
        padding-top: 60px;
        box-shadow: 2px 0 8px rgba(0,0,0,0.2);
    }

    /* Titre du dashboard */
    .sidebar h3 {
        color: white;
        font-weight: bold;
        text-align: center;
        margin-bottom: 30px;
    }

    /* Liens */
    .sidebar a {
        display: block;
        color: #f0f8ff;
        padding: 12px 20px;
        text-decoration: none;
        font-weight: 500;
        border-radius: 5px;
        margin: 5px 10px;
        transition: all 0.3s ease;
    }

    /* Effet au survol */
    .sidebar a:hover, .sidebar a.active {
        background-color: rgba(255, 255, 255, 0.2);
        color: white;
    }

    /* Section contenu */
    .content {
        margin-left: 240px;
        padding: 20px;
    }

    /* Responsive */
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

.btn-logout {
  background-color: #56CCF2;       /* Bleu ciel doux */
  border: none;
  color: white;
  font-weight: 600;
  padding: 10px 18px;
  border-radius: 8px;
  width: 100%;
  font-size: 16px;
  box-shadow: 0 4px 8px rgba(86,204,242,0.4);
  transition: background-color 0.3s ease, box-shadow 0.3s ease;
}

.btn-logout:hover {
  background-color: #2D9CDB;       /* Bleu un peu plus foncé au survol */
  box-shadow: 0 6px 12px rgba(45,156,219,0.5);
  cursor: pointer;
  color: white;
  text-decoration: none;
}



</style>

<div class="sidebar">
    <h3>⚙ Admin Dashboard</h3>
    <a href="#" style="cursor:default; background-color: rgba(255,255,255,0.15);">
        Bienvenue<br><strong>{{ Auth::user()->name }}</strong>
    </a>
    <a href="{{ route('admin.offers.index') }}">📦 Gérer les Offres</a>
    <a href="{{ route('admin.offers.create') }}">➕ Créer une Offre</a>
    <a href="{{ route('admin.reservations.index') }}">📋 Gérer les Réservations</a>

    <form action="{{ route('logout') }}" method="POST" class="mt-3 px-3">
        @csrf
        <button type="submit" class="btn-logout">🚪 Déconnexion</button>
    </form>
</div>

<div class="content">
    <h1 class="text-primary">Bienvenue Admin 🎉</h1>
    <p>Vous êtes connecté en tant que <strong>{{ Auth::user()->name }}</strong></p>
</div>
@endsection

