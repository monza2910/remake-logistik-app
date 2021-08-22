@extends('dashboard-admin.home')

@section('title')
    Destinations
@endsection

@section('title-page')
    <h1>Create Destination</h1>
@endsection

@section('content')
<div class="container-fluid">
    <div class="card shadow mb-4">
          <div class="card-body">

            {{-- <div class="alert alert-info">
              <b>Note!</b> Not all browsers support HTML5 type input.
            </div> --}}
            <form action="{{route('destination.store')}}" method="post">
                @csrf
                <div class="form-group">
                    <label>Province</label>
                    <input type="text" name="province" value="{{old('province')}}" class="form-control">
                    @error('province')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label>City</label>
                    <input type="text" name="city" value="{{old('city')}}" class="form-control">
                    @error('city')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Subdistrict</label>
                    <input type="text" name="subdistrict" value="{{old('subdistrict')}}" class="form-control">
                    @error('subdistrict')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group text-right">
                    <button class="btn btn-primary mb-2" type="submit">Submit</button>
                    <a href="{{route('destination.index')}}" class="btn btn-info  mb-2"> Back</a>
                </div>
            </form>
          </div>
    </div>
    

</div>
@endsection