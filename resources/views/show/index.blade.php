@extends('layouts.app')

@section('title', 'liste des lieux des spectacle')

@section('content')

<h1> Liste des {{$resource}} </h1>


<ul>
@foreach($shows as $show)
    <li>
       {{$show->title}}

       @if($show->bookable)
        <span>{{$show->price}} </span>
        @else 
            <span> sold out </span>
       @endif
    </li>
@endforeach
</ul>


@endsection