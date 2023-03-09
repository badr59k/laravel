@extends('base')

@section ('page_title', 'Admin - PhotoAmbiances - Liste')

@section('content')
    <h2> Admin - PhotoAmbiance - Liste </h2>

    @if (Session::has('confirmation'))
    <div class=form-confirmation--message>
        {{ Session::get('confirmation')}}
    </div>
    @endif
    
    <div class="bouton-ajouter">
        <a href="{{ route('admin.photoambiance.create')}}"><i class="fa-solid fa-plus"></i> Créer</a>
    </div>

    <table width="100%">
        <tbody>  
            <tr>
                <th>Chemin</th>
                <th>Ordre</th>
                <th>legende</th>
                <th>Actions</th>
            </tr>   
            @foreach ($photoAmbiances as $photoAmbiance)
                <tr>
                    <td> {{$photoAmbiance->chemin}}</td>
                    <td> {{$photoAmbiance->ordre}}</td>
                    <td> {{$photoAmbiance->legende}}</td>
                    <td>
                        <form action="{{ route('admin.photoambiance.delete', ['id' => $photoAmbiance->id])}}" method="post" onsubmit="return window.confirm('Etes-vous sûr de vouloir supprimer cet élément ?');">
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