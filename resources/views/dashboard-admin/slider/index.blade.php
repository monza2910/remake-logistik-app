
@extends('dashboard-admin.home')

@section('title')
    Sliders
@endsection

@section('title-page')
    <h1>Sliders</h1>
@endsection

@section('content')
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="{{route('slider.create')}}" class="btn btn-icon icon-left btn-primary"><i class="fas fa-plus"></i> Add Slider</a>
            
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
                            <th>Description</th>
                            <th>Button</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sliders as $index => $slider)    
                        <tr>
                            <td>{{$index + 1}}</td>
                            <td>     
                                <img src="{{$slider->image}}"  class="img-fluid" width="200px" alt="Preview image">
                            </td>
                            <td>{{$slider->title_one.''.$slider->title_two}}</td>
                            <td>{{$slider->description}}</td>
                            @if ($slider->button != null)
                            <td>{{$slider->button->name}}</td>
                            @else
                            <td>
                            </td>
                            @endif
                            
                            <td>

                            @if ($slider->status == '0')
                                Draft
                            @else
                                Active
                            @endif

                            </td>
                            <td >
                                <form action="{{ route('slider.destroy',$slider->id) }}" method="POST">
                                    
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{route('slider.edit',$slider->id)}}" class="btn btn-icon icon-left btn-warning"><i class="fas fa-pencil-alt"></i> Update</a>
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