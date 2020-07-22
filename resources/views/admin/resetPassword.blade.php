@extends('layouts.dashboard')

@section('content')

                    
                    <div class="col justify-content-center">
                        <h3 class="text-center">
                            Reset Password
                        </h3>

                    @if(Session('status'))
                    <div class="alert-succes">{{ Session('status') }}</div>
                    @endif
                    <form method="post" action="{{ route('admin.SubmitResetPage') }}">
                    
                    <div class="row">
                    <label for="currentpass"> <strong>Current Password:</strong></label>
                    <input type="password" name="currentpass" id="currentpass">
                    </div>

                    <div class="row">
                    <label for="newpass"> <strong>New Password:</strong></label>
                    <input type="password" name="newpass" id="newpass">
                    </div>

                    <div class="row">
                    <label for="repass"> <strong>Retype Password:</strong></label>
                    <input type="password" name="repass" id="repass">
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Reset Password</button>

                {{csrf_field()}}
            </form>

            @if(Session('error'))
                    <div class="alert-danger">{{ Session('error') }}</div>
            @endif
            </div>
@endsection