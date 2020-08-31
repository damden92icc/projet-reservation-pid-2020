@extends('layouts.app')

@section('title', 'liste des spectacle')

@section('content')


<h1> Liste des {{$resource}} </h1>

<br/>
<br/>

    <h2> Trié les spectacle </h2>
  
<div class="card">
<div class="card-body">

<table id="show-listing" class="table" >
    <thead>
      <tr>
        <th>Titre</th>
        <th>Description</th>
        <th>Price</th>
        <th>Bookable</th>
       <th>  </th>
    
      </tr>
    </thead>
  </table>



</div>
</div>


<a href="{{ route('Export show xls') }}"> export </a>







<form action="{{ route('Import show xls') }}" method="POST" enctype="multipart/form-data">

@csrf
        <input type="file" name="file" class="form-control">
        <button type="submit" class="btn btn-success">Upload</button>
</form>








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
                url: "{{ route('show get json') }}",
            } ,
            columns : [
            {"data": "title"},
            {"data": "description"},
            {"data": "price"},
            {"data": "bookable"},
            {"render":function(data, type, row, meta){
              var link = '{{ route('shows') }}/' + row.id;
              return "<a href='"+link+"'> info </a> "; 
            }},
            
            ]
        });
};
       
       

    

</script>
@endsection
