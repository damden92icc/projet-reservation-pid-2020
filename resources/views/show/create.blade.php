@extends('layouts.app')

@section('title', 'liste des spectacle')

@section('content')

<h1> Créer un show </h1>


<form method="POST" action="{{ route('shows adding') }}">

<label> Titre du show </label>
<   input type="text" id="show_title">

<label> Slug </label>
<input type="text" id="show_slug">



<label> 

</form>

@endsection