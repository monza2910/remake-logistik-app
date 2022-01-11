<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use App\Models\Articles;
use App\Models\Category;
use App\Models\Tags;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File; 

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

    public function upload(Request $request){
        if ($request->hasFile('upload')) {
            $originName     = $request->file('upload')->getClientOriginalName();
            $fileName       = pathinfo($originName,PATHINFO_FILENAME);
            $extension     = $request->file('upload')->getClientOriginalExtension();
            $fileName       = $fileName.'_'.time().'.'.$extension;

            $request->file('upload')->move(public_path('images/articles'),$fileName);
            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('images/articles/'.$fileName);
            $msg = 'Image upload susccesfuly';
            $response = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum,'$url','$msg')</script>";

            @header('Content-type : text/html; charset-utf-8;');
            echo $response;

        }
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
            'content' => 'required',
            'status' => 'required',       
        ]);

        $img        = \Image::make($request->thumbnail)->encode('jpg');  
        $imageName  = time().md5($img->__toString());
        $path       = 'images/thumbnail/'.$imageName.'.jpg';
        $uploadName = '/'.$path;
        $img->save(public_path($path));

        if ($request->slug != null) {
            $slug = Str::slug($request->slug);
            $articles = Articles::create([
                'title'         => $request->title,
                'thumbnail'     => $uploadName,
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
                'thumbnail'     => $uploadName,
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
        $article    = Articles::findorFail($id);
        $cat_id     = $article['category_id'];
        $tags = Tags::orderBy('id','desc')->get();
        $categorys = Category::where('id','!=',$cat_id)->get();
        return view('dashboard-admin.article.edit',compact('categorys','tags','article'));
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
        $userid = Auth::user()->id;
        $request->validate([
            'title' => 'required|min:5|max:100',
            'thumbnail' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'category_id' => 'required',
            'status' => 'required', 
            'content' => 'required',      
        ]);


        $article    = Articles::find($id);
        
        if ($request->has('thumbnail')) {
            $img        = \Image::make($request->thumbnail)->encode('jpg');  
            $imageName  = time().md5($img->__toString());
            $path       = 'images/thumbnail/'.$imageName.'.jpg';
            $uploadName = '/'.$path;
            $img->save(public_path($path));
            
            if(File::exists($article->thumbnail)) {
                File::delete($article->thumbnail);
            }

            if ($request->slug != null) {
                $slug = Str::slug($request->slug);
                $articles = [
                    'title'         => $request->title,
                    'thumbnail'     => $uploadName,
                    'category_id'   => $request->category_id,
                    'user_id'       => $userid,
                    'status'        => $request->status,
                    'content'       => $request->content,
                    'slug'          => $slug
                ];
                $article->tags()->sync($request->tags);
                $article->update($articles);
    
                return redirect()->route('article.index')->with('success','You have successfully updated Article.');
    
            }else {
                $slug = Str::slug($request->title);
                $articles = [
                    'title'         => $request->title,
                    'thumbnail'     => $imageName,
                    'category_id'   => $request->category_id,
                    'user_id'       => $userid,
                    'status'        => $request->status,
                    'content'       => $request->content,
                    'slug'          => $slug
                ];
                $article->tags()->sync($request->tags);
                $article->update($articles);
    
                return redirect()->route('article.index')->with('success','You have successfully updated Article.');
            }
        }else {
            
            if ($request->slug != null) {
                $slug = Str::slug($request->slug);
                $articles = [
                    'title'         => $request->title,
                    'category_id'   => $request->category_id,
                    'user_id'       => $userid,
                    'status'        => $request->status,
                    'content'       => $request->content,
                    'slug'          => $slug
                ];
                $article->tags()->sync($request->tags);
                $article->update($articles);

                return redirect()->route('article.index')->with('success','You have successfully updated Article.');
    
            }else {
                $slug = Str::slug($request->title);
                $articles = [
                    'title'         => $request->title,
                    'category_id'   => $request->category_id,
                    'user_id'       => $userid,
                    'status'        => $request->status,
                    'content'       => $request->content,
                    'slug'          => $slug
                ];
                $article->tags()->sync($request->tags);
                $article->update($articles);
    
                return redirect()->route('article.index')->with('success','You have successfully updated Article.');
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
        $article = Articles::findorFail($id);
        $article->delete();
        return redirect()->route('article.index')->with('success','Article Was Deleted');

    }
    
    public function showTrash()
    {
        $articles = Articles::onlyTrashed()->get();
        return view('dashboard-admin.article.trash',compact('articles'));
    }
    
    public function restore($id)
    {
        $article = Articles::withTrashed()->where('id',$id)->first();
        $article->restore();
        return redirect()->back()->with('success','Article Was Restored !!');
        
    }
    
    public function kill($id)
    {
        $article = Articles::withTrashed()->where('id',$id)->first();
        if(File::exists($article->thumbnail)) {
            File::delete($article->thumbnail);
        }
        $article->forceDelete();
        return redirect()->back()->with('success','Article Was Deleted');
    
    }
}
