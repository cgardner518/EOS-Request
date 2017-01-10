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
    {!! Form::open() !!}
    {!! Form::close() !!}

    <h3>Organizational Changes</h3>
    <p>Laboris eu eiusmod magna laborum nostrud anim excepteur labore exercitation aute.Cupidatat laborum amet in aute reprehenderit veniam culpa do ea et minim pariatur consectetur deserunt.Irure ullamco aliquip nostrud elit aute nulla in ullamco esse dolore sunt.</p>
  @if (empty($orgChanges))
    <p><em>Currently no Organizational Changes</em></p>
    @else
    <table>

      @foreach ($orgChanges as $change)
        <tr>
          <td class="org_change_td"><a href="javascript:undefined;" class="fa fa-pencil" style="text-decoration:none;" data-modal-url="{{URL::route('editChange', ['id' => $change['id']])}}" data-modal-id="org_change_edit{{ $change['id'] }}"></a></td>

          <td><label class="control-label">From:</label> &nbsp;{{$change['from_code']}} &nbsp; {{$change['from_title']}} <br> <label class="control-label">To:</label> &nbsp; &nbsp;&nbsp; &nbsp;{{$change['to_code']}} &nbsp; {{$change['to_title']}}</td>
          <td class="org_change_td"><a href="javascript:undefined;" class="fa fa-fw fa-trash" style="text-decoration: none;"  data-delete-url="{{ URL::route('org_changes.destroy', $change['id']) }}" ></a></td>
        </tr>
      @endforeach
    </table>

  @endif

  <div class="text-center">
    <p>
      <button type="button" data-modal-url="{{ URL::route('change', ['id' => $id ]) }}"  class="btn btn-primary btn-gradient" data-modal-id="org_change-{{ $id }}">Add Title Change</button>
    </p>
    <p class="btn-space">
      <a href="{{ URL::route('org_changes.thirdTab', [ 'id' => $id ]) }}" class="btn btn-success btn-gradient ">Save &nbsp; <i class="fa fa-arrow-right"></i></a>
    </p>
  </div>
  </div>
@stop
