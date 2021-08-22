
@extends('dashboard-admin.home')

@section('title')
    Testimonials
@endsection

@section('title-page')
    <h1>Testimonials</h1>
@endsection

@section('content')
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="{{route('testimonial.create')}}" class="btn btn-icon icon-left btn-primary"><i class="fas fa-plus"></i> Add Testimonial</a>
            
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
                            <th>Name</th>
                            <th>Position</th>
                            <th>Company</th>
                            <th>Quote</th>
                            <th>status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($testimonials as $index => $testimonial)    
                        <tr>
                            <td>{{$index +1}}</td>
                            <td>     
                                <img src="/testimonials/{{$testimonial->image}}"  class="img-fluid" width="100px" alt="Preview image">
                            </td>
                            <td>{{$testimonial->name}}</td>
                            <td>{{$testimonial->position}}</td>
                            <td>{{$testimonial->company}}</td>
                            <td>{{$testimonial->quote}}</td>
                            @if ($testimonial->status == 0)
                            <td>Draft</td>
                            @else
                            <td>Active</td>
                            @endif
                            <td >
                                <form action="{{ route('testimonial.destroy',$testimonial->id) }}" method="POST">
                                    
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{route('testimonial.edit',$testimonial->id)}}" class="btn btn-icon icon-left btn-warning"><i class="fas fa-pencil-alt"></i> Update</a>
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