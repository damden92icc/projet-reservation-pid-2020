@extends('layouts.app')

@section('title', 'Mon profil')

@section('content')

<h1> Mon Profil {{$login}} </h1>

<p> {{$firstname}} - {{$lastname}} </p>




@endsection