
@extends('dashboard-admin.home')

@section('title')
    armada
@endsection

@section('title-page')
    <h1>armada</h1>
@endsection

@section('content')
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="{{route('armada.create')}}" class="btn btn-icon icon-left btn-primary"><i class="fas fa-plus"></i> Add armada</a>
            
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
                        @foreach ($armadas as $index => $armada)    
                        <tr>
                            <td>{{$index + 1}}</td> 
                            <td>
                                <img src="/images/armadas/{{$armada->thumbnail}}"  class="img-fluid" width="300px" alt="Preview image">
                            </td>
                            <td>{{$armada->name}}</td>
                            <td>{{$armada->variant}}</td>
                            <td>
                                @foreach ($armada->facilitys as $facility)
                                <ul>
                                    <li>{{$facility->name}}</li>
                                </ul>
                                @endforeach
                            </td>
                            <td>
                                @if ($armada->origin->city != null )
                                {{$armada->origin->city}}
                                
                                @else
                                    
                                @endif
                            </td>
                            
                            <td>
                                @if ($armada->destination->city != null )
                                {{$armada->destination->city}}
                                
                                @else
                                    
                                @endif
                            </td>
                        
                            <td>{{$armada->price}}</td>
                            <td >
                                <form action="{{ route('armada.destroy',$armada->id) }}" method="POST">
                                    
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{route('armada.edit',$armada->id)}}" class="btn btn-icon icon-left btn-warning"><i class="fas fa-pencil-alt"></i> Update</a>
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