@extends('base')

@section ('page_title', 'Admin - Réservation - Liste')

@section('content')
    <h2> Admin - Réservation - Liste </h2>

    @if (Session::has('confirmation'))
        <div class=form-confirmation--message>
            {{ Session::get('confirmation')}}
        </div>
    @endif

    <div class="bouton-ajouter">
        <a href="{{ route('admin.reservation.create')}}"><i class="fa-solid fa-plus"></i> Créer</a>
    </div>

    <table width="100%">
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
                    <td>  
                        <center>
                            <a class="lien-modif" href="{{ route('admin.reservation.edit', ['id' => $reservation->id]) }}">Modifier</a> 
                        
                            <form action="{{ route('admin.reservation.delete', ['id' => $reservation->id])}}" method="post" onsubmit="return window.confirm('Etes-vous sûr de vouloir supprimer cet élément ?');">
                                @csrf
                                @method('DELETE')
                                <button class="button-supprimer" type="submit">Supprimer</button>
                                {{-- <a href="{{ route('admin.reservation.delete', ['id' => $reservation->id])}}" onclick="event.preventDefault(); this.closet('form').submit(); }">Supprimer</a> --}}
                            </form>
                        </center> 
                    </td>

                </tr> 
            @endforeach
        </tbody>
    </table>
@endsection