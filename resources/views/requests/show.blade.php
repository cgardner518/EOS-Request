@extends('Labcoat::layouts/standard')

@section('main-content')
{{-- <div class="links content">
  <a href="/">Home</a>
  <a href="/requests">Back</a>
</div> --}}
<div class="indent-padding width-limited-1200">
  <div class="showContainer">
    <div class="labels">
       <label>Name:</label>
       <label>Description:</label>
       <label>File:</label>
       <label>Dimensions (X,Y,Z):</label>
       <label>Cost:</label>
       <label>Volume:</label>
       <label>Should item be cleaned?:</label>
       <label>Does item have hinges?:</label>
       <label>Does item have threads?:</label>
       <label>Needed by:</label>
       <label>Number of parts:</label>
       <label>Status:</label>
       <label>Admin Notes:</label>
     </div>

     <div class="pees">
       <p>{{$eos->name}}</p>
       <p>{{$eos->description}}</p>
       <p>{{$eos->stl}}</p>
     <p>{{$eos->dimX}}, {{$eos->dimY}}, {{$eos->dimZ}}</p>
     <p>$ {{$eos->cost}}</p>
      <p>{{$eos->volume}}</p>
       @if($eos->clean)
        <p>YES</p>
      @else
        <p>NO</p>
      @endif
       @if($eos->hinges)
        <p>YES</p>
      @else
        <p>NO</p>
      @endif
       @if($eos->threads)
        <p>YES</p>
      @else
        <p>NO</p>
      @endif
      <p>{{$eos->needed_by}}</p>
      <p>{{$eos->number_of_parts}}</p>
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
       <p>{{$eos->admin_notes}}</p>
     </div>

       <br><br><hr>
    </div>
</div>
@stop
