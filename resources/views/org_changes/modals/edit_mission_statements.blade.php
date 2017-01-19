@extends('Labcoat::modals/standard')
@section('modal-title')
  Create/Update Mission Statements

@stop

@section('modal-body')
  {!! Form::open([ 'url' => '/updateMission', 'method' => 'PATCH', 'class' => 'mission_statement_modal']) !!}
  {!! Form::label('for', 'For: ', ['class' => 'control-label']) !!}
  {!! Form::select('for', $organizations, array_search($organizations[$mission->code], $organizations)) !!}

<div class="form-row badged">
  {!! Form::label('proposed', 'Proposed Mission Statement:', ['class' => 'control-label']) !!}
  <span class="badge red">Required</span>
  {!! Form::textarea('proposed', $mission->statement, ['class' => 'form-control']) !!}
</div>
<input type="hidden" name="org_request" value="{{$org_request}}">
<input type="hidden" name="id" value="{{$id}}">
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
