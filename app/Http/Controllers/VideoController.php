<?php

namespace App\Http\Controllers;

use App\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Artisan;
use App\Jobs\CompressUploadedVideo;
use FFMpeg\Filters\Video\VideoFilters;
use FFMpeg;
use Illuminate\Support\Facades\Auth;

class VideoController extends Controller
{
    public function index()
    {
        //$videos = Video::orderBy('created_at', 'DESC')->get();
        //->with('videos', $videos);
        if(Auth::check()){
            return view('admin.uploader');
        }
        else {
            return view('auth.login');
        }
        
    }
 
 
    /**
     * Handles form submission after uploader form submits
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    
    public function store(Request $request)
    {
        set_time_limit(0);
        $title = $request->title;
        $videoFile = $request->file('file');

        foreach($videoFile as $videoOf){
            $path = Str::random(16) . '.' . $videoOf->getClientOriginalExtension();
            $videoOf->move('original_path',$path);
            $video = Video::create([
                'uploaded_by'   => Auth::user()->id,
                'disk'          => 'original_path',
                'original_name' => $videoOf->getClientOriginalName(),
                'path'          => $path,
                'title'         => $title,
            ]);
            
            $uploadedVideo = true;
    
            CompressUploadedVideo::dispatchIf($uploadedVideo === true, $video);
        }
        
        
        if (Auth::check()) {
            return redirect()->route('admin.uploader');
        }
        else{
            return redirect()->route('adminLogin');
        }
        
    }

    
}
