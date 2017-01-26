@extends('Labcoat::layouts/standard')

@php
// dd($organizations);
$ray = collect($organizations);
$current_unit = $ray->map(function($item, $key) use($org){
  if($item['code'] == $org){
    return $item;
  }elseif (isset($item['departments'])){
    foreach ($item['departments'] as $v) {
      if($v['code'] == $org){
        return $v;
      }elseif (isset($v['departments'])){
        foreach($v['departments'] as $val){
          if($val['code'] == $org){
            return $val;
          }elseif(isset($val['departments'])){
            foreach ($val['departments'] as $value) {
              if ($value['code'] == $org) {
                return $value;
              }
            }
          }
        }
      }else{
        return false;
      }
    }
  }else{
    return false;
  }
})
->filter(function($val, $key){
  return $val;
});
$value = array_values($current_unit->toArray());
// dd($value);
@endphp

@section('page-title')
  @if (array_key_exists('parent_tree', $value[0]))
    @php
    $parents = explode('/', $value[0]['parent_tree'])
    @endphp
    {{-- {{dd($parents)}} --}}
  @endif


<a href="/" style="color:white">NRL</a> / <a href="/structure" style="color:white">1000</a>
@if(isset($parents))/ <a href="/structure/{{$parents[0]}}" style="color:white">{{$parents[0]}}</a> @endif
@if(isset($parents[1]))/ <a href="/structure/{{$parents[1]}}" style="color:white">{{$parents[1]}}</a> @endif
@if(isset($parents[2]))/ <a href="/structure/{{$parents[2]}}" style="color:white">{{$parents[2]}}</a> @endif
@endsection
@section('main-content')

<div class="indent-padding width-limited-1200">
@each('orgStructure.org-partials.org-structure-partial', $value, 'value')
<div class="org-info-show">
  <h3>Organizational Information</h3>
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
          {{ $value[0]['name'] }}
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
            {{ $value[0]['type'] }}
        </div>
      </div>
      <div class="row">
        <div class="col-md-2 text-right">
          <label>Code:</label>
        </div>
        <div class="col-md-10 text-left">
          {{ $value[0]['code'] }}
        </div>
      </div>
      <div class="row">
        <div class="col-md-2 text-right">
          <label>Level:</label>
        </div>
        <div class="col-md-10 text-left">
            {{ $value[0]['type'] }}
        </div>
      </div>
      <div class="row">
        <div class="col-md-2 text-right">
          <label>Effective Date:</label>
        </div>
        <div class="col-md-10 text-left">
            {{ date('m/d/Y') }}
        </div>
      </div>
      <div class="row">
        <div class="col-md-2 text-right">
          <label>Support Files:</label>
        </div>
        <div class="col-md-10 text-left">

        </div>
      </div>
      <div class="row">
        <div class="col-md-2 text-right">
          <label>Last Update:</label>
        </div>
        <div class="col-md-10 text-left">
          06/06/2010 by Mary E Dixon. Changed the org unit type.
        </div>
      </div>
    </div>
    </div>
  </div>
  <div class="org-role-show">
    <h3>Roles</h3>
    @if (isset($value[0]['roles']))
      @each('orgStructure.org-partials.org-role-partial', $value[0]['roles'], 'value')
    @else
      @include('orgStructure.org-partials.no-roles-partial')
    @endif
  </div>
</div>


<script type="text/javascript">
  $('.unit-box, h1').click(function(){
    if ($(this).parent().parent().find('>ul')[0]) {
      $(this).parent().find('i').toggleClass('fa-angle-right').toggleClass('fa-angle-down')
      $(this).parent().parent().find('>ul').toggle(200)
    }
  })
</script>
@stop
