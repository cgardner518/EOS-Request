@extends('Labcoat::layouts/standard')
@section('page-title')
    Organizational Change Requests
@endsection
@section('main-content')
  <div class="indent-padding width-limited-1200">
    <h2>Dashboard</h2>
    Nostrud ullamco aute adipisicing ullamco tempor anim nostrud fugiat mollit dolore mollit est laboris anim eiusmod fugiat.Id sunt ut adipisicing officia excepteur cillum dolor quis non ea pariatur Lorem ea esse consequat dolor do.Ex cillum laboris enim eu ea anim do dolore veniam enim pariatur nulla exercitation excepteur.
    <div class="needs-review">
      There are 3 request that need to be reviewed
      <button type="button" class="btn btn-success btn-gradient" name="button">Review Request</button>
    </div>
    <table>
      {!! Form::open() !!}
      {!! Form::close() !!}
      <a class="pull-right btn btn-primary btn-gradient" href="/org_changes/create">New Request</a>
      <thead>
        <th>Request Number</th>
        <th>Title</th>
        <th>Description</th>
        <th>Current Org Chart</th>
        <th>New Org Chart</th>
        <th>Delete</th>
      </thead>
      @foreach ($orgRequests as $org)
    <tr>
        <td data-toggle="tooltip" title="Edit this Organizational Change Request">
          <a href="/org_changes/firstTab/{{$org->id}}/edit">
          {{$org->id}}
          </a>
        </td>
      <td>{{$org->title}}</td>
      <td>{{ str_limit($org->description, 80)}}</td>
      <td><a href="/oldChartDownload/{{$org->id}}">{{ $org->current_orgChart }}</a></td>
      <td><a href="/newChartDownload/{{$org->id}}">{{ $org->new_orgChart }}</a></td>
      <td><a href="javascript:undefined;" class="fa fa-fw fa-trash" style="text-decoration: none;" data-delete-url="{{ URL::route('org_changes.destroy', $org['id']) }}"></a></td>
    </tr>
  @endforeach
    </table>
  </div>
@stop
