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
  <div class="indent-padding width-limited-1200">
    <div class="review-divs">
      <a href="/org_changes/firstTab/{{$org->id}}/edit">
        <h3>Overview and Rationale <i class="fa fa-external-link"></i></h3>
      </a>
      <p><label>Title: </label>{{$org->title}}</p>
      <label>Description: </label>
      <p>{{$org->description}}</p>
    </div>
    <div class="review-divs">
      <a href="/org_changes/firstTab/{{$org->id}}/edit">
        <h3>Organizational Charts <i class="fa fa-external-link"></i></h3>
      </a>
      <p><label>Current Organizational Chart: </label><a href="/oldChartDownload/{{$org->id}}">{{$org->current_orgChart}}</a></p>
      <p><label>Proposed Organizational Chart: </label><a href="/newChartDownload/{{$org->id}}">{{$org->new_orgChart}}</a></p>
    </div>
    <div class="review-divs">
      <a href="/org_changes/thirdTab/{{$org->id}}/edit">
        <h3>Updated Mission Statements <i class="fa fa-external-link"></i></h3>
      </a>
      @if (!!$missions)
        @foreach ($missions as $statement)
          <div class="expanding_div">
            <div class="showLink">
              <a href="javascript:undefined;">Show More</a>
            </div>
            <table class="mission_statements_table">
              <tr>
                <td>
                  <label>Update For:</label> {{$organizations[$statement->code]}} ({{$statement->code}})
                  <div class="trey" style="overflow: hidden;">
                    {{$statement->statement}}
                    <br>
                    <br>
                  </div>
                </td>
              </tr>
            </table>
          </div>
        @endforeach
      @else
        <p><em>Currently no Mission Statements to update</em></p>
      @endif
    </div>

    <div class="review-divs">
      <a href="/org_changes/secondTab/{{$org->id}}/edit">
      <h3>Organizational Changes <i class="fa fa-external-link"></i></h3>
      </a>
      @if (!!$changes)
        <table>

          @foreach ($changes as $change)
            <tr>
              <td><label class="control-label">From:</label> &nbsp;{{$change['from_code']}} &nbsp; {{$change['from_title']}} <br> <label class="control-label">To:</label> &nbsp; &nbsp;&nbsp; &nbsp;{{$change['to_code']}} &nbsp; {{$change['to_title']}}</td>
            </tr>
          @endforeach
        </table>
        @else
          <p><em>Currently no Organizational Changes</em></p>

      @endif
    </div>

    <div class="review-divs">
      <a href="/org_changes/fourthTab/{{$org->id}}/edit">
      <h3>Personnel Realignment and Reassignment <i class="fa fa-external-link"></i></h3>
      </a>
      <table>
        <thead>
          {{-- <th></th> --}}
          <th>Name</th>
          <th>From</th>
          <th>To</th>
          <th>Position Title</th>
          <th>Series</th>
          <th>Track</th>
          <th>Level</th>
          <th>Action</th>
          {{-- <th></th> --}}
        </thead>
          <tr>
            <td>Trey Beauregard</td>
            <td>5595</td>
            <td>5596</td>
            <td>Engineer</td>
            <td>XXX</td>
            <td>NP</td>
            <td>IV</td>
            <td>Realignment</td>
          </tr>
          <tr>

            <td>Ed Holzinger</td>
            <td>5595</td>
            <td>5596</td>
            <td>Branch Head</td>
            <td>XXX</td>
            <td>NP</td>
            <td>IV</td>
            <td>Reassignment</td>
          </tr>
      </table>
    </div>
    <div class="text-center">
      <a href="/org_changes" class="btn btn-gradient btn-success">Submit for Review</a>
    </div>

  </div>


  <script type="text/javascript">

        $.each($('.showLink'), function(key,val){
          console.log(val);
          $(val).css({
            'width': $(this).parent().width()-4,
            'margin-left': '1px'
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
