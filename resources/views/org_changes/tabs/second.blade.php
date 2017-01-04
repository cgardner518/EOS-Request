@extends('Labcoat::layouts/standard')
@section('page-title')

    Organizational Change Request
/ New Request
@endsection
@section('tab-menu')
  @include('Labcoat::partials/stepped-tabs')
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
      <thead>
        <th></th>
        <th>Type</th>
        <th>From</th>
        <th>To</th>
        <th></th>
      </thead>
      @foreach ($orgChanges as $change)
        <tr>
          <td><a href="javascript:undefined;" class="fa fa-pencil" style="text-decoration:none;" data-modal-url="{{URL::route('editChange', ['id' => $change['id']])}}" data-modal-id="org_change_edit{{ $change['id'] }}"></a></td>
          @if($change['type'] == 0)
          <td>
            Unit Title
          </td>
          @else
            <td>
              Code
            </td>
          @endif
          <td>{{$change['from']}}</td>
          <td>{{$change['to']}}</td>
          <td><a href="javascript:undefined;" class="fa fa-fw fa-trash" style="text-decoration: none;"  data-delete-url="{{ URL::route('org_changes.destroy', $change['id']) }}" ></a></td>
        </tr>
      @endforeach
    </table>
    {{-- @php
      $org_request_id = $orgChanges[0]['org_request'];
    @endphp --}}
  @endif

    <button type="button" data-modal-url="{{ URL::route('change', ['id' => $id ]) }}"  class="btn btn-primary btn-gradient" data-modal-id="org_change-{{ $id }}">Add Title Change</button>
    <a href="{{ URL::route('org_changes.thirdTab', [ 'id' => $id ]) }}" class="btn btn-success btn-gradient ">Save &nbsp; <i class="fa fa-arrow-right"></i></a>
  </div>
@stop
