@extends('layouts.dashboard')

@section('content')
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    <div class="col justify-content-center">
                        <h3 class="text-center">
                            Add Admin
                        </h3>
                    <form method="post" action="{{ route('admin.addadm') }}">
                    <div class="form-group">
                        <label for="video-title">Enter Name</label>
                        <input type="text"
                            class="form-control"
                            name="name"
                            placeholder="Admin Name">
                        @if($errors->has('title'))
                            <span class="text-danger">
                        {{$errors->first('title')}}
                            </span>
                        @endif
                    </div>


                    <div class="form-group">
                        <label for="video-description">Enter Email</label>
                        <input type="text"
                            class="form-control"
                            name="email"
                            placeholder="Enter email">
                        @if($errors->has('title'))
                            <span class="text-danger">
                        {{$errors->first('title')}}
                            </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="video-link">Password</label>
                        <input type="password"
                            class="form-control"
                            name="password"
                            placeholder="Enter password">
                        @if($errors->has('title'))
                            <span class="text-danger">
                        {{$errors->first('title')}}
                            </span>
                        @endif
                    </div>
                    
                    <div class="form-group">
                        <label for="video-link">Retype password</label>
                        <input type="password"
                            class="form-control"
                            name="confirmpassword"
                            placeholder="retype password">
                        @if($errors->has('title'))
                            <span class="text-danger">
                        {{$errors->first('title')}}
                            </span>
                        @endif
                    </div>


                    <div class="col"><h4>Add Privileges</h4></div>
                    

                    <div class="form-group">

                    <input type="checkbox" name="addingadminpriv" id="addingadminpriv" value="1">
                    <label for="addingadminpriv">Adding Admin</label> &nbsp;
                    
                    <input type="checkbox" name="removingadminpriv" id="removingadminpriv" value="1">
                    <label for="removingadminpriv">Removing Admin</label> &nbsp;
                    
                    <input type="checkbox" name="uploadingfeedspriv" id="uploadingfeedspriv" value="1">
                    <label for="uploadingfeedspriv">Uploading Feeds</label> &nbsp;



                    <input type="checkbox" name="uploadingartpriv" id="uploadingartpriv" value="1">
                    <label for="uploadingartpriv">Uploading Art</label> &nbsp; 
                
                    
                    <input type="checkbox" name="approveadspriv" id="approveadspriv" value="1">
                    <label for="approveadspriv">Approve Ads</label> &nbsp; 
                    

                    <input type="checkbox" name="toggleuserinfopriv" id="toggleuserinfopriv" value="1">
                    <label for="toggleuserinfopriv">Editing User Info</label> &nbsp;


                    </div>


                    <div class="form-group">
                        <input type="submit" class="btn btn-success">
                    </div>
                {{csrf_field()}}
            </form>
@endsection