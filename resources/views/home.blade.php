@extends('base')

@section ('page_title', 'Accueil')

@section('content') 
    <center>    
        <div id="caroussel">
            <div class="image-ambiance">
                <img src="{{asset('img/Image restaurant.jpg')}}" alt="Interieur du restaurant">
                <img src="{{asset('img/cuisinier.jpg')}}"  alt="cuisinier">
                <img src="{{asset('img/clem-onojeghuo-zlABb6Gke24-unsplash.jpg')}}"  alt="resto exterieur">
                <img src="{{asset('img/jay-wennington-N_Y88TWmGwA-unsplash.jpg')}}"  alt="ambiance">
            </div>
        </div>
        <button id="bouton-reservation"><a href="{{ route('reservation')}}"> Réserver</a></button>
    </center>

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
