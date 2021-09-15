@extends('dashboard-admin.home')

@section('title')
    Shipping Rate
@endsection

@section('title-page')
    <h1>Create Rate</h1>
@endsection

@section('content')
<div class="container-fluid">
    <div class="card shadow mb-4">
          <div class="card-body">

            {{-- <div class="alert alert-info">
              <b>Note!</b> Not all browsers support HTML5 type input.
            </div> --}}
            <form action="{{route('rate.store')}}" method="post">
                @csrf
                <div class="form-group">
                    <label >Origin</label>
                    <select class="form-control selectpicker" data-live-search="true" name="origin_id">
                        @foreach ($origins as $origin)
                            <option value="{{$origin->id}}">{{$origin->province}}, {{$origin->city}}, {{$origin->subdistrict}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group select-box">
                    <label >destination</label>
                    <select class="form-control selectpicker " data-live-search="true" name="destination_id" >
                        @foreach ($destinations as $destination)
                            <option value="{{$destination->id}}">{{$destination->province}}, {{$destination->city}}, {{$destination->subdistrict}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Under Terms Price(<50kg) </label> 
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                          <div class="input-group-text">Rp.</div>
                        </div>
                        <input type="number" class="form-control" min="0" value="{{old('under_terms')}}" name="under_terms" id="inlineFormInputGroup" >
                    </div>
                    @error('under_terms')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Above Terms Price(>50kg)</label>
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                          <div class="input-group-text">Rp.</div>
                        </div>
                        <input type="number" class="form-control" min="0" value="{{old('above_terms')}}" name="above_terms" id="inlineFormInputGroup">
                    </div>
                    @error('above_terms')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Estimated arrived (Days)</label>
                    <input type="text" name="est_arrived" placeholder="" value="{{old('est_arrived')}}" class="form-control">
                    @error('est_arrived')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group select-box">
                    <label >Variant</label>
                    <select class="form-control selectpicker " data-live-search="true" name="variant_id" >
                        @foreach ($variants as $variant)
                            <option value="{{$variant->id}}">{{$variant->variant_service}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group text-right">
                    <button class="btn btn-primary mb-2" type="submit">Submit</button>
                    <a href="{{route('rate.index')}}" class="btn btn-info  mb-2"> Back</a>
                </div>
            </form>
          </div>
    </div>
    

</div>
@endsection