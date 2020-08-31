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
             <p> <strong> Lieu de reprsentation : {{$show->location->designation}} </strong>   </p>
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
          <a href="{{route('booking get place' , $show->id )}}"> Reserver une place </a>
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




    @if (!Auth::guest())

    @admin


<form method="POST" action="{{ route('representation store') }}">

{{csrf_field()}}
<div class="form-group {{ $errors->has('when') ? 'has-error' : '' }}">
    <label for="when"> when Fromat a inserer : 2012-11-11 13:30:00 </label>
    <input type="text" id="when" name="when" class="form-control" value="{{old('when')}}">

    @if($errors->has('when'))
        <span class="text-danger"> <strong> {{$errors->first('when')}} </strong> </span>
    @endif
</div>

<div class="form-group {{ $errors->has('location_id') ? 'has-error' : '' }}">
        <label for="location_id">location_id</label>
        <select id="location_id" name="location_id" class="form-control browser-default" ></select>

            <span class="text-danger" hidden id="error-loc"> <strong> Ce champs ne peut etre vide</strong> </span>
    
    </div>



<input id="show_id" name="show_id" hidden value='{{$show->id}}'>

<div class="form-group">
    <button class="btn btn-success" type="submit">
        Enregistrer
    </button>
</div>

</form>

@endadmin
    @endif




    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>

<script>

$('#location_id').select2({
      
      minimumInputLength: 3,
        ajax: {
            url:"{{route('location select json') }}",
            datatype:'json',
            data: function(param){
                var query = {
                    search: param.term,
                    type:'public'
                }
                return query;
            },
            processResults: function (data){
                return {
                    results: $.map(data, function(item) {
                        return {
                            text : item.designation,
                            id: $.parseJSON(item.id),
                        }
                    } )
                }
            }
        }
    });
</script>
@endsection