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
    <a class="pull-right btn btn-primary btn-gradient" href="org_changes/create">New Unit</a>
    <a class="pull-right btn btn-primary btn-gradient" href="org_changes/create">New Role</a><br>
    <input type="text" name="search" placeholder="Search">
  </div>
  <div class="unit-box-container">
    <div class="box-holder">
      <h1><i class="fa fa-angle-right"></i></h1>
      <div class="unit-box">
        <div class="hack-class container-fluid">
          <p class="unit-type text-center">{{$organizations['type']}}</p>
        </div>
        <div class="code-section">
          <p class="code-text">{{$organizations['code']}}</p>
        </div>
      </div>
      <h4><a href="/structure/{{$organizations['code']}}" style="color:inherit;">{{$organizations['name']}}</a></h4>
    </div>
    @if (isset($organizations['departments']))
      <ul>
        @foreach ($organizations['departments'] as $value)
          @include('orgStructure.org-partials.org-structure-partial', $value)
        @endforeach
      </ul>
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
