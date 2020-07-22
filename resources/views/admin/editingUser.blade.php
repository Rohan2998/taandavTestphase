@extends('layouts.dashboard')
@section('content')
<div class="col justify-content-center">

@if($user_customer->isEmpty())
@else
@foreach($user_customer as $cust)
<form action="{{ route('admin.editedUser',$cust->id) }}" method="post">
<label for="custName">Name</label>
<h5 name="custName" id="custName">{{ $cust->name }}</h5>

<label for="custContact">Contact</label>
<h5 name="custContact" id="custContact">{{ $cust->contact_no }}</h5>

<label for="custEmail">Contact</label>
<h5 name="custEmail" id="custEmail">{{ $cust->email }}</h5>

<div class="form-group">
    
    <input type="checkbox" name="showingSkills" id="showingSkills" value="1" 
     @if($cust->show_skills == 1) 
     checked
     @else
     @endif>
    <label for="showingSkills">Display Skills</label> &nbsp;

                    
    <input type="checkbox" name="showingContact" id="showingContact" value="1"
    @if($cust->show_contact == 1) 
     checked
     @else
     @endif>
    <label for="showingContact">Display Contact</label> &nbsp;
                    
</div>

<input type="submit" class="btn btn-primary" value="Update">

@endforeach
@endif
{{csrf_field()}}
</form>
</div>
    
            
@endsection