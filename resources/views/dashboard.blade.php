@extends('base')

@section('page_title', 'Dashboard')

@section('content')
    <h1>Dashboard</h1>
    <table width = "100%">
        <tr>
            <th>Réservation</th>
            <td><a href="{{ route('admin.reservation.index')}}">Liste des réservations</a></td>
            <td><a href="{{ route('admin.reservation.create')}}">Création d'une réservation</a></td>
        </tr>
        <tr>
            <th>Actualités</th>
            <td><a href="{{ route('admin.actu.index')}}">Liste des actualités</a></td>
            <td><a href="{{ route('admin.actu.create')}}">Création d'une actualité</a></td>
        </tr>
        <tr>
            <th>Catégories</th>
            <td><a href="{{ route('admin.categorie.index')}}">Liste des catégories</a></td>
            <td><a href="{{ route('admin.categorie.create')}}">Création d'une catégorie</a></td>
        </tr>
        <tr>
            <th>Plats</th>
            <td><a href="{{ route('admin.plat.index')}}">Liste des plats</a></td>
            <td><a href="{{ route('admin.plat.create')}}">Création d'un plat</a></td>
        </tr>
        <tr>
            <th>Etiquette</th>
            <td><a href="{{ route('admin.etiquette.index')}}">Liste des étiquettes</a></td>
            <td><a href="{{ route('admin.etiquette.create')}}">Création d'une étiquette</a></td>
        </tr>
        <tr>
            <th>Information du restaurant</th>
            <td><a href="{{ route('admin.restaurant.index')}}">Liste des informations du restaurant</a></td>
            <td><a href="{{ route('admin.restaurant.create')}}">Ajout d'information sur le restaurant</a></td>
        </tr>
    </table>
@endsection