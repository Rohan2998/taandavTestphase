<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Customer;

class ToggleUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Customer::paginate(10);
        if (Auth::check()) {
            return view('admin.toggleUser',compact('customers'));
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
        $user_customer = DB::table('customers')->where('id',$id)->get();
        if (Auth::check()) {
            return view('admin.editingUser',compact('user_customer'));
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
        $showContact = $showSkills = 0;

        if($request->showingSkills){
            $showSkills = 1;
        }

        if($request->showingContact){
            $showContact = 1;
        }

        $Cust = Customer::where('id',$id);
        $Cust->update([
                'show_skills'           =>  $showSkills,
                'show_contact'          =>  $showContact,
        ]);
        
        if(Auth::check()){
            $customers = Customer::paginate(10);
            return view('admin.toggleUser',compact('customers'));
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
        DB::table('customers')->where('id',$id)->delete();
        DB::table('skills')->where('customer_id',$id)->delete();
        
        if(Auth::check()){
            $customers = Customer::paginate(10);
            return view('admin.toggleUser',compact('customers'));
        }
        else {
            return redirect()->route('adminLogin');
        }
    }
}
