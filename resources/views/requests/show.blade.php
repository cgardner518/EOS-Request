@extends('Labcoat::layouts/standard')

@section('main-content')
{{-- <div class="links content">
  <a href="/">Home</a>
  <a href="/requests">Back</a>
</div> --}}
<div class="content">
     <h5>Name:</h5><p>{{$eos->name}}</p>
     <h5>Description:</h5><p>{{$eos->description}}</p>
     <h5>Dimensions (X,Y,Z):</h5><p>{{$eos->dimX}}, {{$eos->dimY}}, {{$eos->dimZ}}</p>
     <h5>Volume:</h5><p>{{$eos->volume}}</p>
     <h5>Cost:</h5><p>$ {{$eos->cost}}</p>
     <h5>Should item be cleaned?:</h5>
     @if($eos->clean)
      <p>YES</p>
    @else
      <p>NO</p>
    @endif
     <h5>Does item have hinges?:</h5>
     @if($eos->hinges)
      <p>YES</p>
    @else
      <p>NO</p>
    @endif
     <h5>Does item have threads?:</h5>
     @if($eos->threads)
      <p>YES</p>
    @else
      <p>NO</p>
    @endif
    <h5>Needed by:</h5><p>{{$eos->needed_by}}</p>
    <h5>Number of parts:</h5><p>{{$eos->number_of_parts}}</p>
    <h5>Status:</h5>
     @if($eos->status === 0)
       <p>Pending</p>
     @endif
     @if($eos->status === 1)
      <p>In Progress</p>
     @endif
     @if($eos->status === 2)
      <p>Complete</p>
     @endif
     @if($eos->status === 3)
      <p>Rejected</p>
     @endif
     <h5>Admin Notes:</h5><p>{{$eos->admin_notes}}</p>

     <br><br><hr>
  </div>

@stop
