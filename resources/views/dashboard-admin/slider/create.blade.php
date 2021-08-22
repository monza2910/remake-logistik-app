
@extends('dashboard-admin.home')

@section('title')
    Slider
@endsection

@section('title-page')
    <h1>Create Slider</h1>
@endsection

@section('content')
<div class="container-fluid">
    <div class="card shadow mb-4">
          <div class="card-body">

            {{-- <div class="alert alert-info">
              <b>Note!</b> Not all browsers support HTML5 type input.
            </div> --}}
            <form action="{{route('slider.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>First Title </label>
                    <input type="text" name="title_one" value="{{old('title_one')}}" class="form-control">
                    @error('title_one')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Second Title</label>
                    <input type="text" name="title_two" value="{{old('title_two')}}" class="form-control">
                    @error('title_two')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Description</label>
                    <textarea class="form-control" name="description" rows="3">{{old('description')}}</textarea>
                    @error('description')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="image" >Image</label>
                    <input  id="cat_image" type="file" name="image" value="{{old('image')}}" class="form-control">
                    @error('image')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <img src="#" id="category-img-tag" class="img-fluid" width="500px" alt="Preview image">
                </div>
                <div class="form-group">
                    <label >Buton</label>
                    <select class="form-control selectric" name="button_id">
                        @foreach ($buttons as $button)
                            <option value="{{$button->id}}">{{$button->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label >Status</label>
                    <br>
                    <select class="form-control selectric" name="status">
                        <option value="0">Draft</option>
                        <option value="1">Active</option>
                    </select>
                </div>
                <div class="form-group text-right">
                    <button class="btn btn-primary mb-2" type="submit">Submit</button>
                    <a href="{{route('slider.index')}}" class="btn btn-info  mb-2"> Back</a>
                </div>
            </form>
          </div>
    </div>
    

</div>
@endsection