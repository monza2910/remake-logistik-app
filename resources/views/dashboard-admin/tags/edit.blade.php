@extends('dashboard-admin.home')

@section('title')
    Tags
@endsection

@section('title-page')
    <h1>Edit Tags</h1>
@endsection

@section('content')
<div class="container-fluid">
    <div class="card shadow mb-4">
          <div class="card-body">

            {{-- <div class="alert alert-info">
              <b>Note!</b> Not all browsers support HTML5 type input.
            </div> --}}
            <form action="{{route('tags.update',$tag->id)}}" method="post">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name" value="{{$tag->name}}" class="form-control">
                    @error('name')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group text-right">
                    <button class="btn btn-primary mb-2" type="submit">Submit</button>
                    <a href="{{route('tags.index')}}" class="btn btn-info  mb-2"> Back</a>
                </div>
            </form>
          </div>
    </div>
    

</div>
@endsection