@extends('layouts.app')

@section('title', 'liste des lieux des spectacle')

@section('content')

<h1> Liste des {{$resource}} </h1>





<table id="location-listing" class="table" >
    <thead>
      <tr>
        <th>Designation</th>
        <th>address</th>
        <th>website</th>
        <th>phone</th>
    
      </tr>
    </thead>
  </table>


  <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>




<script>
feedingData();

function feedingData (){
    var dataTable = $('#location-listing').DataTable({
            "processing":true,
            "serverSide":true,

            ajax: {
                url: "{{ route('location get json') }}",
            } ,
            columns : [
            {"data": "designation"},
            {"data": "address"},
            {"data": "website"},
            {"data": "phone"}
            ]
        });
};
       
</script>
@endsection