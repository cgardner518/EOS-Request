@extends('Labcoat::modals/standard')
@section('modal-title')
  Organizational Change
@stop
@section('modal-body')

<div class="indent-padding width-limited-1200">

  {!! Form::open([ 'url' => '/updateChange', 'method' => 'PATCH', 'class' => 'org_change_modal']) !!}


    <div class="form-row">
      {!! Form::label('from_title', 'From Title:', ['class' => 'control-label align-me left']) !!}
      <span class="inline-left">
      {!! Form::select('from_title', $orgs, array_search($unitChange->from_title, $orgs) ) !!}
      </span>
    </div>
    <div class="form-row">
      {!! Form::label('to_title', 'To Title:', ['class' => 'control-label align-me left']) !!}
      <span class="inline-left">
      {!! Form::text('to_title', $unitChange->to_title, ['class' => 'form-control'] ) !!}
      </span>
    </div>
    <div class="form-row">
      {!! Form::label('from_code', 'From Code:', ['class' => 'control-label align-me left']) !!}
      <span class="inline-left">
      {!! Form::select('from_code', $codes, array_search($unitChange->from_code, $codes) ) !!}
      </span>
    </div>
    <div class="form-row">
      {!! Form::label('to_code', 'To Code:', ['class' => 'control-label align-me left']) !!}
      <span class="inline-left">
      {!! Form::text('to_code', $unitChange->to_code, ['class' => 'form-control', 'id' => 'toField']) !!}{{-- css: margin-left->3em? --}}
      </span>
    </div>

  <input name="org_request" type="hidden" value="{{$id}}">
  <input name="id" type="hidden" value="{{$unitChange->id}}">

  {!! Form::close() !!}

</div>

<script type="text/javascript">

$('#from_title').on('change', function(){

  $('#from_code').val($('#from_title').val())

})
$('#from_code').on('change', function(){

  $('#from_title').val($('#from_code').val())

})

$('#toField').on('keyup change',function(){

  if ($(this).val().length > 0) {
    $('.toFieldSpan').fadeOut(400)
  }else{
    $('.toFieldSpan').fadeIn(400)
  }

})
</script>
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
