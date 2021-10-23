@extends('dashboard-admin.home')

@section('title')
    Shipping Rate
@endsection

@section('title-page')
    <h1>Update Rate</h1>
@endsection

@section('content')
<div class="container-fluid">
    <div class="card shadow mb-4">
          <div class="card-body">

            {{-- <div class="alert alert-info">
              <b>Note!</b> Not all browsers support HTML5 type input.
            </div> --}}
            <form action="{{route('rate.update',$rate->id)}}" method="post">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label >From</label>
                    <select class="form-control selectric" name="origin_id">
                        @if ($rate->origin)
                        <option value="{{$rate->origin_id}}">{{$rate->origin->province.', '.$rate->origin->city.', '.$rate->origin->subdistrict}}</option>
                        @foreach ($origins as $origin)
                            <option value="{{$origin->id}}">{{$origin->province.', '.$origin->city.', '.$origin->subdistrict}}</option>
                        @endforeach
                        @else
                        @foreach ($origins as $origin)
                        <option value="{{$origin->id}}">{{$origin->province.', '.$origin->city.', '.$origin->subdistrict}}</option>
                        @endforeach
                        @endif
                        
                    </select>
                </div>
                <div class="form-group select-box">
                    <label >To</label>
                    <select class="form-control selectric " name="destination_id" data-lice-search="true">
                        @if ($rate->destination)
                        <option value="{{$rate->origin_id}}">{{$rate->destination->province.', '.$rate->destination->city.', '.$rate->destination->subdistrict}}</option>
                        @foreach ($destinations as $destination)
                            <option value="{{$destination->id}}">{{$destination->province.', '.$destination->city.', '.$destination->subdistrict}}</option>
                        @endforeach
                        @else
                        @foreach ($destinations as $destination)
                            <option value="{{$destination->id}}">{{$destination->province.', '.$destination->city.', '.$destination->subdistrict}}</option>
                        @endforeach
                        @endif
                    </select>
                </div>
                <div class="form-group">
                    <label> under 50kg</label>
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                          <div class="input-group-text">Rp.</div>
                        </div>
                        <input type="number" class="form-control" min="0" value="{{$rate->under_terms}}" name="under_terms" id="inlineFormInputGroup" >
                    </div>
                    @error('under_terms')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label> above 50kg</label>
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                          <div class="input-group-text">Rp.</div>
                        </div>
                        <input type="number" class="form-control" min="0" value="{{$rate->above_terms}}" name="above_terms" id="inlineFormInputGroup">
                    </div>
                    @error('above_terms')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label> above 1-5 ton </label>
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                          <div class="input-group-text">Rp.</div>
                        </div>
                        <input type="number" class="form-control" min="0" value="{{$rate->one_ton}}" name="one_ton" id="inlineFormInputGroup" >
                    </div>
                    @error('one_ton')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Above 5-9 ton</label>
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                          <div class="input-group-text">Rp.</div>
                        </div>
                        <input type="number" class="form-control" min="0" value="{{$rate->five_ton}}" name="five_ton" id="inlineFormInputGroup">
                    </div>
                    @error('five_ton')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Above 10 Ton</label>
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                          <div class="input-group-text">Rp.</div>
                        </div>
                        <input type="number" class="form-control" min="0" value="{{$rate->ten_ton}}" name="ten_ton" id="inlineFormInputGroup">
                    </div>
                    @error('ten_ton')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Estimated arrived (Days)</label>
                    <input type="text" name="est_arrived" placeholder="" value="{{$rate->est_arrived}}" class="form-control">
                    @error('est_arrived')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group select-box">
                    <label >destination</label>
                    <select class="form-control selectpicker " data-live-search="true" name="variant_id" >
                        <option value="{{$rate->variantservice_id}}">{{$rate->variantservice->variant_service}}</option>
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