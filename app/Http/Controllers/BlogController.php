<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sliders;
use App\Models\Testimonials;
use App\Models\Partners;
use App\Models\Articles;
use App\Models\Origins;
use App\Models\Contactus as Contacts;
use App\Mail\ContactUs;
use Illuminate\Support\Facades\Mail;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = Sliders::where('status','!=', '0')->get();
        $testimonials = Testimonials::where('status','!=', '0')->get();
        $partners = Partners::orderBy('id','DESC')->get();
        $articles = Articles::where('status','!=',"0")->orderBy('id','DESC')->limit(3)->get();
        $origins  = Origins::distinct()->get(['city']);
        return view('blog.index',compact('sliders','testimonials','partners','articles','origins'));
    }

    public function showArticle(){
        $articles = Articles::where('status','!=',"0")->orderBy('id','DESC')->get();
        return view('blog.article-list',compact('articles'));
    }

    public function contactus(){
        return view('blog.contact-us');
    }

    public function storecontactus(Request $request)
    {
        $request->validate([
            'name'          => 'required|max:100|min:3',
            'phone'         => 'required|regex:/^[0-9]+$/|min:8|max:15',
            'email'         => 'email:rfc,dns|required',
            'message'       => 'required'
        ]);

        $details = [
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'message' => $request->message
        ];
        
        Contacts::create([
            'nama' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'message' => $request->message
        ]);
        $email = 'monzanoval@gmail.com';
        \Mail::to($email)->send(new \App\Mail\ContactUs($details));
        
        return redirect()->route('blog.contactus')->with('success','Email Succesfully Sent!!');
        
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
        //
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
