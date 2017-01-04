@extends('Labcoat::modals/standard')
@section('modal-title')
  Create/Update Mission Statements
  <p class="changeMe">Aliquip consectetur eiusmod deserunt irure non quis qui consectetur occaecat ipsum culpa magna.In consequat excepteur Lorem ex ipsum ea eiusmod duis.</p>
@stop

@section('modal-body')
  {!! Form::open() !!}
  {!! Form::label('for', 'For: ', ['class' => 'control-label']) !!}
  {!! Form::select('for', ) !!}
  {!! Form::close() !!}
@stop

@section('success-button-label')
  Save
@stop

@section('modal-js')
  <script>
    modalAjaxSetup('{{ $modalId }}');
    // modalAjaxSetup({ modalId: '{{ $modalId }}' , success: console.log});
  </script>
@stop
