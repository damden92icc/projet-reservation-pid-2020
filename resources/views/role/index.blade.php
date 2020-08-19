@extends('layouts.app')

@section('title', 'liste des Role des utilisateurs')

@section('content')

<h1> Liste des {{$resource}} </h1>

<table>
    <thead>
        <tr>
        <th> Role des utilisateurs</th>
        </tr>
    </thead>
    <tbody>
    @foreach($roles as $role)
    <tr>
    <td> {{$role->role}} </td>
    </tr>
    @endforeach
    </tbody>
</table>
@endsection