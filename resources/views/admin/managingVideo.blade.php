@extends('layouts.dashboard')
@section('content')

<script type="text/javascript">
      $(window).on('load',function(){
        $('#myModal').modal('show');
      });
    </script>

<!-- Popup for video -->
    <!-- @if(session('videoplayer')) -->
    <!-- modal content -->
    <div class="modal hide fade" id="myModal">
      <div class="modal-header">
      <a class="close" data-dismiss="modal">×</a>
      <h3>Modal header</h3>
      </div>
      <div class="modal-body">
        <p>One fine body…</p>
      </div>
      <div class="modal-footer">
        <a href="#" class="btn">Close</a>
        <a href="#" class="btn btn-primary">Save changes</a>
      </div>
    </div>
    <!-- @endif -->


  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Video Table</h6>
    </div>
    
  <div class="card-body">
          @if($video->isEmpty())
          <div class="justify-content-center">
          <h1>No Videos at the moment</h1>
          </div>
          @else
            <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>Sr.No</th>
                <th>Uploaded By</th>
                <th>Title</th>
                <th>Video</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tfoot>
              <tr>
                <th>Sr.No</th>
                <th>Uploaded By</th>
                <th>Title</th>
                <th>Video</th>
                <th>Actions</th>
              </tr>
            </tfoot>
            <tbody>
                @foreach($video as $vids)
                <tr>
                <td scope="row">{{$vids->id}}</td>

                @if($vids->uploaded_by_admin == 0)
                <td>{{ App\Customer::find($vids->uploaded_by)->name }}</td>
                @else
                <td>{{ App\User::find($vids->uploaded_by)->name }}</td>
                @endif

                <td>{{$vids->title}}</td>
                
                <td class = "w-25">
                <!-- <div class="d-sm-flex"> -->
                <a class="" href="{{ route('admin.ShowVideo',$vids->id) }}">
                <img src="{{asset('streaming_path/thumbNail/').'/'.$vids->thumbnails}}" class="img-thumbnail img-fluid" alt="video">
                </a>
                <!-- </div> -->
                </td>

                <td><a class="btn btn-success" href="#">Edit</a>  ||  <a class="btn btn-danger" href="#">Delete</a></td>
                </tr>
                @endforeach
            </tbody>
                
            </table>
              
              {{ $video->links() }}

              </div>

              </div>
              @endif
              </div>
            </div>
                {{csrf_field()}}
@endsection