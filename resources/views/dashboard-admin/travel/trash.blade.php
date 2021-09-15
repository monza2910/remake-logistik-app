
@extends('dashboard-admin.home')

@section('title')
    travels
@endsection

@section('title-page')
    <h1>travels</h1>
@endsection

@section('content')
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="{{route('travel.create')}}" class="btn btn-icon icon-left btn-primary"><i class="fas fa-plus"></i> Add travel</a>
            
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
                            <th>Variant</th>
                            <th>Facility</th>
                            <th>Origin</th>
                            <th>Destination</th>
                            <th>Price</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($travels as $index => $travel)    
                        <tr>
                            <td>{{$index + 1}}</td> 
                            <td>
                                <img src="/images/travels/{{$travel->thumbnail}}"  class="img-fluid" width="300px" alt="Preview image">
                            </td>
                            <td>{{$travel->name}}</td>
                            <td>{{$travel->variant}}</td>
                            <td>
                                @foreach ($travel->facilitys as $facility)
                                <ul>
                                    <li>{{$facility->name}}</li>
                                </ul>
                                @endforeach
                            </td>
                            <td>
                                @if ($travel->origin->city != null )
                                {{$travel->origin->city}}
                                
                                @else
                                    
                                @endif
                            </td>
                            
                            <td>
                                @if ($travel->destination->city != null )
                                {{$travel->destination->city}}
                                
                                @else
                                    
                                @endif
                            </td>
                        
                            <td>{{$travel->price}}</td>
                            <td >
                                <form action="{{ route('travel.kill',$travel->id) }}" method="POST">
                                    
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{route('travel.restore',$travel->id)}}" class="btn btn-icon icon-left btn-warning"><i class="fas fa-pencil-alt"></i> Restore</a>
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