@extends('layouts.app')

@section('title', 'liste des spectacle')

@section('content')

<h1 > Liste des {{$resource}}  </h1>

<br/>
<br/>

    <h2> Trié les spectacle </h2>
    <input type="text" name="search_show" id="searchShow" class="form-control" />

    <table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="70%">
    <thead>
    <tr>
      <th class="th-sm">Nom du spectacle
      </th>
      <th class="th-sm">Status
      </th>
      <th class="th-sm">Representation
      </th>
      <th class="th-sm">Detail
      </th>
     
    </tr>
  </thead>
  <tboody>
  <tr>
  @foreach($shows as $show)
  
  <td>   {{$show->title}}</td>
      <td>
       @if($show->bookable)
        <span>{{$show->price}} </span>
        @else 
            <span> sold out </span>
       @endif</td>
      <td>
    @if($show->representation->count()==1)
    
    - <span> 1 representation </span>
    @elseif($show->representation->count()>1)
    - <span> {{$show->representation->count()}} Representation </span>
    @else
    - <em> aucune representation </em>
    @endif
</td>
      <td>
   
   @if($show->representation->count()>=1)
   <a href="{{route('show', ['id' => $show->id]) }} "> Voir le détaul </a>
         @endif
</td>
</tr>
@endforeach
  </tbody>
    </table>   


{{$shows->links()}}

@endsection

