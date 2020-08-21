@extends('layouts.app')

@section('title', 'Fiche de l\'Artiste')

@section('content')
<h1> {{$artist->firstname}} {{$artist->lastname}} </h1>


<h2> Listes des types </h2>
    <ul>
        @foreach($artist->types as $type)
        <li> {{$type->type}} </li>
        @endforeach
    </ul>
@endsection