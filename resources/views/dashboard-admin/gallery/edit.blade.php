
@extends('dashboard-admin.home')

@section('title')
    gallery
@endsection

@section('title-page')
    <h1>Update gallery</h1>
@endsection

@section('content')
<div class="container-fluid">
    <div class="card shadow mb-4">
          <div class="card-body">

            {{-- <div class="alert alert-info">
              <b>Note!</b> Not all browsers support HTML5 type input.
            </div> --}}
            <form action="{{route('gallery.update',$gallery->id)}}" method="post" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                
                <div class="form-group">
                    <label for="image" >Image</label>
                    <br>
                    <img src="/images/gallery/{{$gallery->image}}"  class="img-fluid" width="500px" alt="Preview image">
                </div>
                <div class="form-group">
                    <label for="image" >New Image(Optional)</label>
                    <input  id="cat_image" type="file" name="image" value="{{$gallery->image}}" class="form-control">
                    @error('image')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <img src="#" id="category-img-tag" class="img-fluid" width="500px" alt="Preview image">
                </div>
                <div class="form-group">
                    <label >Status</label>
                    <br>
                    <select class="form-control selectric" name="status">
                        @if ($gallery->status == 0 )
                            <option selected value="0">Draft</option>
                            <option value="1">Active</option>
                            @elseif($gallery->status == 1)
                            <option value="0">Draft</option>
                            <option selected value="1">Active</option>
                        @endif
                    </select>
                </div>
                <div class="form-group text-right">
                    <button class="btn btn-primary mb-2" type="submit">Submit</button>
                    <a href="{{route('gallery.index')}}" class="btn btn-info  mb-2"> Back</a>
                </div>
            </form>
          </div>
    </div>
    

</div>
@endsection