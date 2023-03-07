@extends('base')

@section ('page_title', 'Admin - Catégories - Liste')

@section('content')
    <h2> Admin - Catégorie - Liste </h2>

    @if (Session::has('confirmation'))
    <div class=form-confirmation--message>
        {{ Session::get('confirmation')}}
    </div>
    @endif
    
    <div class="bouton-ajouter">
        <a href="{{ route('admin.categorie.create')}}"><i class="fa-solid fa-plus"></i> Créer</a>
    </div>

    <table width="100%">
        <tbody>  
            <tr>
                <th>Nom</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>   
            @foreach ($categories as $categorie)
                <tr>
                    <td> {{$categorie->nom}}</td>
                    <td> {{$categorie->description}}</td>
                    <td>
                        <center>
                            <a href="{{ route('admin.categorie.edit', ['id' => $categorie->id]) }}"><button class="button-modifier">Modifier</button></a>
                        
                            <form action="{{ route('admin.categorie.delete', ['id' => $categorie->id])}}" method="post" onsubmit="return window.confirm('Etes-vous sûr de vouloir supprimer cet élément ?');">
                                @csrf
                                @method('DELETE')
                                <button class="button-supprimer" type="submit">Supprimer</button>
                                {{-- <a href="{{ route('admin.categorie.delete', ['id' => $categorie->id])}}" onclick="event.preventDefault(); this.closet('form').submit(); }">Supprimer</a> --}}
                            </form> 
                        </center>
                    </td>
                </tr> 
            @endforeach
        </tbody>
    </table>
@endsection