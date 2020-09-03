@extends('layouts.app')

@section('title', 'liste des reservation')

@section('content')


<h1> Liste des réservations</h1>
<ul>
@foreach($user->representation as $rep)
    <li>
        {{$rep->when}}
      
  </li>
@endforeach
</ul>

@endsection