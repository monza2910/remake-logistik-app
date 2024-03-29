
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
            <a href="{{route('travelcart')}}" class="btn btn-icon icon-left btn-primary"><i class="fas fa-plus"></i> Add Transaction</a>
            
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
                            <th>Nama Penumpang </th>
                            <th>No Penumpang</th>
                            <th>Titik Penjemputan</th>
                            <th>Tanggal Pemberangkatan</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($transactions as $index => $tr)    
                        <tr>
                            <td>{{$index +1}}</td> 
                            <td><img src="/images/trtravel/{{$tr->qrcode}}" alt="" width="100px" height="100px"></td>
                            <td>{{$tr->invoice}}</td>
                            <td>{{$tr->nama_penumpang}}</td>
                            <td>{{$tr->no_penumpang}}</td>
                            <td>{{$tr->alamat_penjemputan}}</td>
                            <td>{{$tr->tgl_berangkat.' '.$tr->jam_berangkat}}</td>
                            <td>{{$tr->status}}</td>
                            <td >
                                <form action="{{ route('transactiontravel.destroy',$tr->id) }}" method="POST">
                                    
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{route('transactiontravel.show',$tr->id)}}" class="btn btn-icon icon-left btn-info"><i class="fas fa-info"></i></a>
                                    @if ($tr->status =='debit')
                                        
                                    <a href="{{route('transactiontravel.edit',$tr->id)}}" class="btn btn-icon icon-left btn-warning"><i class="fas fa-pencil-alt"></i> </a>
                                    @endif
                                    <a href="{{route('printtravel',$tr->id)}}" class="btn btn-danger btn-icon icon-left"><i class="fas fa-file-pdf"></i></a> 
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