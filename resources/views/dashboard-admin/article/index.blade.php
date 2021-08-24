
@extends('dashboard-admin.home')

@section('title')
    Articles
@endsection

@section('title-page')
    <h1>articles</h1>
@endsection

@section('content')
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="{{route('article.create')}}" class="btn btn-icon icon-left btn-primary"><i class="fas fa-plus"></i> Add article</a>
            
        </div>
        @if ($message = Session::get('success'))
        <div class="alert alert-success mx-4 my-4">
            <p>{{ $message }}</p>
        </div>
        @elseif($message = session::get('deleted'))
        <div class="alert alert-danger mx-4 my-4">
            <p>{{ $message }}</p>
        </div>
        @endif
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Image</th>
                            <th>Title</th>
                            <th>Slug</th>
                            <th>Category</th>
                            <th>Tags</th>
                            <th>Author</th>
                            <th>Created At</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($articles as $result => $article)    
                        <tr>
                            <td>{{$index + 1}}</td> 
                            <td>
                                <img src="/images/thumbnail/{{$article->thumbnail}}"  class="img-fluid" height="50px" width="100px" alt="Preview image">
                            </td>
                            <td>{{$article->title}}</td>
                            <td>{{$article->slug}}</td>
                            <td>
                                @if ($article->category->name != null)
                                    {{$article->category->name}} 
                                @else
                                   
                                @endif
                            </td>
                            <td>@foreach ($article->tags as $tag)
                                <ul>
                                    <li>
                                        {{$tag->name}}
                                    </li>
                                </ul>
                            @endforeach</td>
                            <td>{{$article->user->name.' ('.$article->user->role->name.')'}}</td>
                            <td>{{$article->created_at}}</td>
                            <td >
                                <form action="{{ route('article.destroy',$article->id) }}" method="POST">
                                    
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{route('article.edit',$article->id)}}" class="btn btn-icon icon-left btn-warning"><i class="fas fa-pencil-alt"></i> Update</a>
                                    <button type="submit" class="btn btn-icon icon-left btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
@endsection