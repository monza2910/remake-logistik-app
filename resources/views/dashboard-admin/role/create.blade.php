@extends('dashboard-admin.home')

@section('title')
    role 
@endsection

@section('title-page')
    <h1>Create role </h1>
@endsection

@section('content')
<div class="container-fluid">
    <div class="card shadow mb-4">
          <div class="card-body">

            {{-- <div class="alert alert-info">
              <b>Note!</b> Not all browsers support HTML5 type input.
            </div> --}}
            <form action="{{route('role.store')}}" method="post">
                @csrf
                <div class="form-group">
                    <label>role</label>
                    <input type="text" name="role" placeholder="" value="{{old('role')}}" class="form-control">
                    @error('role')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group text-right">
                    <button class="btn btn-primary mb-2" type="submit">Submit</button>
                    <a href="{{route('role.index')}}" class="btn btn-info  mb-2"> Back</a>
                </div>
            </form>
          </div>
    </div>
    

</div>
@endsection