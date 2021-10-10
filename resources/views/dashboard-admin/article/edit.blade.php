
@extends('dashboard-admin.home')

@section('title')
    Article
@endsection

@section('title-page')
    <h1>Update article</h1>
@endsection

@section('content')
<div class="container-fluid">
    <div class="card shadow mb-4">
          <div class="card-body">

            {{-- <div class="alert alert-info">
              <b>Note!</b> Not all browsers support HTML5 type input.
            </div> --}}
            <form action="{{route('article.update',$article->id)}}" method="post" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label>Title </label>
                    <input type="text" name="title" value="{{$article->title}}" class="form-control">
                    @error('title')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label>Slug (optional) </label>
                    <input type="text" name="slug" value="{{$article->slug}}" class="form-control">
                    @error('slug')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="">Old Thumbnail</label>
                    <br>
                    <img src="/images/thumbnail/{{$article->thumbnail}}"  class="img-fluid" width="500px" >
                </div>

                <div class="form-group">
                    <label for="image" >New Thumbnail (optional)</label>
                    <input  id="cat_image" type="file" name="thumbnail" value="{{old('thumbnail')}}" class="form-control">
                    @error('thumbnail')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <img src="#" id="category-img-tag" class="img-fluid" width="500px" alt="Preview image">
                </div>

                <div class="form-group">
                    <label >Category</label>
                    <select class="form-control selectpicker" data-live-search="true" name="category_id">
                        @if ($article->category)
                        <option value="{{$article->category->id}}" selected>{{$article->category->name}}</option>
                        @else
                        <option value="" selected>Select Category</option>
                        @endif
                        @foreach ($categorys as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label >Tags</label>
                    <select class="form-control selectpicker" data-live-search="true" multiple="" name="tags[]">
                        @foreach ($tags as $tag)
                            <option value="{{$tag->id}}" @foreach ($article->tags as $value)
                                @if ($tag->id == $value->id)
                                    selected
                                @endif
                            @endforeach>{{$tag->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Content</label>
                    <textarea class="form-control" id="content" name="content" rows="3">{{$article->content}}</textarea>
                    @error('content')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label >Status</label>
                    <br>
                    <select class="form-control selectric" name="status">
                        @if ($article->status == 0)
                        <option value="0" selected>Draft</option>
                        <option value="1">Active</option>
                        @else
                        <option value="0" >Draft</option>
                        <option value="1" selected>Active</option>
                        
                        @endif
                    </select>
                </div>
                <div class="form-group text-right">
                    <button class="btn btn-primary mb-2" type="submit">Submit</button>
                    <a href="{{route('article.index')}}" class="btn btn-info  mb-2"> Back</a>
                </div>
            </form>
          </div>
    </div>
    

</div>
@endsection
@push('scripts')
    <script >
      
    CKEDITOR.replace( 'content',{
      filebrowserUploadUrl      : "{{route('article.upload',['_token' => csrf_token()])}}",
      filebrowserUploadMethod   : "form",

    } );
    
  </script>
@endpush