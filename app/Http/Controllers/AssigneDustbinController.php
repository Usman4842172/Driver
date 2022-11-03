<?php

namespace App\Http\Controllers;

use App\Models\Dustbin;
use App\Models\User;
use Illuminate\Http\Request;

class AssigneDustbinController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $drivers = User::all();
        $dustbins = Dustbin::all();
        return view ('assignedustbin.create',compact('drivers','dustbins'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $drivers = User::find($request->user_id);
        if($request->has('status')){
            $drivers->dustbins()->sync([$request->dustbin_id=>['status'=>$request->status]],false);
            return redirect()->back()->with('success', 'Status Updated  Successfully!');
        }else{
            $drivers->dustbins()->sync($request->dustbin_id);
            return redirect()->back()->with('success', 'Dustbin Assigend  Successfully!');
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

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteUserDustbin($dustbin,$user_id)
    {
        $dustbin = Dustbin::find($dustbin);
        $dustbin->users()->detach($user_id);

        return redirect()->back()->with('success', 'Dustbin Revoked From Driver Successfully!');
    }


}
