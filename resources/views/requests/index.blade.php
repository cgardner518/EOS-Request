@extends('Labcoat::layouts/standard')
@section('page-title')
  EOS Requests
@endsection
@section('main-content')
  <div class="links content">
    &#128520;
    <a class="pull-right btn btn-primary btn-gradient" href="/requests/create">New Request</a>
    {{-- <button type="button" class="btn btn-primary btn-gradient pull-right" data-modal-url="{{ URL::route('request.create') }}" data-modal-id='createEos'>New Request</button> --}}
  </div>
  <div class="content">
    <div>
      <br>
      <br>
      <div class="table-header">
				<p class="table-title">EOS Requests</p>
				<p class="table-sub-title">The list of current EOS requests.</p>
			</div>
      <table>
          <tr>
            <th>
              ID
            </th>
            <th>
              Name
            </th>
            <th>
              Description
            </th>
            <th>
              Cost
            </th>
            <th>
               STL File
            </th>
            <th>
               Volume
            </th>
            <th>
              Status
            </th>
            <th>
              User
            </th>
            @can('eosAdmin')
              <th>
                Change
              </th>
              <th>
                Reject
              </th>
            @endcan
          </tr>
            @foreach($eosrequests as $eos)
              @if( $eos->users->id == $user->id  )
          <tr>
              <td>
                {{ $eos->id}}
              </td>
              <td class="links">
                @can('eosAdmin')
                  @if($eos->status === 0)
                    <a href="requests/{{ $eos->id }}/edit">
                      {{ $eos->name }}
                    </a>
                  @else
                    <a href="requests/{{ $eos->id }}">
                      {{ $eos->name }}
                    </a>
                  @endif
                @endcan
                @can('eosRead')
                  <a href="requests/{{ $eos->id }}">
                    {{ $eos->name }}
                  </a>
                @endcan
              </td>
              <td>
                {{ $eos->description}}
              </td>
              <td>
                ${{ $eos->cost}}
              </td>
              <td>
                <a download href="{{$eos->filePath}}">
                {{ $eos->stl}}
                </a>
              </td>
              <td>
                {{ $eos->volume}}
              </td>
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
                {{ $eos->users->name}}
              </td>
              @can('eosAdmin')
                <td>
                  <button type="submit" data-modal-url="{{ URL::route('request.changeStatus', ['id' => $eos->id]) }}" class="btn btn-warning btn-gradient" data-modal-id="changeStatus-{{ $eos->id }}" >
                    Change
                  </button>
                </td>
                <td>
                  {!! Form::open(['method' => 'POST', 'url' => 'reject/' . $eos->id ]) !!}
                  <button type="submit" class="btn btn-danger btn-gradient" name="reject">
                    Reject
                  </button>
                  {!! Form::close() !!}
                </td>
              @endcan
            </tr>
          @endif
        @endforeach
     </table>
 {{-- <h2>No Pending Requests</h2> --}}
   </div>

 </div>
@stop
