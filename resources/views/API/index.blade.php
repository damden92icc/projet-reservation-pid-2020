@extends('layouts.app')

@section('title', 'liste des spectacle dispo via TH')

@section('content')


<h1> SHow disponible via l'API</1>

<table class="table">
  <thead>
    <tr>
      <th scope="col">Title</th>
      <th scope="col">Liens</th>
        <th> Auteurs</th>
        <th> Directors</th>
        <th> Image </th>
    </tr>
  </thead>
  <tbody>



@foreach($fetchedShow as $SingleSHow)
    <tr>
      <td>    {{$SingleSHow->title}}</td>
      <td> <a href="{{$SingleSHow->permanent_url}}"> Liens original</a>   </td>
    <td> 
    @foreach($SingleSHow->authors as $author)
             {{ $author->lastname }}  
             {{ $author->firstname }} <br> 
    @endforeach
    </td>

    <td> 
    @foreach($SingleSHow->directors as $director)
             {{ $director->lastname }}  
             {{ $director->firstname }} <br> 
    @endforeach
    </td>



    <td>
        <img src="   {{$SingleSHow->poster}}">
    </td>

    </tr>
@endforeach

   
  
  </tbody>
</table>



@endsection