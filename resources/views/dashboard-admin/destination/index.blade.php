
@extends('dashboard-admin.home')

@section('title')
    Destinations
@endsection

@section('title-page')
    <h1>Destinations</h1>
@endsection

@section('content')
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="{{route('destination.create')}}" class="btn btn-icon icon-left btn-primary"><i class="fas fa-plus"></i> Add Destination</a>
            
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
                            <th>Province</th>
                            <th>City</th>
                            <th>Subdistrict</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($destinations as $index => $destination)    
                        <tr>
                            <td>{{$index + 1}}</td>
                            <td>{{$destination->province}}</td>
                            <td>{{$destination->city}}</td>
                            <td>{{$destination->subdistrict}}</td>
                            <td >
                                <form action="{{ route('destination.destroy',$destination->id) }}" method="POST">
                                    
                                    @csrf
                                    @method('DELETE')
                                    
                                    <a href="{{route('destination.edit',$destination->id)}}" class="btn btn-icon icon-left btn-warning"><i class="fas fa-pencil-alt"></i> Update</a>
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