
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
                            <th>Invoice </th>
                            <th>Tracking Number </th>
                            <th>Recipient</th>
                            <th>address Recipient</th>
                            <th>Sender</th>
                            <th>address Sender</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($transactions as $index => $transaction)    
                        <tr>
                            <td>{{$index +1}}</td> 
                            <td>{{$transaction->invoice}}</td>
                            <td>{{$transaction->tracking_number}}</td>
                            <td>{{$transaction->penerima}}</td>
                            <td>{{$transaction->alamat_penerima}}</td>
                            <td>{{$transaction->pengirim}}</td>
                            <td>{{$transaction->alamat_pengirim}}</td>
                            <td >
                                <form action="{{ route('transaction.kill',$transaction->id) }}" method="POST">
                                    
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{route('transaction.restore',$transaction->id)}}" class="btn btn-icon icon-left btn-warning"><i class="fas fa-pencil-alt"></i> Restore</a>
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