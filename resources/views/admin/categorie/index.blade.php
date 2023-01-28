@extends('base')

@section ('page_title', 'Admin - Catégories - Liste')

@section('content')
    <h2> Admin - Catégorie - Liste </h2>

    <div>
        <a href="{{ route('admin.categorie.create')}}">Ajouter</a>
    </div>

    <table>
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
                    <td><a href="{{ route('admin.categorie.edit', ['id' => $categorie->id]) }}">modifier</a></td>
                </tr> 
            @endforeach
        </tbody>
    </table>
@endsection