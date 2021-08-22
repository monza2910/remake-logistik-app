@extends('dashboard-admin.home')

@section('title')
    Variant Service
@endsection

@section('title-page')
    <h1>Create Variant Service</h1>
@endsection

@section('content')
<div class="container-fluid">
    <div class="card shadow mb-4">
          <div class="card-body">

            {{-- <div class="alert alert-info">
              <b>Note!</b> Not all browsers support HTML5 type input.
            </div> --}}
            <form action="{{route('variant.update',$variant->id)}}" method="post">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label>Variant</label>
                    <input type="text" name="variant" placeholder="" value="{{$variant->variant_service}}" class="form-control">
                    @error('variant')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group text-right">
                    <button class="btn btn-primary mb-2" type="submit">Submit</button>
                    <a href="{{route('variant.index')}}" class="btn btn-info  mb-2"> Back</a>
                </div>
            </form>
          </div>
    </div>
    

</div>
@endsection