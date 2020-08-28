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


     <h2> Liste des representations </h2>

     @if($show->representation->count() >= 1 )
          <ul>
          @foreach($show->representation as $representation)
          <li> {{$representation->when}} </li>
          @endforeach
          </ul>
     @endif

     <h2> Liste des artistes </h2>
     
    <p> Auteurs </p>




    @foreach($collaborateurs['auteur'] as $auteur)
        {{$auteur->firstname}}
        {{$auteur->lastname}}

        @if($loop->iteration == $loop->count-1) 
        et
        @elseif(!$loop->last),
        @endif
    @endforeach

 
@if(isset($collaborateurs['scenographe']))
    <p> Metteur en scene </p>


    @foreach($collaborateurs['scenographe'] as $sceno)
        {{$sceno->firstname}}
        {{$sceno->lastname}}

        @if($loop->iteration == $loop->count-1) 
        et
        @elseif(!$loop->last),
        @endif
    @endforeach
@endif

    <p>Distribution: </p>

    @foreach($collaborateurs['comedien'] as $comm)
        {{$comm->firstname}}
        {{$comm->lastname}}

        @if($loop->iteration == $loop->count-1) 
        et
        @elseif(!$loop->last),
        @endif
    @endforeach

@endsection