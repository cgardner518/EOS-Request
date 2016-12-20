@extends('Labcoat::layouts/standard')
@section('page-title')

    Organizational Change Request
/ New Request
@endsection
@section('main-content')
  <div class="indent-padding width-limited-1200">
    <h3>Overview and Rationale</h3>
    <p>You base football-player! You crooked-nose knave! You puterell, you skalemar. You hedge-born levereter, you bedswerver fopdoodle! Ye olde mucksprout and mumblecrust. You rakefile skobberlotcher. Thou subtle, perjur’d, false, disloyal man! Thou art like a toad; ugly and venomous.</p>
  {!! Form::open(['url'=>'org_changes','id'=>'', 'class'=>'']) !!}
  <div class="form-group form-row badged nameField">
    {!! Form::label('title', 'Title:', ['class' => 'control-label']) !!}
    <div class="inputWrapper">
      {!! Form::text('title', '', ['class' => 'form-control', 'placeholder'=>'A concise descriptive title']) !!}
    </div>
      <span class="badge red">Required</span>
  </div><br>
  <div class="form-group form-row badged nameField descField">
    <span class="badge red" id="description-badge">Required</span>
  {{-- {!! Form::label('description', 'Description:', ['class' => 'control-label']) !!} --}}
  {{-- <div class="inputWrapper"> --}}
    {!! Form::textarea('description', '', ['class' => 'form-control', 'placeholder' => 'Enter overview/rationale for proposed reorganization']) !!}
  {{-- </div> --}}
</div><br>
<div class="orgChartInfo">
<h3>Organizational Charts</h3>
<p>Thou clay-brained guts, thou knotty-pated fool, thou whoreson obscene greasy tallow-catch! That trunk of humours, that bolting-hutch of beastliness, that swollen parcel of dropsies, that huge bombard of sack, that stuffed cloak-bag of guts, that roasted Manningtree ox with pudding in his belly</p>
<a href="javascript:undefined;">Org. Chart Template</a>
</div>


<div class="fileRow">
  <h5>Current Organizational Chart</h5>
    <div class="discoveryZone">
      <div class="dzInner">
        <p><em>Choose your files</em> or drag them here.</p>
        <span class="badge red">Required</span>
      </div>
    </div>

    <div class="proposed">
      <h5 id="annoyance">Proposed Organizational Chart</h5>
      <div class="discoveryZone2">
        <div class="dzInner2">
          <p><em>Choose your files</em> or drag them here.</p>
          <span class="badge red">Required</span>
        </div>
      </div>
    </div>
  </div>
  {!! Form::close() !!}
</div>


   <script>
   var dZone = $('div.dzInner').dropzone({
     url: "/org_changes",
     paramName: 'current_orgChart',
     autoProcessQueue: false,
    //  addRemoveLinks: true,
     maxFiles: 1,
     maxfilesreached: function(file){
       $this = this;
       $file = file;
        $('.dz-error-mark').css({
          'position': 'absolute',
          'top': '60px',
          'left': '60px'
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

        $('.dzInner [data-dz-thumbnail]').mouseenter(function(){
          $('.dzInner .dz-error-mark').show('slide', {direction: 'up'}, 400)
        })
        $('.dzInner').mouseleave(function(){
            $('.dzInner .dz-error-mark').hide('slide', {direction: 'down'}, 400)
        })

        $('.dzInner .dz-error-mark').click(function(evt){
          console.log($file);
          $this.removeFile($file[0]);
          // console.log($file[0]);
          $('.dzInner>span').fadeIn(400)
          $('.dzInner>p').show();
        })
     },
     maxfilesexceeded: function(file){
       console.log(this);
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
        $('.dz-error-mark').css({
          'position': 'absolute',
          'top': '60px',
          'left': '60px'
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

        $('.dzInner2 [data-dz-thumbnail]').mouseenter(function(){
          $('.dzInner2 .dz-error-mark').show('slide', {direction: 'up'}, 400)
        })
        $('.dzInner2').mouseleave(function(){
            $('.dzInner2 .dz-error-mark').hide('slide', {direction: 'down'}, 400)
        })
        $('.dzInner2 .dz-error-mark').click(function(evt){
          // console.log($file2);
          $this2.removeFile($file2[0]);
          // console.log($file[0]);
          $('.dzInner2>span').fadeIn(400)
          $('.dzInner2>p').show();
        })
     },
     maxfilesexceeded: function(file){
       console.log(this);
       this.removeFile(file)
     },
    });

   </script>

@stop
