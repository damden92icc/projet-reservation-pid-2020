
@extends('layouts.app')

@section('title', 'liste des spectacle dispo via TH')

@section('content')


@dump($data)

@dump(json_encode($actors))


{{$data->title}}


@foreach($data->actors as $auteur)
{{$auteur->firstname}} - {{$auteur->lastname}} <br>
@endforeach


<span class="text-danger" id="error-slug" hidden > <strong> Ce show existe deja </strong> </span>

<form>
<div class="form-group {{ $errors->has('location_id') ? 'has-error' : '' }}">
        <label for="location_id">location_id</label>
        <select id="location_id" name="location_id" class="form-control browser-default" ></select>

      
            <span class="text-danger" id="error-loc" hidden > <strong> Ce champs est obligatoire </strong> </span>
    
    </div>
<div class="form-group {{ $errors->has('bookable') ? 'has-error' : '' }}">
        <label for="bookable">bookable</label>
        <input type="text" id="bookable" name="bookable" class="form-control" value="{{old('bookable')}}">

        @if($errors->has('bookable'))
            <span class="text-danger"> <strong> {{$errors->first('bookable')}} </strong> </span>
        @endif
    </div>


    <div class="form-group {{ $errors->has('price') ? 'has-error' : '' }}">
        <label for="price">price</label>
        <input type="text" id="price" name="price" class="form-control" value="{{old('price')}}">

        @if($errors->has('price'))
            <span class="text-danger"> <strong> {{$errors->first('price')}} </strong> </span>
        @endif
    </div>
</form>
<button id="save"> Adding </button>

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>

<script>

var actors = '{{json_encode($data->actors)}}';
actors = JSON.parse(actors.replace(/&quot;/ig,'"').replace(/(\r\n|\n|\r)/gm," "));

var authors = '{{json_encode($data->authors)}}';
authors = JSON.parse(authors.replace(/&quot;/ig,'"').replace(/(\r\n|\n|\r)/gm," "));


$('#save').click(function (){

    $.ajax({
        url :"{{route('artist store many') }}",
        headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            },
        type: 'POST',
        data: {
            artists: actors , 
        },
        success: function(respActors){
                console.log(respActors);
                    $.ajax({
                        url :"{{route('artist store many') }}",
                        headers: {
                                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                            },
                        type: 'POST',
                        data: {
                            artists: authors , 
                        },
                        success: function(respAuthors){
                                console.log(respAuthors);
                                $.ajax({
                                    url: "{{ route('show store') }}",
                                    headers: {
                                        'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                                    },
                                    type: "POST",
                                    data: {
                                        title :'{{$data->title}}',
                                            slug: '{{$data->object}}',
                                            description: '{{$data->permanent_url}}',
                                            poster_url: '{{$data->poster}}',
                                            location_id: $('#location_id').val(),
                                            bookable : $('#bookable').val(),
                                            price: $('#price').val(),
                                            authors: respAuthors,
                                            comediens: respActors,
                                        },
                                    success: function(result){
                                        console.log(result);
                                        window.location.href='{{ route('shows') }}/' + result['id'] ;
                                    },
                                    error: function(e){
                                        console.error(e);
                                        console.log(e.status);
                                            console.log(e.responseText);
                                            if(e.status == 422){
                                                var textError = JSON.parse(e.responseText);    
                                                console.log(textError);           
                                                
                                                if(textError.hasOwnProperty('slug')){
                                                    console.log('slug manquant');
                                                    $('#error-slug').removeAttr('hidden');
                                                }
                                                else {
                                                    $('#error-slug').attr('hidden', 'hidden')
                                                }

                                                if(textError.hasOwnProperty('location_id')){
                                                    console.log('location manquant');
                                                    $('#error-loc').removeAttr('hidden');
                                                }
                                                else {
                                                    $('#error-loc').attr('hidden', 'hidden')
                                                }

                                            }
                                    }
                                });
                        },
                        error: function(r){
                            console.error(r);
                        }
                    });
        },
        error: function(r){
            console.error(r);
        }
    });
});







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