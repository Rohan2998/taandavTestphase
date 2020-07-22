<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Advertisement;
class ApproveAdsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ads = DB::table('advertisements')->where(['approved' => 0, 'disapproved' => 0])->get();
        if (Auth::check()) {
            return view('admin.adsApprove',compact('ads'));
        }
        else{
            return redirect()->route('adminLogin');
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
        //
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
        $adforapproval = Advertisement::where('id',$id)->get();
        if (Auth::check()) {
            return view('admin.approvingAds',compact('adforapproval'));
        }
        else{
            return redirect()->route('adminLogin');
        }
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function approve($id)
    {
        $adforapproval = Advertisement::where('id',$id);
        $adforapproval->update([
            'approved'     => 1,
            'approved_at'  => Carbon::now()
        ]);

        $ads = DB::table('advertisements')->where(['approved' => 0, 'disapproved' => 0])->get();
        if (Auth::check()) {
            return view('admin.adsApprove',compact('ads'));
        }
        else{
            return redirect()->route('adminLogin');
        }
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function disapprove($id)
    {
        $adforapproval = Advertisement::where('id',$id);
        $adforapproval->update([
            'disapproved' => 1
        ]);
        
        $ads = DB::table('advertisements')->where(['approved' => 0, 'disapproved' => 0])->get();
        if (Auth::check()) {
            return view('admin.adsApprove',compact('ads'));
        }
        else{
            return redirect()->route('adminLogin');
        }
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
