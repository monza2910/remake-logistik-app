
@extends('dashboard-admin.home')

@section('title')
    Shipping Rates
@endsection

@section('title-page')
    <h1>Shipping Rate</h1>
@endsection

@section('content')
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="{{route('rate.create')}}" class="btn btn-icon icon-left btn-primary"><i class="fas fa-plus"></i> Add Shipping Rate</a>
            
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
                            <th>Origin</th>
                            <th>Destination</th>
                            <th>Under Terms Rate</th>
                            <th>Above Terms Rate</th>
                            <th>Estimated arrived</th>
                            <th>Variant Service</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($rates as $index => $rate)    
                        <tr>
                            <td>{{$index + 1}}</td>
                            <td>{{$rate->origin->province.', '.$rate->origin->city.', '.$rate->origin->subdistrict}}</td>
                            <td>{{$rate->destination->province.', '.$rate->destination->city.', '.$rate->destination->subdistrict}}</td>
                            <td>Rp. {{$rate->under_terms}}</td>
                            <td>Rp. {{$rate->above_terms}}</td>
                            <td>{{$rate->est_arrived}} Days</td>
                            <td>{{$rate->variantservice->variant_service}}</td>
                            <td >
                                <form action="{{ route('rate.destroy',$rate->id) }}" method="POST">
                                    
                                    @csrf
                                    @method('DELETE')
                                    
                                    <a href="{{route('rate.edit',$rate->id)}}" class="btn btn-icon icon-left btn-warning"><i class="fas fa-pencil-alt"></i> Update</a>
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