@extends('dashboard-admin.home')

@section('title')
    Origins
@endsection

@section('title-page')
    <h1>Update Origin</h1>
@endsection

@section('content')
<div class="container-fluid">
    <div class="card shadow mb-4">
          <div class="card-body">

            {{-- <div class="alert alert-info">
              <b>Note!</b> Not all browsers support HTML5 type input.
            </div> --}}
            <form action="{{route('origin.update',$origin->id)}}" method="post">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label>Province</label>
                    <input type="text" name="province" value="{{$origin->province}}" class="form-control">
                    @error('province')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label>City</label>
                    <input type="text" name="city" value="{{$origin->city}}" class="form-control">
                    @error('city')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Subdistrict</label>
                    <input type="text" name="subdistrict" value="{{$origin->subdistrict}}" class="form-control">
                    @error('subdistrict')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group text-right">
                    <button class="btn btn-primary mb-2" type="submit">Submit</button>
                    <a href="{{route('origin.index')}}" class="btn btn-info  mb-2"> Back</a>
                </div>
            </form>
          </div>
    </div>
    

</div>
@endsection