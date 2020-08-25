@extends('layouts.app')

@section('title', 'liste des spectacle')

@section('content')

<h1> Liste des {{$resource}} </h1>

<br/>
<br/>

    <h2> Trié les spectacle </h2>
    <input >

  

<table id="show-listing" class="table" >
    <thead>
      <tr>
        <th>Titre</th>
        <th>Description</th>
        <th>Bookable</th>
        <th>Price</th>
      </tr>
    </thead>
  </table>



    




  <script>



feedingData();

function feedingData (){
    var dataTable = $('#show-listing').DataTable({
            "processing":true,
            "serverSide":true,

            ajax: {
                url: "{{ route('shows-json') }}",
            } ,
            columns : [
              
            {"data": "title"},
            {"data": "description"},
            {"data": "price"},
            {"data": "bookable"},
              {
                data: 'action', 
                name: 'action', 
                orderable: true, 
                searchable: true
            }
            ]
        });
};
       
       

    

</script>
@endsection
