<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Feed;

class FeedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::check()){
            return view('admin.feeds');
        }
        else {
            return view('auth.login');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        set_time_limit(0);
        $title = $request->title;
        $description = $request->description;
        $link = $request->link;
        $FeedFiles = $request->file('file');

        if(empty($FeedFiles)){

            //foreach($FeedFiles as $FeedFile){
                //$path = Str::random(16) . '.' . $FeedFile->getClientOriginalExtension();
                //$FeedFile->move('art_img',$path);
                $admin_id = Auth::check() ? Auth::user()->id : "1";
                $feed = Feed::create([
                    'uploaded_by'   => $admin_id,
                    'link'          => $link,
                    'title'         => $title,
                    'description'   => $description
                ]);
            //}    
        }
        else
        {

            foreach($FeedFiles as $FeedFile){
                $path = Str::random(16) . '.' . $FeedFile->getClientOriginalExtension();
                $FeedFile->move('admin_feed',$path);
                $admin_id = Auth::check() ? Auth::user()->id : "1";
                $feed = Feed::create([
                    'uploaded_by'   => $admin_id,
                    'title'         => $title,
                    'description'   => $description,
                    'link'          => $link,
                    'img_name'      => $path
                ]);
            }
        }
        
        if (Auth::check()) {
            return redirect()->route('admin.feeder');
        }
        else{
            return redirect()->route('adminLogin');
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
