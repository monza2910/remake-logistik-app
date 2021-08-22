<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Destinations;
class DestinationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $destinations = Destinations::OrderBy('id','DESC')->get();
        return view('dashboard-admin.destination.index',compact('destinations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard-admin.destination.create');
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

        Destinations::create([
            'province'  => $request->province,
            'city'  => $request->city,
            'subdistrict'  => $request->subdistrict,
        ]);
        return redirect()->route('destination.index')->with('success','Destination Was Added');
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
        $destination = Destinations::find($id);
        if ($destination == null) {
            return redirect()->route('destination.index')->with('deleted','destination Not Found');
        }else {
            return view('dashboard-admin.destination.edit',compact('destination'));
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

        Destinations::where('id',$id)->update([
            'province'  => $request->province,
            'city'  => $request->city,
            'subdistrict'  => $request->subdistrict,
        ]);
        return redirect()->route('destination.index')->with('success','Destination Was Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $desti = Destinations::find($id);
        $desti->delete();
        return redirect()->route('destination.index')->with('success','Destination Was Deleted');

    }
}
