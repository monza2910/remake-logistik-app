@extends('dashboard-admin.home')

@section('title')
    outlet 
@endsection

@section('title-page')
    <h1>Update outlet </h1>
@endsection

@section('content')
<div class="container-fluid">
    <div class="card shadow mb-4">
          <div class="card-body">

            {{-- <div class="alert alert-info">
              <b>Note!</b> Not all browsers support HTML5 type input.
            </div> --}}
            <form action="{{route('outlet.update',$outlet->id)}}" method="post">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label>Name Outlet</label>
                    <input type="text" name="name" placeholder="" value="{{$outlet->name}}" class="form-control">
                    @error('name')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group select-box">
                    <label >Origin </label>
                    <select class="form-control selectpicker " data-live-search="true" name="origin_id" >
                        @if ($outlet->origin)
                        <option value="{{$outlet->origin_id}}">{{$outlet->origin->province.", ". $outlet->origin->city.", ".$outlet->origin->subdistrict}}</option>
                        @foreach ($origins as $origin)
                        <option value="{{$origin->id}}">{{$origin->province.", ". $origin->city.", ".$origin->subdistrict}}</option>
                        @endforeach
                        @else
                        @foreach ($origins as $origin)
                        <option value="{{$origin->id}}">{{$origin->province.", ". $origin->city.", ".$origin->subdistrict}}</option>
                        @endforeach
                        @endif
                        
                    </select>
                </div>
                <div class="form-group">
                    <label>Spesific Address</label>
                    <input type="text" name="address" placeholder="" value="{{$outlet->address}}" class="form-control">
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