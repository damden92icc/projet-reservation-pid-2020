@extends('layouts.app')

@section('title', 'Code postal et Localite')

@section('content')
<h1> {{$locality->postal_code}} {{$locality->locality}} </h1>
@endsection