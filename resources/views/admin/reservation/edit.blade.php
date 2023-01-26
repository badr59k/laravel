@extends('base')

@section ('page_title', 'Admin - Modification')

@section('content')
    <h2> Admin - Réservation - Modification</h2>

    <form action="{{ route ('admin.reservation.update', ['id' => $reservation ->id])}}" method="post">
        @csrf
        <div class ="corps_formulaire">
            <div>
                <label> Nom </label>
                <input type="text" name="nom" id="" value="{{$reservation->nom}}">
            </div>
            <div>
                <label> Prénom </label>
                <input type="text" name="prenom" id="" value="{{$reservation->prenom}}">
            </div>
            <div>
                <label> Jour </label>
                <input type="date" name="jour" id="" value="{{$reservation->jour}}">
            </div>
            <div>
                <label> Heure</label>
                <input type="time" name="heure" id="" value="{{$reservation->heure}}">
            </div>
            <div>
                <label> Couverts </label>
                <input type="number" name="nombre_personnes" id="" value="{{$reservation->nombre_personnes}}">
            </div>
            <div>
                <label> Tel </label>
                <input type="tel" name="tel" id="" value="{{$reservation->tel}}">
            </div>
            <div>
                <label> Email</label>
                <input type="email" name="email" id="" value="{{$reservation->email}}">
            </div>
        </div>
        <div class="pied_formulaire">
            <button>Modifier</button>
        </div>
    </form>

@endsection
