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
            <form action="{{route('transaction.update',$transaction->id)}}" method="post">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label>Tracking Number</label>
                    <input type="text" name="tn" value="{{ $transaction->tracking_number}}" class="form-control">
                    @error('tn')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label>receipent</label>
                    <input type="text" name="penerima" value="{{ $transaction->penerima}}" class="form-control">
                    @error('penerima')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Phone receipent</label>
                    <input type="text" name="phone_penerima" value="{{ $transaction->phone_penerima}}" class="form-control">
                    @error('phone_penerima')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Address receipent</label>
                    <textarea name="a_penerima" id="" class="form-control" cols="30" rows="10">{{$transaction->address_penerima}}</textarea>
                    @error('a_penerima')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Sender</label>
                    <input type="text" name="sender" value="{{ $transaction->sender}}" class="form-control">
                    @error('sender')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Phone Sender</label>
                    <input type="text" name="phone_sender" value="{{ $transaction->phone_sender}}" class="form-control">
                    @error('phone_sender')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Address Sender</label>
                    <textarea name="a_sender" id="" class="form-control" cols="30" rows="10">{{$transaction->address_sender}}</textarea>
                    @error('a_sender')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group text-right">
                    <button class="btn btn-primary mb-2" type="submit">Submit</button>
                    <a href="{{route('transaction.index')}}" class="btn btn-info  mb-2"> Back</a>
                </div>
            </form>
          </div>
    </div>
    

</div>
@endsection