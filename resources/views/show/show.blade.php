@extends('layouts.app')

@section('title', 'Fiche d\'un  spectacle')

@section('content')
<h1> {{$show->title}}</h1>



    
        @if($show->poster_url)
             <p>   <img src="{{asset('images/'.$show->poster_url) }}" alt="{{$show->poster_url}}" width="200"> </p>
        @else
            <p>Pas d'image'</p>
        @endif

        @if($show->location)
             <p> <strong> Lieu de creation : {{$show->location->designation}} </strong>   </p>
        @else
            <p>Pas de num de telephone</p>
        @endif

        @if($show->bookable)
        <span>{{$show->price}} </span>
       @else 
            <span> sold out </span>
       @endif

@endsection