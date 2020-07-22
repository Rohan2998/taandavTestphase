@extends('layouts.dashboard')

@section('content')

                    
                    <div class="col justify-content-center">
                        <h3 class="text-center">
                            Reset Email
                        </h3>

                    @if(Session('status'))
                    <div class="alert-succes">{{ Session('status') }}</div>
                    @endif
                    <form method="post" action="{{ route('admin.SubmitChangeEmailPage') }}">


                    <div class="row">
                    <label for="newemail"> <strong>New Email:</strong></label>
                    <input type="email" name="newemail" id="newemail">
                    </div>

                    <div class="row">
                    <label for="currentpass"> <strong>Password:</strong></label>
                    <input type="password" name="currentpass" id="currentpass">
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Reset Password</button>

                {{csrf_field()}}
            </form>

            @if(Session('error'))
                    <div class="alert-danger">{{ Session('error') }}</div>
            @endif
            </div>
@endsection