@extends('Labcoat::layouts/standard')
@section('page-title')
    Organizational Change Requests
@endsection
@section('main-content')
  <div class="indent-padding width-limited-1200">
    <div class="">
      <h2>Change Requests</h2>
      <p>The Organization Structure &amp; Roles application allows you to request changes to the structure or roles at NRL. This includes modifications to existing codes as well as changes in personnel associated with official NRL roles.</p>
    </div>
    <div class="needs-review">
      There are {{count($orgRequests)}} request that need to be reviewed
      <button type="button" class="btn btn-success btn-gradient" name="button">Review Requests</button>
    </div>
    <div class="pull-left search-section">
      <h2>Requests</h2>
      {!! Form::text('search', '', ['placeholder' =>  'Search']) !!}
    </div>
    <a class="pull-right btn btn-primary btn-gradient new-org-button" href="/org_changes/create">New Request</a>
    <table>
      {!! Form::open() !!}

      {!! Form::close() !!}
      <thead>
        <th>Title</th>
        <th>Description</th>
        <th>Status</th>
        <th>Delete</th>
      </thead>
      @foreach ($orgRequests as $org)
    <tr>
      <td><a href="/org_changes/overview/{{$org->id}}/edit">
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
      <td><a href="javascript:undefined;" class="fa fa-fw fa-trash" style="text-decoration: none;" data-delete-url="{{ URL::route('org_requests.destroy', $org['id']) }}"></a></td>
    </tr>
  @endforeach
    </table>
  </div>
@stop
