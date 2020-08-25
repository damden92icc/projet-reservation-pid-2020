@extends('layouts.app')

@section('title', 'Ajout  artiste')

@section('content')

<h1> Créer une locality </h1>


<form method="POST" action="{{ route('locality store') }}">

{{csrf_field()}}
    <div class="form-group {{ $errors->has('locality') ? 'has-error' : '' }}">
        <label for="locality"> Nom commune</label>
        <input type="text" id="locality" name="locality" class="form-control" value="{{old('locality')}}">

        @if($errors->has('locality'))
            <span class="text-danger"> <strong> {{$errors->first('locality')}} </strong> </span>
        @endif
    </div>

    <div class="form-group {{ $errors->has('postal_code') ? 'has-error' : '' }}">
        <label for="postal_code"> Postalcode </label>
        <input type="number" id="postal_code" name="postal_code" class="form-control" value="{{old('postal_code')}}">

        @if($errors->has('postal_code'))
            <span class="text-danger"> <strong> {{$errors->first('postal_code')}} </strong> </span>
        @endif
    </div>

    <div class="form-group">
        <button class="btn btn-success" type="submit">
            Enregistrer
        </button>
    </div>

</form>

@endsection