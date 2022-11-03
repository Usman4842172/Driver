<?php

namespace App\Http\Controllers;

use App\Models\Dustbin;
use App\Models\User;
use Illuminate\Http\Request;

class DustbinController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dustbins = Dustbin::all();
        return view ('dustbin.index',compact('dustbins'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $drivers = User::all();
        return view ('dustbin.create',compact('drivers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        Dustbin::create($data);
        return redirect()->route('dustbin.index')->with('success', 'Dustbin Added Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Dustbin  $dustbin
     * @return \Illuminate\Http\Response
     */
    public function show(Dustbin $dustbin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Dustbin  $dustbin
     * @return \Illuminate\Http\Response
     */
    public function edit(Dustbin $dustbin)
    {
//        $user=User::findOrFail($id);
        return view('dustbin.edit',compact('dustbin'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Dustbin  $dustbin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dustbin $dustbin)
    {
        $dustbin->update($request->all());
        return redirect()->route('dustbin.index')->with('success', 'Dustbin Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Dustbin  $dustbin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dustbin $dustbin)
    {
        $dustbin->delete();
        return redirect()->route('dustbin.index')->with('success', 'Dustbin Deleted Successfully!');
    }
}
