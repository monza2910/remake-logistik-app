<?php

namespace App\Http\Controllers;
use App\Models\Testimonials;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File; 

class TestimonialsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $testimonials = Testimonials::OrderBy('id','DESC')->get();
        return view('dashboard-admin.testimonial.index',compact('testimonials'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard-admin.testimonial.create');
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
            'name' => 'required|min:2',
            'position' => 'required|min:2',
            'company' => 'required|min:2',
            'quote' => 'required|min:5',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5096',
            'status' => 'integer',
        ]);
        
        $img        = \Image::make($request->image)->encode('jpg');  
        $imageName  = time().md5($img->__toString());
        $path       = 'images/testimonials/'.$imageName.'.jpg';
        $uploadName = '/'.$path;
        $img->save(public_path($path),10);

        Testimonials::create([
            'name'  => $request->name,
            'position'  => $request->position,
            'company'  => $request->company,
            'quote'  => $request->quote,
            'image'  => $uploadName,
            'status'  => $request->status
        ]);
    
        return redirect()->route('testimonial.index')->with('success','You have successfully added Testimonial.');
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
        $testimonial = Testimonials::find($id);
        if ($testimonial == null) {
            return redirect('/testimonial')->with('danger','Testimonial Not Found');
        }else {
            return view('dashboard-admin.testimonial.edit',compact('testimonial'));
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
        $testimonial    = Testimonials::find($id);
        $request->validate([
            'name' => 'required|min:2',
            'position' => 'required|min:2',
            'company' => 'required|min:2',
            'quote' => 'required|min:5',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:5096',
            'status' => 'integer',
        ]);

        if ($request->image != "") {
           
            $img        = \Image::make($request->image)->encode('jpg');  
            $imageName  = time().md5($img->__toString());
            $path       = 'images/testimonials/'.$imageName.'.jpg';
            $uploadName = '/'.$path;
            $img->save(public_path($path),10);

            if(File::exists($testimonial->image)) {
                File::delete($testimonial->image);
            }

            Testimonials::where('id',$id)->update([
                'name'  => $request->name,
                'position'  => $request->position,
                'company'  => $request->company,
                'quote'  => $request->quote,
                'image'  => $uploadName,
                'status'  => $request->status
            ]);
        
            return redirect()->route('testimonial.index')->with('success','You have successfully updated testimonial.');
        }elseif ($request->image == "") {

            Testimonials::where('id',$id)->update([
                'name'  => $request->name,
                'position'  => $request->position,
                'company'  => $request->company,
                'quote'  => $request->quote,
                'status'  => $request->status
            ]);
        
            return redirect()->route('testimonial.index')->with('success','You have successfully updated testimonial.');
        }else{
            return redirect()->route('testimonial.index')->with('danger','Slider Cant added.');
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
        $testi = Testimonials::find($id);
        if(File::exists($testi->image)) {
            File::delete($testi->image);
        }
        $testi->delete();
        return redirect()->route('testimonial.index')->with('success','You have successfully deleted testimonial.');

    }
}
