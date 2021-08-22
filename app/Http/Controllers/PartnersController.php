<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Partners;

class PartnersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $partners = Partners::OrderBy('id','DESC')->get();
        return view('dashboard-admin.partner.index',compact('partners'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard-admin.partner.create');
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
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            
        ]);
        $image = time().'.'.$request->image->extension();  
        $imageName = md5($image).'.'.$request->image->extension();
     
        $request->image->move(public_path('partners'), $imageName);

        if ($request->website != null) {
            
            Partners::create([
                'name'  => $request->name,
                'website'  => $request->website,
                'image'  => $imageName,
            ]);

            return redirect()->route('partner.index')->with('success','You have successfully added partner.');
        }else{

            Partners::create([
                'name'  => $request->name,
                'website'  => '#',
                'image'  => $imageName,
            ]);

            return redirect()->route('partner.index')->with('success','You have successfully added partner.');

        }
    
        
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
        $partner = Partners::find($id);
        if ($partner == null) {
            return redirect('/partner')->with('danger','Partner Not Found');
        }else {
            return view('dashboard-admin.partner.edit',compact('partner'));
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
            'name' => 'required|min:2|max:50',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            
        ]);
        
        if ($request->image != null) {

            $image = time().'.'.$request->image->extension();  
            $imageName = md5($image).'.'.$request->image->extension();
     
            $request->image->move(public_path('partners'), $imageName);

            if ($request->website != null) {
                
                Partners::where('id',$id)->update([
                    'name'  => $request->name,
                    'website'  => $request->website,
                    'image'  => $imageName,
                ]);
                
                return redirect()->route('partner.index')->with('success','You have successfully updated partner.');
            }else{
                
                Partners::where('id',$id)->update([
                    'name'  => $request->name,
                    'website'  => '#',
                    'image'  => $imageName,
                ]);
                
                return redirect()->route('partner.index')->with('success','You have successfully updated partner.');
                
            }
        }else {
            
            if ($request->website != null) {
                
                Partners::where('id',$id)->update([
                    'name'  => $request->name,
                    'website'  => $request->website,
                ]);
                
                return redirect()->route('partner.index')->with('success','You have successfully updated partner.');
            }else{
                
                Partners::where('id',$id)->update([
                    'name'  => $request->name,
                    'website'  => '#',
                ]);
                
                return redirect()->route('partner.index')->with('success','You have successfully updated partner.');
                
            }
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
        $partner = Partners::find($id);
        $partner->delete();
        return redirect()->route('partner.index')->with('success','You have successfully deleted partner.');

    }
}
