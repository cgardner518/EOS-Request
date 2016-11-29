@extends('Labcoat::modals/standard')
@section('modal-title')
  New Request Submission
@stop
@section('modal-body')
<div style="display: flex; flex-direction: column; justify-content: center; align-items: center;">
  {!! Form::open(['url' => 'requests', 'files' => true]) !!}
<div class="form-row">
  {!! Form::label('name', 'Name') !!}
  {!! Form::text('name') !!}
</div><br>

  <div class="form-row">
    {!! Form::label('description', 'Description') !!}
    {!! Form::textarea('description') !!}
  </div><br>

  <div class="form-row">
    {!! Form::label('dimX', 'Dimensions-X') !!}
    {!! Form::text('dimX') !!}
  </div><br>

  <div class="form-row">
    {!! Form::label('dimY', 'Dimensions-Y') !!}
    {!! Form::text('dimY') !!}
  </div><br>

  <div class="form-row">
    {!! Form::label('dimZ', 'Dimensions-Z') !!}
    {!! Form::text('dimZ') !!}
  </div><br>

  <div class="form-row">
    {!! Form::label('cost', 'Cost') !!}
    {!! Form::text('cost') !!}
  </div><br>

  <div class="form-row">
    {!! Form::label('clean', 'Should Item Be Clean?') !!}
    {!! Form::checkbox('clean') !!}
  </div><br>

  <div class="form-row">
    {!! Form::label('hinges', 'Item Has Hinges?') !!}
    {!! Form::checkbox('hinges') !!}
  </div><br>

  <div class="form-row">
    {!! Form::label('threads', 'Item Has Threads') !!}
    {!! Form::checkbox('threads')!!}
  </div><br>

  <div class="form-row">
    {!! Form::label('needed_by', 'Date Needed By') !!}
    {!! Form::text('needed_by') !!}
  </div><br>

  <div class="form-row">
    {!! Form::label('stl', 'STL File Upload') !!}
    {!! Form::file('stl') !!}
  </div><br>

  <div class="form-row">
    {!! Form::label('status', 'Status', ['disabled']) !!}
    {!! Form::text('status') !!}
  </div><br>

  <div class="form-row">
    {!! Form::label('number_of_parts', 'Number of Parts') !!}
    {!! Form::text('number_of_parts')!!}
  </div><br>

  <div class="form-row">
    {!! Form::label('admin_notes', 'Admin Notes') !!}
    {!! Form::textarea('admin_notes') !!}
  </div><br>

  {!! Form::close() !!}
</div>

@stop

@section('success-button-label')
  Submit Request
@stop

@section('modal-js')
  <script>
    // modalAjaxSetup('{{ $modalId }}');
    modalAjaxSetup({ modalId: '{{ $modalId }}' , success: console.log}); //for troubleshooting, prevents page reload

  </script>
@stop
