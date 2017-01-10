@extends('Labcoat::layouts/standard')
@section('page-title')
    Organizational Change Requests
@endsection
@section('main-content')
  <div class="indent-padding width-limited-1200">
    <div class="">
      <h2>Change Requests</h2>
      Nostrud ullamco aute adipisicing ullamco tempor anim nostrud fugiat mollit dolore mollit est laboris anim eiusmod fugiat.Id sunt ut adipisicing officia excepteur cillum dolor quis non ea pariatur Lorem ea esse consequat dolor do.Ex cillum laboris enim eu ea anim do dolore veniam enim pariatur nulla exercitation excepteur.
    </div>
    {{-- <div class="needs-review">
      There are 3 request that need to be reviewed
      <button type="button" class="btn btn-success btn-gradient" name="button">Review Request</button>
    </div> --}}
    <a class="pull-right btn btn-primary btn-gradient new-org-button" href="/org_changes/create">New Request</a>
    <table>
      {!! Form::open() !!}

      {!! Form::close() !!}
      <thead>
        {{-- <th>Request Number</th> --}}
        <th>Title</th>
        <th>Description</th>
        <th>Status</th>
        <th>Delete</th>
      </thead>
      @foreach ($orgRequests as $org)
    <tr>
        {{-- <td data-toggle="tooltip" title="Edit this Organizational Change Request">
          <a href="/org_changes/firstTab/{{$org->id}}/edit">
          {{$org->id}}
          </a>
        </td> --}}
      <td><a href="/org_changes/firstTab/{{$org->id}}/edit">
      @if($org->title)
        {{$org->title}}
      @else
        Untitled
      @endif
      </a></td>
      <td>{{ str_limit($org->description, 80)}}</td>
      @if($org->ststus == 0)
        <td>Draft</td>
      @else
        <td>Needs Review</td>
      @endif
      {{-- <td><a href="/oldChartDownload/{{$org->id}}">{{ $org->current_orgChart }}</a></td> --}}
      {{-- <td><a href="/newChartDownload/{{$org->id}}">{{ $org->new_orgChart }}</a></td> --}}
      <td><a href="javascript:undefined;" class="fa fa-fw fa-trash" style="text-decoration: none;" data-delete-url="{{ URL::route('org_requests.destroy', $org['id']) }}"></a></td>
    </tr>
  @endforeach
    </table>
  </div>
@stop
