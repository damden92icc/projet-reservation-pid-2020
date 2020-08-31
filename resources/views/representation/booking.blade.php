@extends('layouts.app')

@section('title', 'Ajout  artiste')

@section('content')

<h1> Reserver une place </h1>


<h2>  {{$represensation->show->title}} </h2>
<h2>  {{$represensation->show->price}} </h2>

<p> prix total: <span id=totalPrice> 0  </span> Euro </p>


<h2>  {{$represensation->when}} </h2>



<form method="POST" action="{{ route('booking place') }}">

{{csrf_field()}}
    <div class="form-group {{ $errors->has('nbrePlace') ? 'has-error' : '' }}">
        <label for="nbrePlace"> Nombre de place </label>
        <input type="text" id="nbrePlace" name="nbrePlace" class="form-control" value="{{ isset($artist) ? $artist->nbrePlace : old('nbrePlace') }}">

        @if($errors->has('nbrePlace'))
            <span class="text-danger"> <strong> {{$errors->first('nbrePlace')}} </strong> </span>
        @endif
    </div>

    <input type="text" id="represntation_id" name="represntation_id" class="form-control" hidden value="{{ $represensation->id }}">

    <div class="form-group">
        <button class="btn btn-success" type="submit">
            Enregistrer
        </button>
    </div>

</form>


<script>

$('#nbrePlace').keyup(function() {
    
    var nbPlace = $('#nbrePlace').val();
    if (!isNaN(nbPlace)){
        console.log("hellow");
            var price = {{ $represensation->show->price }};
            $('#totalPrice').text(price * nbPlace);
    }

});

</script>


@endsection