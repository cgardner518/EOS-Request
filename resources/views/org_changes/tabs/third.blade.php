@extends('Labcoat::layouts/standard')
@section('page-title')

    Organizational Change Request
/ New Request
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
      <div class="expanding_div">
        @foreach ($missions as $mission)
          <table class="mission_statements_table">
              <tr>
                <td class="personnel_table_td"><i class="fa fa-pencil" style="text-decoration:none;" data-modal-url="{{URL::route('editChange', ['id' => ''])}}"></i></td>
                <td>
                  <label>Update For:</label> {{$organizations[$mission['code']]}} ({{$mission['code']}})
                  <br />
                  {{$mission['statement']}}
                </td>
                <td class="personnel_table_td"><a class="fa fa-fw fa-trash" style="text-decoration: none;"  data-delete-url=""></a></td>
              </tr>
          </table>
        @endforeach
        <div class="showLink">
          <a href="javascript:alert('howdy');">Show More</a>
        </div>
      </div>
    @endif


    <button type="button" data-modal-url="{{ URL::route('mission_statements', ['id' => $id ]) }}" data-modal-id="mission_statements-{{ $id }}" class="btn btn-primary btn-gradient">Add Mission Statement</button>
    <a href="{{ URL::route('org_changes.fourthTab', [ 'id' => $id ]) }}" class="btn btn-success btn-gradient ">Save &nbsp; <i class="fa fa-arrow-right"></i></a>

</div>


<script type="text/javascript">
console.log($('.mission_statements_table').height());

  $num = 0;
  $.each($('.mission_statements_table'),function(i,v){
    $num += $(v).height();
  })

  $('.showLink').css({'top': $('.expanding_div').height+'px'})
  $('.showLink a').click(function(e){
    e.preventDefault()
    $('.expanding_div').animate({height: $num+"px"}, 400)
    $('.showLink').hide()
  })
</script>
@stop
