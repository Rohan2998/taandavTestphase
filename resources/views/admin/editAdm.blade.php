@extends('layouts.dashboard')
@section('content')
<div class="col justify-content-center">

@if($adminname->isEmpty())
@else
@foreach($adminname as $use)
@foreach($permission as $permit)
<form action="{{ route('admin.updatedAdmin',$use->id) }}" method="post">
<label for="adminName">Name</label>
<input type="text" name="adminName" id="adminName" value="{{ $use->name }}">

<div class="form-group">
    
    <input type="checkbox" name="addingadminpriv" id="addingadminpriv" value="1" 
     @if($permit->add_admin == 1) 
     checked
     @else
     @endif>
    <label for="addingadminpriv">Adding Admin</label> &nbsp;

                    
    <input type="checkbox" name="removingadminpriv" id="removingadminpriv" value="1"
    @if($permit->remove_admin == 1) 
     checked
     @else
     @endif>
    <label for="removingadminpriv">Removing Admin</label> &nbsp;
                    
    <input type="checkbox" name="uploadingfeedspriv" id="uploadingfeedspriv" value="1"
    @if($permit->upload_feed == 1) 
     checked
     @else
     @endif>
    <label for="uploadingfeedspriv">Uploading Feeds</label> &nbsp;


    <input type="checkbox" name="uploadingartpriv" id="uploadingartpriv" value="1"
    @if($permit->upload_art == 1) 
     checked
     @else
     @endif>
    <label for="uploadingartpriv">Uploading Art</label> &nbsp;

    <input type="checkbox" name="managingvideopriv" id="managingvideopriv" value="1"
    @if($permit->manage_video == 1) 
     checked
     @else
     @endif>
    <label for="managingvideopriv">Managing Video</label> &nbsp; 
                
                    
    <input type="checkbox" name="approveadspriv" id="approveadspriv" value="1"
    @if($permit->approve_ads == 1) 
     checked
     @else
     @endif>
    <label for="approveadspriv">Approve Ads</label> &nbsp; 
                    

    <input type="checkbox" name="toggleuserinfopriv" id="toggleuserinfopriv" value="1"
    @if($permit->toggle_user_info == 1) 
     checked
     @else
     @endif>
    <label for="toggleuserinfopriv">Editing User Info</label> &nbsp;


</div>

<input type="submit" class="btn btn-primary" value="Update">

@endforeach
@endforeach
@endif
{{csrf_field()}}
</form>
</div>
    
            
@endsection