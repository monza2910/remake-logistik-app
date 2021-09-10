
@extends('dashboard-admin.home')

@section('title')
    Transactions
@endsection

@section('title-page')
    <h1>Show Transactions</h1>
@endsection

@section('content')
<div class="container-fluid">

    <!-- DataTales Example -->

    <div class="card card-primary shadow mb-4">

        <div class="card-body">

            @if ($message = Session::get('success'))
            <div class="alert alert-success mx-4 my-4">
                <p>{{ $message }}</p>
            </div>
            @elseif($message = session::get('deleted'))
            <div class="alert alert-danger mx-4 my-4">
                <p>{{ $message }}</p>
            </div>
            @endif
            <div class="section-body">
                <div class="invoice">
                  <div class="invoice-print">
                    <div class="row">
                      <div class="col-lg-12">
                        <div class="invoice-title">
                          <h2>Transaction</h2>
                          <br>
                          <br>
                          <div class="invoice-number">
                            <label for="">Invoice #{{$transaction->invoice}}</label> 
                            <br>
                            <label for="">Tracking Number : {{$transaction->tracking_number}}</label>
                          </div>
                        </div>
                        <hr>
                        <div class="row">
                          <div class="col-md-6">
                            <address>
                              <strong>Posted By:</strong><br>
                                {{$transaction->pengirim}}<br>
                                {{$transaction->no_pengirim}}<br>
                                {{$transaction->alamat_pengirim}}
                            </address>
                          </div>
                          <div class="col-md-6 text-md-right">
                            <address>
                              <strong>Shipped To:</strong><br>
                              {{$transaction->penerima}}<br>
                              {{$transaction->no_penerima}}<br>
                              {{$transaction->alamat_penerima}}
                            </address>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-6">
                            <address>
                              {{-- <strong>Payment Method:</strong><br>
                              Visa ending **** 4242<br>
                              ujang@maman.com --}}
                            </address>
                          </div>
                          <div class="col-md-6 text-md-right">
                            <address>
                              <strong>Order Date:</strong><br>
                              {{$transaction->created_at}}<br><br>
                            </address>
                          </div>
                        </div>
                      </div>
                    </div>
    
                    <div class="row mt-4">
                      <div class="col-md-12">
                        <div class="section-title">
                          <div class="float-left">Packages</div> 
                          </div>
                          <div class="table-responsive">
                            <table class="table table-striped table-hover table-md">
                              
                              <tr>
                                  <th data-width="300">No</th>
                                  <th>Nama</th>
                                  <th class="text-center">Berat</th>
                              </tr>
                              @if ($packages != null)
                              @foreach ($packages as $index =>$pkg)
                              <tr>
                                <td>{{$index+1}}</td>
                                <td>{{$pkg->nama_barang}}</td>
                                <td class="text-center">{{$pkg->berat}}</td>  
                              </tr>
                              @endforeach
                              <tfoot>
                                <tr>
                                  <th></th>
                                  <th id="total"  >Total Berat :</th>
                                  <td class="text-center">{{$transaction->berat_total}}</td>
                                </tr>
                                <tr>
                                  <th></th>
                                  <th id="total"  >Harga /kg :</th>
                                  <td class="text-center">Rp. {{$transaction->harga_kg}}</td>
                                </tr>
                                <tr>
                                  <th></th>
                                  <th id="total"  >Diskon :</th>
                                  <td class="text-center">Rp. {{$transaction->diskon}}</td>
                                </tr>
                                <tr>
                                  <th></th>
                                  <th id="total"  >Sub Total harga :</th>
                                  <td class="text-center">Rp. {{$transaction->sub_total}}</td>
                                </tr>
                                <tr>
                                  <th></th>
                                  <th id="total"  >Total harga :</th>
                                  <td class="text-center">Rp. {{$transaction->total}}</td>
                                </tr>
                                
                               </tfoot>
                              @else
                              <tr>
                                  <td colspan="3">Not Found</td>
                              </tr>
                              @endif
                                
                            </table>
                          </div>

                        <div class="section-title">
                            <div class="float-left">Tracking</div> 
                            <div class="float-right mx-2 my-2">
                                <a href="{{route('tracking.add',$transaction->id)}}" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Add Tracking</a> 
                            </div>
                        </div>
                        <div class="table-responsive">
                          <table class="table table-striped table-hover table-md">
                            
                            <tr>
                                <th data-width="300">Date</th>
                                <th>Status</th>
                                <th class="text-center">Location</th>
                                <th class="text-center">Action</th>
                            </tr>
                            @if ($trackings != null)
                            @foreach ($trackings as $track)
                            <tr>
                                <td>{{$track->created_at}}</td>
                                <td>{{$track->status}}</td>
                                <td class="text-center">{{$track->location}}</td>
                                <td class="text-center">
                                    <form action="{{ route('tracking.kill',$track->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                        <button type="submit" class="btn btn-icon icon-left btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"><i class="fas fa-trash-alt"></i></button>
                                    </form>
                                </td>
                                @endforeach
                            </tr>
                            @else
                            <tr>
                                
                                <td></td>
                                <td>Mouse Wireless</td>
                                <td class="text-center">$10.99</td>
                            </tr>
                            @endif
                              
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>
                  <hr>
                  <div class="text-md-right">
                    <a class="btn btn-warning btn-icon icon-left" href="{{route('transaction.index')}}"> Back</a>
                  </div>
                </div>
              </div>
        </div>
    </div>

</div>
@endsection