@extends('layouts.dashboard')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Users Table</h6>
  </div>
  @if($customers->isEmpty())
    <h1>No Data at the moment</h1>
  @else
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Actions</th>
          </tr>
        </thead>
        <tfoot>
          <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Actions</th>
          </tr>
        </tfoot>
        <tbody>
        @foreach($customers as $cust)
                <tr>
                <td>{{$cust->id}}</td>
                <td>{{$cust->name}}</td>
                <td><a class="btn btn-success" href="{{ route('admin.EditUser',$cust->id) }}">Edit</a>  ||  <a class="btn btn-danger" href="{{ route('admin.DeletingUser',$cust->id) }}">Delete</a></td>
                </tr>
        @endforeach
        </tbody>
      </table>
      {{ $customers->links() }}
    </div>
  </div>
  @endif
</div>
</div>
<!-- /.container-fluid -->
{{csrf_field()}}
            
@endsection
