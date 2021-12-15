<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\GeneralSetting;

class GeneralSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $generals = GeneralSetting::orderBy('id','DESC')->get();
        return view('dashboard-admin.setting.generalsetting.index',compact('generals'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        if ($id == 'about_us') {
            $request->validate([
                'content' => 'required',
            ]);
            GeneralSetting::where('page_name',$id)->update([
                'content' => $request->content,
            ]);
    
            return redirect()->back()->with('success','Content updated successfully');
        }elseif($id == 'main_address'){
            $request->validate([
                'content' => 'required',
            ]);
            GeneralSetting::where('page_name',$id)->update([
                'content' => $request->content,
            ]);
    
            return redirect()->back()->with('success','Address updated successfully');
        }elseif($id == 'logo'){
            $request->validate([
                'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            $image = time().'.'.$request->image->extension();  
            $imageName = md5($image).'.'.$request->image->extension();
    
            $request->image->move(public_path('assets/logo'), $imageName);
            GeneralSetting::where('page_name',$id)->update([
                'image' => $imageName,
            ]);
    
            return redirect()->back()->with('success','Logo updated successfully');
        }else{
            return redirect()->back()->with('deleted','I Dont Know What Do You Think!!');
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
        //
    }
}
