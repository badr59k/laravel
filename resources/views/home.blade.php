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
            <a href="{{ route('reservation')}}"><button id="bouton-reservation"> Réserver</button></a>
        </div>
        
        <h3> Dernières actualités : </h3>
        <table width="50%">
            @foreach ($actus as $actu)
            <tr>
                <th> {{$actu->jour_publication }}</th>
                <td>{{$actu->texte}}</td>
            </tr> 
            @endforeach
        </table>
    </center>

@endsection
