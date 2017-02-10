
<section class="purposeBox">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-1" style="margin-left: -1em;">
        <a href="javascript:undefined;" style="text-decoration:none;color:inherit;" data-modal-url="{{URL::route('edit_org_role', ['id' => $value['code']-$value['type'], 'role_id' => $value['type']])}}" data-modal-id="{{ $value['code'] }}_{{$value['type']}}_edit"><i class="fa fa-md fa-pencil"></i></a>
      </div>
      <div class="col-md-1 text-right" style="padding-left: 3em;">
        <label>Name:</label>
      </div>
      <div class="col-md-9 text-left" style="padding-left: 2em;">
        {{ $value['name'] }}
      </div>
      <div class="col-md-1 pull-right" style="margin-right: -1em;">

          <a href="javascript:undefined;" style="text-decoration: none;color:inherit;" data-delete-element="section" data-delete-url="{{ URL::route('fakery') }}"><i class="fa fa-md fa-trash"></i></a>
      </div>
    </div>
    <div class="row">
      <div class="col-md-2 text-right">
        <label>Type:</label>
      </div>
      <div class="col-md-10 text-left">
          {{ $value['type'] }}
      </div>
    </div>
    <div class="row">
      <div class="col-md-2 text-right">
        <label>Code:</label>
      </div>
      <div class="col-md-10 text-left">
          {{ $value['code'] }}
      </div>
    </div>
    <div class="row">
      <div class="col-md-2 text-right">
        <label>Level:</label>
      </div>
      <div class="col-md-10 text-left">
          {{ $value['level'] }}
      </div>
    </div>
    <div class="row">
      <div class="col-md-2 text-right">
        <label>Effective Date:</label>
      </div>
      <div class="col-md-10 text-left">
          {{ $value['effective'] }}
      </div>
    </div>
    <div class="row">
      <div class="col-md-2 text-right">
        <label>Supporting Files:</label>
      </div>
      <div class="col-md-10 text-left">

      </div>
    </div>
    <div class="row">
      <div class="col-md-2 text-right">
        <label>Last Update:</label>
      </div>
      <div class="col-md-10 text-left">

      </div>
    </div>
    <br>
  @foreach ($value['assignments'] as $val)
  <section class="assignments-table">
    {!!Form::open()!!}
    {!!Form::close()!!}
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-1">
          <a href="javascript:undefined;" style="text-decoration:none;color:inherit;" data-modal-url="{{URL::route('edit_role_assignment', ['id' => $value['code']-$value['type'], 'role_id' => $value['type'], 'assignment' => $val['name']])}}" data-modal-id="{{$value['type']}}_{{$val['name']}}_edit"><i class="fa fa-md fa-pencil"></i></a>
        </div>
        <div class="col-md-1" style="padding-left: 0.45em;">
          <label>Assigned:</label>
        </div>
        <div class="col-md-9 text-left">
          {{ $val['name'] }}
        </div>
        <div class="col-md-1 pull-right">

            <a href="javascript:undefined;" style="text-decoration: none;color:inherit;" data-delete-element="section" data-delete-url="{{ URL::route('fakery') }}"><i class="fa fa-md fa-trash"></i></a>
        </div>
      </div>
    <div class="row">
      <div class="col-md-2 text-right">
        <label>Type:</label>
      </div>
      <div class="col-md-10 text-left">
        {{ $val['type'] }}
      </div>
    </div>
    <div class="row">
      <div class="col-md-2 text-right">
        <label>Effective Date:</label>
      </div>
      <div class="col-md-10 text-left">
        {{ $val['effective'] }}
      </div>
    </div>
    <div class="row">
      <div class="col-md-2 text-right">
        <label>Supporting Files:</label>
      </div>
      <div class="col-md-10 text-left">
      </div>
    </div>
    <div class="row">
      <div class="col-md-2 text-right">
        <label>Comments:</label>
      </div>
      <div class="col-md-10 text-left">
      </div>
    </div>
    </div>
  </section>
  @endforeach
</div>
</section>
