@extends('dashboard-admin.home')

@section('title')
    Partners
@endsection

@section('title-page')
    <h1>Update Partner</h1>
@endsection

@section('content')
<div class="container-fluid">
    <div class="card shadow mb-4">
          <div class="card-body">

            {{-- <div class="alert alert-info">
              <b>Note!</b> Not all browsers support HTML5 type input.
            </div> --}}
            <form action="{{route('partner.update',$partner->id)}}" method="post" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name" value="{{$partner->name}}" class="form-control">
                    @error('name')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">Logo </label>
                    <br>
                    <img src="/partners/{{$partner->image}}" class="img-fluid" width="200px" alt="Preview image">
                </div>
                <div class="form-group">
                    <label for="image" >New Logo(optional)</label>
                    <input  id="cat_image" type="file" name="image" class="form-control">
                    @error('image')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <img src="#" id="category-img-tag" class="img-fluid" width="200px" alt="Preview image">
                </div>
                <div class="form-group">
                    <label>Website</label>
                    <input type="text" name="website" value="{{$partner->website}}" class="form-control">
                    @error('website')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group text-right">
                    <button class="btn btn-primary mb-2" type="submit">Submit</button>
                    <a href="{{route('partner.index')}}" class="btn btn-info  mb-2"> Back</a>
                </div>
            </form>
          </div>
    </div>
    

</div>
@endsection