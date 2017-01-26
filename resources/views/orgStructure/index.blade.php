@extends('Labcoat::layouts/standard')
@section('page-title')
Organization Structure
@endsection
@section('main-content')

<div class="indent-padding width-limited-1200">
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
