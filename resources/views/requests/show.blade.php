@extends('Labcoat::layouts/standard')

@section('main-content')
<div class="links content">
  <a href="/">Home</a>
  <a href="/requests">Back</a>
</div>
  <div class="content">
     <h5>Name:</h5><p>{{$request->name}}</p>
     <h5>Description:</h5><p>{{$request->description}}</p>
     <h5>Dimensions (X,Y,Z):</h5><p>{{$request->dimX}}, {{$request->dimY}}, {{$request->dimZ}}</p>
     <h5>Volume:</h5><p>{{$request->volume}}</p>
     <h5>Cost:</h5><p>$ {{$request->cost}}</p>
     <h5>Should item be cleaned?:</h5>
     @if($request->clean)
      <p>YES</p>
    @else
      <p>NO</p>
    @endif
     <h5>Does item have hinges?:</h5>
     @if($request->hinges)
      <p>YES</p>
    @else
      <p>NO</p>
    @endif
     <h5>Does item have threads?:</h5>
     @if($request->threads)
      <p>YES</p>
    @else
      <p>NO</p>
    @endif
    <h5>Needed by:</h5><p>{{$request->needed_by}}</p>
    <h5>Number of parts:</h5><p>{{$request->number_of_parts}}</p>
    <h5>Status:</h5>
     @if($request->status === 0)
       <p>Pending</p>
     @endif
     @if($request->status === 1)
      <p>In Progress</p>
     @endif
     @if($request->status === 2)
      <p>Complete</p>
     @endif
     @if($request->status === 3)
      <p>Rejected</p>
     @endif
     <h5>Admin Notes:</h5><p>{{$request->admin_notes}}</p>

     <br><br><hr>
  </div>
@stop
