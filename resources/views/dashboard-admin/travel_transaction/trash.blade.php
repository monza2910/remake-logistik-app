
@extends('dashboard-admin.home')

@section('title')
    Transactions
@endsection

@section('title-page')
    <h1>Deleted Transactions</h1>
@endsection

@section('content')
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
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
                                <form action="{{ route('transactiontravel.kill',$tr->id) }}" method="POST">
                                    
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{route('transactiontravel.restore',$tr->id)}}" class="btn btn-icon icon-left btn-warning"><i class="fas fa-pencil-alt"></i> Restore</a>
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