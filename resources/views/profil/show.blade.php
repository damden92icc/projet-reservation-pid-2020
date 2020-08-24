@extends('layouts.app')

@section('title', 'Mon profil')

@section('content')

<h1> Mon profil  - {{$user->login}} </h1>


<p>
{{$user->firstname}} <br/>
{{$user->lastname}} <br/>
{{$user->email}} <br/>
{{$user->langue}}

</p>

<a href="{{route('profil edit', ['user' => $user])}}">Editer mon profil</a>
@endsection