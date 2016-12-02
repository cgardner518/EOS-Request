@extends('Labcoat::layouts/standard')

@section('page-title')
  <a href="/requests" style="color:white">EOS Requests</a> / {{ $eos->name }}
@endsection

@section('main-content')

  <div style="display: flex; flex-direction: column; justify-content: center; align-items: center;">
    {!! Form::open(['url' => 'requests/'. $eos->id , 'method' => 'PATCH', 'files' => true]) !!}

  <div class="form-row">
    {!! Form::label('name', 'Name') !!}
    {!! Form::text('name', $eos->name, ['class' => 'form-control']) !!}
  </div><br>

  <div class="form-row">
    {!! Form::label('project_id', 'Project') !!}
    {!! Form::select('project_id', $projects, $eos->project_id, ['class' => 'form-control']) !!}
  </div><br>

    <div class="form-row">
      {!! Form::label('description', 'Description') !!}
      {!! Form::textarea('description', $eos->description, ['class' => 'form-control']) !!}
    </div><br>

    <div class="form-row form-group">
      {!! Form::label('dimX', 'Dimensions-X') !!}
      {!! Form::text('dimX', $eos->dimX) !!}

      {!! Form::label('dimY', 'Dimensions-Y') !!}
      {!! Form::text('dimY', $eos->dimY) !!}

      {!! Form::label('dimZ', 'Dimensions-Z') !!}
      {!! Form::text('dimZ', $eos->dimZ) !!}
    </div><br>


    <div class="form-group">
      <div class="col-md-4">
          {!! Form::label('clean', 'Should Item Be Clean?') !!}
          {!! Form::checkbox('clean', 1 ,$eos->clean) !!}
        </div>
        <div class="col-md-4">
          {!! Form::label('hinges', 'Item Has Hinges?') !!}
          {!! Form::checkbox('hinges', 1 ,$eos->hinges) !!}
        </div>
        <div class="col-md-4">
          {!! Form::label('threads', 'Item Has Threads') !!}
          {!! Form::checkbox('threads', 1 ,$eos->threads)!!}
        </div>
    </div><br>

    <div class="form-row">
      {!! Form::label('needed_by', 'Date Needed By') !!}
      {!! Form::date('needed_by', $eos->needed_by, ['class' => 'form-control']) !!}
    </div><br>

    <div class="form-row">
      {!! Form::label('stl', 'File') !!}
      {{$eos->stl}}
    </div><br>
@can('eosAdmin')
  <div class="form-row">
    {!! Form::label('cost', 'Cost') !!}
    {!! Form::text('cost', $eos->cost, ['class' => 'form-control']) !!}
  </div><br>
  {!! Form::label('status', 'Status', ['class' => 'form-row']) !!}  <span class="badge red">Required</span>
    <div class="form-row">
      <div class="col-md-4">
        {!! Form::label('status', 'Pending') !!}
        {!! Form::radio( 'status', 'pending' ) !!}
      </div>

      <div class="col-md-4">
        {!! Form::label('status', 'In Process') !!}
        {!! Form::radio( 'status', 'in-process' ) !!}
      </div>

      <div class="col-md-4">
        {!! Form::label('status', 'Completed') !!}
        {!! Form::radio( 'status', 'complete' ) !!}
      </div>
    </div>
    <br>
@endcan
    <div class="form-row">
      {!! Form::label('number_of_parts', 'Number of Parts') !!}
      {!! Form::text('number_of_parts', $eos->number_of_parts, ['class' => 'form-control'])!!}
    </div><br>

    <div class="form-row">
      {!! Form::label('admin_notes', 'Admin Notes') !!}
      {!! Form::textarea('admin_notes', $eos->admin_notes, ['class' => 'form-control']) !!}
    </div><br>

    <input class="pull-right btn btn-success btn-gradient" type="submit">

    {!! Form::close() !!}
@stop
