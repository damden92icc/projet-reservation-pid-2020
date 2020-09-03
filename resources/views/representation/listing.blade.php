@extends('layouts.app')

@section('title', 'Ajout  liste des representation')

@section('content')



<ul>
@foreach($user->representation as $rep)
    <li>
        {{$rep->when}}
      
  </li>
@endforeach
</ul>

@endsection