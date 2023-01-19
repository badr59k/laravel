@extends('base')

@section('page_title', 'Contact')

@section('content')
    <h2> Contact </h2>
    <p>Adresse : {{ $adresse}}</p>
    <p>Tel : {{$tel}}</p>
    <p>{{$horaire}}</p>
    {!!$map!!}
@endsection