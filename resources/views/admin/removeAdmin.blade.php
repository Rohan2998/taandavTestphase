@extends('layouts.dashboard')

@section('content')
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    <div class="col justify-content-center">
                    <form method="post" action="{{ route('admin.remadm') }}">
                        <input type="search" name="searchbar" id="searchbar" placeholder="search name..">
                        <input type="submit" value="search" name="searchadmin">
                        <br></br>
                        @if(session('getresults'))
                        <table class="table">
                        <thead>
                        <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach(session('getresults') as $getresult)
                        <tr>
                        <td>{{ $getresult->id }}</td>
                        <td>{{ $getresult->name }}</td>
                        <td><a href="#" class="btn btn-success">Edit</a> || 
                        <a href="#" class="btn btn-danger">Delete</a></td>
                        </tr>
                        @endforeach
                        </tbody>
                        </table>
                        @else
                        <table class="table">
                        <thead>
                        <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if($moduleAdmins->isEmpty())
                        @else
                        @foreach($moduleAdmins as $admins)
                        <tr>
                        <td>{{ $admins->id }}</td>
                        <td>{{ App\User::find($admins->user_id)->name }}</td>
                        <td><a href="#" class="btn btn-success">Edit</a> || 
                        <a href="#" class="btn btn-danger">Delete</a></td>
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