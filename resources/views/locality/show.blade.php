@extends('layouts.app')

@section('title', 'Code postal et Localite')

@section('content')
<h1> {{$locality->postal_code}} {{$locality->locality}} </h1>

<ul>
    @foreach($locality->locations as $location)
        <li>{{ $location->designation }} </li>
    @endforeach
</ul>

@endsection