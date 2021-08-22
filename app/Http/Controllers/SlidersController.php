<?php

namespace App\Http\Controllers;
use App\Models\Sliders;
use App\Models\Buttons;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
class SlidersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = Sliders::OrderBy('id','DESC')->get();
        return view('dashboard-admin.slider.index',compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $buttons = Buttons::all();
        return view('dashboard-admin.slider.create',compact('buttons'));
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
            'title_one' => 'required|min:2|max:50',
            'title_two' => 'required|min:2|max:50',
            'description' => 'required|min:5',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'button_id' => 'integer',
            'status' => 'integer',
        ]);
        $image = time().'.'.$request->image->extension();  
        $imageName = md5($image).'.'.$request->image->extension();
     
        $request->image->move(public_path('sliders'), $imageName);
        Sliders::create([
            'title_one'  => $request->title_one,
            'title_two'  => $request->title_two,
            'description'  => $request->description,
            'image'  => $imageName,
            'button_id'  => $request->button_id,
            'status'  => $request->status
        ]);
    
        return redirect()->route('slider.index')->with('success','You have successfully added slider.');
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
        $slider = Sliders::find($id);
        if ($slider == null) {
            return redirect('/slider')->with('danger','Slider Not Found');
        }else {
            $button_id = $slider['button_id'];
            $buttons = Buttons::where('id','!=',$button_id)->get();
            return view('dashboard-admin.slider.edit',compact('slider','buttons'));
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
            'title_one' => 'required|min:2|max:50',
            'title_two' => 'required|min:2|max:50',
            'description' => 'required|min:5',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'button_id' => 'integer',
            'status' => 'integer',
        ]);

        if ($request->image != "") {
           
            $image = time().'.'.$request->image->extension();  
            $imageName = md5($image).'.'.$request->image->extension();
    
            $request->image->move(public_path('sliders'), $imageName);
            Sliders::where('id',$id)->update([
                'title_one'  => $request->title_one,
                'title_two'  => $request->title_two,
                'description'  => $request->description,
                'image'  => $imageName,
                'button_id'  => $request->button_id,
                'status'  => $request->status
            ]);
        
            return redirect()->route('slider.index')->with('success','You have successfully added slider.');
        }elseif ($request->image == "") {

            Sliders::where('id',$id)->update([
                'title_one'  => $request->title_one,
                'title_two'  => $request->title_two,
                'description'  => $request->description,
                'button_id'  => $request->button_id,
                'status'  => $request->status,
            ]);
        
            return redirect()->route('slider.index')->with('success','You have successfully added slider.');
        }else{
            return redirect()->route('slider.index')->with('danger','Slider Cant added.');
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
        $slider = SLiders::find($id);
        $slider->delete();
        return redirect()->route('slider.index')->with('success','You have successfully deleted slider.');

    }
}