@extends('Labcoat::layouts/standard')
@section('page-title')
  <a href="/requests" style="color:white">EOS Requests</a> / Edit Request
@endsection
@section('main-content')

  {{
    Form::macro('dateField', function(){
      return '<span class="inline-left">
										<div class="input-group narrow left">
											<input class="form-control hasDatepicker" name="date" type="text" id="date-input">
											<span class="input-group-addon clickable">
												<i class="fa fa-calendar" data-calid="date-input"></i>
											</span>
										</div>
									</span>';
    })
}}

<div class="indent-padding width-limited-1200">
  <div class="form-section-div">
    <div class="words">
      Sed ultrices viverra nibh, eget consectetur enim imperdiet ut. Morbi mauris tellus, tempor vitae dui a, faucibus consectetur nisi. Maecenas tempor tincidunt viverra. Curabitur fermentum et felis vitae vehicula. Aliquam convallis magna eget quam suscipit, ac fermentum purus volutpat.
    </div>
    {!! Form::open(['url' => 'requests/'. $eos->id , 'method' => 'PATCH', 'files' => true]) !!}
  <div class="form-group nameField">
    {!! Form::label('name', 'Name:', ['class' => 'control-label']) !!}
    <div class="inputWrapper">
      {!! Form::text('name', $eos->name, ['class' => 'form-control']) !!}
    </div>
    <span class="badge red">Required</span>
  </div><br>

  <div class="project">
    {!! Form::label('project_id', 'Project:', ['class' => 'control-label']) !!}
    <div >
      {!! Form::select('project_id', $projects, $eos->project_id) !!}
    </div>
  </div><br>

  {!! Form::label('description', 'Description') !!}<span class="badge red">Required</span>
    <div class="form-group">
      {!! Form::textarea('description', $eos->description, ['class' => 'form-control']) !!}
    </div>

    {!! Form::label('', 'Approximate Dimensions in Millimeters') !!}
    <div class="form-row dims">
      <div class="dimensions">
        {!! Form::label('dimX', 'X: ', ['class' => ' control-label col-sm-1']) !!}
        {!! Form::text('dimX', $eos->dimX, ['class' => 'form-control']) !!}
        <span class="badge red">Required</span>
      </div>
      <div class="dimensions">
        {!! Form::label('dimY', 'Y: ', ['class' => ' control-label col-sm-1']) !!}
        {!! Form::text('dimY', $eos->dimY, ['class' => 'form-control']) !!}
        <span class="badge red">Required</span>
      </div>
      <div class="dimensions">
        {!! Form::label('dimZ', 'Z: ', ['class' => ' control-label col-sm-1']) !!}
        {!! Form::text('dimZ', $eos->dimZ, ['class' => 'form-control']) !!}
        <span class="badge red">Required</span>
      </div>
    </div><br>

    {{-- <div class="form-row">
      {!! Form::label('cost', 'Cost') !!}
      {!! Form::text('cost', $eos->cost, ['class' => 'form-control']) !!}
    </div><br> --}}

    <div class="form-group">
      {!! Form::label('', 'Additional Information') !!}
      <div class="chckbx">
          {{-- {!! Form::label('clean', 'Should Item Be Cleaned?') !!} --}}
          <div>{!! Form::checkbox('clean', 1 ,$eos->clean) !!} Perfom post building cleaning.</div>
          {{-- {!! Form::label('hinges', 'Does Item Have Hinges?') !!} --}}
          <div>
            {!! Form::checkbox('hinges', 1 ,$eos->hinges) !!} Has hinges or other moving parts.
          </div>
          {{-- {!! Form::label('threads', 'Does Item Have Threads?') !!} --}}
          <div>
            {!! Form::checkbox('threads', 1 ,$eos->threads)!!} Has threads
          </div>
        </div>
    </div><br>

    <div class="form-row dayPicker">
      {!! Form::label('needed_by', 'Date Needed By:') !!}
      {!! Form::dateField() !!}
      {{-- {!! Form::date('needed_by', $eos->needed_by, ['class' => 'form-control input-group-addon clickable fa fa-calendar hasDatepicker']) !!} --}}
      {{-- <span class="inline-left">
      <div class="input-group narrow left">
      <input class="form-control hasDatepicker" name="date" type="text" id="date-input">
      <span class="input-group-addon clickable">
      <i class="fa fa-calendar" data-calid="date-input"></i>
    </span>
  </div>
</span> --}}
    </div><br>
    Note: It is preferable that you do not give a deadline. Because parts are built as space is available, a deadline that is very soon will not be achievable in many cases. Please allow time to get into the queue.

    <div class="form-row stlFile">
      {!! Form::label('stl', 'File') !!}
      {{$eos->stl}}
      {{-- <span class="badge red">Required</span> --}}
    </div><br>

    {{-- <div class="form-row">
      {!! Form::label('status', 'Status', ['disabled']) !!}
      {{ $eos->status }}
    </div><br> --}}

    <div class="form-row parts">
      {!! Form::label('number_of_parts', 'Number of Parts: ') !!}
      {!! Form::text('number_of_parts', $eos->number_of_parts, ['class' => 'form-control'])!!}
      <span class="badge red">Required</span>
    </div><br>

    @can('eosAdmin')
      <div class="form-row price">
        {!! Form::label('cost', 'Cost:') !!}
        {!! Form::text('cost', $eos->cost, ['class' => 'form-control']) !!}
      </div><br>
      {!! Form::label('status', 'Status', ['class' => 'form-row']) !!}  <span class="badge red">Required</span>
        <div class="form-row">
          <div class="col-md-4">
            {!! Form::label('status', 'Pending') !!}
            {!! Form::radio( 'status', 'pending' ) !!}
          </div>

          <div class="col-md-4">
            {!! Form::label('status', 'In Process') !!}
            {!! Form::radio( 'status', 'in-process' ) !!}
          </div>

          <div class="col-md-4">
            {!! Form::label('status', 'Completed') !!}
            {!! Form::radio( 'status', 'complete' ) !!}
          </div>
        </div>
        <br>
    @endcan

    <div class="form-row">
      {!! Form::label('admin_notes', 'Admin Notes') !!}
      {!! Form::textarea('admin_notes', $eos->admin_notes, ['class' => 'form-control']) !!}
    </div><br>

    <input class="pull-right btn btn-success btn-gradient" type="submit">

    {!! Form::close() !!}
  </div>
</div>
@stop
