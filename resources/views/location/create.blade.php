

@extends('layouts.app')

@section('title', 'Ajout  artiste')

@section('content')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />

<h1> Créer un theatre </h1>


<form method="POST" action="{{ route('location store') }}">

{{csrf_field()}}

<div class="form-group {{ $errors->has('slug') ? 'has-error' : '' }}">
        <label for="slug"> slug</label>
        <input type="text" id="slug" name="slug" class="form-control" value="{{old('slug')}}">

        @if($errors->has('slug'))
            <span class="text-danger"> <strong> {{$errors->first('slug')}} </strong> </span>
        @endif
    </div>

    <div class="form-group {{ $errors->has('designation') ? 'has-error' : '' }}">
        <label for="designation"> designation</label>
        <input type="text" id="designation" name="designation" class="form-control" value="{{old('designation')}}">

        @if($errors->has('designation'))
            <span class="text-danger"> <strong> {{$errors->first('designation')}} </strong> </span>
        @endif
    </div>

    <div class="form-group {{ $errors->has('address') ? 'has-error' : '' }}">
        <label for="address">address</label>
        <input type="text" id="address" name="address" class="form-control" value="{{old('address')}}">

        @if($errors->has('address'))
            <span class="text-danger"> <strong> {{$errors->first('address')}} </strong> </span>
        @endif
    </div>

    <div class="form-group {{ $errors->has('locality_id') ? 'has-error' : '' }}">
        <label for="locality_id">locality_id</label>
        <input id="locality_id" name="locality_id" class="form-control" >

        @if($errors->has('locality_id'))
            <span class="text-danger"> <strong> {{$errors->first('locality_id')}} </strong> </span>
        @endif
    </div>
    


    <div class="form-group {{ $errors->has('website') ? 'has-error' : '' }}">
        <label for="website">website</label>
        <input type="text" id="website" name="website" class="form-control" value="{{old('website')}}">

        @if($errors->has('website'))
            <span class="text-danger"> <strong> {{$errors->first('website')}} </strong> </span>
        @endif
    </div>



    <div class="form-group {{ $errors->has('phone') ? 'has-error' : '' }}">
        <label for="phone">phone</label>
        <input type="text" id="phone" name="phone" class="form-control" value="{{old('phone')}}">

        @if($errors->has('phone'))
            <span class="text-danger"> <strong> {{$errors->first('phone')}} </strong> </span>
        @endif
    </div>


    <div class="form-group">
        <button class="btn btn-success" type="submit">
            Enregistrer
        </button>
    </div>

</form>


<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>

<script>
    $('#locality_id').select2({
      
        minimumInputLength:2,
        ajax: {
            url:"{{route('locality select json') }}",
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
                            text : item.locality + ' ' + item.postal_code ,
                            id: $.parseJSON(item.id),
                        }
                    } )
                }
            }
        }
    });
</script>

@endsection