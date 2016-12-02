@extends('Labcoat::layouts/standard')
@section('page-title')
  <a href="/requests" style="color:white">EOS Requests</a> / New Request
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
    {!! Form::open(['url' => 'requests', 'files' => true]) !!}

  <div class="form-group dims">
    {!! Form::label('name', 'Name:', ['class' => 'control-label col-sm-1']) !!}
    <div class="col-sm-11">
      {!! Form::text('name', $eos->name, ['class' => 'pull-left form-control']) !!}
    </div>
    <span class="badge red">Required</span>
  </div><br>

  <div class="form-group">
    {!! Form::label('project_id', 'Project:', ['class' => 'control-label col-sm-1']) !!}
    <div class="col-sm-4">
      {!! Form::select('project_id', $projects, $eos->project_id, ['class' => 'pull-left form-control']) !!}
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
      <div class="col-md-4">
          {!! Form::label('clean', 'Should Item Be Cleaned?') !!}
          {!! Form::checkbox('clean', 1 ,$eos->clean) !!}
        </div>
        <div class="col-md-4">
          {!! Form::label('hinges', 'Does Item Have Hinges?') !!}
          {!! Form::checkbox('hinges', 1 ,$eos->hinges) !!}
        </div>
        <div class="col-md-4">
          {!! Form::label('threads', 'Does Item Have Threads?') !!}
          {!! Form::checkbox('threads', 1 ,$eos->threads)!!}
        </div>
    </div><br>

    <div class="form-row">
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

    <div class="form-row">
      {!! Form::label('stl', 'File') !!}
      {!! Form::file('stl') !!}
    </div><br>

    {{-- <div class="form-row">
      {!! Form::label('status', 'Status', ['disabled']) !!}
      {{ $eos->status }}
    </div><br> --}}

    <div class="form-row">
      {!! Form::label('number_of_parts', 'Number of Parts') !!}
      {!! Form::text('number_of_parts', $eos->number_of_parts, ['class' => 'form-control'])!!}
    </div><br>

    <div class="form-row">
      {!! Form::label('admin_notes', 'Admin Notes') !!}
      {!! Form::textarea('admin_notes', $eos->admin_notes, ['class' => 'form-control']) !!}
    </div><br>

    <input class="pull-right btn btn-success btn-gradient" type="submit">

    {!! Form::close() !!}
  </div>
</div>
@stop
