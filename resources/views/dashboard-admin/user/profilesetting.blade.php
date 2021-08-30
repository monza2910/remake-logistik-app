
@extends('dashboard-admin.home')

@section('title')
    Profile Setting
@endsection

@section('title-page')
    <h1>Profile Setting</h1>
@endsection

@section('content')
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="section-body">
        
        <h2 class="section-title">Hi, {{auth::user()->name}}</h2>
        <p class="section-lead">
          Change information about yourself on this page.
        </p>
        <div class="row mt-sm-4">
            @if ($message = Session::get('success'))
            <div class="alert alert-success mx-4 my-4">
                <p>{{ $message }}</p>
            </div>
            @elseif($message = session::get('deleted'))
            <div class="alert alert-danger mx-4 my-4">
                <p>{{ $message }}</p>
            </div>
            @endif
          <div class="col-12 col-md-12 col-lg-12">
            <div class="card">
              <form method="post" action="{{route('profile.storesetting',$user->id)}}" enctype="multipart/form-data" class="needs-validation" novalidate="">
                @csrf
                @method('put')
                <div class="card-header">
                  <h4>Edit Profile</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="form-group col-md-12 col-12">
                            <label> Name</label>
                            <input type="text" class="form-control" value="{{$user->name}}" name="name" required="">
                            <div class="invalid-feedback">
                              Please fill in the last name
                            </div>
                          </div>
                    </div>
                    <div class="row">
                      <div class="form-group col-md-6 col-12">
                        <div class="form-group">
                            <label for="image" >Old Image</label>
                            <br>
                            <img src="/users/{{$user->image}}"  class="img-fluid" width="100px" alt="Preview image">
                        </div>
                      </div>
                      <div class="form-group col-md-6 col-12">
                        <div class="form-group">
                            <label for="image" >New Image Profile(Optional)</label>
                            <input  id="cat_image" type="file" name="image"  class="form-control">
                            @error('image')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <img src="#" id="category-img-tag" class="img-fluid" width="200px" alt="Preview image">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group col-md-7 col-12">
                        <label>Email</label>
                        <input type="email" class="form-control" value="{{$user->email}}" name="email">
                        <div class="invalid-feedback">
                          Please fill in the email
                        </div>
                      </div>
                      <div class="form-group col-md-5 col-12">
                        <label>Phone(Optional)</label>
                        <input type="tel" class="form-control" value="{{$user->phone}}" name="phone">
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group col-md-6 col-12">
                        <label>Old Password</label>
                        <input type="password" class="form-control" value="" name="oldpassword">
                        <div class="invalid-feedback">
                          Please fill in the email
                        </div>
                      </div>
                      <div class="form-group col-md-6 col-12">
                        <label>New Password(Optional)</label>
                        <input type="password" class="form-control" value="" name="newpassword">
                      </div>
                    </div>
                    
                </div>
                <div class="card-footer text-right">
                  <button class="btn btn-primary">Save Changes</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>

</div>
@endsection