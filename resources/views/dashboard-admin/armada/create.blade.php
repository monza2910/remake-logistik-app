
@extends('dashboard-admin.home')

@section('title')
    armada
@endsection

@section('title-page')
    <h1>Create armada</h1>
@endsection

@section('content')
<div class="container-fluid">
    <div class="card shadow mb-4">
          <div class="card-body">

            {{-- <div class="alert alert-info">
              <b>Note!</b> Not all browsers support HTML5 type input.
            </div> --}}
            <form action="{{route('armada.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>Name </label>
                    <input type="text" name="name" value="{{old('name')}}" class="form-control">
                    @error('name')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Variant </label>
                    <input type="text" name="variant" value="{{old('variant')}}" class="form-control">
                    @error('variant')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                
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
                    <label >Facilitys</label>
                    <select class="form-control selectpicker" multiple="" name="facilitys[]">
                        @foreach ($facilitys as $fac)
                            <option value="{{$fac->id}}">{{$fac->name}}</option>
                        @endforeach
                    </select>
                </div> 
                <div class="form-group">
                    <label>Price </label>
                    <input type="number" name="price" value="{{old('price')}}" class="form-control">
                    @error('price')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="image" >Thumbnail</label>
                    <input  id="cat_image" type="file" name="thumbnail" value="{{old('thumbnail')}}" class="form-control">
                    @error('thumbnail')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <img src="#" id="category-img-tag" class="img-fluid" width="500px" alt="Preview image">
                </div>

                <div class="form-group">
                    <label>Content</label>
                    <textarea class="form-control" id="content" name="content" rows="3">{{old('content')}}</textarea>
                    @error('content')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>

                
                <div class="form-group text-right">
                    <button class="btn btn-primary mb-2" type="submit">Submit</button>
                    <a href="{{route('armada.index')}}" class="btn btn-info  mb-2"> Back</a>
                </div>
            </form>
          </div>
    </div>
    

</div>
@endsection
@push('scripts')
    <script >
      
    CKEDITOR.replace( 'content',{
      filebrowserUploadUrl      : "{{route('armada.upload',['_token' => csrf_token()])}}",
      filebrowserUploadMethod   : "form",

    } );
    
  </script>
@endpush