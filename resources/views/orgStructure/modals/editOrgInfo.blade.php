@extends('Labcoat::modals/standard')
@section('modal-title')
Update Organization Info
@php
  ;
@endphp
@stop

{{
  Form::macro('dateField', function(){
    return '<span class="inline-left">
                <div class="input-group narrow left">
                  <input class="form-control" name="date" type="text" id="date-input">
                  <span class="input-group-addon clickable">
                    <i class="fa fa-calendar" data-calid="date-input"></i>
                  </span>
                </div>
            </span>';
  })
}}
@section('modal-body')
  <div class="indent-padding width-limited-1200">
  {!! Form::open([ 'url' => '/changeOrgInfo', 'class' => 'orgInfoModal']) !!}

  <div class="container">
    <div class="row chris">
      <div class="col-md-1">
        {!! Form::label('name', 'Name:', ['class' => 'pull-right']) !!}
      </div>
      <div class="col-md-6">
        {!! Form::text('name', $value[0]['name'], ['class' => 'form-control pull-left']) !!}
      </div>
    </div>
    <div class="row chris">
      <div class="col-md-1">
        {!! Form::label('type', 'Type:', ['class' => 'pull-right']) !!}
      </div>
      <div class="col-md-6">
        {!! Form::select('type', ['Directorate'=>'Directorate', 'Division'=>'Division', 'Branch'=>'Branch', 'Section'=>'Section'], $value[0]['type'], ['class' => 'pull-left form-control']) !!}
      </div>
    </div>
    <div class="row chris">
      <div class="col-md-1">
        {!! Form::label('code', 'Code:', ['class' => 'pull-right']) !!}
      </div>
      <div class="col-md-6">
        {!! Form::text('code', $value[0]['code'], ['class' => ' form-control pull-left']) !!}
      </div>
    </div>
    <div class="row chris">
      <div class="col-md-1">
        {!! Form::label('level', 'Level:', ['class' => 'pull-right']) !!}
      </div>
      <div class="col-md-6">
        {!! Form::select('level', ['Directorate'=>'Directorate', 'Division'=>'Division', 'Branch'=>'Branch', 'Section'=>'Section'], $value[0]['type'], ['class' => ' form-control pull-left']) !!}
      </div>
    </div>
      <div id="orgModalPicker" class="dayPicker">
        <div class="col-md-2">
          {!! Form::label('effective', 'Effective:', ['class' => 'pull-left']) !!}
        </div>
        <div class="col-md-6 pickerInput">
          {!! Form::dateField() !!}
        </div>
      </div>

  </div>

    <br>
    <div class="form-row ">
      <div class="discoveryZone" style="width: 37.5em;height:105px;">
        <div class="dzInner" style="width: 37em;">
          <p class="dzText"><em>Choose your files</em> or drag them here.</p>
          <span class="badge red">Required</span>
        </div>
      </div>
    </div>

    <div class="form-row">
      <div class="col-md-2">
        {!! Form::label('comments', 'Comments:', ['class' => 'pull-right']) !!}
      </div>
        {!! Form::textarea('comment','', ['class' => 'form-control']) !!}
    </div>

  {!! Form::close() !!}
  </div>
  <script>
      // Date Picker
      $("#date-input").datepicker({ dateFormat: 'yy-mm-dd' });
      $('form i.fa-calendar').on('click', function(){
        var target = this;
        var calID = '#' + $(target).data('calid');
        $(calID).focus();
      });

      $('.dzText').click(function(){
        console.log('You clicked me');
      })


     $('#changeDZ1').click(function(){
       $('.current h4').hide()
       $('.discoveryZone').show()

     })

      var droppedFiles = {};

      var dZone = $('div.dzInner').dropzone({
        url: "/org_changes",
        paramName: 'current_orgChart',
        autoProcessQueue: false,
        maxFiles: 1,
        clickable: ['div.dzInner', '.dzText'],
        maxfilesreached: function(file){
          $this = this;
          $file = file;
          droppedFiles.$file = $file;
           $('.dz-error-mark').css({
             'position': 'absolute',
             'top': $('.dzInner2').height()/4,
             'left': '13em',
           })
           $('.dz-error-mark svg').css({
             'background': 'rgba(250, 45, 45, .5)',
             'border-radius': '50%'
           })
           $('.dz-details').css({
             'margin-top': '74px',
             'margin-bottom': -70 + 'px'
           })
           $('.dz-filename').css('display', 'inline-block')

           $('.dz-error-mark').hide()
           $('.dz-success-mark').hide()
           $('.dzInner>p').hide()
           $('.dzInner>span').fadeOut(400)

           $('.dzInner').mouseenter(function(){
             $('.dzInner .dz-error-mark').show('slide', {direction: 'up'}, 400)
           })
           $('.dzInner').mouseleave(function(){
               $('.dzInner .dz-error-mark').hide('slide', {direction: 'down'}, 400)
           })

           $('.dzInner .dz-error-mark').click(function(evt){
             $this.removeFile($file[0]);
             $('.dzInner>span').fadeIn(400)
             $('.dzInner>p').show();
           })
        },
        maxfilesexceeded: function(file){
          this.removeFile(file)
        },
       });
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
