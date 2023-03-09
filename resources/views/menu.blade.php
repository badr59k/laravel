@extends('base')

@section ('page_title', 'Menu')

@section('content')
    <center>    
        <h2> Menu </h2>
        <table width="50%">
            <tr>
                <th>
                    <a href="#ancre1">Entrée</a>
                </th>
                <th>
                    <a href="#ancre2">Plat</a>
                </th>
                <th>
                    <a href="#ancre3">Dessert</a>
                </th>
                <th>
                    <a href="#ancre4">Petit-Déjeuner</a>
                </th>
                <th>
                    <a href="#ancre5">Boisson</a>
                </th>
            </tr>
        </table>
        @foreach ($categories as $categorie)
            <table class="menu" width="50%">
                <tr>
                    <td>
                        <div id="ancre{{$categorie->id}}">
                            <h4>{{$categorie->nom}}</h4>
                        </div>
                        {{$categorie->description }}
                    </td>
                </tr>
                <td>
                    @foreach ($categorie->platsSortedByNom as $plat)
                    <center>
                        <img class="menu--photo-plat" src="{{ asset($plat->photo->chemin) }}" alt="">
                        <h4>{{ $plat->nom }} {{ $plat->prix }}€</h4>
                        {{ $plat->description}}<br>
                        @foreach ($plat->etiquettes as $etiquette)
                        #{{ $etiquette->nom }}
                        @endforeach
                    </center>
                    <br><br><br>
                    @endforeach
                </td>
            </table>
        @endforeach
    </center>
        @endsection