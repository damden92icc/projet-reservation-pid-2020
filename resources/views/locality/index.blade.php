@extends('layouts.app')

@section('title', 'liste des code postaux et localite')

@section('content')

<h1> Liste des {{$resource}} </h1>

<table>
    <thead>
        <tr>
        <th> Code postal</th>
        <th> Localiite</th>
        </tr>
    </thead>
    <tbody>
    @foreach($localities as $locality)
    <tr>
    <td> {{$locality->postal_code}} </td>
    <td>{{$locality->locality}}</td>
    </tr>
    @endforeach
    </tbody>
</table>
@endsection