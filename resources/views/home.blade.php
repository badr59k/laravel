@extends('base')

@section ('page_title', 'Accueil')

@section('content') 
    <img class="medium-size" src="{{asset('img/Image restaurant.jpg')}}" alt="Interieur du restaurant">
    <img class="medium-size" src="{{asset('img/cuisinier.jpg')}}"  alt="cuisinier">

    <h3> Dernières actualités : </h3>
        <table>
            @foreach ($actus as $actu)
            <tr>
                <td> {{$actu->jour_publication }}</td>
                <td>{{$actu->texte}}</td>
            </tr> 
            @endforeach
        </table>

@endsection
