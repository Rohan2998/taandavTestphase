@extends('layouts.dashboard')

@section('content')
                    <div class="col justify-content-center">
                        <h3 class="text-center">
                            Upload Video
                        </h3>
                    <form method="post" action="{{ route('admin.feedupload') }}" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="video-title">Title</label>
                        <input type="text"
                            class="form-control"
                            name="title"
                            placeholder="Enter title">
                        @if($errors->has('title'))
                            <span class="text-danger">
                        {{$errors->first('title')}}
                            </span>
                        @endif
                    </div>


                    <div class="form-group">
                        <label for="video-description">Description</label>
                        <input type="text"
                            class="form-control"
                            name="description"
                            placeholder="Enter description">
                        @if($errors->has('title'))
                            <span class="text-danger">
                        {{$errors->first('title')}}
                            </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="video-link">Link</label>
                        <input type="text"
                            class="form-control"
                            name="link"
                            placeholder="Enter link">
                        @if($errors->has('title'))
                            <span class="text-danger">
                        {{$errors->first('title')}}
                            </span>
                        @endif
                    </div>
                    <div class="form-group">
                    OR
                    </div>
                    <div class="form-group">
                    <label for="exampleFormControlFile1">Image File</label>
                        <input type="file" name="file[]" id="file" class="form-control-file" multiple>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-success">
                    </div>
                {{csrf_field()}}
            </form>
@endsection