
<div class="purposeBox">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-1 ">
        <a href="javascript:undefined;" style="text-decoration:none;color:inherit;"><i class="fa fa-md fa-pencil"></i></a>
      </div>
      <div class="col-md-1 text-right">
        <label>Name:</label>
      </div>
      <div class="col-md-9 text-left">
        {{ $value['name'] }}
      </div>
      <div class="col-md-1 pull-right">

          <a href="javascript:undefined;" style="text-decoration: none;color:inherit;"><i class="fa fa-md fa-trash"></i></a>
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
  <div class="assignments-table">
    <div class="container-fluid">
    <div class="row">
      <div class="col-md-2 text-right">
        <label>Assignment:</label>
      </div>
      <div class="col-md-10 text-left">
        {{ $val['name'] }}
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
  </div>
  @endforeach
</div>
</div>
