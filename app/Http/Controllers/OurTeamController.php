<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ourteam;
use Illuminate\Support\Facades\File; 


class OurTeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teams = Ourteam::OrderBy('id','DESC')->get();
        return view('dashboard-admin.team.index',compact('teams'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard-admin.team.create');
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
            'name' => 'required|min:2|max:50',
            'position' => 'required|min:2|max:50',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5096',
            
        ]);
     
        // $request->image->move(public_path('images/team'), $imageName);
        $img        = \Image::make($request->image)->encode('jpg');  
        $imageName  = time().md5($img->__toString());
        $path       = 'images/team/'.$imageName.'.jpg';
        $uploadName = '/'.$path;
        $img->save(public_path($path),10);
        Ourteam::create([
            'name'  => $request->name,
            'jabatan'  => $request->position,
            'image'  => $uploadName,
        ]);

        return redirect()->route('team.index')->with('success','You have successfully added team.');

    
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
        $team = Ourteam::findorFail($id);
        return view('dashboard-admin.team.edit',compact('team'));
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
        $team   = Ourteam::find($id);
        if ($request->image != null ) {
            $request->validate([
                'name' => 'required|min:2|max:50',
                'position' => 'required|min:2|max:50',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5096',
                
            ]);
            $img        = \Image::make($request->image)->encode('jpg');  
            $imageName  = time().md5($img->__toString());
            $path       = 'images/team/'.$imageName.'.jpg';
            $uploadName = '/'.$path;
            $img->save(public_path($path),10);

            if(File::exists($team->image)) {
                File::delete($team->image);
            }
            Ourteam::where('id',$id)->update([
                'name'  => $request->name,
                'jabatan'  => $request->position,
                'image'  => $uploadName,
            ]);
    
            return redirect()->route('team.index')->with('success','You have successfully updated team.');
        } else {
            $request->validate([
                'name' => 'required|min:2|max:50',
                'position' => 'required|min:2|max:50',
                
            ]);
                
            Ourteam::where('id',$id)->update([
                'name'  => $request->name,
                'jabatan'  => $request->position,
            ]);
    
            return redirect()->route('team.index')->with('success','You have successfully updated team.');
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
        $team = Ourteam::findorFail($id);
        if(File::exists($team->image)) {
            File::delete($team->image);
        }
        $team->delete();

        return redirect()->route('team.index')->with('success','You have successfully deleted team.');
    }
}
