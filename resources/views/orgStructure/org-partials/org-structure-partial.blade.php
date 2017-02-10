{{-- @php
  dd($value);
@endphp --}}
<div class="unit-box-container">
  <div class="box-holder">
    <h1><i class="fa fa-angle-right"></i></h1>
    <div class="unit-box">
      <div class="hack-class container-fluid">
        <p class="unit-type text-center">{{$value['type']}}</p>
      </div>
      <div class="code-section">
        <p class="code-text">{{$value['code']}}</p>
      </div>
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
