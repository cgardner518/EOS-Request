@extends('Labcoat::layouts/standard')
{{-- @php
  dd($value);
@endphp --}}
@section('page-title')
  <a href="/structure" style="color:white">NRL</a> / <a style="color:white;" href="/structure/1000">1000</a>
  @if (array_key_exists('parent_tree', $value[0]))
    @php
      $parents = explode('/', $value[0]['parent_tree'])
    @endphp
    @foreach ($parents as $parent)
      / <a style="color:white" href="/structure/{{$parent}}">{{$parent}}</a>
    @endforeach
  @endif
@endsection
@section('main-content')

<div class="indent-padding width-limited-1200">
@each('orgStructure.org-partials.org-structure-partial', $value, 'value')
<div class="org-info-show">
  <h3>Organizational Information</h3>
  <section class="purposeBox">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-1" style="margin-left: -1em;">
          <a href="javascript:undefined;" style="text-decoration:none;color:inherit;" data-modal-url="{{URL::route('edit_org_info', ['id' => $value[0]['code']])}}" data-modal-id="{{ $value[0]['code'] }}_edit"><i class="fa fa-md fa-pencil"></i></a>
        </div>
        <div class="col-md-1 text-right" style="padding-left: 3em;">
          <label>Name:</label>
        </div>
        <div class="col-md-9 text-left" style="padding-left: 2em;">
          {{ $value[0]['name'] }}
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
  </section>
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
