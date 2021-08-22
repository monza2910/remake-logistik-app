<?php

namespace App\Http\Controllers;
use App\Models\Outlets;
use App\Models\Origins;
use Illuminate\Http\Request;

class OutletsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $outlets = Outlets::OrderBy('id','DESC')->get();
        return view('dashboard-admin.outlet.index',compact('outlets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $origins = Origins::all();
        return view('dashboard-admin.outlet.create',compact('origins'));
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
            'origin_id'  => 'required|integer|max:100',
            'address'  => 'required|max:255',
            'name'  => 'required|max:100',
        ]);

        Outlets::create([
            'origin_id'  => $request->origin_id,
            'address'  => $request->address,
            'name'  => $request->name,
        ]);
        return redirect()->route('outlet.index')->with('success','Outlet Service Was Added');
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
        $outlet = Outlets::find($id);
        if ($outlet == null) {

            return redirect('outlet')->with('danger',' Outlet Not Found');

        }else {
            $origin_id = $outlet['origin_id'];

            $origins = Origins::where('id','!=',$origin_id)->get();

            return view('dashboard-admin.outlet.edit',compact('outlet','origins'));
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
            'origin_id'  => 'required|integer|max:100',
            'address'  => 'required|max:255',
            'name'  => 'required|max:100',
        ]);

        Outlets::where('id',$id)->update([
            'origin_id'  => $request->origin_id,
            'address'  => $request->address,
            'name'  => $request->name,
        ]);
        return redirect()->route('outlet.index')->with('success','Outlet Service Was Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $outlet = Outlets::find($id);
        $outlet->delete();
        return redirect()->route('outlet.index')->with('success','Outlet Service Was Deleted');
    }
}
