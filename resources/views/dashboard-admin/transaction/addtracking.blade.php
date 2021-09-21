@extends('dashboard-admin.home')

@section('title')
    Transactions
@endsection

@section('title-page')
    <h1>Tracking</h1>
@endsection

@section('content')
<div class="container-fluid">
    @if ($message = Session::get('success'))
    <div class="alert alert-success mx-4 my-4">
        <p>{{ $message }}</p>
    </div>
    @elseif($message = session::get('deleted'))
    <div class="alert alert-danger mx-4 my-4">
        <p>{{ $message }}</p>
    </div>
    @endif
    <div class="card shadow mb-4">
          <div class="card-body">

            {{-- <div class="alert alert-info">
              <b>Note!</b> Not all browsers support HTML5 type input.
            </div> --}}
            <form action="{{route('tracking.store')}}" method="post">
                @csrf
                <input type="text" value="{{$idtr}}" name="id_tr" hidden>
                <div class="form-group">
                    <label >Status</label>
                    <br>
                    <select class="form-control selectric" name="status">
                        <option value="Barang sudah berada di kantor KMJ TRANS & LOGISTICS">Barang sudah berada di kantor KMJ TRANS & LOGISTICS</option>
                        <option value="Barang Dalam Proses Pengiriman">Barang Dalam Proses Pengiriman</option>
                        <option value="Barang Sudah Diterima">Barang Sudah Diterima</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Location</label>
                    <input type="text" name="location" value="{{ old('location')}}" class="form-control">
                    @error('location')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group text-right">
                    <button class="btn btn-primary mb-2" type="submit">Submit</button>
                    <a href="{{route('transaction.show',$idtr)}}" class="btn btn-info  mb-2"> Back</a>
                </div>
            </form>
          </div>
    </div>
    

</div>
@endsection