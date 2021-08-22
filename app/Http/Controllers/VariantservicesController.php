<?php

namespace App\Http\Controllers;
use App\Models\Variantservices;
use Illuminate\Http\Request;

class VariantservicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $variants = Variantservices::OrderBy('id','DESC')->get();
        return view('dashboard-admin.variant.index',compact('variants'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard-admin.variant.create');
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
            'variant'  => 'required|max:100',
        ]);

        Variantservices::create([
            'variant_service'  => $request->variant,
        ]);
        return redirect()->route('variant.index')->with('success','Variant Service Was Added');
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
        $variant = Variantservices::findorFail($id);
        return view('dashboard-admin.variant.edit',compact('variant'));
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
            'variant'  => 'required|max:100',
        ]);

        Variantservices::where('id',$id)->update([
            'variant_service'  => $request->variant,
        ]);
        return redirect()->route('variant.index')->with('success','Variant Service Was Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $variant = Variantservices::findorfail($id);
        $variant->delete();
        return redirect()->route('variant.index')->with('success','Variant Service Was Deleted');

    }
}
