<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sliders;
use App\Models\Testimonials;
use App\Models\Partners;
use App\Models\Articles;
use App\Models\Origins;
use App\Models\Destinations;
use App\Models\Shippingrates;
use App\Models\Contactus as Contacts;
use App\Models\Ourteam ;
use App\Models\Outlets ;
use App\Models\Transaction ;
use App\Models\Tracking ;
use App\Models\Category ;
use App\Models\Galery ;
use App\Models\Travel ;
use App\Models\Armada ;
use App\Models\GeneralSetting;

use App\Mail\ContactUs;
use Illuminate\Support\Facades\Mail;

class BlogController extends Controller
{
  
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->resi != null) {
            $value = $request->resi;
            $transactions = Transaction::where('tracking_number', $value)->firstorfail();
    
            
            $trid    = $transactions['id'];
            
    
            $trackings = Tracking::where('transaction_id',$trid)->orderBy('created_at','DESC')->get();

            $sliders = Sliders::where('status','!=', '0')->get();
            $testimonials = Testimonials::where('status','!=', '0')->get();
            $partners = Partners::orderBy('id','DESC')->get();
            $articles = Articles::where('status','!=',"0")->orderBy('id','DESC')->limit(3)->get();
            $origins  = Origins::distinct()->get(['id','city','province','subdistrict']);
            $destinations  = Destinations::distinct()->get(['id','city','province','subdistrict']);
            $teams  = Ourteam::orderBy('id','DESC')->get();
            $locations  = Outlets::paginate(10);
            $gallerys = Galery::where('status','1')->orderBy('id','desc')->get();
            $logos = GeneralSetting::where('page_name','logo')->get();
            $aboutus = GeneralSetting::where('page_name','about_us')->get();
            $mainaddress = GeneralSetting::where('page_name','main_address')->get();


            return view('blog.index',compact('sliders','testimonials','partners','articles','origins','teams','destinations','trackings','transactions','locations','gallerys','logos','aboutus','mainaddress'));
        }elseif ($request->origin != null && $request->destination != null && $request->berat != null && $request->satuan != null) {

            $satuan = $request->satuan;
            $berat = $request->berat;
            $estimations = Shippingrates::where([['origin_id','=',$request->origin],['destination_id','=', $request->destination]])->get();



            $sliders = Sliders::where('status','!=', '0')->get();
            $testimonials = Testimonials::where('status','!=', '0')->get();
            $partners = Partners::orderBy('id','DESC')->get();
            $articles = Articles::where('status','!=',"0")->orderBy('id','DESC')->limit(3)->get();
            $origins  = Origins::distinct()->get(['id','city','province','subdistrict']);
            $destinations  = Destinations::distinct()->get(['id','city','province','subdistrict']);
            $teams  = Ourteam::orderBy('id','DESC')->get();            
            $locations  = Outlets::paginate(10);
            $gallerys = Galery::where('status','1')->orderBy('id','desc')->get();
            $logos = GeneralSetting::where('page_name','logo')->get();
            $aboutus = GeneralSetting::where('page_name','about_us')->get();
            $mainaddress = GeneralSetting::where('page_name','main_address')->get();



            return view('blog.index',compact('sliders','testimonials','partners','articles','origins','teams','destinations','estimations','satuan','berat','locations','gallerys','logos','aboutus','mainaddress'));
        }
        else {
            $sliders = Sliders::where('status','!=', '0')->get();
            $testimonials = Testimonials::where('status','!=', '0')->get();
            $partners = Partners::orderBy('id','DESC')->get();
            $articles = Articles::where('status','!=',"0")->orderBy('id','DESC')->limit(3)->get();
            $origins  = Origins::distinct()->get(['id','city','province','subdistrict']);
            $locations  = Outlets::paginate(10);
            $destinations  = Destinations::distinct()->get(['id','city','province','subdistrict']);
            $teams  = Ourteam::orderBy('id','DESC')->get();
            $gallerys = Galery::where('status','1')->orderBy('id','desc')->get();
            $logos = GeneralSetting::where('page_name','logo')->get();
            $aboutus = GeneralSetting::where('page_name','about_us')->get();
            $mainaddress = GeneralSetting::where('page_name','main_address')->get();


            return view('blog.index',compact('sliders','testimonials','partners','articles','origins','teams','destinations','locations','gallerys','logos','aboutus','mainaddress'));
        }

    }

    public function showArticle(Request $request){
        if ($request->value != null) {
            
            $articles = Articles::where([['title','like',"%".$request->value."%"],['status','!=',"0"]])
            ->orderBy('id','DESC')->paginate(10);
            $categorys = Category::orderBy('id','DESC')->get();
            $logos = GeneralSetting::where('page_name','logo')->get();
            $aboutus = GeneralSetting::where('page_name','about_us')->get();
            $mainaddress = GeneralSetting::where('page_name','main_address')->get();
            return view('blog.article-list',compact('articles','categorys','logos','aboutus','mainaddress'));
        } else {
            $articles = Articles::where('status','!=',"0")->orderBy('id','DESC')->paginate(10);
            $categorys = Category::orderBy('id','DESC')->get();
            $logos = GeneralSetting::where('page_name','logo')->get();
            $aboutus = GeneralSetting::where('page_name','about_us')->get();
            $mainaddress = GeneralSetting::where('page_name','main_address')->get();
            return view('blog.article-list',compact('articles','categorys','logos','aboutus','mainaddress'));
        }
    }

    public function openArticle(Articles $article){
        // $articles = Articles::where('slug',$slug)->increment('view_count', 1)->get();
        $article->increment('view_count', 1);
        $listarticles = Articles::where('status','1')->orderBy('id','DESC')->take(3)->get();
        $logos = GeneralSetting::where('page_name','logo')->get();
        $aboutus = GeneralSetting::where('page_name','about_us')->get();
        $mainaddress = GeneralSetting::where('page_name','main_address')->get();
        return view('blog.article-detail',compact('article','listarticles','logos','aboutus','mainaddress'));
    }
  
    public function showArticleByCategory($category){
        $articles = Articles::where(['category_id'=>$category,'status'=> '1'])->paginate(10);
        $categorys = Category::orderBy('id','DESC')->get();
        $logos = GeneralSetting::where('page_name','logo')->get();
        $aboutus = GeneralSetting::where('page_name','about_us')->get();
        $mainaddress = GeneralSetting::where('page_name','main_address')->get();
        return view('blog.article-list',compact('articles','categorys','logos','aboutus','mainaddress'));
    }

    

    public function contactus(){
        $logos = GeneralSetting::where('page_name','logo')->get();
        $aboutus = GeneralSetting::where('page_name','about_us')->get();
        $mainaddress = GeneralSetting::where('page_name','main_address')->get();
        return view('blog.contact-us',compact('logos','aboutus','mainaddress'));
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

    public function estimasiTrack(Request $request){

    }
    public function trackingCek(Request $request){
        $value = $request->resi;
        $tracking_result = Transaction::where('tracking_number', $value)->get();

        foreach ($tracking_result as $result ) {
           $trid    = $result->id;
        }

        $trackings = Tracking::where('transaction_id',$trid);
        return view();
    }

    public function galleryIndex(){
        $gallerys = Galery::where('status','1')->OrderBy('id','DESC')->get();
        return view('blog.gallery',compact('gallerys'));
    }

    public function showService(){
        $travels = Travel::orderBy('id','DESC')->get();
        $armadas = Armada::orderBy('id','DESC')->get();
        $logos = GeneralSetting::where('page_name','logo')->get();
        $aboutus = GeneralSetting::where('page_name','about_us')->get();
        $mainaddress = GeneralSetting::where('page_name','main_address')->get();
        return view('blog.service-list',compact('travels','armadas','logos','aboutus','mainaddress'));
    }

    public function openTravel($slug){
        $travels = Travel::where('slug',$slug)->get();
        $listtravel = Travel::where('slug','!=',$slug)->orderBy('id','DESC')->take(4)->get();
        $logos = GeneralSetting::where('page_name','logo')->get();
        $aboutus = GeneralSetting::where('page_name','about_us')->get();
        $mainaddress = GeneralSetting::where('page_name','main_address')->get();
        return view('blog.travel-detail',compact('travels','listtravel','logos','aboutus','mainaddress'));
    }
    public function openArmada($slug){
        $armadas = Armada::where('slug',$slug)->get();
        $listarmada = Armada::where('slug','!=',$slug)->orderBy('id','DESC')->take(4)->get();
        $logos = GeneralSetting::where('page_name','logo')->get();
        $aboutus = GeneralSetting::where('page_name','about_us')->get();
        $mainaddress = GeneralSetting::where('page_name','main_address')->get();
        return view('blog.armada-detail',compact('armadas','listarmada','logos','aboutus','mainaddress'));
    }

}
