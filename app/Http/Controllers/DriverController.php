<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DriverController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->role == 'admin') {
            $drivers = User::all();
            return view('driver.index',compact('drivers'));
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::user()->role == 'admin') {
            return view('driver.create');
        }
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
        $data['role'] = 'driver';
        $data['password'] = bcrypt($request->password);
//        $fileName = time() . '.' . $request->image->extension();
//        $request->image->move(public_path('images'), $fileName);
//        $data['image'] = $fileName;
        User::create($data);
        return redirect()->route('driver.index')->with('success', 'Driver Added Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $drivers = User::find($id);
        return view ('assignedustbin.index',compact('drivers'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(Auth::user()->role == 'admin') {
            $user = User::findOrFail($id);
            return view('driver.edit', compact('user'));
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
//        if ($request->hasFile('image')) {
//            $fileName = time() . '.' . $request->image->extension();
//            $request->image->move(public_path('images'), $fileName);
//            $data['image'] = $fileName;
//        }

        $user = User::findOrFail($id);
        $user->update($request->all());
        return redirect()->route('driver.index')->with('success', 'Driver Updated Successfully!');



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('driver.index')->with('success', 'Driver Deleted Successfully!');
    }
}
