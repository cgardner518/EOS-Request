@extends('Labcoat::modals/standard')
@section('modal-title')
Update Assignment Info
@php
  ;
@endphp
@stop

{{
  Form::macro('dateField', function($dateVal){
    return '<span class="inline-left">
                <div class="input-group narrow left">
                  <input class="form-control" name="date" value="'.$dateVal.'" type="text" id="date-input">
                  <span class="input-group-addon clickable">
                    <i class="fa fa-calendar" data-calid="date-input"></i>
                  </span>
                </div>
            </span>';
  })
}}
@section('modal-body')


  <div class="indent-padding width-limited-1200">
  {!! Form::open([ 'url' => '/changeRoleInfo', 'class' => 'orgInfoModal']) !!}

  <div class="container">
    <div class="row chris">
      <div class="col-md-1">
        {!! Form::label('assigned', 'Assigned:', ['class' => 'pull-right']) !!}
      </div>
      <div class="col-md-6">
        {!! Form::text('assigned', $assigned['name'], ['class' => 'form-control pull-left']) !!}
      </div>
    </div>
    <div class="row chris">
      <div class="col-md-1">
        {!! Form::label('type', 'Type:', ['class' => 'pull-right']) !!}
      </div>
      <div class="col-md-6">
        {!! Form::select('type', ['Current'=>'Current', 'Acting'=>'Acting'], $assigned['type'], ['class' => 'pull-left form-control']) !!}
      </div>
    </div>
    {{-- <div class="row chris">
      <div class="col-md-1">
        {!! Form::label('code', 'Code:', ['class' => 'pull-right']) !!}
      </div>
      <div class="col-md-6">
        {!! Form::text('code', $role['code'], ['class' => ' form-control pull-left']) !!}
      </div>
    </div> --}}
    {{-- <div class="row chris">
      <div class="col-md-1">
        {!! Form::label('level', 'Level:', ['class' => 'pull-right']) !!}
      </div>
      <div class="col-md-6">
        {!! Form::select('level', ['Directorate'=>'Directorate', 'Division'=>'Division', 'Branch'=>'Branch', 'Section'=>'Section'], $role['level'], ['class' => ' form-control pull-left']) !!}
      </div>
    </div> --}}
      <div id="orgModalPicker" class="dayPicker">
        <div class="col-md-2">
          {!! Form::label('effective', 'Effective:', ['class' => 'pull-left']) !!}
        </div>
        <div class="col-md-6 pickerInput">
          {!! Form::dateField($assigned['effective']) !!}
        </div>
      </div>

  </div>

    <br>
    <div class="form-row ">
      <div class="discoveryZone" style="width: 37.5em;height:105px;">
        <div class="dzInner{{studly_case($role['name'])}} dzoneModal" style="width: 37em;">
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

     $('#changeDZ1').click(function(){
       $('.discoveryZone').show()
     })

     if ($('.dzInner{{studly_case($role['name'])}}.dz-clickable')[0]) {

      //  don't do anything

     } else {

       var droppedFiles = {};
       var dZone = {};

       dZone[ $('#name').val()] = $('div.dzInner{{studly_case($role['name'])}}').dropzone({
         url: "/org_changes",
         paramName: 'current_orgChart',
         autoProcessQueue: false,
         maxFiles: 1,
         clickable: ['div.dzInner{{studly_case($role['name'])}}', '.dzText'],
         maxfilesreached: function(file){
           $this = this;
           $file = file;
           droppedFiles.$file = $file;
           $('.dz-error-mark').css({
             'position': 'absolute',
             'top': $('.dzInner{{studly_case($role['name'])}}').height()/6,
             'left': '16em',
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
           $('.dzInner{{studly_case($role['name'])}}>p').hide()
           $('.dzInner{{studly_case($role['name'])}}>span').fadeOut(400)

           $('.dzInner{{studly_case($role['name'])}}').mouseenter(function(){
             $('.dzInner{{studly_case($role['name'])}} .dz-error-mark').show('slide', {direction: 'up'}, 400)
           })
           $('.dzInner{{studly_case($role['name'])}}').mouseleave(function(){
             $('.dzInner{{studly_case($role['name'])}} .dz-error-mark').hide('slide', {direction: 'down'}, 400)
           })

           $('.dzoneModal .dz-error-mark').click(function(evt){
             $this.removeFile($file[0]);
             $('.dzInner{{studly_case($role['name'])}}>span').fadeIn(400)
             $('.dzInner{{studly_case($role['name'])}}>p').show();
           })
         },
         maxfilesexceeded: function(file){
           this.removeFile(file)
         },
       });
     }
  </script>
@stop

@section('success-button-label')
  Save
@stop

@section('modal-js')
  <script>
  modalAjaxSetup('{{ $modalId }}');
  // Date Picker
  console.log($('#{{ $modalId }} form i.fa-calendar').length);
    $("#date-input").datepicker({ dateFormat: 'yy-mm-dd' });
    $('#{{ $modalId }} form i.fa-calendar').on('click', function(){
      // console.log('Clicked!');
      var target = this;
      var calID = '#' + $(target).data('calid');
      $(calID).focus();
      $('#ui-datepicker-div').css('z-index', 40000);
    });


    // modalAjaxSetup({ modalId: '{{ $modalId }}' , success: console.log});
  </script>
@stop
