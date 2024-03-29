
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
                            
                            <a href="{{route('printarmada',$transaction->id)}}" class="btn btn-primary btn-sm"><i class="fas fa-file-pdf"></i> Print Pdf</a> 
                            
                          </div>
                        </div>
                        <hr>
                        <div class="row">
                          <div class="col-md-4">
                            <div class="col-md-6 text-md-left">
                              <address>
                                <strong>Tanggal Order:</strong><br>
                                {{$transaction->created_at}}<br><br>
                                <strong>Tanggal Keberangkatan:</strong><br>
                                {{$transaction->tgl_berangkat}}<br><br>
                                <strong>Tanggal Kembali:</strong><br>
                                {{$transaction->tgl_kembali}}<br><br>
                              </address>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <address>
                              <strong>Invoice:</strong><br>
                              {{$transaction->invoice}}
                              <br>
                              <img src="/images/trarmada/{{$transaction->qr_code}}" class="image-fluid" style="height: 100px; width:100;">
                              <br>
                              <strong>Status : {{$transaction->status}}</strong>
                              
                            </address>
                          </div>
                          <div class="col-md-4 text-md-right">
                            <address>
                              <strong>Penyewa:</strong><br><br>
                              {{$transaction->penyewa}}<br>
                              {{$transaction->no_penyewa}}<br>
                              {{$transaction->alamat_penyewa}}
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
                          
                        </div>
                      </div>
                    </div>
    
                    <div class="row mt-4">
                      <div class="col-md-12">
                        <div class="section-title">
                            <div class="float-left">Details</div> 
                        </div>
                        <div class="table-responsive">
                          <table class="table table-striped table-hover table-md">
                            
                            <tr>
                                <th>#</th>
                                <th>Armada</th>
                                <th>Dari</th>
                                <th>Ke</th>
                                <th>Quantitas</th>
                                <th>Harga</th>
                            </tr>
                            @foreach ($details as $index => $detail)
                                
                            <tr>
                                <td>
                                  {{$index+1}}
                                </td>
                                <td>
                                  @if ($detail->armada)
                                  {{$detail->armada->name}}
                                  @else
                                      
                                  @endif
                                </td>
                                <td>
                                  @if ($detail->armada->origin)
                                  {{$detail->armada->origin->province}} ,
                                  {{$detail->armada->origin->city}} , 
                                  {{$detail->armada->origin->subdistrict}}  
                                  @else
                                      
                                  @endif
                                <td>
                                  @if ($detail->armada->destination)
                                  {{$detail->armada->destination->province}},
                                  {{$detail->armada->destination->city}} , 
                                  {{$detail->armada->destination->subdistrict}}
                                  @else
                                      
                                  @endif
                                </td>
                                <td>
                                  {{$detail->qty}}
                                </td>
                                <td>
                                  {{$detail->harga}}
                                </td>
                                
                            </tr>
                            @endforeach
                            <tr>
                                <td colspan="4"></td>
                                <td >Subtotal</td>
                                <td>Rp. {{ number_format($transaction->sub_total)}}</td>
                            </tr>
                            <tr>
                                <td colspan="4"></td>
                                <td>Diskon</td>
                                <td>Rp. {{number_format($transaction->diskon)}}</td>
                            </tr>
                            <tr>
                                <td colspan="4"></td>
                                <td >Total</td>
                                <td>Rp. {{number_format($transaction->total)}}</td>
                            </tr>
                            <tr>
                                <td colspan="4"></td>
                                <td >Dibayar</td>
                                <td>Rp. {{number_format($transaction->total_bayar)}}</td>
                            </tr>
                              
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>
                  <hr>
                  <div class="text-md-right">
                    <a class="btn btn-warning btn-icon icon-left" href="{{route('transactionarmada.index')}}"> Back</a>
                  </div>
                </div>
              </div>
        </div>
    </div>

</div>
@endsection