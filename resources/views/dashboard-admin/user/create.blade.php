@extends('dashboard-admin.home')

@section('title')
    User 
@endsection

@section('title-page')
    <h1>Create user </h1>
@endsection

@section('content')
<div class="container-fluid">
    <div class="card shadow mb-4">
          <div class="card-body">
            @if ($message = Session::get('success'))
            <div class="alert alert-success mx-4 my-4">
                <p>{{ $message }}</p>
            </div>
            @elseif($message = session::get('danger'))
            <div class="alert alert-danger mx-4 my-4">
                <p>{{ $message }}</p>
            </div>
            @endif
            {{-- <div class="alert alert-info">
              <b>Note!</b> Not all browsers support HTML5 type input.
            </div> --}}
            <form action="{{route('user.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name" placeholder="" value="{{old('name')}}" class="form-control">
                    @error('name')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Phone(Optional)</label>
                    <input type="text" name="phone" placeholder="" value="{{old('phone')}}" class="form-control">
                    @error('phone')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="image" >Image Profile(Optional)</label>
                    <input  id="cat_image" type="file" name="image" value="{{old('image')}}" class="form-control">
                    @error('image')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <img src="#" id="category-img-tag" class="img-fluid" width="300px" alt="Preview image">
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" placeholder="" value="{{old('email')}}" class="form-control">
                    @error('email')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="text" name="password" placeholder="" value="{{old('password')}}" class="form-control">
                    @error('password')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label >Role</label>
                    <select class="form-control selectpicker" data-live-search="true" name="role_id">
                        @foreach ($roles as $role)
                            <option value="{{$role->id}}">{{$role->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label >Outlet(Optional)</label>
                    <select class="form-control selectpicker" data-live-search="true" name="outlet_id">
                        <option value="" selected>Select Outlet</option>
                        @foreach ($outlets as $outlet)
                            <option value="{{$outlet->id}}">{{$outlet->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group text-right">
                    <button class="btn btn-primary mb-2" type="submit">Submit</button>
                    <a href="{{route('user.index')}}" class="btn btn-info  mb-2"> Back</a>
                </div>
            </form>
          </div>
    </div>
    

</div>
@endsection