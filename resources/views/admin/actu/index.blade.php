@extends('base')

@section ('page_title', 'Admin - Actu - Liste')

@section('content')
    <h2> Admin - Actualités - Liste </h2>

    <div>
        <a href="{{ route('admin.actu.create')}}">Ajouter</a>
    </div>

    <table>
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
                    <td><a href="{{ route('admin.actu.edit', ['id' => $actu->id]) }}">modifier</a></td>
                </tr> 
            @endforeach
        </tbody>
    </table>
@endsection