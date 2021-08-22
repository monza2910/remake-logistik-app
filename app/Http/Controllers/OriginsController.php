<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Origins;

class OriginsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $origins = Origins::OrderBy('id','DESC')->get();
        return view('dashboard-admin.origin.index',compact('origins'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard-admin.origin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'province'  => 'required|regex:/[a-zA-Z]+/|min:3',
            'city'  => 'required|regex:/[a-zA-Z]+/|min:3',
            'subdistrict'  => 'required|regex:/[a-zA-Z]+/|min:3',
        ]);

        Origins::create([
            'province'  => $request->province,
            'city'  => $request->city,
            'subdistrict'  => $request->subdistrict,
        ]);
        return redirect()->route('origin.index')->with('success','Origin Was Added');
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
        $origin = Origins::find($id);
        if ($origin == null) {
            return redirect()->route('origin.index')->with('deleted','origin Not Found');
        }else {
            return view('dashboard-admin.origin.edit',compact('origin'));
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
        $request->validate([
            'province'  => 'required|regex:/[a-zA-Z]+/|min:3',
            'city'  => 'required|regex:/[a-zA-Z]+/|min:3',
            'subdistrict'  => 'required|regex:/[a-zA-Z]+/|min:3',
        ]);

        Origins::where('id',$id)->update([
            'province'  => $request->province,
            'city'  => $request->city,
            'subdistrict'  => $request->subdistrict,
        ]);
        return redirect()->route('origin.index')->with('success','Origin Was Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $origin = Origins::find($id);
        $origin->delete();
        return redirect()->route('origin.index')->with('success','Origin Was Deleted');
    }
}
