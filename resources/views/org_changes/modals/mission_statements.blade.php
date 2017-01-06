@extends('Labcoat::modals/standard')
@section('modal-title')
  Create/Update Mission Statements

@stop

@section('modal-body')
  {!! Form::open([ 'url' => '/saveMission', 'class' => 'mission_statement_modal']) !!}
  {!! Form::label('for', 'For: ', ['class' => 'control-label']) !!}
  {!! Form::select('for', $organizations, ['class' => 'form-control'] ) !!}

<div class="form-row badged">
  {!! Form::label('proposed', 'Proposed Mission Statement:', ['class' => 'control-label']) !!}
  <span class="badge red">Required</span>
  {!! Form::textarea('proposed', '', ['class' => 'form-control']) !!}
</div>
<input type="hidden" name="org_request" value="{{$id}}">
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
