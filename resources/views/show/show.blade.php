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
     
   
    @if(isset($collaborateurs['auteur']))
    <p> Auteurs </p>
    @foreach($collaborateurs['auteur'] as $auteur)
        {{$auteur->firstname}}
        {{$auteur->lastname}}

        @if($loop->iteration == $loop->count-1) 
        et
        @elseif(!$loop->last),
        @endif
    @endforeach
    @endif
 
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


    @if(isset($collaborateurs['comedien']))
    <p>Distribution: </p>
    @foreach($collaborateurs['comedien'] as $comm)
        {{$comm->firstname}}
        {{$comm->lastname}}

        @if($loop->iteration == $loop->count-1) 
        et
        @elseif(!$loop->last),
        @endif
    @endforeach
    @endif









    <form method="POST" action="{{ route('representation store') }}">

{{csrf_field()}}
    <div class="form-group {{ $errors->has('when') ? 'has-error' : '' }}">
        <label for="when"> when </label>
        <input type="text" id="when" name="when" class="form-control" value="{{old('when')}}">

        @if($errors->has('when'))
            <span class="text-danger"> <strong> {{$errors->first('when')}} </strong> </span>
        @endif
    </div>

    <div class="form-group {{ $errors->has('location_id') ? 'has-error' : '' }}">
        <label for="location_id"> location </label>
        <input type="text" id="location_id" name="location_id" class="form-control" value="{{old('location_id')}}">

        @if($errors->has('location_id'))
            <span class="text-danger"> <strong> {{$errors->first('location_id')}} </strong> </span>
        @endif
    </div>



    <input id="show_id" name="show_id" hidden value='{{$show->id}}'>

    <div class="form-group">
        <button class="btn btn-success" type="submit">
            Enregistrer
        </button>
    </div>

</form>





@endsection