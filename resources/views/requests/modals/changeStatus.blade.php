@extends('Labcoat::modals/standard')
@section('modal-title')
  Change Status
@stop
@section('modal-body')
<div style="display: flex; flex-direction: column; justify-content: center; align-items: center;">

  {!! Form::open(['url' => 'change/' . $id]) !!}

  {!! Form::radio('status') !!}
  {!! Form::label('status', 'Pending') !!}
<br>
  {!! Form::radio('status') !!}
  {!! Form::label('status', 'In Process') !!}
<br>
  {!! Form::radio('status') !!}
  {!! Form::label('status', 'Complete') !!}
<br>
  {!! Form::radio('status') !!}
  {!! Form::label('status', 'Rejected') !!}

  {!! Form::close() !!}
</div>

@stop

@section('success-button-label')
  Change
@stop

@section('modal-js')
  <script>
    modalAjaxSetup('{{ $modalId }}');
  </script>
@stop
