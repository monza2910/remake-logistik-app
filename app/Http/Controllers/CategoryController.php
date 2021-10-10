<?php

namespace App\Http\Controllers;
use App\Models\Category as CategoryModel;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
        */
    public function index()
    {
        $categorys = CategoryModel::OrderBy('id','DESC')->get(); 
        return view('dashboard-admin.category.index',compact('categorys'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard-admin.category.create');
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
            'name'  => 'required|min:3|max:50'
        ]);

        $slug = Str::slug($request->name);


        CategoryModel::create([
            'name'  => $request->name,
            'slug'  => $slug
        ]);
        return redirect()->route('category.index')->with('success','Categroy Wa Added');
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
        $category = CategoryModel::findorfail($id);
        if ($category == null) {
            return redirect()->route('category.index')->with('danger','Category Not Found');
        }else {
            return view('dashboard-admin.category.edit',compact('category'));
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
            'name'  => 'required'
        ]);

        $slug = Str::slug($request->name);


        CategoryModel::where('id',$id)->update([
            'name'  => $request->name, 
            'slug'  => $slug
        ]);
        return redirect()->route('category.index')->with('success','Categroy Was Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = CategoryModel::find($id);
        $category->delete();
        return redirect()->route('category.index')->with('deleted','Category Was Deleted');
    }
}
