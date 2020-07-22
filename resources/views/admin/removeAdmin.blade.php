@extends('layouts.dashboard')

@section('content')
                    
                    <div class="col justify-content-center">
                    <form method="post" action="{{ route('admin.remadm') }}">
                        <input type="search" name="searchbar" id="searchbar" placeholder="search name..">
                        <input type="submit" value="search" name="searchadmin">
                        <br></br>
                        @if(session('getresults'))
                        <!-- Data Table -->
                        <div class="card shadow mb-4">
                        <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Admins</h6>
                        </div>
                        <div class="card-body">
                        <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Action</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        @foreach(session('getresults') as $getresult)
                        <tr>
                        <td>{{ $getresult->id }}</td>
                        <td>{{ $getresult->name }}</td>
                        <td><a href="{{ route('admin.editAdmin',$getresult->id) }}" class="btn btn-success">Edit</a> || 
                        <a href="{{ route('admin.deletedAdmin',$getresult->id) }}" class="btn btn-danger">Delete</a></td>
                        </tr>
                        @endforeach
                        </tbody>
                        </table>
                        @else
                        <!-- Data Table -->
                        <div class="card shadow mb-4">
                        <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Admins Table</h6>
                        </div>
                        <div class="card-body">
                        <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Action</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        @if($moduleAdmins->isEmpty())
                        @else
                        @foreach($moduleAdmins as $admins)
                        <tr>
                        <td>{{ $admins->user_id }}</td>
                        <td>{{ App\User::find($admins->user_id)->name }}</td>
                        <td><a href="{{ route('admin.editAdmin',$admins->user_id) }}" class="btn btn-success">Edit</a> || 
                        <a href="{{ route('admin.deletedAdmin',$admins->user_id) }}" class="btn btn-danger">Delete</a></td>
                        </tr>
                        @endforeach
                        @endif
                        </tbody>
                        </table>
                        {{$moduleAdmins->links()}}
                        @endif
                {{csrf_field()}}
            </form>
            </div>
@endsection