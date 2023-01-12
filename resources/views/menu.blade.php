@extends('base')

@section ('page_title', 'Menu')

@section('content')
    <h2> Menu </h2>
    <ul>
    @foreach ($categories as $categorie)
        <li>{{$categorie->nom}} ({{ $categorie-> description }})</li>
    @endforeach
    </ul>
@endsection