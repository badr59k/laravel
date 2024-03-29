@extends('base')

@section ('page_title', 'Admin - Restaurant - Liste')

@section('content')
    <h2> Admin - Restaurant - Liste </h2>

    @if (Session::has('confirmation'))
    <div class=form-confirmation--message>
        {{ Session::get('confirmation')}}
    </div>
    @endif
    
    <div class="bouton-ajouter">
        <a href="{{ route('admin.restaurant.create')}}"><i class="fa-solid fa-plus"></i> Créer</a>
    </div>

    <table>
        <tbody>  
            <tr>
                <th>Clé</th>
                <th>Valeur</th>
                <th>Actions</th>
            </tr>   
            @foreach ($restaurants as $restaurant)
                <tr>
                    <td> {{$restaurant->cle}}</td>
                    <td> {{$restaurant->valeur}}</td>
                    <td><a href="{{ route('admin.restaurant.edit', ['id' => $restaurant->id]) }}"><button class="button-modifier">Modifier</button></a></td>
                </tr> 
            @endforeach
        </tbody>
    </table>
@endsection