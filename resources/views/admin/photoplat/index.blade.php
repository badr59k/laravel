@extends('base')

@section ('page_title', 'Admin - PhotoPlats - Liste')

@section('content')
    <h2> Admin - PhotoPlat - Liste </h2>

    @if (Session::has('confirmation'))
    <div class=form-confirmation--message>
        {{ Session::get('confirmation')}}
    </div>
    @endif
    
    <div class="bouton-ajouter">
        <a href="{{ route('admin.photoplat.create')}}"><i class="fa-solid fa-plus"></i> Créer</a>
    </div>

    <table width="100%">
        <tbody>  
            <tr>
                <th>Chemin</th>
                <th>Actions</th>
            </tr>   
            @foreach ($photoPlats as $photoPlat)
                <tr>
                    <td> {{$photoPlat->chemin}}</td>
                    <td>
                        <a href="{{ route('admin.photoplat.edit', ['id' => $photoPlat->id]) }}">modifier</a>

                        <form action="{{ route('admin.photoplat.delete', ['id' => $photoPlat->id])}}" method="post" onsubmit="return window.confirm('Etes-vous sûr de vouloir supprimer cet élément ?');">
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