@extends('layouts.app')

@section('title', 'Fiche de l\'Artiste')

@section('content')
<h1> {{$artist->firstname}} {{$artist->lastname}} </h1>



@endsection