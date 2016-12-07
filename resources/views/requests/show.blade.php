@extends('Labcoat::layouts/standard')

@section('main-content')
{{-- <div class="links content">
  <a href="/">Home</a>
  <a href="/requests">Back</a>
</div> --}}
<div class="indent-padding width-limited-1200">
  <div class="showContainer">
    <div class="rows">
       <label>Name:</label><p>{{$eos->name}}</p>
     </div>
     <div class="rows">
       <label>Description:</label><p>{{$eos->description}}</p>
     </div>
     <div class="rows">
       <label>File:</label><p>{{$eos->stl}}</p>
     </div>
    <div class="rows">
     <label>Dimensions (X,Y,Z):</label><p>{{$eos->dimX}}, {{$eos->dimY}}, {{$eos->dimZ}}</p>
    </div>
    <div class="rows">
     <label>Cost:</label><p>$ {{$eos->cost}}</p>
   </div>
    <div class="rows">
      <label>Volume:</label><p>{{$eos->volume}}</p>
    </div>
   <div class="rows">
       <label>Should item be cleaned?:</label>
       @if($eos->clean)
        <p>YES</p>
      @else
        <p>NO</p>
      @endif
      </div>
      <div class="rows">
       <label>Does item have hinges?:</label>
       @if($eos->hinges)
        <p>YES</p>
      @else
        <p>NO</p>
      @endif
      </div>
      <div class="rows">
       <label>Does item have threads?:</label>
       @if($eos->threads)
        <p>YES</p>
      @else
        <p>NO</p>
      @endif
    </div>
    <div class="rows">
      <label>Needed by:</label><p>{{$eos->needed_by}}</p>
    </div>
    <div class="rows">
      <label>Number of parts:</label><p>{{$eos->number_of_parts}}</p>
    </div>
    <div class="rows">
      <label>Status:</label>
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
     </div>
     <div class="rows">
       <label>Admin Notes:</label><p>{{$eos->admin_notes}}</p>
     </div>

       <br><br><hr>
    </div>
</div>
@stop
