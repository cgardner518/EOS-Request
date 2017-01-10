@extends('Labcoat::layouts/standard')
@section('page-title')

    <a href="/org_changes" style="color:white">Organizational Change Request</a>
/ @if($org->title)
    {{$org->title}}
  @else
    Untitled
  @endif
@endsection
@section('tab-menu')
  @include('Labcoat::partials/tabs')
@endsection
@section('main-content')
  <div class="indent-padding width-limited-1200">
    <h3>Overview and Rationale</h3>
    <p>Laboris eu eiusmod magna laborum nostrud anim excepteur labore exercitation aute.Cupidatat laborum amet in aute reprehenderit veniam culpa do ea et minim pariatur consectetur deserunt.Irure ullamco aliquip nostrud elit aute nulla in ullamco esse dolore sunt.</p>
  {!! Form::open(['url'=>'org_changes/'.$id, 'id'=>'myForm', 'method'=>'PATCH', 'files'=>true]) !!}
  <div class="form-group form-row badged nameField">
    {!! Form::label('title', 'Title:', ['class' => 'control-label']) !!}
    <div class="inputWrapper">
      {!! Form::text('title', $org->title, ['class' => 'form-control', 'placeholder'=>'A concise descriptive title']) !!}
    </div>
      <span class="badge red">Required</span>
  </div><br>
  <div class="form-group form-row badged nameField descField">
    <span class="badge red" id="description-badge">Required</span>

    {!! Form::textarea('description', $org->description, ['class' => 'form-control','id' => 'descript', 'placeholder' => 'Enter overview/rationale for proposed reorganization']) !!}
  {{-- </div> --}}
</div><br>
<div class="orgChartInfo">
<h3>Organizational Charts</h3>
<p>Culpa cillum ex dolor occaecat amet magna consequat aute Lorem duis ad ipsum ipsum cupidatat consectetur.Reprehenderit anim aliquip dolore fugiat sint duis aliquip anim est sint consequat laboris deserunt sunt.</p>
<div class="text-center">
  <i class="fa fa-file-o"></i> <a href="#"> Org. Chart Template</a>
</div>
</div>


<div class="fileRow">
  <div class="current">
    <h5>Current Organizational Chart</h5>

          <div class="discoveryZone">
            <div class="dzInner">
              <p class="dzText"><em>Choose your files</em> or drag them here.</p>
              <span class="badge red">Required</span>
            </div>
          </div>

        <h4>{{$org->current_orgChart}} &nbsp; <a data-toggle="tooltip" href="javascript:undefined;" data-delete-url="" title="Remove/Add New File" class="fa fa-fw fa-trash" id="changeDZ1" style="text-decoration:none; "></a></h4>

  </div>

    <div class="proposed">
      <h5 id="annoyance">Proposed Organizational Chart</h5>
        {{-- @if(!$org->new_orgChart) --}}
          <div class="discoveryZone2">
            <div class="dzInner2">
              <p class="dzText2"><em>Choose your files</em> or drag them here.</p>
              <span class="badge red">Required</span>
            </div>
          </div>

          <h4>{{$org->new_orgChart}} &nbsp; <a data-toggle="tooltip" href="javascript:undefined;" data-delete-url="" title="Remove/Add New File" class="fa fa-trash" id="changeDZ2" style="text-decoration:none;"></a></h4>

    </div>
  </div>
  <br><br>

  <button id="submit" class="btn btn-success btn-gradient ">Save &nbsp; <i class="fa fa-arrow-right"></i></button>
  {!! Form::close() !!}
  <input type="hidden" id='id' value='{{$id}}'>
</div>


   <script>
   $('.dzText').click(function(){
     console.log('YOu clicked me');
   })
   if ($('.current h4').text() == "   ") {
     console.log($('.current h4').text());
     $('.current h4').hide()
     $('.discoveryZone').show()
   }else {
     $('.discoveryZone').hide()
   }

   if ($('.proposed h4').text() == "   ") {
     console.log($('.proposed h4').text());
     $('.proposed h4').hide()
     $('.discoveryZone2').show()
   }else {
     $('.discoveryZone2').hide()
   }

  $('#changeDZ1').click(function(){
    $('.current h4').hide()
    $('.discoveryZone').show()

  })

  $('#changeDZ2').click(function(){
    $('.proposed h4').hide()
    $('.discoveryZone2').show()

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

   var dZone2 = $('div.dzInner2').dropzone({
     url: "/org_changes",
     paramName: 'new_orgChart',
     autoProcessQueue: false,
     maxFiles: 1,
     clickable: ['div.dzInner2', '.dzText2'],
     maxfilesreached: function(file){
       $this2 = this;
       $file2 = file;
       droppedFiles.$file2 = $file2;
        $('.dz-error-mark').css({
          'position': 'absolute',
          'top': $('.dzInner2').height()/6,
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
        $('.dzInner2>p').hide()
        $('.dzInner2>span').fadeOut(400)

        $('.dzInner2').mouseenter(function(){
          $('.dzInner2 .dz-error-mark').show('slide', {direction: 'up'}, 400)
        })
        $('.dzInner2').mouseleave(function(){
            $('.dzInner2 .dz-error-mark').hide('slide', {direction: 'down'}, 400)
        })
        $('.dzInner2 .dz-error-mark').click(function(evt){
          $this2.removeFile($file2[0]);
          $('.dzInner2>span').fadeIn(400)
          $('.dzInner2>p').show();
        })
     },
     maxfilesexceeded: function(file){
       this.removeFile(file)
     },
   });



    $('#submit').click(function(e){
      e.preventDefault()
      $id = $('#id').val()


      $url = $('#myForm').attr('action');
      $token = $('input[name=_token]').attr('value');
      $descript = $('#descript').val();
      $title = $('#title').val();
      $data = new FormData();


      $data.append('_token', $token)
      $data.append('_method', 'PATCH')
      if(!!droppedFiles.$file2){
        $fyle2 = droppedFiles.$file2[0];
        $data.append('new_orgChart', $fyle2)
      }
      if(!!droppedFiles.$file){
        $fyle = droppedFiles.$file[0];
        $data.append('current_orgChart', $fyle)
      }
      $data.append('description', $descript)
      $data.append('title', $title)


      $.ajax({
        url: $url,
        method: 'POST',
        data: $data,
        contentType: false,
        processData: false
      }).then(function(response){
        window.location.replace('http://chris.zurka.com/org_changes/secondTab/'+$id+'/edit')
      })
    })
   </script>

@stop
