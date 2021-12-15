
@extends('dashboard-admin.home')

@section('title')
    General Setting
@endsection

@section('title-page')
    <h1>General Setting</h1>
@endsection

@section('content')
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="section-body">
        
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
            @foreach ($generals as $general)
            @if($general->page_name == 'logo')
            <div class="card">
                <form  action="{{route('generalsetting.update',$general->page_name)}}" method="post" enctype="multipart/form-data" >
                  @csrf
                  @method('put')
                  <div class="card-header">
                    <h4>Logo</h4>
                  </div>
                  <div class="row">
                    <div class="form-group col-md-6 col-12">
                      <div class="form-group ml-4">
                          <label for="image" >Old Logo</label>
                          <br>
                          <img src="/assets/logo/{{$general->image}}"  class="img-fluid" width="100px" alt="Preview image">
                      </div>
                    </div>
                    <div class="form-group col-md-6 col-12">
                      <div class="form-group ml-4">
                          <label for="image" >New Logo(Optional)</label>
                          <input  id="cat_image" type="file" name="image" width="100px" class="form-control">
                          @error('image')
                          <small class="text-danger">{{$message}}</small>
                          @enderror
                      </div>
                      <div class="form-group ml-4">
                          <img src="#" id="category-img-tag" class="img-fluid" width="200px" alt="Preview image">
                      </div>
                    </div>
                  </div>
                  <div class="card-footer text-right">
                    <button class="btn btn-primary">Save Changes</button>
                  </div>
                </form>
            </div>
            @elseif ($general->page_name == 'about_us')
            <div class="card">
              <form  action="{{route('generalsetting.update',$general->page_name)}}" method="post" enctype="multipart/form-data" >
                @csrf
                @method('put')
                <div class="card-header">
                  <h4>About us</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="form-group col-md-12 col-12">
                            <label> Content</label>
                            <textarea name="content" id="" cols="30" rows="10" class="form-control" >{{$general->content}}</textarea>
                            @error('content')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                          </div>
                    </div>
                    
                </div>
                <div class="card-footer text-right">
                  <button class="btn btn-primary">Save Changes</button>
                </div>
              </form>
            </div>
            
            @elseif($general->page_name == 'main_address')
            <div class="card">
                <form  action="{{route('generalsetting.update',$general->page_name)}}" method="post" enctype="multipart/form-data" >
                  @csrf
                  @method('put')
                  <div class="card-header">
                    <h4>Main Address</h4>
                  </div>
                  <div class="card-body">
                      <div class="row">
                          <div class="form-group col-md-12 col-12">
                              <label> Address</label>
                              <textarea name="content" id="" cols="30" rows="10" class="form-control" >{{$general->content}}</textarea>
                              @error('content')
                              <small class="text-danger">{{$message}}</small>
                              @enderror
                            </div>
                      </div>
                      
                  </div>
                  <div class="card-footer text-right">
                    <button class="btn btn-primary">Save Changes</button>
                  </div>
                </form>
              </div>
            @endif
            @endforeach
          </div>
        </div>
      </div>

</div>
@endsection