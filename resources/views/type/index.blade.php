@extends('layouts.app')

@section('title', 'liste des type d\'artistes')

@section('content')

<h1> Liste des {{$resource}} </h1>

<table>
    <thead>
        <tr>
        <th> Type d'artiste </th>
        </tr>
    </thead>
    <tbody>
    @foreach($types as $type)
    <tr>
    <td> {{$type->type}} </td>
    </tr>
    @endforeach
    </tbody>
</table>
@endsection