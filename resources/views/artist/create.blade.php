@extends('layouts.app')

@section('title', 'Ajout  artiste')

@section('content')

<h1> Créer un artiste </h1>






<form method="POST" action="{{ isset($artist) ? route('artist update', $artist) : route('artist store') }}">

{{csrf_field()}}
    <div class="form-group {{ $errors->has('firstname') ? 'has-error' : '' }}">
        <label for="firstname"> prenom de de lartiste </label>
        <input type="text" id="firstname" name="firstname" class="form-control" value="{{ isset($artist) ? $artist->firstname : old('firstname') }}">

        @if($errors->has('firstname'))
            <span class="text-danger"> <strong> {{$errors->first('firstname')}} </strong> </span>
        @endif
    </div>

    <div class="form-group {{ $errors->has('lastname') ? 'has-error' : '' }}">
        <label for="lastname"> Nom de de lartiste </label>
        <input type="text" id="lastname" name="lastname" class="form-control" value="{{ isset($artist) ? $artist->lastname : old('lastname')}}">

        @if($errors->has('lastname'))
            <span class="text-danger"> <strong> {{$errors->first('lastname')}} </strong> </span>
        @endif
    </div>

    <div class="form-group">
        <button class="btn btn-success" type="submit">
            Enregistrer
        </button>
    </div>

</form>

@endsection