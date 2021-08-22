<?php

namespace App\Http\Controllers;
use App\Models\Roles;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Roles::OrderBy('id','DESC')->get();
        return view('dashboard-admin.role.index',compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard-admin.role.create');
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
            'role'  => 'required|max:20|string'
        ]);
        $name = Str::slug($request->role);
        Roles::create([
            'name'  => $name
        ]);

        return redirect()->route('role.index')->with('success','Role Was Added');
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
        $role = Roles::findorFail($id);
        return view('dashboard-admin.role.edit',compact('role'));
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
            'role'  => 'required|max:20|string'
        ]);
        $name = Str::slug($request->role);
        Roles::where('id',$id)->update([
            'name'  => $name
        ]);

        return redirect()->route('role.index')->with('success','Role Was Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $role = Roles::findorFail($id);
        $role->delete();

        return redirect()->route('role.index')->with('success','Role Was Deleted');
    }
}
