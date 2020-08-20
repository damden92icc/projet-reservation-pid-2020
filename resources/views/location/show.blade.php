@extends('layouts.app')

@section('title', 'Fiche d\'un lieu de spectacle')

@section('content')
<h1> {{$location->designation}}</h1>

    <address>
        <p> {{$location->address}}</p>
        <p> {{$location->locality->postal_code}}
        {{$location->locality->locality}}
        }</p>
    </address>

    
        @if($location->website)
             <p>-   <a href="{{$location->website}}">{{$location->website}}</a></p>
        @else
            <p>Pas de site web</p>
        @endif

        @if($location->phone)
             <p>-   <a href="tel:{{$location->phone}}">{{$location->phone}}</a></p>
        @else
            <p>Pas de num de telephone</p>
        @endif


        <h2> Liste des spectacles </h2>
<ul>
    @foreach($location->shows as $show)
        <li>{{ $show->title }} </li>
    @endforeach
</ul>

@endsection