<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

use App\User;
use App\ModulePermission;

class AddRemoveAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add()
    {
        if(Auth::check()){
            return view('admin.addAdmin');
        }
        else {
            return redirect()->route('adminLogin');
        }
    }

        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function remove()
    {
        if(Auth::check()){
            $moduleAdmins = ModulePermission::Paginate(5);
            return view('admin.removeAdmin',compact('moduleAdmins'));
        }
        else {
            return redirect()->route('adminLogin');
        }
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function showAdmin(Request $request)
    {
        $name  =  $request->searchbar;
        $UserID  =  User::where('name', 'like', '%'.$name.'%')->get();
        //$get_permissions = ModulePermission::where('user_id', 'in', [$UserID->id])->get();
        
        if(Auth::check()){
            $moduleAdmins = ModulePermission::Paginate(5);
            return redirect()->back()->with('getresults',$UserID);
        }
        else {
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
        $name               =   $request->name;
        $email              =   $request->email;
        $password           =   $request->password;
        $confirmpassword    =   $request->confirmpassword;
        $modulepermit       =   $request->privileges;


        
        $user = User::create([
            'name'          =>  $name,
            'email'         =>  $email,
            'password'      =>  Hash::make($password),
        ]);

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

        if($request->managingvideo){
            $managevid = 1;
        }

        

        $permission = ModulePermission::create([
            'user_id'               =>  $user->id,
            'add_admin'             =>  $addadmin,
            'remove_admin'          =>  $remadmin,
            'upload_feed'           =>  $upfeed,
            'upload_art'            =>  $upart,
            'approve_ads'           =>  $appads,
            'manage_video'          =>  $managevid,
            'toggle_user_info'      =>  $togguser
        ]);

        if (Auth::check()) {
            return redirect()->route('admin.addAdmin');
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
        DB::table('users')->where('id',$id)->delete();
        DB::table('module_permissions')->where('user_id',$id)->delete();

        if(Auth::check()){
            $moduleAdmins = ModulePermission::Paginate(5);
            return view('admin.removeAdmin',compact('moduleAdmins'));
        }
        else {
            return redirect()->route('adminLogin');
        }
        
    }
}
