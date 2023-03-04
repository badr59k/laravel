@extends('base')

@section ('page_title', 'Admin - Etiquette - Liste')

@section('content')
    <h2> Admin - Etiquette - Liste </h2>

    @if (Session::has('confirmation'))
    <div class=form-confirmation--message>
        {{ Session::get('confirmation')}}
    </div>
    @endif

    <div class="bouton-ajouter">
        <a href="{{ route('admin.etiquette.create')}}"><i class="fa-solid fa-plus"></i> Créer</a>
    </div>

    <table width = "100%">
        <tbody>  
            <tr>
                <th>Nom</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>   
            @foreach ($etiquettes as $etiquette)
                <tr>
                    <td> {{$etiquette->nom}}</td>
                    <td> {{$etiquette->description}}</td>
                    <td>
                        <center>
                            <a href="{{ route('admin.etiquette.edit', ['id' => $etiquette->id]) }}">modifier</a>
                        
                            <form action="{{ route('admin.etiquette.delete', ['id' => $etiquette->id])}}" method="post" onsubmit="return window.confirm('Etes-vous sûr de vouloir supprimer cet élément ?');">
                                @csrf
                                @method('DELETE')
                                <button class="button-supprimer" type="submit">Supprimer</button>
                                {{-- <a href="{{ route('admin.etiquette.delete', ['id' => $etiquette->id])}}" onclick="event.preventDefault(); this.closet('form').submit(); }">Supprimer</a> --}}
                            </form> 
                        </center>
                    </td>
                </tr> 
            @endforeach
        </tbody>
    </table>
@endsection