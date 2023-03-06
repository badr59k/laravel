@extends('base')

@section ('page_title', 'Reservation')

@section('content')
<h2> Réservation </h2>
    <form>
        <div class="corps_formulaire">
            <div>
                <label>Nom</label>
                <input type="text">
            </div>
            <div>
                <label>Prenom</label>
                <input type="text">
            </div>
            <div>
                <label>Jour</label>
                <input type="date">
            </div>
            <div>
                <label>Heure</label>
                <input type="time">
            </div>
            <div>
                <label>Couverts</label>
                <input type="number">
            </div>
            <div>
                <label>Tel</label>
                <input type="tel" placeholder="06 12 34 56 78">
            </div>
            <div>
                <label>Adresse mail</label>
                <input type="email" placeholder="ocnamo@contact.net">
            </div>
        </div>
        <div >
            <button>Réserver</button>
        </div>
    </form>
@endsection