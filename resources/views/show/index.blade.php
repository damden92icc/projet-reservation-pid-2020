@extends('layouts.app')

@section('title', 'liste des spectacle')

@section('content')

<h1> Liste des {{$resource}} </h1>

<br/>
<br/>

    <h2> Trié les spectacle </h2>
    <input >

    
<ul>
@foreach($shows as $show)
    <li>
       {{$show->title}}

       @if($show->bookable)
        <span>{{$show->price}} </span>
        @else 
            <span> sold out </span>
       @endif


    @if($show->representation->count()==1)
    
    - <span> 1 representation </span>
    @elseif($show->representation->count()>1)
    - <span> {{$show->representation->count()}} Representation </span>
    @else
    - <em> aucune representation </em>
    @endif

   
    @if($show->representation->count()>=1)
    <a href="{{route('show', ['id' => $show->id]) }} "> Voir le détaul </a>
    @endif

    </li>
@endforeach
</ul>

{{$shows->links()}}

@endsection