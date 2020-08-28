

@extends('layouts.app')

@section('title', 'Ajouter  show')

@section('content')


<h1> Créer un show </h1>


<form id="form-create">

{{csrf_field()}}

<div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
        <label for="title"> title</label>
        <input type="text" id="title" name="title" class="form-control" value="{{old('title')}}">

      
            <span id="error-title" hidden class="text-danger"> <strong>Ce champs ne peut etre vide </strong> </span>
      
    </div>

    <div class="form-group {{ $errors->has('slug') ? 'has-error' : '' }}">
        <label for="slug"> slug</label>
        <input type="text" id="slug" name="slug" class="form-control" value="{{old('slug')}}">

      
            <span class="text-danger" hidden id="error-slug-empty"> <strong> Ce champs ne peut etre vide</strong> </span>
            <span class="text-danger" hidden id="error-slug-unique"> <strong> Ce slug existee</strong> </span>
    </div>

    <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
        <label for="description">description</label>
        <input type="text" id="description" name="description" class="form-control" value="{{old('description')}}">

      
            <span class="text-danger" hidden id="error-des"> <strong> Ce champs ne peut etre vide</strong> </span>
     
    </div>


    <div class="form-group {{ $errors->has('location_id') ? 'has-error' : '' }}">
        <label for="location_id">location_id</label>
        <select id="location_id" name="location_id" class="form-control browser-default" ></select>

            <span class="text-danger" hidden id="error-loc"> <strong> Ce champs ne peut etre vide</strong> </span>
    
    </div>
    
    <!-- AUthors -->

    <div class="form-group {{ $errors->has('authors') ? 'has-error' : '' }}">
        <label for="authors">authors</label>
        <select id="authors" name="authors" class="form-control browser-default" multiple="mutiple"></select>

        @if($errors->has('authors'))
            <span class="text-danger"> <strong> {{$errors->first('authors')}} </strong> </span>
        @endif
    </div>
    
     <!-- Scenographe -->
    <div class="form-group {{ $errors->has('scenographes') ? 'has-error' : '' }}">
        <label for="scenographes">scenographes</label>
        <select id="scenographes" name="scenographes" class="form-control browser-default" multiple="mutiple"></select>

        @if($errors->has('scenographes'))
            <span class="text-danger"> <strong> {{$errors->first('scenographes')}} </strong> </span>
        @endif
    </div>
    
         <!-- commedie -->
         <div class="form-group {{ $errors->has('comediens') ? 'has-error' : '' }}">
        <label for="comediens">comediens</label>
        <select id="comediens" name="comediens" class="form-control browser-default" multiple="mutiple"></select>

        @if($errors->has('comediens'))
            <span class="text-danger"> <strong> {{$errors->first('comediens')}} </strong> </span>
        @endif
    </div>


    <div class="form-group {{ $errors->has('poster_url') ? 'has-error' : '' }}">
        <label for="poster_url">poster_url</label>
        <input type="text" id="poster_url" name="poster_url" class="form-control" value="{{old('poster_url')}}">

        @if($errors->has('poster_url'))
            <span class="text-danger"> <strong> {{$errors->first('poster_url')}} </strong> </span>
        @endif
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



    <div class="form-group">
        <button class="btn btn-success" type="button" id="submit-show">
            Enregistrer
        </button>
    </div>

</form>

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>


<script>
$(function() {
  

  $('#submit-show').click(function(){
        $.ajax({
            url: "{{ route('show store') }}",
             headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            },
            type: "POST",
            data: {
                title :$('#title').val(),
                    slug: $('#slug').val(),
                    description: $('#description').val(),
                    poster_url: $('#poster_url').val(),
                    location_id: $('#location_id').val(),
                    bookable : $('#bookable').val(),
                    price: $('#price').val(),
                    authors: $('#authors').val(),
                    scenographes: $('#scenographes').val(),
                    comediens: $('#comediens').val(),
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
                    if(textError.hasOwnProperty('title')){
                        console.log('titre manquant');
                        $('#error-title').removeAttr('hidden');
                    }
                    else {
                        $('#error-title').attr('hidden', 'hidden')
                    }

                    if(textError.hasOwnProperty('slug')){
                        if(textError['slug'][0]== 'requis'){
                            console.log('slug manquant');
                            $('#error-slug-empty').removeAttr('hidden');
                        }
                        else{
                            $('#error-slug-empty').attr('hidden', 'hidden') 
                        }
                       if(textError['slug'][0] == 'unique'){
                           console.log("dois etre unique");
                           $('#error-slug-unique').removeAttr('hidden');
                       }
                       else{
                        $('#error-slug-unique').attr('hidden', 'hidden') 
                       }

                    }
                    else {
                        $('#error-slug-empty').attr('hidden', 'hidden')
                        $('#error-slug-unique').attr('hidden', 'hidden') 
                    }

                    if(textError.hasOwnProperty('description')){
                        console.log('desc manquant');
                        $('#error-des').removeAttr('hidden');
                    }
                    else {
                        $('#error-des').attr('hidden', 'hidden')
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
  });
})

  
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

  $('#authors').select2({
    minimumInputLength: 2,
    ajax: {
        url:"{{route('artist select json') }}",
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
                        text : item.firstname + ' ' + item.lastname,
                        id: $.parseJSON(item.id),
                    }
                } )
            }
        }
    },
    templateSelection: function(artist) {
        return artist.text;
    },
    templateResult: function(artist) {
        return artist.text;
    }
});

$('#scenographes').select2({
    minimumInputLength: 2,
    ajax: {
        url:"{{route('artist select json') }}",
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
                        text : item.firstname + ' ' + item.lastname,
                        id: $.parseJSON(item.id),
                    }
                } )
            }
        }
    },
    templateSelection: function(artist) {
        return artist.text;
    },
    templateResult: function(artist) {
        return artist.text;
    }
});

$('#comediens').select2({
    minimumInputLength: 2,
    ajax: {
        url:"{{route('artist select json') }}",
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
                        text : item.firstname + ' ' + item.lastname,
                        id: $.parseJSON(item.id),
                    }
                } )
            }
        }
    },
    templateSelection: function(artist) {
        return artist.text;
    },
    templateResult: function(artist) {
        return artist.text;
    }
});
</script>

@endsection