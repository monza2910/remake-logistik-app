@extends('dashboard-admin.home')

@section('title')
    Outlet
@endsection

@section('title-page')
    <h1>Create outlet Service</h1>
@endsection

@section('content')
<div class="container-fluid">
    <div class="card shadow mb-4">
          <div class="card-body">

            {{-- <div class="alert alert-info">
              <b>Note!</b> Not all browsers support HTML5 type input.
            </div> --}}
            <form action="{{route('outlet.store')}}" method="post">
                @csrf
                <div class="form-group">
                    <label>Name Outlet</label>
                    <input type="text" name="name" placeholder="" value="{{old('name')}}" class="form-control">
                    @error('name')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Keyword GMaps</label>
                    <input type="text" name="keyword" placeholder="" value="{{old('keyword')}}" class="form-control">
                    @error('keyword')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group select-box">
                    <label >Origin </label>
                    <select class="form-control selectpicker " data-live-search="true" name="origin_id" >
                        @foreach ($origins as $origin)
                            <option value="{{$origin->id}}">{{$origin->province.", ". $origin->city.", ".$origin->subdistrict}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Spesific Address</label>
                    <input type="text" name="address" placeholder="" value="{{old('address')}}" class="form-control">
                    @error('address')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group text-right">
                    <button class="btn btn-primary mb-2" type="submit">Submit</button>
                    <a href="{{route('outlet.index')}}" class="btn btn-info  mb-2"> Back</a>
                </div>
            </form>
          </div>
    </div>
    

</div>
@endsection