@extends('base')

@section ('page_title', 'Admin - Plats - Liste')

@section('content')
    <h2> Admin - Plat - Liste </h2>

    @if (Session::has('confirmation'))
    <div class=form-confirmation--message>
        {{ Session::get('confirmation')}}
    </div>
    @endif
    
    <div class="bouton-ajouter">
        <a href="{{ route('admin.plat.create')}}"><i class="fa-solid fa-plus"></i> Créer</a>
    </div>

    <table width="100%">
        <tbody>  
            <tr>
                <th>Nom</th>
                <th>Prix</th>
                <th>Description</th>
                <th>Epingle</th>
                <th>Actions</th>
            </tr>   
            @foreach ($plats as $plat)
                <tr>
                    <td> {{$plat->nom}}</td>
                    <td> {{$plat->prix}}</td>
                    <td> {{$plat->description}}</td>
                    <td> {{$plat->epingle}}</td>
                    <td>
                        
                        {{-- <a href="{{ route('admin.plat.edit', ['id' => $plat->id]) }}">modifier</a> --}}

                        <form action="{{ route('admin.plat.delete', ['id' => $plat->id])}}" method="post" onsubmit="return window.confirm('Etes-vous sûr de vouloir supprimer cet élément ?');">
                            @csrf
                            @method('DELETE')
                            <button class="button-supprimer" type="submit">Supprimer</button>
                            {{-- <a href="{{ route('admin.plat.delete', ['id' => $plat->id])}}" onclick="event.preventDefault(); this.closet('form').submit(); }">Supprimer</a> --}}
                        </form>
                    </td>
                </tr> 
            @endforeach
        </tbody>
    </table>
@endsection