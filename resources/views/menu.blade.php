@extends('base')

@section ('page_title', 'Menu')

@section('content')
    <center>    
        <h2> Menu </h2>
        @foreach ($categories as $categorie)
            <table class="menu" width="50%">
                <tr>
                    <td>
                        <h4>{{$categorie->nom}}</h4>
                        {{$categorie->description }}
                    </td>
                </tr>
                <td>
                    @foreach ($categorie->platsSortedByNom as $plat)
                    <img class="menu--photo-plat" src="{{ asset($plat->photo->chemin) }}" alt="">
                    <h4>{{ $plat->nom }} {{ $plat->prix }}€</h4>
                    {{ $plat->description}}<br>
                    @foreach ($plat->etiquettes as $etiquette)
                    #{{ $etiquette->nom }}
                    @endforeach
                    <br><br><br>
                    @endforeach
                </td>
            </table>
        @endforeach
    </center>
        @endsection