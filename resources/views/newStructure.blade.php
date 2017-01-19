@extends('Labcoat::layouts/standard')
@section('page-title')
Page Title
@endsection
@section('main-content')
  <script src="/jq" charset="utf-8"></script>
  <style media="screen">

  </style>
<div class="indent-padding width-limited-1200">
  @foreach ($organizations as $value)
    <div class="unit-box-container">
      <div class="box-holder">
        <h1 style="width:20px;margin-right:0;"><i class="fa fa-angle-right"></i></h1>
        <div class="unit-box">
          <p>{{$value['type']}}</p>
          <p>{{$value['code']}}</p>
        </div>
        <h4>{{$value['name']}}</h4>
      </div>
      @foreach ($value['divisions'] as $val)
        <ul>
          <li>
            <div class="box-holder">
              <h1 style="width:20px;margin-right:0;"><i class="fa fa-angle-right"></i></h1>
              <div class="unit-box">
                <p>{{$val['type']}}</p>
                <p>{{$val['code']}}</p>
              </div>
              <h4>{{$val['name']}}</h4>
            </div>
            @foreach ($val['branches'] as $v)
              <ul>
                <li>
                  <div class="box-holder">
                    <h1 style="width:20px;margin-right:0;"><i class="fa fa-angle-right"></i></h1>
                    <div class="unit-box">
                      <p>{{$v['type']}}</p>
                      <p>{{$v['code']}}</p>
                    </div>
                    <h4>{{$v['name']}}</h4>
                  </div>
                  @if (isset($v['sections']))
                    <ul>
                    @foreach ($v['sections'] as $section)
                        <li>
                          <div class="box-holder">
                            <h1 style="width:20px;margin-right:0;"><i class="fa fa-angle-right"></i></h1>
                            <div class="unit-box">
                              <p>{{$section['type']}}</p>
                              <p>{{$section['code']}}</p>
                            </div>
                            <h4>{{$section['name']}}</h4>
                          </div>
                        </li>
                    @endforeach
                    </ul>
                  @endif
                </li>
              </ul>
            @endforeach
          </li>
        </ul>
      @endforeach
    </div>
  @endforeach
</div>

<script type="text/javascript">
  $('.box-holder').click(function(){
    if ($(this).find('p:first-child').text() == 'Section'){
    }else{
      $(this).parent().find('>ul').toggle(500)
      // $(this).find('ul').hide()
      $(this).find('i').toggleClass('fa-angle-right').toggleClass('fa-angle-down')
    }
  })
</script>

@stop
