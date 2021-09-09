<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Galery;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gallerys = Galery::OrderBy('id','DESC')->get();
        return view('dashboard-admin.gallery.index',compact('gallerys'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard-admin.gallery.create');
        
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
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description' => 'required|min:3|max:200',
            'status' => 'integer',
        ]);
        $image = time().'.'.$request->image->extension();  
        $imageName = md5($image).'.'.$request->image->extension();
     
        $request->image->move(public_path('images/gallery'), $imageName);
        Galery::create([
            'description' => $request->description,
            'image'  => $imageName,
            'status'  => $request->status
        ]);
    
        return redirect()->route('gallery.index')->with('success','You have successfully added Photo.');
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
        $gallery    = Galery::findOrFail($id);
        return view('dashboard-admin.gallery.edit',compact('gallery'));
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
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status' => 'integer',
            'description' => 'required|min:3|max:200',

        ]);

        if ($request->image != "") {
           
            $image = time().'.'.$request->image->extension();  
            $imageName = md5($image).'.'.$request->image->extension();
    
            $request->image->move(public_path('images/gallery'), $imageName);
            Galery::where('id',$id)->update([
                'image'  => $imageName, 
                'description' => $request->description,
                'status'  => $request->status,
                
            ]);
        
            return redirect()->route('gallery.index')->with('success','You have successfully updated photo.');
        }elseif ($request->image == "") {

            Galery::where('id',$id)->update([
                'status'  => $request->status,
                'description' => $request->description,

            ]);
        
            return redirect()->route('gallery.index')->with('success','You have successfully updated photo.');
        }else{
            return redirect()->route('gallery.index')->with('danger','photo Cant updated.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $gallery = Galery::findorFail($id);
        $gallery->delete();

        return redirect()->route('gallery.index')->with('success','photo Was deleted.');

    }
}