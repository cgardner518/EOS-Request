@extends('Labcoat::layouts/standard')
@section('page-title')

    Organizational Change Request
/ New Request
@endsection
@section('tab-menu')
  @include('Labcoat::partials/tabs')
@endsection
@section('main-content')
  <div class="indent-padding width-limited-1200">

    <h3>Personnel Realignment and Reassignment</h3>
    <p>Laboris eu eiusmod magna laborum nostrud anim excepteur labore exercitation aute.Cupidatat laborum amet in aute reprehenderit veniam culpa do ea et minim pariatur consectetur deserunt.Irure ullamco aliquip nostrud elit aute nulla in ullamco esse dolore sunt.</p>

    {{-- @if(empty($personnel))
      <p><em>Currently no personnel realignments or reassignments</em></p>
    @else --}}
      <table>
        <thead>
          <th></th>
          <th>Name</th>
          <th>From</th>
          <th>To</th>
          <th>Position Title</th>
          <th>Series</th>
          <th>Track</th>
          <th>Level</th>
          <th>Action</th>
          <th></th>
        </thead>
        {{-- @foreach ($personnel as $person) --}}
          <tr>
            <td class="personnel_table_td"><i class="fa fa-pencil" style="text-decoration:none;" data-modal-url=""></td>
            <td>Betty White</td>
            <td>9989</td>
            <td>9990</td>
            <td>Engineer</td>
            <td>XXX</td>
            <td>NP</td>
            <td>IV</td>
            <td>Realignment</td>
            <td class="personnel_table_td"><a class="fa fa-fw fa-trash" style="text-decoration: none;"  data-delete-url=""></a></td>
          </tr>
          <tr>
            <td class="personnel_table_td"><i class="fa fa-pencil" style="text-decoration:none;" data-modal-url=""></td>
            <td>Wendy Bite</td>
            <td>9800</td>
            <td>9090</td>
            <td>Branch Head</td>
            <td>XXX</td>
            <td>NP</td>
            <td>IV</td>
            <td>Reassignment</td>
            <td class="personnel_table_td"><a class="fa fa-fw fa-trash" style="text-decoration: none;"  data-delete-url=""></a></td>
          </tr>
        {{-- @endforeach --}}
      </table>
    {{-- @endif --}}
    <button type="button" data-modal-url="{{ URL::route('personnel', ['id' => $id ]) }}" data-modal-id="personnel-{{ $id }}" class="btn btn-primary btn-gradient">Add Personnel</button>
  </div>
@stop
