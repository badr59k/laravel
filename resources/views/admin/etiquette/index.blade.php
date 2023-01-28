@extends('base')

@section ('page_title', 'Admin - Etiquette - Liste')

@section('content')
    <h2> Admin - Etiquette - Liste </h2>
    <div>
        <a href="{{ route('admin.etiquette.create')}}">Ajouter</a>
    </div>

    <table>
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
                    <td><a href="{{ route('admin.etiquette.edit', ['id' => $etiquette->id]) }}">modifier</a></td>
                </tr> 
            @endforeach
        </tbody>
    </table>
@endsection