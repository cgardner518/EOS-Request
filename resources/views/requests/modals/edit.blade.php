@extends('Labcoat::modals/standard')
@section('modal-title')
  New Request Submission
@stop
@section('modal-body')
<div style="display: flex; flex-direction: column; justify-content: center; align-items: center;">
  {!! Form::open(['url' => 'requests/'. $eos->id, 'files' => true]) !!}
@include('requests.partials.edit')
  {!! Form::close() !!}
</div>

@stop

@section('success-button-label')
  Submit Request
@stop

@section('modal-js')
  <script>
    modalAjaxSetup('{{ $modalId }}');
  </script>
@stop
