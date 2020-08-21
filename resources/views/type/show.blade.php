@extends('layouts.app')

@section('title', 'Liste des types d\'artistes ')

@section('content')
<h1> {{$type->type}}  </h1>

<h2> Liste des artistes </h2>
    <ul>
        @foreach($type->artists as $artist)
        <li> {{$artist->firstname}}  {{$artist->lastname}}</li>
        @endforeach
    </ul>

@endsection