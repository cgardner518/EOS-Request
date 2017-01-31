@extends('Labcoat::layouts/standard')
@section('page-title')
Organization Structure
@endsection
@section('main-content')

<div class="indent-padding width-limited-1200">
  <div class="form-row org_structure_show_select_div">
    {!! Form::label('Show: ', '',['class' => 'control-label']) !!}
    {!! Form::select('structure_format',['Primary Structure', ],'') !!}
  </div>
  <div class="pull-right  org_structrue_search_div">
    <a class="pull-right btn btn-primary btn-gradient" href="/requests/create">New Role</a>
    <a class="pull-right btn btn-primary btn-gradient" href="/requests/create">New Unit</a><br>
    <input type="text" name="search" placeholder="Search">
  </div>
  @each('orgStructure.org-partials.org-structure-partial', $organizations, 'value')
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
