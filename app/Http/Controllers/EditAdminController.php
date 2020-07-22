<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use App\User;
use App\ModulePermission;


class EditAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $adminname = User::where('id',$id)->get();
        $permission = ModulePermission::where('user_id',$id)->get();
        if(Auth::check()){
            return view('admin.editAdm', compact('adminname','permission'));
        }
        else {
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
        $addadmin = $remadmin = $upfeed = $upart = $appads = $togguser = $managevid = 0;

           
        if($request->addingadminpriv){
            $addadmin = 1;
        }

        if($request->removingadminpriv){
            $remadmin = 1;
        }

        if($request->uploadingfeedspriv){
            $upfeed = 1;
        }

        if($request->uploadingartpriv){
            $upart = 1;
        }

        if($request->approveadspriv){
            $appads = 1;
        }

        if($request->toggleuserinfopriv){
            $togguser = 1;
        }

        if($request->managingvideopriv){
            $managevid = 1;
        }

        $Admin = ModulePermission::where('user_id',$id);
        $Admin->update([
                'add_admin'             =>  $addadmin,
                'remove_admin'          =>  $remadmin,
                'upload_feed'           =>  $upfeed,
                'upload_art'            =>  $upart,
                'approve_ads'           =>  $appads,
                'manage_video'          =>  $managevid,
                'toggle_user_info'      =>  $togguser
        ]);
        
        if(Auth::check()){
            $moduleAdmins = ModulePermission::Paginate(5);
            return view('admin.removeAdmin',compact('moduleAdmins'));
        }
        else {
            return redirect()->route('adminLogin');
        }
        
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
