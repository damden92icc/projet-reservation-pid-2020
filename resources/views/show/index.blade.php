@extends('layouts.app')

@section('title', 'liste des spectacle')

@section('content')

<h1> Liste des {{$resource}} </h1>

<br/>
<br/>

    <h2> Trié les spectacle </h2>
  

<table id="show-listing" class="table" >
    <thead>
      <tr>
        <th>Titre</th>
        <th>Description</th>
        <th>Bookable</th>
        <th>Price</th>
        <th></th>
    
      </tr>
    </thead>
  </table>



    

  <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>



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
            ]
        });
};
       
       

    

</script>
@endsection
