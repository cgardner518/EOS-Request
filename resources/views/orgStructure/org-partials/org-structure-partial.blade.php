<style media="screen">
  .code-text{
    padding-top: .1em;
  }
</style>
<div class="unit-box-container">
  <div class="box-holder">
    <h1 style="width:20px;margin-right:0;"><i class="fa fa-angle-right"></i></h1>
    <div class="unit-box">
      <p>{{$value['type']}}</p>
      <p class="code-text">{{$value['code']}}</p>
    </div>
    <h4><a href="/structure/{{$value['code']}}" style="color:inherit;">{{$value['name']}}</a></h4>
  </div>
  @if (isset($value['departments']))
    <ul>
      @foreach ($value['departments'] as $value)
        @include('orgStructure.org-partials.org-structure-partial', $value)
      @endforeach
    </ul>
  @endif
</div>
