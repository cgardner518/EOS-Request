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
      <a class="pull-right btn btn-primary btn-gradient" href="/org_changes/create">New Request</a>
      @foreach ($orgRequests as $org)
    <tr>
      <td>{{$org->id}}</td>
      <td>{{$org->title}}</td>
      <td>{{ str_limit($org->description, 80)}}</td>
      <td></td>
      <td></td>
    </tr>
  @endforeach
    </table>
  </div>
@stop
