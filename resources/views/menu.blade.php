@extends('base')

@section ('page_title', 'Menu')

@section('content')
    <h2> Menu </h2>
    @foreach ($categories as $categorie)
        <h4>{{$categorie->nom}}</h4>
        <p> {{$categorie->description }}</p>

        <ul>
            @foreach ($categorie->platsSortedByNom as $plat)
            <li>
                {{ $plat->nom }} {{ $plat->prix }} eur<br>
                {{ $plat->description}}<br>
                @foreach ($plat->etiquettes as $etiquette)
                    #{{ $etiquette->nom }}
                @endforeach
            </li>
            @endforeach
        </ul>
    @endforeach
@endsection