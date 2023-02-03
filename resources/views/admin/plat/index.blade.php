@extends('base')

@section ('page_title', 'Admin - Plats - Liste')

@section('content')
    <h2> Admin - Plat - Liste </h2>
    <div>
        <a href="{{ route('admin.plat.create')}}">Ajouter</a>
    </div>

    <table>
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
                    {{-- <td><a href="{{ route('admin.plat.edit', ['id' => $plat->id]) }}">modifier</a></td> --}}
                </tr> 
            @endforeach
        </tbody>
    </table>
@endsection