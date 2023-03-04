@extends('base')

@section ('page_title', 'Admin - Actu - Liste')

@section('content')
    <h2> Admin - Actualités - Liste </h2>

    @if (Session::has('confirmation'))
    <div class=form-confirmation--message>
        {{ Session::get('confirmation')}}
    </div>
    @endif
    
    <div class="bouton-ajouter">
        <a href="{{ route('admin.actu.create')}}"><i class="fa-solid fa-plus"></i> Créer</a>
    </div>

    <table width="100%">
        <tbody>  
            <tr>
                <th>Jour de publication</th>
                <th>Heure de publication</th>
                <th>Texte </th>
                <th>Actions</th>
            </tr>   
            @foreach ($actus as $actu)
                <tr>
                    <td> {{$actu->jour_publication}}</td>
                    <td> {{$actu->heure_publication}}</td>
                    <td> {{$actu->texte}}</td>
                    <td>
                        <center>
                            <a href="{{ route('admin.actu.edit', ['id' => $actu->id]) }}">modifier</a>
                            
                            <form action="{{ route('admin.actu.delete', ['id' => $actu->id])}}" method="post" onsubmit="return window.confirm('Etes-vous sûr de vouloir supprimer cet élément ?');">
                                @csrf
                                @method('DELETE')
                                <button class="button-supprimer" type="submit">Supprimer</button>
                                {{-- <a href="{{ route('admin.actu.delete', ['id' => $actu->id])}}" onclick="event.preventDefault(); this.closet('form').submit(); }">Supprimer</a> --}}
                            </form> 
                        </center>
                    </td>
                </tr> 
            @endforeach
        </tbody>
    </table>
@endsection