@extends('base')

@section ('page_title', 'Accueil')

@section('content') 
    <center>    
        <div id="caroussel">
            <div class="images-accueil">
                <img class="image-ambiance" src="{{asset('img/ambiance/6f760bd2-7463-48d6-be2a-ee7a48bfcc56.jfif')}}" alt="Interieur du restaurant">
                <img class="image-ambiance" src="{{asset('img/ambiance/43c17afd-284f-48fc-b35c-8c0e2cf8e464.jfif')}}" alt="Interieur du restaurant">
                <img class="image-ambiance" src="{{asset('img/ambiance/bfd37413-91ad-4e1a-b697-f40f3742d99a.jfif')}}" alt="Interieur du restaurant">
                <img class="image-ambiance" src="{{asset('img/ambiance/eaf30327-e0ae-4066-8ecc-a5b816344447.jfif')}}" alt="Interieur du restaurant">
            </div>
            <a href="{{ route('reservation')}}"><button id="bouton-reservation"> Réserver</button></a>
        </div>
        
        <h3> Dernières actualités : </h3>
        <table width="100%">
            @foreach ($actus as $actu)
            <tr>
                <th> {{$actu->jour_publication }}</th>
                <td>{{$actu->texte}}</td>
            </tr> 
            @endforeach
        </table>
    </center>

@endsection