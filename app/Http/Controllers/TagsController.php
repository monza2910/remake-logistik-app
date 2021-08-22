<?php

namespace App\Http\Controllers;

use App\Models\Tags as TagsModel;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TagsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = TagsModel::OrderBy('id','DESC')->get();
        return view('dashboard-admin.tags.index',compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard-admin.tags.create');
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
            'name'  => 'required|max:50|min:3'
        ]);

        $slug = Str::slug($request->name);


        TagsModel::create([
            'name'  => $request->name,
            'slug'  => $slug
        ]);
        return redirect('/tags')->with('success','Tag Wa Added');
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
        
        $tag = TagsModel::find($id);
        if ($tag == null) {
            return redirect('/tags')->with('danger','Tag Not Found');
        }else {
            return view('dashboard-admin.tags.edit',compact('tag'));
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
            'name'  => 'required|min:3|max:50'
        ]);

        $slug = Str::slug($request->name);


        TagsModel::where('id',$id)->update([
            'name'  => $request->name, 
            'slug'  => $slug
        ]);
        return redirect('/tags')->with('success','Tag Was Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tag = TagsModel::find($id);
        $tag->delete();
        return redirect('/tags')->with('deleted','Tags Was Deleted');
    }
}
