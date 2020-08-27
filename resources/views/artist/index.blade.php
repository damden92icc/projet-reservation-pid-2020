@extends('layouts.app')

@section('title', 'liste des artistes')

@section('content')

<h1> Liste des {{$resource}} </h1>



<table id="artist-listing" class="table" >
    <thead>
      <tr>
        <th>Firstname</th>
        <th>Lastname</th>
      </tr>
    </thead>
  </table>


  <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>




<script>
feedingData();

function feedingData (){
    var dataTable = $('#artist-listing').DataTable({
            "processing":true,
            "serverSide":true,

            ajax: {
                url: "{{ route('artist get json') }}",
            } ,
            columns : [
            {"data": "firstname"},
            {"data": "lastname"},
            ]
        });
};
       
</script>
@endsection