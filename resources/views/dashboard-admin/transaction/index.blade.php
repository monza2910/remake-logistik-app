
@extends('dashboard-admin.home')

@section('title')
    Transactions
@endsection

@section('title-page')
    <h1>Transactions</h1>
@endsection

@section('content')
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="{{route('logisticcart')}}" class="btn btn-icon icon-left btn-primary mx-2 my-2"><i class="fas fa-plus"></i> Add transaction(kg)</a>
            <a href="{{route('logistictoncart')}}" class="btn btn-icon icon-left btn-primary mx-2 my-2"><i class="fas fa-plus"></i> Add transaction(ton)</a>
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
                            <th>Tracking Number </th>
                            <th>Recipient</th>
                            <th>Sender</th>
                            <th>Satuan</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($transactions as $index => $transaction)    
                        <tr>
                            <td>{{$index +1}}</td> 
                            <td><img src="/images/transaction/{{$transaction->qr_code}}" alt="" width="100px" height="100px"></td>
                            <td>{{$transaction->invoice}}</td>
                            <td>{{$transaction->tracking_number}}</td>
                            <td>{{$transaction->penerima}}</td>
                            <td>{{$transaction->pengirim}}</td>
                            <td>{{$transaction->satuan}}</td>
                            <td>{{$transaction->status}}</td>
                            <td >
                                <form action="{{ route('transaction.destroy',$transaction->id) }}" method="POST">
                                    
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{route('transaction.show',$transaction->id)}}" class="btn btn-icon icon-left btn-info"><i class="fas fa-info"></i></a>
                                    @if ($transaction->status =="debit")
                                    <a href="{{route('transaction.edit',$transaction->id)}}" class="btn btn-icon icon-left btn-warning"><i class="fas fa-pencil-alt"></i> </a>
                                    @endif
                                    <a href="{{route('printlogistic',$transaction->id)}}" class="btn btn-danger btn-icon icon-left"><i class="fas fa-file-pdf"></i></a> 
                                    
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