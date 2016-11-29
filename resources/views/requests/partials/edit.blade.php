
<div class="form-row">
  {!! Form::label('name', 'Name') !!}
  {!! Form::text('name', $eos->name, ['class' => 'form-control']) !!}
</div><br>

  <div class="form-row">
    {!! Form::label('description', 'Description') !!}
    {!! Form::textarea('description', $eos->description, ['class' => 'form-control']) !!}
  </div><br>

  <div class="form-row">
    {!! Form::label('dimX', 'Dimensions-X') !!}
    {!! Form::text('dimX', $eos->dimX, ['class' => 'form-control']) !!}
  </div><br>

  <div class="form-row">
    {!! Form::label('dimY', 'Dimensions-Y') !!}
    {!! Form::text('dimY', $eos->dimY, ['class' => 'form-control']) !!}
  </div><br>

  <div class="form-row">
    {!! Form::label('dimZ', 'Dimensions-Z') !!}
    {!! Form::text('dimZ', $eos->dimZ, ['class' => 'form-control']) !!}
  </div><br>

  <div class="form-row">
    {!! Form::label('cost', 'Cost') !!}
    {!! Form::text('cost', $eos->cost, ['class' => 'form-control']) !!}
  </div><br>

  <div class="form-row">
    {!! Form::label('clean', 'Should Item Be Clean?') !!}
    {!! Form::checkbox('clean', 1 ,$eos->clean, ['class' => 'form-control']) !!}
  </div><br>

  <div class="form-row">
    {!! Form::label('hinges', 'Item Has Hinges?') !!}
    {!! Form::checkbox('hinges', 1 ,$eos->hinges, ['class' => 'form-control']) !!}
  </div><br>

  <div class="form-row">
    {!! Form::label('threads', 'Item Has Threads') !!}
    {!! Form::checkbox('threads', 1 ,$eos->threads, ['class' => 'form-control'])!!}
  </div><br>

  <div class="form-row">
    {!! Form::label('needed_by', 'Date Needed By') !!}
    {!! Form::text('needed_by', $eos->needed_by, ['class' => 'form-control']) !!}
  </div><br>

  <div class="form-row">
    {!! Form::label('stl', 'File') !!}
    {{$eos->stl}}
  </div><br>

  <div class="form-row">
    {!! Form::label('status', 'Status', ['disabled']) !!}
    {{ $eos->status }}
  </div><br>

  <div class="form-row">
    {!! Form::label('number_of_parts', 'Number of Parts') !!}
    {!! Form::text('number_of_parts', $eos->number_of_parts, ['class' => 'form-control'])!!}
  </div><br>

  <div class="form-row">
    {!! Form::label('admin_notes', 'Admin Notes') !!}
    {!! Form::textarea('admin_notes', $eos->admin_notes, ['class' => 'form-control']) !!}
  </div><br>
