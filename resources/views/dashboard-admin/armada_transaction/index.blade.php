
@extends('dashboard-admin.home')

@section('title')
    armadas
@endsection

@section('title-page')
    <h1>armadas</h1>
@endsection

@section('content')
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="{{route('armadacart')}}" class="btn btn-icon icon-left btn-primary mx-2 my-1"><i class="fas fa-plus"></i> Add Transaction Truck</a>
            <a href="{{route('armadabuscart')}}" class="btn btn-icon icon-left btn-primary mx-2 my-1"><i class="fas fa-plus"></i> Add Transaction Bus</a>
            
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
                            <th>Barcode</th>
                            <th>Invoice</th>
                            <th>Nama Penyewa </th>
                            <th>No Penyewa</th>
                            <th>Alamat</th>
                            <th>Tgl Berangkat</th>
                            <th>Tgl Kembali</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($transactions as $index => $tr)    
                        <tr>
                            <td>{{$index +1}}</td> 
                            <td><img src="/images/trarmada/{{$tr->qr_code}}" alt="" width="100px" height="100px"></td>
                            <td>{{$tr->invoice}}</td>
                            <td>{{$tr->penyewa}}</td>
                            <td>{{$tr->no_penyewa}}</td>
                            <td>{{$tr->alamat_penyewa}}</td>
                            <td>{{$tr->tgl_berangkat}}</td>
                            <td>{{$tr->tgl_kembali}}</td>
                            <td>{{$tr->status}}</td>
                            <td >
                                <form action="{{ route('transactionarmada.destroy',$tr->id) }}" method="POST">
                                    
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{route('transactionarmada.show',$tr->id)}}" class="btn btn-icon icon-left btn-info"><i class="fas fa-info"></i></a>
                                    @if ($tr->status =='debit')
                                        
                                    <a href="{{route('transactionarmada.edit',$tr->id)}}" class="btn btn-icon icon-left btn-warning"><i class="fas fa-pencil-alt"></i> </a>
                                    @endif
                                    <a href="{{route('printarmada',$tr->id)}}" class="btn btn-danger btn-icon icon-left"><i class="fas fa-file-pdf"></i></a> 
                                    <button type="submit" class="btn btn-icon icon-left btn-primary" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"><i class="fas fa-trash-alt"></i></button>
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