@extends('Labcoat::layouts/standard')
@section('page-title')
  EOS Requests
@endsection
@section('main-content')
  <style>
    .bensolo{
      display: flex;
    }
  </style>
  <div class="links content">
    <div class="bensolo">
      {{-- <h1>&#127825;</h1>
      <h1>&#127814;</h1>
      <h1>&#127829;</h1>
      <h1>&#127839;</h1>
      <h1>&#127828;</h1> --}}
    </div>
    {{-- <button type="button" class="btn btn-primary btn-gradient pull-right" data-modal-url="{{ URL::route('request.create') }}" data-modal-id='createEos'>New Request</button> --}}
  </div>
  <div class="content">
    <div>
      <br>
      <br>
      <div class="indent-padding width-limited-1200">
        <a class="pull-right btn btn-primary btn-gradient" href="/requests/create">New Request</a><br><br>
        <div class="table-header">
          <p class="table-title">EOS Requests</p>
          <p class="table-sub-title">The list of current EOS requests.</p>
        </div>
      <table class="indexTable">
          <thead>
            <tr>
            <th>
              ID
            </th>
            <th>
              Name
            </th>
            <th>
              Submitted
            </th>
            <th>
              Status
            </th>
            <th>
              Name
            </th>
            {{-- <th>
              Project
            </th> --}}
            <th>
               STL File
            </th>
            <th>
               Volume
            </th>
            {{-- <th>
              User
            </th> --}}
            <th>
              C
            </th>
            <th>
              T
            </th>
            <th>
              M
            </th>
            <th>
              #
            </th>
              <th>
                Change
              </th>
              <th>
                Reject
              </th>
              <th>
                Delete
              </th>
            </tr>
          </thead>
            @foreach($eosrequests as $eos)
          <tr class="topRow">
              <td class="id-td" rowspan="2">
                {{ $eos->id }}
              </td>
              <td class="nameDiv">
                {{ $eos->users->name }}
              </td>
              <td>{{ $eos->created_at}}</td>
              <td>
                @if($eos->status === 0)
                  Pending
                @endif
                @if($eos->status === 1)
                  In Process
                @endif
                @if($eos->status === 2)
                  Complete
                @endif
                @if($eos->status === 3)
                  Rejected
                @endif
              </td>
              <td>
                @if($eos->status === 0 || $eos->status === 1)
                  <a href="requests/{{ $eos->id }}/edit">
                    {{ $eos->name }}
                  </a>
                @else
                  <a href="requests/{{ $eos->id }}">
                    {{ $eos->name }}
                  </a>
                @endif
              </td>
              {{-- <td>
                {{ $eos->description}}
              </td> --}}
              {{-- <td>
                @if($eos->project_id == 0)
                  No Project
                @else
                {{ $projects[$eos->project_id] }}
                @endif
              </td> --}}
              <td>
                {{ $eos->stl }}
              </td>
              <td>
                {{ $eos->volume}}
              </td>
              <td>
                @if( $eos->clean === 1 )
                  Y
                @else
                  N
                @endif
              </td>
              <td>
                @if($eos->threads === 1)
                  Y
                @else
                  N
                @endif
              </td>
              <td>
                @if($eos->hinges === 1)
                  Y
                @else
                  N
                @endif
              </td>
              <td>{{ $eos->number_of_parts }}</td>

              {{-- <td>
                {{ $eos->users->name}}
              </td> --}}
                <td>
                  @if($eos->status === 0)
                    {!! Form::open(['method' => 'POST', 'url' => 'change/' . $eos->id ]) !!}
                    <button type="submit" class="btn btn-warning btn-gradient" >
                      In Process
                    </button>
                    {!! Form::close() !!}
                  @elseif ($eos->status === 1)
                    {!! Form::open(['method' => 'POST', 'url' => 'change/' . $eos->id ]) !!}
                    <button type="submit" class="btn btn-warning btn-gradient" >
                      Complete
                    </button>
                    {!! Form::close() !!}
                  @endif
                </td>
                <td>
                  @if($eos->status == 0)
                  {{-- {!! Form::open(['method' => 'POST', 'url' => 'reject/' . $eos->id ]) !!}
                  <button type="submit" class="btn btn-danger btn-gradient" name="reject">
                    Reject
                  </button>
                  {!! Form::close() !!} --}}
                  <button type="submit" data-modal-url="{{ URL::route('request.reject', ['id' => $eos->id]) }}" class="btn btn-danger btn-gradient" data-modal-id="reject-{{ $eos->id }}" >Reject</button>
                  @endif
                </td>
                  <td align='center'>
                    @if($eos->status === 0 || $eos->status === 3)
                    <a href="javascript:undefined;" class="fa fa-fw fa-trash" style="text-decoration: none;" data-delete-url="{{ URL::route('request.destroy', $eos['id']) }}"></a>
                  @endif
                  </td>
            </tr>
            <tr class="hackAttack">
              <td class="fileLink" colspan="2"><a download href="{{$eos->filePath}}">{{ $eos->stl}}</a></td>
              <td colspan="13">{{ $eos->description }}</td>
            </tr>
        @endforeach
     </table>
   </div>
 {{-- <h2>No Pending Requests</h2> --}}
   </div>

 </div>
 {{-- <script>$(document).mousemove(function(evt){$('.bensolo h1').css({"margin-left":evt.clientX/45+"px","transform":"perspective(600px) rotateY("+evt.clientX/3+"deg) rotateX("+evt.clientY/-1+"deg)"})})</script> --}}
@stop


{{-- <button type="submit" data-modal-url="{{ URL::route('request.changeStatus', ['id' => $eos->id]) }}" class="btn btn-warning btn-gradient" data-modal-id="changeStatus-{{ $eos->id }}" >
Change   ****->default(0);
</button> --}}
