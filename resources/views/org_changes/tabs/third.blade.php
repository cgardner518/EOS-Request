@extends('Labcoat::layouts/standard')
@section('page-title')

  <a href="/org_changes" style="color:white">Organizational Change Request</a>
/ @if($org->title)
  {{$org->title}}
@else
  Untitled
@endif
@endsection
@section('tab-menu')
  @include('Labcoat::partials/tabs')
@endsection
@section('main-content')
  <style media="screen">
  html, body{
height:100%;
}
  </style>
  <div class="indent-padding width-limited-1200">
    <h3>Updated Mission Statements</h3>
    <p>Veniam culpa mollit amet officia dolor ipsum esse qui sint officia nisi eiusmod sint esse incididunt culpa eiusmod. Labore qui ut aute laborum laboris fugiat sunt magna consequat nulla sint adipisicing id.</p>


    @if (empty($missions))
      <p><em>Currently no Mission Statements to update</em></p>
    @else
        @foreach ($missions as $mission)
          <div class="expanding_div">
            <div class="showLink">
              <a href="javascript:undefined;">Show More</a>
            </div>
          <table class="mission_statements_table">
              <tr>
                <td class="personnel_table_td"><i class="fa fa-pencil" style="text-decoration:none;" data-modal-url="{{URL::route('editChange', ['id' => ''])}}"></i></td>
                <td>
                  <label>Update For:</label> {{$organizations[$mission['code']]}} ({{$mission['code']}})
                  <div class="trey" style="overflow: hidden;">
                    {{$mission['statement']}}
                    <br>
                    <br>
                  </div>
                </td>
                <td class="personnel_table_td"><a class="fa fa-fw fa-trash" style="text-decoration: none;"  data-delete-url=""></a></td>
              </tr>
          </table>
        </div>
        @endforeach
    @endif
<br>
<br>
    <div class="text-center">
      <p>
        <button type="button" data-modal-url="{{ URL::route('mission_statements', ['id' => $id ]) }}" data-modal-id="mission_statements-{{ $id }}" class="btn btn-primary btn-gradient">Add Mission Statement</button>
      </p>
      <p class="btn-space">
        <a href="{{ URL::route('org_changes.fourthTab', [ 'id' => $id ]) }}" class="btn btn-success btn-gradient ">Save &nbsp; <i class="fa fa-arrow-right"></i></a>
      </p>
    </div>
</div>


<style>

/*Veniam culpa mollit amet officia dolor ipsum esse qui sint officia nisi eiusmod sint esse incididunt culpa eiusmod. Labore qui ut aute laborum laboris fugiat sunt magna consequat nulla sint adipisicing id.*/
</style>

<script type="text/javascript">

      $.each($('.showLink'), function(key,val){
        console.log(val);
        $(val).css({
          'width': $(this).parent().width()-82
        })
      })
      $('.showLink a').click(function(){

        var currHeight = $(this).closest('.expanding_div').height();
        $(this).closest('.expanding_div').height('auto');
        var animationheight = $(this).closest('.expanding_div').height()
        $(this).closest('.expanding_div').height(currHeight)
      //
        if ($(this).text() == 'Show More') {
          $(this).closest('.expanding_div').animate({
            'height': animationheight,
          }, 500)
          $(this).text('Show Less')
        }else{
          console.log(currHeight);
          $(this).closest('.expanding_div').animate({
            'height': '8em',
          }, 500)
          $(this).text('Show More')
        }
      })

</script>
@stop
