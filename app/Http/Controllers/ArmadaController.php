<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Facilitys;
use App\Models\Armada;
use App\Models\Origins;
use App\Models\Destinations;
use Illuminate\Support\Str;


class ArmadaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $armadas = Armada::orderBy('id','DESC')->get();
        return view('dashboard-admin.armada.index',compact('armadas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $facilitys = Facilitys::orderBy('id','desc')->get();
        $origins = Origins::orderBy('id','desc')->get();
        $destinations = Destinations::orderBy('id','desc')->get();
        return view('dashboard-admin.armada.create',compact('facilitys','origins','destinations'));
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
            'name' => 'required|min:5|max:100',
            'variant' => 'required',
            'origin_id' => 'required',       
            'destination_id' => 'required',       
            'price' => 'required|numeric',       
            'thumbnail' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'content' => 'required',
            'facilitys' => 'required',
        ]);

        

        $image = time().'.'.$request->thumbnail->extension();  
        $imageName = md5($image).'.'.$request->thumbnail->extension();
        $slug = Str::slug($request->name.'-'.$request->variant.'-'.$request->price);


        
        $request->thumbnail->move(public_path('images/armadas'), $imageName);
            $armadas = Armada::create([
                'name'              => $request->name,
                'slug'              => $slug,
                'variant'           => $request->variant,
                'origin_id'         => $request->origin_id,
                'destination_id'    => $request->destination_id,
                'price'             => $request->price,
                'thumbnail'         => $imageName,
                'content'           => $request->content,
            ]);
            $armadas->facilitys()->attach($request->facilitys);

            return redirect()->route('armada.index')->with('success','You have successfully added Armada.');

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
        $armada = Armada::findorFail($id);
        $origins = Origins::where('id','!=',$armada['origin_id'])->get();
        $destinations = Destinations::where('id','!=',$armada['destination_id'])->get();
        $facilitys = Facilitys::orderBy('id','asc')->get();
        // dd($origins);
        return view('dashboard-admin.armada.edit',compact('armada','origins','destinations','facilitys'));
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
        if ($request->thumbnail != null) {
            $request->validate([
                'name' => 'required|min:5|max:100',
                'variant' => 'required',
                'origin_id' => 'required',       
                'destination_id' => 'required',       
                'price' => 'required|numeric',       
                'content' => 'required',
                'facilitys' => 'required',
                'thumbnail' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    
            ]);
            $image = time().'.'.$request->thumbnail->extension();  
            $imageName = md5($image).'.'.$request->thumbnail->extension();
         
            $request->thumbnail->move(public_path('images/armadas'), $imageName);
            $slug = Str::slug($request->name.'-'.$request->variant.'-'.$request->price);
            
      
            $armada    = Armada::findorFail($id);
            $armadas = [
                    'name'              => $request->name,
                    'slug'              => $slug,
                    'variant'           => $request->variant,
                    'origin_id'         => $request->origin_id,
                    'destination_id'    => $request->destination_id,
                    'price'             => $request->price,
                    'thumbnail'         => $imageName,
                    'content'           => $request->content,
            ];
            $armada->tags()->sync($request->tags);
            $armada->update($armadas);
            return redirect()->route('armada.index')->with('success','You have successfully updated armada.');

        }else {
            $request->validate([
                'name' => 'required|min:5|max:100',
                'variant' => 'required',
                'origin_id' => 'required',       
                'destination_id' => 'required',       
                'price' => 'required|numeric',       
                'content' => 'required',
                'facilitys' => 'required',
    
            ]);
      
            $slug = Str::slug($request->name.'-'.$request->variant.'-'.$request->price);

            $armada    = Armada::findorFail($id);
            $armadas = [
                    'name'              => $request->name,
                    'slug'              => $slug,
                    'variant'           => $request->variant,
                    'origin_id'         => $request->origin_id,
                    'destination_id'    => $request->destination_id,
                    'price'             => $request->price,
                    'content'           => $request->content,
            ];
            $armada->facilitys()->sync($request->facilitys);
            $armada->update($armadas);
            return redirect()->route('armada.index')->with('success','You have successfully updated armada.');

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
        $armada = Armada::findorFail($id);
        $armada->delete();
        return redirect()->route('armada.index')->with('success','Armada Was Deleted');
    }

    public function upload(Request $request){
        if ($request->hasFile('upload')) {
            $originName     = $request->file('upload')->getClientOriginalName();
            $fileName       = pathinfo($originName,PATHINFO_FILENAME);
            $extension     = $request->file('upload')->getClientOriginalExtension();
            $fileName       = $fileName.'_'.time().'.'.$extension;

            $request->file('upload')->move(public_path('images/armadas'),$fileName);
            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('images/armadas/'.$fileName);
            $msg = 'Image upload susccesfuly';
            $response = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum,'$url','$msg')</script>";

            @header('Content-type : text/html; charset-utf-8;');
            echo $response;

        }
    }

    public function showTrash()
    {
        $armadas = Armada::onlyTrashed()->get();
        return view('dashboard-admin.armada.trash',compact('armadas'));
    }

    public function restore($id)
    {
        $armada = Armada::withTrashed()->where('id',$id)->first();
        $armada->restore();
        return redirect()->back()->with('success','Armada Was Restored !!');
        
    }
    
    public function kill($id)
    {
        $armada = Armada::withTrashed()->where('id',$id)->first();
        $armada->forceDelete();
        return redirect()->back()->with('success','Armada Was Deleted');
    
    }

}
