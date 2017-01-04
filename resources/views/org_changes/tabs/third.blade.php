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
    <h3>Updated Mission Statements</h3>
    <p>Veniam culpa mollit amet officia dolor ipsum esse qui sint officia nisi eiusmod sint esse incididunt culpa eiusmod. Labore qui ut aute laborum laboris fugiat sunt magna consequat nulla sint adipisicing id.</p>



    <button type="button" data-modal-url="{{ URL::route('mission_statements', ['id' => $id ]) }}" data-modal-id="mission_statements-{{ $id }}" class="btn btn-primary btn-gradient">Add Mission Statement</button>

</div>


@stop
