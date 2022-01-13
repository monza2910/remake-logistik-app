<?php

namespace App\Http\Controllers;
use Auth;
use App\Models\User;
use App\Models\Roles;
use App\Models\Outlets;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {  
        $userid = Auth::user()->id;
        $roleid = Auth::user()->role_id;

        if ($roleid == 1) {
            $users = User::where('id','!=',$userid)->get();
            return view('dashboard-admin.user.index',compact('users'));
        } elseif($roleid == 2) {
            $users = User::where([['id','!=', $userid],['role_id','!=', ['1','2']]])->get();
            return view('dashboard-admin.user.index',compact('users'));
        }
      
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Roles::where('name','!=','super-admin')->get();
        $outlets = Outlets::all();
        return view('dashboard-admin.user.create',compact('roles','outlets'));
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
            'name' => 'required|max:100|min:3',
            'email' => 'required|unique:users,email|min:3',
            'password' => 'required|max:50|min:3',
            'role_id' => 'required|integer',
            'outlet_id' =>'nullable|integer',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'phone' => 'nullable|regex:/^[0-9]+$/|min:8|max:15',
        ]);

        if ($request->image != null  ) {
            $extension  = $request->image->extension();
            $img        = \Image::make($request->image)->encode('jpg');  
            $uploadName = time().md5($img->__toString());
            $path       = 'images/users/'.$uploadName.'.'.$extension;
            $uploadName = '/'.$path;
            $img->save(public_path($path));

            if ($request->phone != null) {

                if ($request->outlet_id != null ) {

                    if ($request->role_id == 3) {

                        User::create([
                            'name' => $request->name,
                            'email' => $request->email,
                            'password' => Hash::make($request->password),
                            'role_id' => $request->role_id,
                            'outlet_id' => $request->outlet_id ,
                            'image' => $uploadName,
                            'phone' => $request->phone,
                        ]);
                        return redirect()->route('user.index')->with('success','User Was Addes');
    
                    }else{
                        return redirect()->route('user.create')->with('danger','If user has outlet must be petugas role!!');
                    }
    
                }elseif ($request->outlet_id == null) {
                    if ($request->role_id != 3) {
                        
                        User::create([
                            'name' => $request->name,
                            'email' => $request->email,
                            'password' => Hash::make($request->password),
                            'role_id' => $request->role_id,
                            'outlet_id' => null ,
                            'image' => $uploadName,
                            'phone' => $request->phone,
                        ]);
                        return redirect()->route('user.index')->with('success','User Was Addes');
                    }else {
                        return redirect()->route('user.create')->with('danger','If user role is not petugas you not must be input outlet!!');
                    }
                    
                }
      
            }elseif ($request->phone == null) {
                if ($request->outlet_id != null ) {

                    if ($request->role_id == 3) {
            
                        User::create([
                            'name' => $request->name,
                            'email' => $request->email,
                            'password' => Hash::make($request->password),
                            'role_id' => $request->role_id,
                            'outlet_id' => $request->outlet_id ,
                            'image' => $uploadName,
                            'phone' => null,
                        ]);
                        return redirect()->route('user.index')->with('success','User Was Addes');
    
                    }else{
                        return redirect()->route('user.create')->with('danger','If user has outlet must be petugas role!!');
                    }
    
                }elseif ($request->outlet_id == null) {
                    if ($request->role_id != 3) {
                        
                        User::create([
                            'name' => $request->name,
                            'email' => $request->email,
                            'password' => Hash::make($request->password),
                            'role_id' => $request->role_id,
                            'outlet_id' => null ,
                            'image' => $uploadName,
                            'phone' => null,
                        ]);
                        return redirect()->route('user.index')->with('success','User Was Addes');
                    }else {
                        return redirect()->route('user.create')->with('danger','If user role is not petugas you not must be input outlet!!');
                    }
                    
                }
            }

        }elseif ($request->image == null) {
            if ($request->phone != null) {

                if ($request->outlet_id != null ) {

                    if ($request->role_id == 3) {
                        User::create([
                            'name' => $request->name,
                            'email' => $request->email,
                            'password' => Hash::make($request->password),
                            'role_id' => $request->role_id,
                            'outlet_id' => $request->outlet_id ,
                            'image' => null,
                            'phone' => $request->phone,
                        ]);
                        return redirect()->route('user.index')->with('success','User Was Addes');
    
                    }else{
                        return redirect()->route('user.create')->with('danger','If user has outlet must be petugas role!!');
                    }
    
                }elseif ($request->outlet_id == null) {
                    if ($request->role_id != 3) {
                
                        User::create([
                            'name' => $request->name,
                            'email' => $request->email,
                            'password' => Hash::make($request->password),
                            'role_id' => $request->role_id,
                            'outlet_id' => null ,
                            'image' => null,
                            'phone' => $request->phone,
                        ]);
                        return redirect()->route('user.index')->with('success','User Was Addes');
                    }else {
                        return redirect()->route('user.create')->with('danger','If user role is not petugas you not must be input outlet!!');
                    }
                    
                }
      
            }elseif ($request->phone == null) {
                if ($request->outlet_id != null ) {

                    if ($request->role_id == 3) {
                        User::create([
                            'name' => $request->name,
                            'email' => $request->email,
                            'password' => Hash::make($request->password),
                            'role_id' => $request->role_id,
                            'outlet_id' => $request->outlet_id ,
                            'image' => null,
                            'phone' => null,
                        ]);
                        return redirect()->route('user.index')->with('success','User Was Addes');
    
                    }else{
                        return redirect()->route('user.create')->with('danger','If user has outlet must be petugas role!!');
                    }
    
                }elseif ($request->outlet_id == null) {
                    if ($request->role_id != 3) {
            
                        User::create([
                            'name' => $request->name,
                            'email' => $request->email,
                            'password' => Hash::make($request->password),
                            'role_id' => $request->role_id,
                            'outlet_id' => null ,
                            'image' => null,
                            'phone' => null,
                        ]);
                        return redirect()->route('user.index')->with('success','User Was Addes');
                    }else {
                        return redirect()->route('user.create')->with('danger','If user role is not petugas you not must be input outlet!!');
                    }
                    
                }
            }
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
        $user = User::find($id);
        if ($user == null) {

            return redirect('/user')->with('danger','User Not Found');

        }else {

            $role_id = $user['role_id'];
            $outlet_id = $user['outlet_id'];

            $roles = Roles::where([['name','!=','super-admin'],['id','!=', $role_id]])->get();
            $outlets = Outlets::all();

            return view('dashboard-admin.user.edit',compact('user','roles','outlets'));
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
            'name' => 'required|max:100|min:3',
            'email' => 'nullable|unique:users,email|min:3',
            'password' => 'nullable|max:50|min:3',
            'role_id' => 'required|integer',
            'outlet_id' =>'nullable|integer',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'phone' => 'nullable|regex:/^[0-9]+$/|min:8|max:15',
        ]);

        if ($request->image != null  ) {
            $extension  = $request->image->extension();
            $img        = \Image::make($request->image)->encode('jpg');  
            $uploadName = time().md5($img->__toString());
            $path       = 'images/users/'.$uploadName.'.'.$extension;
            $uploadName = '/'.$path;
            $img->save(public_path($path));
            if ($request->email != null ) {
                if ($request->password != null) {
                    if ($request->phone != null) {
                        if ($request->outlet_id != null ) {
                            if ($request->role_id == 3) {
                
                                User::where('id',$id)->update([
                                    'name' => $request->name,
                                    'email' => $request->email,
                                    'password' => Hash::make($request->password),
                                    'role_id' => $request->role_id,
                                    'outlet_id' => $request->outlet_id ,
                                    'image' => $uploadName,
                                    'phone' => $request->phone,
                                ]);
                                return redirect()->route('user.index')->with('success','User Was Addes');
            
                            }else{
                                return redirect()->back()->with('danger','If user has outlet must be petugas role!!');
                            }
            
                        }elseif ($request->outlet_id == null) {
                            if ($request->role_id != 3) {
                                User::where('id',$id)->update([
                                    'name' => $request->name,
                                    'email' => $request->email,
                                    'password' => Hash::make($request->password),
                                    'role_id' => $request->role_id,
                                    'outlet_id' => null ,
                                    'image' => $uploadName,
                                    'phone' => $request->phone,
                                ]);
                                return redirect()->route('user.index')->with('success','User Was Updated');
                            }else {
                                return redirect()->back()->with('danger','If user has outlet must be petugas role!!');
                            }
                            
                        }
            
                    }elseif ($request->phone == null) {
                        if ($request->outlet_id != null ) {

                            if ($request->role_id == 3) {
                    
                                User::where('id',$id)->update([
                                    'name' => $request->name,
                                    'email' => $request->email,
                                    'password' => Hash::make($request->password),
                                    'role_id' => $request->role_id,
                                    'outlet_id' => $request->outlet_id ,
                                    'image' => $uploadName,
                                ]);
                                return redirect()->route('user.index')->with('success','User Was Updated');
            
                            }else{
                                return redirect()->back()->with('danger','If user has outlet must be petugas role!!');
                            }
            
                        }elseif ($request->outlet_id == null) {
                            if ($request->role_id != 3) {
                    
                                User::where('id',$id)->update([
                                    'name' => $request->name,
                                    'email' => $request->email,
                                    'password' => Hash::make($request->password),
                                    'role_id' => $request->role_id,
                                    'image' => $uploadName,
                                ]);
                                return redirect()->route('user.index')->with('success','User Was Updated');
                            }else {
                                return redirect()->back()->with('danger','If user has outlet must be petugas role!!');
                            }
                            
                        }
                    }

                }else {
                    if ($request->phone != null) {
                        if ($request->outlet_id != null ) {
                            if ($request->role_id == 3) {
                                User::where('id',$id)->update([
                                    'name' => $request->name,
                                    'email' => $request->email,
                                    'role_id' => $request->role_id,
                                    'outlet_id' => $request->outlet_id ,
                                    'image' => $uploadName,
                                    'phone' => $request->phone,
                                ]);
                                return redirect()->route('user.index')->with('success','User Was Addes');
            
                            }else{
                                return redirect()->back()->with('danger','If user has outlet must be petugas role!!');
                            }
            
                        }elseif ($request->outlet_id == null) {
                            if ($request->role_id != 3) {
                    
                                User::where('id',$id)->update([
                                    'name' => $request->name,
                                    'email' => $request->email,
                                    'role_id' => $request->role_id,
                                    'outlet_id' => null ,
                                    'image' => $uploadName,
                                    'phone' => $request->phone,
                                ]);
                                return redirect()->route('user.index')->with('success','User Was Updated');
                            }else {
                                return redirect()->back()->with('danger','If user has outlet must be petugas role!!');
                            }
                            
                        }
            
                    }elseif ($request->phone == null) {
                        if ($request->outlet_id != null ) {

                            if ($request->role_id == 3) {
                    
                                User::where('id',$id)->update([
                                    'name' => $request->name,
                                    'email' => $request->email,
                                    'role_id' => $request->role_id,
                                    'outlet_id' => $request->outlet_id ,
                                    'image' => $uploadName,
                                ]);
                                return redirect()->route('user.index')->with('success','User Was Updated');
            
                            }else{
                                return redirect()->back()->with('danger','If user has outlet must be petugas role!!');
                            }
            
                        }elseif ($request->outlet_id == null) {
                            if ($request->role_id != 3) {
                    
                                User::where('id',$id)->update([
                                    'name' => $request->name,
                                    'email' => $request->email,
                                    'role_id' => $request->role_id,
                                    'image' => $uploadName,
                                ]);
                                return redirect()->route('user.index')->with('success','User Was Updated');
                            }else {
                                return redirect()->back()->with('danger','If user has outlet must be petugas role!!');
                            }
                            
                        }
                    }
                }  
            }else {
                if ($request->password != null) {
                    if ($request->phone != null) {
                        if ($request->outlet_id != null ) {
                            if ($request->role_id == 3) {
                    
                                User::where('id',$id)->update([
                                    'name' => $request->name,
                                    'password' => Hash::make($request->password),
                                    'role_id' => $request->role_id,
                                    'outlet_id' => $request->outlet_id ,
                                    'image' => $uploadName,
                                    'phone' => $request->phone,
                                ]);
                                return redirect()->route('user.index')->with('success','User Was Addes');
            
                            }else{
                                return redirect()->back()->with('danger','If user has outlet must be petugas role!!');
                            }
            
                        }elseif ($request->outlet_id == null) {
                            if ($request->role_id != 3) {
                    
                                User::where('id',$id)->update([
                                    'name' => $request->name,
                                    'password' => Hash::make($request->password),
                                    'role_id' => $request->role_id,
                                    'outlet_id' => null ,
                                    'image' => $uploadName,
                                    'phone' => $request->phone,
                                ]);
                                return redirect()->route('user.index')->with('success','User Was Updated');
                            }else {
                                return redirect()->back()->with('danger','If user has outlet must be petugas role!!');
                            }
                            
                        }
            
                    }elseif ($request->phone == null) {
                        if ($request->outlet_id != null ) {

                            if ($request->role_id == 3) {
                    
                                User::where('id',$id)->update([
                                    'name' => $request->name,
                                    'password' => Hash::make($request->password),
                                    'role_id' => $request->role_id,
                                    'outlet_id' => $request->outlet_id ,
                                    'image' => $uploadName,
                                ]);
                                return redirect()->route('user.index')->with('success','User Was Updated');
            
                            }else{
                                return redirect()->back()->with('danger','If user has outlet must be petugas role!!');
                            }
            
                        }elseif ($request->outlet_id == null) {
                            if ($request->role_id != 3) {
                    
                                User::where('id',$id)->update([
                                    'name' => $request->name,
                                    'password' => Hash::make($request->password),
                                    'role_id' => $request->role_id,
                                    'image' => $uploadName,
                                ]);
                                return redirect()->route('user.index')->with('success','User Was Updated');
                            }else {
                                return redirect()->back()->with('danger','If user has outlet must be petugas role!!');
                            }
                            
                        }
                    }

                }else {
                    if ($request->phone != null) {
                        if ($request->outlet_id != null ) {
                            if ($request->role_id == 3) {
                                User::where('id',$id)->update([
                                    'name' => $request->name,
                                    'role_id' => $request->role_id,
                                    'outlet_id' => $request->outlet_id ,
                                    'image' => $uploadName,
                                    'phone' => $request->phone,
                                ]);
                                return redirect()->route('user.index')->with('success','User Was Addes');
            
                            }else{
                                return redirect()->back()->with('danger','If user has outlet must be petugas role!!');
                            }
            
                        }elseif ($request->outlet_id == null) {
                            if ($request->role_id != 3) {
                    
                                User::where('id',$id)->update([
                                    'name' => $request->name,
                                    'role_id' => $request->role_id,
                                    'outlet_id' => null ,
                                    'image' => $uploadName,
                                    'phone' => $request->phone,
                                ]);
                                return redirect()->route('user.index')->with('success','User Was Updated');
                            }else {
                                return redirect()->back()->with('danger','If user has outlet must be petugas role!!');
                            }
                            
                        }
            
                    }elseif ($request->phone == null) {
                        if ($request->outlet_id != null ) {

                            if ($request->role_id == 3) {
                    
                                User::where('id',$id)->update([
                                    'name' => $request->name,
                                    'role_id' => $request->role_id,
                                    'outlet_id' => $request->outlet_id ,
                                    'image' => $uploadName,
                                ]);
                                return redirect()->route('user.index')->with('success','User Was Updated');
            
                            }else{
                                return redirect()->back()->with('danger','If user has outlet must be petugas role!!');
                            }
            
                        }elseif ($request->outlet_id == null) {
                            if ($request->role_id != 3) {
                    
                                User::where('id',$id)->update([
                                    'name' => $request->name,
                                    'role_id' => $request->role_id,
                                    'image' => $uploadName,
                                ]);
                                return redirect()->route('user.index')->with('success','User Was Updated');
                            }else {
                                return redirect()->back()->with('danger','If user has outlet must be petugas role!!');
                            }
                            
                        }
                    }
                } 
            }  
                 
        }else {
            if ($request->email != null ) {
                if ($request->password != null) {
                    if ($request->phone != null) {
                        if ($request->outlet_id != null ) {
                            if ($request->role_id == 3) {
                                User::where('id',$id)->update([
                                    'name' => $request->name,
                                    'email' => $request->email,
                                    'password' => Hash::make($request->password),
                                    'role_id' => $request->role_id,
                                    'outlet_id' => $request->outlet_id ,
                                    'phone' => $request->phone,
                                ]);
                                return redirect()->route('user.index')->with('success','User Was Addes');
            
                            }else{
                                return redirect()->back()->with('danger','If user has outlet must be petugas role!!');
                            }
            
                        }elseif ($request->outlet_id == null) {
                            if ($request->role_id != 3) {
                    
                                User::where('id',$id)->update([
                                    'name' => $request->name,
                                    'email' => $request->email,
                                    'password' => Hash::make($request->password),
                                    'role_id' => $request->role_id,
                                    'outlet_id' => null ,
                                    'phone' => $request->phone,
                                ]);
                                return redirect()->route('user.index')->with('success','User Was Updated');
                            }else {
                                return redirect()->back()->with('danger','If user has outlet must be petugas role!!');
                            }
                            
                        }
            
                    }elseif ($request->phone == null) {
                        if ($request->outlet_id != null ) {

                            if ($request->role_id == 3) {
                    
                                User::where('id',$id)->update([
                                    'name' => $request->name,
                                    'email' => $request->email,
                                    'password' => Hash::make($request->password),
                                    'role_id' => $request->role_id,
                                    'outlet_id' => $request->outlet_id ,
                                ]);
                                return redirect()->route('user.index')->with('success','User Was Updated');
            
                            }else{
                                return redirect()->back()->with('danger','If user has outlet must be petugas role!!');
                            }
            
                        }elseif ($request->outlet_id == null) {
                            if ($request->role_id != 3) {
                    
                                User::where('id',$id)->update([
                                    'name' => $request->name,
                                    'email' => $request->email,
                                    'password' => Hash::make($request->password),
                                    'role_id' => $request->role_id,
                                ]);
                                return redirect()->route('user.index')->with('success','User Was Updated');
                            }else {
                                return redirect()->back()->with('danger','If user has outlet must be petugas role!!');
                            }
                            
                        }
                    }

                }else {
                    if ($request->phone != null) {
                        if ($request->outlet_id != null ) {
                            if ($request->role_id == 3) {
                    
                                User::where('id',$id)->update([
                                    'name' => $request->name,
                                    'email' => $request->email,
                                    'role_id' => $request->role_id,
                                    'outlet_id' => $request->outlet_id ,
                                    'phone' => $request->phone,
                                ]);
                                return redirect()->route('user.index')->with('success','User Was Addes');
            
                            }else{
                                return redirect()->back()->with('danger','If user has outlet must be petugas role!!');
                            }
            
                        }elseif ($request->outlet_id == null) {
                            if ($request->role_id != 3) {
                    
                                User::where('id',$id)->update([
                                    'name' => $request->name,
                                    'email' => $request->email,
                                    'role_id' => $request->role_id,
                                    'outlet_id' => null ,
                                    'phone' => $request->phone,
                                ]);
                                return redirect()->route('user.index')->with('success','User Was Updated');
                            }else {
                                return redirect()->back()->with('danger','If user has outlet must be petugas role!!');
                            }
                            
                        }
            
                    }elseif ($request->phone == null) {
                        if ($request->outlet_id != null ) {

                            if ($request->role_id == 3) {
                    
                                User::where('id',$id)->update([
                                    'name' => $request->name,
                                    'email' => $request->email,
                                    'role_id' => $request->role_id,
                                    'outlet_id' => $request->outlet_id ,
                                ]);
                                return redirect()->route('user.index')->with('success','User Was Updated');
            
                            }else{
                                return redirect()->back()->with('danger','If user has outlet must be petugas role!!');
                            }
            
                        }elseif ($request->outlet_id == null) {
                            if ($request->role_id != 3) {
                    
                                User::where('id',$id)->update([
                                    'name' => $request->name,
                                    'email' => $request->email,
                                    'role_id' => $request->role_id,
                                ]);
                                return redirect()->route('user.index')->with('success','User Was Updated');
                            }else {
                                return redirect()->back()->with('danger','If user has outlet must be petugas role!!');
                            }
                            
                        }
                    }
                }  
            }else {
                if ($request->password != null) {
                    if ($request->phone != null) {
                        if ($request->outlet_id != null ) {
                            if ($request->role_id == 3) {

                                User::where('id',$id)->update([
                                    'name' => $request->name,
                                    'password' => Hash::make($request->password),
                                    'role_id' => $request->role_id,
                                    'outlet_id' => $request->outlet_id ,
                                    'phone' => $request->phone,
                                ]);
                                return redirect()->route('user.index')->with('success','User Was Addes');
            
                            }else{
                                return redirect()->back()->with('danger','If user has outlet must be petugas role!!');
                            }
            
                        }elseif ($request->outlet_id == null) {
                            if ($request->role_id != 3) {
                                User::where('id',$id)->update([
                                    'name' => $request->name,
                                    'password' => Hash::make($request->password),
                                    'role_id' => $request->role_id,
                                    'outlet_id' => null ,
                                    'phone' => $request->phone,
                                ]);
                                return redirect()->route('user.index')->with('success','User Was Updated');
                            }else {
                                return redirect()->back()->with('danger','If user has outlet must be petugas role!!');
                            }
                            
                        }
            
                    }elseif ($request->phone == null) {
                        if ($request->outlet_id != null ) {

                            if ($request->role_id == 3) {
                    
                                User::where('id',$id)->update([
                                    'name' => $request->name,
                                    'password' => Hash::make($request->password),
                                    'role_id' => $request->role_id,
                                    'outlet_id' => $request->outlet_id ,
                                ]);
                                return redirect()->route('user.index')->with('success','User Was Updated');
            
                            }else{
                                return redirect()->back()->with('danger','If user has outlet must be petugas role!!');
                            }
            
                        }elseif ($request->outlet_id == null) {
                            if ($request->role_id != 3) {
                                User::where('id',$id)->update([
                                    'name' => $request->name,
                                    'password' => Hash::make($request->password),
                                    'role_id' => $request->role_id,
                                ]);
                                return redirect()->route('user.index')->with('success','User Was Updated');
                            }else {
                                return redirect()->back()->with('danger','If user has outlet must be petugas role!!');
                            }
                            
                        }
                    }

                }else {
                    if ($request->phone != null) {
                        if ($request->outlet_id != null ) {
                            if ($request->role_id == 3) {

                                User::where('id',$id)->update([
                                    'name' => $request->name,
                                    'role_id' => $request->role_id,
                                    'outlet_id' => $request->outlet_id ,
                                    'phone' => $request->phone,
                                ]);
                                return redirect()->route('user.index')->with('success','User Was Addes');
            
                            }else{
                                return redirect()->back()->with('danger','If user has outlet must be petugas role!!');
                            }
            
                        }elseif ($request->outlet_id == null) {
                            if ($request->role_id != 3) {
                    
                                User::where('id',$id)->update([
                                    'name' => $request->name,
                                    'role_id' => $request->role_id,
                                    'outlet_id' => null ,
                                    'phone' => $request->phone,
                                ]);
                                return redirect()->route('user.index')->with('success','User Was Updated');
                            }else {
                                return redirect()->back()->with('danger','If user has outlet must be petugas role!!');
                            }
                            
                        }
            
                    }elseif ($request->phone == null) {
                        if ($request->outlet_id != null ) {

                            if ($request->role_id == 3) {

                                User::where('id',$id)->update([
                                    'name' => $request->name,
                                    'role_id' => $request->role_id,
                                    'outlet_id' => $request->outlet_id ,
                                ]);
                                return redirect()->route('user.index')->with('success','User Was Updated');
            
                            }else{
                                return redirect()->back()->with('danger','If user has outlet must be petugas role!!');
                            }
            
                        }elseif ($request->outlet_id == null) {
                            if ($request->role_id != 3) {
                                User::where('id',$id)->update([
                                    'name' => $request->name,
                                    'role_id' => $request->role_id,
                                ]);
                                return redirect()->route('user.index')->with('success','User Was Updated');
                            }else {
                                return redirect()->back()->with('danger','If user has outlet must be petugas role!!');
                            }
                            
                        }
                    }
                } 
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
        $user = User::findorFail($id);
        $user->delete();
        return redirect()->route('user.index')->with('success','User Was Deleted');

    }
    
    public function showTrash()
    {
        $users = User::onlyTrashed()->get();
        return view('dashboard-admin.user.trash',compact('users'));
    }
    
    public function restore($id)
    {
        $user = User::withTrashed()->where('id',$id)->first();
        $user->restore();
        return redirect()->back()->with('success','User Was Restored !!');
        
    }
    
    public function kill($id)
    {
        $user = User::withTrashed()->where('id',$id)->first();
        $user->forceDelete();
        return redirect()->back()->with('success','User Was Deleted');
    
    }

    public function profileSetting()
    {
        $userid     = Auth::user()->id;
        $user       = User::findorFail($userid);

        return view('dashboard-admin.user.profilesetting',compact('user'));
    }

    public function updateProfileSetting(Request $request, $id){
        $request->validate([
            'name' => 'required|max:100|min:3',
            'email' => 'nullable|unique:users,email|min:3',
            'newpassword' => 'nullable|max:50|min:3',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'phone' => 'nullable|regex:/^[0-9]+$/|min:8|max:15',
        ]);

        if ($request->image != null) {
            $extension  = $request->image->extension();
            $img        = \Image::make($request->image)->encode('jpg');  
            $uploadName = time().md5($img->__toString());
            $path       = 'images/users/'.$uploadName.'.'.$extension;
            $uploadName = '/'.$path;
            $img->save(public_path($path));
            if ($request->phone != null) {
                if ($request->email != null) {
                    if($request->newpassword != null){
                        User::where('id',$id)->update([
                            'name' => $request->name,
                            'email' => $request->email,
                            'image' => $uploadName,
                            'phone' => $request->phone,
                            'password' => bcrypt($request->newpassword),
                        ]);
                
                        return redirect()->back()->with('success','Profile updated successfully');;
                    }else {
                        User::where('id',$id)->update([
                            'name' => $request->name,
                            'email' => $request->email,
                            'image' => $uploadName,
                            'phone' => $request->phone,
                        ]);
                
                        return redirect()->back()->with('success','Profile updated successfully');;
                            
                    }
                }else {
                    if($request->newpassword != null){
    
                        User::where('id',$id)->update([
                            'name' => $request->name,
                            'image' => $uploadName,
                            'phone' => $request->phone,
                            'password' => bcrypt($request->newpassword),
                        ]);
                
                        return redirect()->back()->with('success','Profile updated successfully');;
                    }else {
                        User::where('id',$id)->update([
                            'name' => $request->name,
                            'image' => $uploadName,
                            'phone' => $request->phone,
                        ]);
                
                        return redirect()->back()->with('success','Profile updated successfully');;
                            
                    }
                }
            } else {
                if ($request->email != null) {
                    if($request->newpassword != null){
                        User::where('id',$id)->update([
                            'name' => $request->name,
                            'email' => $request->email,
                            'image' => $uploadName,
                            'password' => bcrypt($request->newpassword),
                        ]);
                
                        return redirect()->back()->with('success','Profile updated successfully');;
                    }else {
    
                        User::where('id',$id)->update([
                            'name' => $request->name,
                            'email' => $request->email,
                            'image' => $uploadName,
                        ]);
                
                        return redirect()->back()->with('success','Profile updated successfully');;
                            
                    }
                }else {
                    if($request->newpassword != null){
                        User::where('id',$id)->update([
                            'name' => $request->name,
                            'image' => $uploadName,
                            'password' => bcrypt($request->newpassword),
                        ]);
                
                        return redirect()->back()->with('success','Profile updated successfully');;
                    }else {
                        User::where('id',$id)->update([
                            'name' => $request->name,
                            'image' => $uploadName,
                        ]);
                
                        return redirect()->back()->with('success','Profile updated successfully');;
                            
                    }
                }
            }
            
        } else {
            if ($request->phone != null) {
                if ($request->email != null) {
                    if($request->newpassword != null){

                        User::where('id',$id)->update([
                            'name' => $request->name,
                            'email' => $request->email,
                            'phone' => $request->phone,
                            'password' => bcrypt($request->newpassword),
                        ]);
                
                        return redirect()->back()->with('success','Profile updated successfully');;
                    }else {
    
                        User::where('id',$id)->update([
                            'name' => $request->name,
                            'email' => $request->email,
                            'phone' => $request->phone,
                        ]);
                
                        return redirect()->back()->with('success','Profile updated successfully');;
                            
                    }
                }else {
                    if($request->newpassword != null){
                        User::where('id',$id)->update([
                            'name' => $request->name,
                            'phone' => $request->phone,
                            'password' => bcrypt($request->newpassword),
                        ]);
                
                        return redirect()->back()->with('success','Profile updated successfully');;
                    }else {
    
                        User::where('id',$id)->update([
                            'name' => $request->name,
                            'phone' => $request->phone,
                        ]);
                
                        return redirect()->back()->with('success','Profile updated successfully');;
                            
                    }
                }
            } else {
                if ($request->email != null) {
                    if($request->newpassword != null){
                        User::where('id',$id)->update([
                            'name' => $request->name,
                            'email' => $request->email,
                            'password' => bcrypt($request->newpassword),
                        ]);
                
                        return redirect()->back()->with('success','Profile updated successfully');;
                    }else {
    
                        User::where('id',$id)->update([
                            'name' => $request->name,
                            'email' => $request->email,
                        ]);
                
                        return redirect()->back()->with('success','Profile updated successfully');;
                            
                    }
                }else {
                    if($request->newpassword != null){
    
                        User::where('id',$id)->update([
                            'name' => $request->name,
                            'password' => bcrypt($request->newpassword),
                        ]);
                
                        return redirect()->back()->with('success','Profile updated successfully');;
                    }else {
                        User::where('id',$id)->update([
                            'name' => $request->name,
                        ]);
                
                        return redirect()->back()->with('success','Profile updated successfully');;
                            
                    }
                }
            }
        }
        
    } 
}
