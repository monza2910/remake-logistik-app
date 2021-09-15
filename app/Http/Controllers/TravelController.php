<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Facilitys;
use App\Models\Travel;
use App\Models\Origins;
use App\Models\Destinations;


class TravelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $travels = Travel::orderBy('id','DESC')->get();
        return view('dashboard-admin.travel.index',compact('travels'));
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
        return view('dashboard-admin.travel.create',compact('facilitys','origins','destinations'));
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
     
        $request->thumbnail->move(public_path('images/travels'), $imageName);
            $travels = Travel::create([
                'name'              => $request->name,
                'variant'           => $request->variant,
                'origin_id'         => $request->origin_id,
                'destination_id'    => $request->destination_id,
                'price'             => $request->price,
                'thumbnail'         => $imageName,
                'content'           => $request->content,
            ]);
            $travels->facilitys()->attach($request->facilitys);

            return redirect()->route('travel.index')->with('success','You have successfully added travel.');

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
        $travel = Travel::findorFail($id);
        $origins = Origins::where('id','!=',$travel['origin_id'])->get();
        $destinations = Destinations::where('id','!=',$travel['destination_id'])->get();
        $facilitys = Facilitys::orderBy('id','asc')->get();
        // dd($origins);
        return view('dashboard-admin.travel.edit',compact('travel','origins','destinations','facilitys'));

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
         
            $request->thumbnail->move(public_path('images/travels'), $imageName);
      
            $travel    = Travel::findorFail($id);
            $travels = [
                    'name'              => $request->name,
                    'variant'           => $request->variant,
                    'origin_id'         => $request->origin_id,
                    'destination_id'    => $request->destination_id,
                    'price'             => $request->price,
                    'thumbnail'         => $imageName,
                    'content'           => $request->content,
            ];
            $travel->tags()->sync($request->tags);
            $travel->update($travels);
            return redirect()->route('travel.index')->with('success','You have successfully updated travel.');

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
      
            $travel    = Travel::findorFail($id);
            $travels = [
                    'name'              => $request->name,
                    'variant'           => $request->variant,
                    'origin_id'         => $request->origin_id,
                    'destination_id'    => $request->destination_id,
                    'price'             => $request->price,
                    'content'           => $request->content,
            ];
            $travel->facilitys()->sync($request->facilitys);
            $travel->update($travels);
            return redirect()->route('travel.index')->with('success','You have successfully updated travel.');

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
        $travel = Travel::findorFail($id);
        $travel->delete();
        return redirect()->route('travel.index')->with('success','travel Was Deleted');

    }
    
    public function showTrash()
    {
        $travels = Travel::onlyTrashed()->get();
        return view('dashboard-admin.travel.trash',compact('travels'));
    }
    
    public function restore($id)
    {
        $travel = Travel::withTrashed()->where('id',$id)->first();
        $travel->restore();
        return redirect()->back()->with('success','travel Was Restored !!');
        
    }
    
    public function kill($id)
    {
        $travel = Travel::withTrashed()->where('id',$id)->first();
        $travel->forceDelete();
        return redirect()->back()->with('success','travel Was Deleted');
    
    }

    public function upload(Request $request){
        if ($request->hasFile('upload')) {
            $originName     = $request->file('upload')->getClientOriginalName();
            $fileName       = pathinfo($originName,PATHINFO_FILENAME);
            $extension     = $request->file('upload')->getClientOriginalExtension();
            $fileName       = $fileName.'_'.time().'.'.$extension;

            $request->file('upload')->move(public_path('images/travels'),$fileName);
            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('images/travels/'.$fileName);
            $msg = 'Image upload susccesfuly';
            $response = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum,'$url','$msg')</script>";

            @header('Content-type : text/html; charset-utf-8;');
            echo $response;

        }
    }
}
