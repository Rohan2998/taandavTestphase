@extends('layouts.dashboard')

@section('content')
                    <div class="container-fluid">
                    @if($adforapproval->isEmpty())
                    @else
                    @foreach($adforapproval as $adapp)
                    <div class="row">
                        <label for="uploadedBy"><h4><strong>Uploaded By:</strong> </h4></label>
                        &nbsp; &nbsp;
                        <h4 id="uploadedBy" name="uploadedBy">{{ App\Customer::find($adapp->customer_id)->name }}</h4>
                    </div>

                    <div class="row">
                        <label for="adTitle"><h4><strong>Title:</strong> </h4></label>
                        &nbsp; &nbsp;
                        <h4 id="adTitle" name="adTitle">{{ $adapp->title }}</h4>
                    </div>

                    <div class="row">
                        <label for="adDescription"><h4><strong>Description:</strong> </h4></label>
                        &nbsp; &nbsp;
                        <h4 id="adDescription" name="adDescription">{{ $adapp->description }}</h4>
                    </div>

                    
                    <div class="row">
                    <!-- Video if exist -->
                    <div class="col">
                    @if($adapp->processed == 0)
                    @else
                    <label for="adVideo">Video:</label>
                    &nbsp; &nbsp;
                    <video id="adVideo" name="adVideo" src="{{ asset('streaming_path\stream7PruFFlPacahYY5C.mp4') }}" class="w-50" controls></video>
                    @endif
                    </div>

                    <div class="col">
                    @if($adapp->img_name == "")
                    @else
                    <label for="adImage">Image:</label>
                    &nbsp; &nbsp;
                    <image id="adImage" name="adImage" src="{{ asset('Custom_ads/').'/'.$adapp->img_name }}" class="w-50" ></image>
                    @endif
                    </div>
                    </div>


                    @if($adapp->link == "")
                    @else
                    <div class="row">
                        <label for="adLink"><h4><strong>Provided Link:</strong> </h4></label>
                        &nbsp; &nbsp;
                        <h4 id="adLink" name="adLink">{{ $adapp->link }}</h4>
                    </div>
                    @endif

                    <div class="row justify-content-center">
                    <a class="btn btn-success" href="{{ route('admin.ApprovingAds',$adapp->id) }}">Approve</a>
                    &nbsp; &nbsp; &nbsp;
                    <a class="btn btn-danger" href="{{ route('admin.DispprovingAds',$adapp->id) }}">Disapprove</a>
                    </div>
                {{csrf_field()}}

                </div> 
                    @endforeach
                    @endif
                
                
@endsection