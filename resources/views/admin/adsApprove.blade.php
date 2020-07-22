@extends('layouts.dashboard')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Data Table -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Ads for approval</h6>
  </div>
  @if($ads->isEmpty())
    <h1>No Data at the moment</h1>
  @else
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
          <th>ID</th>
          <th>Title</th>
          <th>Description</th>
          <th>Uploaded By</th>
          <th>Actions</th>
          </tr>
        </thead>
        <tfoot>
          <tr>
          <th>ID</th>
          <th>Title</th>
          <th>Description</th>
          <th>Uploaded By</th>
          <th>Actions</th>
          </tr>
        </tfoot>
        <tbody>
        @foreach($ads as $ad)
                <tr>
                <td>{{$ad->id}}</td>
                <td>{{$ad->title}}</td>
                <td>{{$ad->description}}</td>
                <td>{{ App\Customer::find($ad->customer_id)->name }}</td>
                <td><a class="btn btn-success" href="{{ route('admin.ApproveAds', $ad->id) }}">View</a>  ||  <a class="btn btn-danger" href="{{ route('admin.DispprovingAds',$ad->id) }}">Disapprove</a></td>
                </tr>
        @endforeach
        </tbody>
      </table>
    </div>
  </div>
  @endif
</div>
</div>
<!-- /.container-fluid -->
{{csrf_field()}}
            
@endsection

