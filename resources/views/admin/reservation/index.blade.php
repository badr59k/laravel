@extends('base')

@section ('page_title', 'Admin - Réservation - Liste')

@section('content')
    <h2> Admin - Réservation - Liste </h2>

    <div>
        <a href="{{ route('admin.reservation.create')}}">Ajouter</a>
    </div>

    <table>
        <tbody>  
            <tr>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Date & Heure</th>
                <th>Nombre de personnes</th>
                <th>Tel</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>   
            @foreach ($reservations as $reservation)
                <tr>
                    <td> {{$reservation->nom}}</td>
                    <td> {{$reservation->prenom}}</td>
                    <td> {{$reservation->jour}} {{$reservation->heure}}</td>
                    <td> {{$reservation->nombre_personnes}}</td> 
                    <td> {{$reservation->tel}} </td>
                    <td> {{$reservation->email}} </td>
                    <td><a href="{{ route('admin.reservation.edit', ['id' => $reservation->id]) }}">modifier</a></td>
                </tr> 
            @endforeach
        </tbody>
    </table>
@endsection