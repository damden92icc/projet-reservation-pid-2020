@extends('layouts.app')

@section('title', 'liste des artistes')

@section('content')

<h1> Liste des {{$resource}} </h1>

<table>
    <thead>
        <tr>
        <th> FirstName </th>
        <th> Lastname </th>
        </tr>
    </thead>
    <tbody>
    @foreach($artists as $artist)
    <tr>
    <td> {{$artist->firstname}} </td>
    <td>{{$artist->lastname}}</td>
    </tr>
    @endforeach
    </tbody>
</table>
@endsection