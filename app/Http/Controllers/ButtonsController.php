<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buttons as ButtonsModel;
use Illuminate\Support\Str;

class ButtonsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $buttons = ButtonsModel::OrderBy('id','DESC')->get();
        return view('dashboard-admin.button.index',compact('buttons'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard-admin.button.create');
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
            'name'  => 'required|min:3'
        ]);

        $name = Str::slug($request->name);

        ButtonsModel::create([
            'name'  => $name
        ]);
        return redirect()->route('buttons.index')->with('success','Button Was Added');
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
        $button = ButtonsModel::find($id);
        if ($button == null) {
            return redirect('/buttons')->with('danger','Button Not Found');
        }else {
            return view('dashboard-admin.button.edit',compact('button'));
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
            'name'  => 'required|min:3'
        ]);

        $name = Str::slug($request->name);

        ButtonsModel::where('id',$id)->update([
            'name'  => $name
        ]);
        return redirect()->route('buttons.index')->with('success','Button Was Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $button = ButtonsModel::find($id);
        $button->delete();
        return redirect()->route('buttons.index')->with('deleted','Button Was Deleted');

    }
}
