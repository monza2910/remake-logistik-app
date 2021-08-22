<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use App\Models\Articles;
use App\Models\Category;
use App\Models\Tags;
use Illuminate\Support\Str;

class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Articles::orderBy('id','DESC')->get();
        return view('dashboard-admin.article.index',compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tags::orderBy('id','desc')->get();
        $categorys = Category::orderBy('id','desc')->get();
        return view('dashboard-admin.article.create',compact('categorys','tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $userid = Auth::user()->id;
        $request->validate([
            'title' => 'required|min:5|max:100',
            'thumbnail' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'category_id' => 'required',
            'status' => 'required',       
        ]);

        

        $image = time().'.'.$request->thumbnail->extension();  
        $imageName = md5($image).'.'.$request->thumbnail->extension();
     
        $request->thumbnail->move(public_path('images/thumbnail'), $imageName);
        if ($request->slug != null) {
            $slug = Str::slug($request->slug);
            $articles = Articles::create([
                'title'         => $request->title,
                'thumbnail'     => $imageName,
                'category_id'   => $request->category_id,
                'user_id'       => $userid,
                'status'        => $request->status,
                'content'       => $request->content,
                'slug'          => $slug
            ]);
            $articles->tags()->attach($request->tags);

            return redirect()->route('article.index')->with('success','You have successfully added Article.');

        }else {
            $slug = Str::slug($request->title);
            $articles = Articles::create([
                'title'         => $request->title,
                'thumbnail'     => $imageName,
                'category_id'   => $request->category_id,
                'user_id'       => $userid,
                'status'        => $request->status,
                'content'       => $request->content,
                'slug'          => $slug
            ]);
            $articles->tags()->attach($request->tags);

            return redirect()->route('article.index')->with('success','You have successfully added Article.');
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
