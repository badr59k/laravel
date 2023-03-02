@extends('base')

@section('page_title', 'Contact')

@section('content')
    <h2> Contact </h2>
        <table class="table-contact">
            <tr>
                <th>Adresse</th>
                <th>Tel</th>
                <th>Horaires</th>
            </tr>
            <tr>
                <td>{{ $adresse}}</td>
                <td>{{$tel}}</td>
                <td>{{$horaire}}</td>
            </tr>
        </table>
        {!!$map!!}
    <br>
@endsection