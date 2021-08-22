@extends('dashboard-admin.home')

@section('title')
    Tags
@endsection

@section('title-page')
    <h1>Tags</h1>
@endsection

@section('content')
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="{{route('tags.create')}}" class="btn btn-icon icon-left btn-primary"><i class="fas fa-plus"></i> Add Tags</a>
            
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
                            <th>Name</th>
                            <th>Slug</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tags as $index => $tag)    
                        <tr>
                            <td>{{$index + 1}}</td>
                            <td>{{$tag->name}}</td>
                            <td>{{$tag->slug}}</td>
                            <td >
                                <form action="{{ route('tags.destroy',$tag->id) }}" method="POST">
                                    
                                    @csrf
                                    @method('DELETE')
                                    
                                    <a href="{{route('tags.edit',$tag->id)}}" class="btn btn-icon icon-left btn-warning"><i class="fas fa-pencil-alt"></i> Update</a>
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