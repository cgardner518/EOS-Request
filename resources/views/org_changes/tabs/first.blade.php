@extends('Labcoat::layouts/standard')
@section('page-title')

    Organizational Change Request
/ New Request
@endsection
@section('tab-menu')
  @include('Labcoat::partials/stepped-tabs')
@endsection
@section('main-content')
  <div class="indent-padding width-limited-1200">
    <h3>Overview and Rationale</h3>
    <p>You base football-player! You crooked-nose knave! You puterell, you skalemar. You hedge-born levereter, you bedswerver fopdoodle! Ye olde mucksprout and mumblecrust. You rakefile skobberlotcher. Thou subtle, perjur’d, false, disloyal man! Thou art like a toad; ugly and venomous.</p>
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
  {{-- {!! Form::label('description', 'Description:', ['class' => 'control-label']) !!} --}}
  {{-- <div class="inputWrapper"> --}}
    {!! Form::textarea('description', $org->description, ['class' => 'form-control','id' => 'descript', 'placeholder' => 'Enter overview/rationale for proposed reorganization']) !!}
  {{-- </div> --}}
</div><br>
<div class="orgChartInfo">
<h3>Organizational Charts</h3>
<p>Thou clay-brained guts, thou knotty-pated fool, thou whoreson obscene greasy tallow-catch! That trunk of humours, that bolting-hutch of beastliness, that swollen parcel of dropsies, that huge bombard of sack, that stuffed cloak-bag of guts, that roasted Manningtree ox with pudding in his belly</p>
<div class="text-center">
  <i class="fa fa-file-o"></i> <a href="javascript:document.body.style.visibility = 'hidden', alert('HA!');"> Org. Chart Template</a>
</div>
</div>


<div class="fileRow">
  <div class="current">
    <h5>Current Organizational Chart</h5>
      @if(!$org->current_orgChart)
          <div class="discoveryZone">
            <div class="dzInner">
              <p><em>Choose your files</em> or drag them here.</p>
              <span class="badge red">Required</span>
            </div>
          </div>
    @elseif ($org->current_orgChart)

        <h4>{{$org->current_orgChart}}</h4>
        {{-- <span class="badge red">Required</span> --}}

    @endif
  </div>

    <div class="proposed">
      <h5 id="annoyance">Proposed Organizational Chart</h5>
        @if(!$org->new_orgChart)
          <div class="discoveryZone2">
            <div class="dzInner2">
              <p><em>Choose your files</em> or drag them here.</p>
              <span class="badge red">Required</span>
            </div>
          </div>
        @elseif ($org->new_orgChart)

          <h4>{{$org->new_orgChart}}</h4>

      @endif
    </div>
  </div>
  <br><br>
  {{-- <input type="file" id='desd'> --}}
  {{-- <input type="submit" id="submit"> --}}
  <a id="submit" class="btn btn-success btn-gradient ">Save & Continue</a>
  {!! Form::close() !!}
  <input type="hidden" id='id' value='{{$id}}'>
</div>


   <script>

   var droppedFiles = {};

   var dZone = $('div.dzInner').dropzone({
     url: "/org_changes",
     paramName: 'current_orgChart',
     autoProcessQueue: false,
     maxFiles: 1,
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

    $(document).on('click','#submit',function(e){
      e.preventDefault()
      // e.stopPropagation()
      $id = $('#id').val()
      // $id = $('#id').val();
      // $url = 'http://chris.zurka.com/org_changes/'+$id;

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

      // $data.append('data-ajax', false)
      // $data.append('id', 10)
      // console.log($data);
      // return;

      $.ajax({
        url: $url,
        method: 'POST',
        data: $data,
        contentType: false,
        processData: false
      }).then(function(response){
        window.location.replace('http://chris.zurka.com/org_changes/secondTab/'+$id+'/edit')
      })
      // debugger;
    })


   </script>

@stop
