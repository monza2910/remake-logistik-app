@extends('dashboard-admin.home')

@section('title')
    Transactions
@endsection

@section('title-page')
    <h1>Edit Transaction</h1>
@endsection

@section('content')
<div class="container-fluid">
    <div class="card shadow mb-4">
          <div class="card-body">

            {{-- <div class="alert alert-info">
              <b>Note!</b> Not all browsers support HTML5 type input.
            </div> --}}
            <form action="{{route('transactionarmada.update',$transaction->id)}}" method="post">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label>Total Yang Harus Dibayar</label>
                    <input type="text" readonly value="{{ $transaction->total}}" class="form-control">
                </div>
                <div class="form-group">
                    <label>Dibayar</label>
                    <input type="text" name="total_bayar" @if ($transaction->status != "debit")
                    readonly 
                    @endif value="{{ $transaction->total_bayar}}" class="form-control">
                    @error('total_bayar')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">Status</label>
                    <select name="status" @if ($transaction->status != "debit")
                       readonly 
                       @endif class="form-control" >
                        @if ($transaction->status == "paid")
                        <option value="paid" selected>Paid</option>
                        <option value="debit">debit</option>
                        @else
                        <option value="debit" selected>debit</option>
                        <option value="paid" >Paid</option>
                        @endif
                    </select>
                </div>
                <div class="form-group text-right">
                    @if ($transaction->status == "debit")
                    <button class="btn btn-primary mb-2" type="submit">Submit</button>
                    @endif
                    <a href="{{route('transaction.index')}}" class="btn btn-info  mb-2"> Back</a>
                </div>
            </form>
          </div>
    </div>
    

</div>
@endsection