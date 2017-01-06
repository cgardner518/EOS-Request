@extends('Labcoat::modals/standard')
@section('modal-title')
  Create/Update Mission Statements

@stop

@section('modal-body')
  {!! Form::open([ 'url' => '/savePersonnel', 'class' => 'personnel_modal']) !!}

    {!! Form::label('user', 'User:') !!}
    {!! Form::select('user', $users) !!}

    <input type="text" name="" value="">
  {!! Form::close() !!}
@stop

@section('success-button-label')
  Save
@stop

@section('modal-js')
  <script>
    // modalAjaxSetup('{{ $modalId }}');
    modalAjaxSetup({ modalId: '{{ $modalId }}' , success: console.log});
  </script>
@stop
