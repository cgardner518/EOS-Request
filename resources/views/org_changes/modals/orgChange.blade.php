@extends('Labcoat::modals/standard')
@section('modal-title')
  Organizational Change
@stop
@section('modal-body')

<div class="indent-padding width-limited-1200">

  {!! Form::open([ 'url' => '/saveChange', 'class' => 'org_change_modal']) !!}

  {!! Form::label('type', 'Type:', ['class' => 'control-label', 'id' => 'typeLabel']) !!}
  {!! Form::select('type', array('0' => 'Unit Title', '1' => 'Code')) !!}

  <div class="form-row">
  {!! Form::label('from', 'From:', ['class' => 'control-label', 'id' => 'fromLabel']) !!}
  {!! Form::select('from', $orgs ) !!}
  </div>
  <div class="form-row">
    {!! Form::label('to', 'To:', ['class' => 'control-label', 'id' => 'toLabel']) !!}
    {!! Form::text('to', '', ['class' => 'form-control', 'id' => 'toField']) !!}
    <span class="badge red toFieldSpan">Required</span>
  </div>

  <input name="org_request" type="hidden" value="{{$id}}">

  {!! Form::close() !!}

</div>
<script type="text/javascript">
var $orgs = [
  @foreach ($orgs as $org)
  '{{$org}}',
  @endforeach
];

var $codes = [
  @foreach ($codes as $code)
  '{{$code}}',
  @endforeach
];

$('#type').on('change', function(){
  if($(this).val() == 0){
    $.each($('#from option'),function(k,v){
      v.text = $orgs[k];
      console.log($orgs);
    })
  }else{
    $.each($('#from option'),function(k,v){
      v.text = $codes[k];
      console.log($codes);
    })
  }

})

$('#toField').keyup(function(){

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
