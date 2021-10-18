<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="{{asset('blog/css/invoice.css')}}" />
    <title>Invoice</title>
    
  </head>
  <body >
    <div class="invoice">
      <!-- KOP -->
      <div class="invoice-header">
        <span>kmjtrans - INVOICE</span>
      </div>

      <!-- PENGIRIM/PENERIMA -->
      <div class="invoice-person">
        <!-- PENGIRIM -->
        <div id="pengirim">
          <div class="wrapper">
            <span id="title" style="margin-top: 0">Penyewa</span>
            <span id="detail">{{$transaction->penyewa}}</span>
          </div>
          <div class="wrapper">
            <span id="title">NO.HP</span>
            <span id="detail">{{$transaction->no_penyewa}}</span>
          </div>
          <div class="wrapper">
            <span id="title">ALAMAT</span>
            <span id="detail">{{$transaction->alamat_penyewa}}</span>
          </div>
        </div>
        <!-- PENERIMA -->
        <div id="penerima">
          <div class="wrapper">
            <span id="title" style="margin-top: 0">Tanggal Berangakat</span>
            <span id="subdetail">{{$transaction->tgl_berangkat}}</span>
            <span id="title" style="margin-top: 0">Tanggal Kembali</span>
            <span id="subdetail">{{$transaction->tgl_kembali}}</span>
          </div>
          <div class="wrapper">
            <span id="title">Tanggal Order</span>
            <span class="smaller" id="detail"
              >{{$transaction->created_at}}</span
            >
          </div>
        </div>
      </div>

      <!-- TABEL -->
      <table class="invoice-table">
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
      </table>

      <!-- TABEL KEDUA -->
      <div class="invoice-status">
        <div class="wrapper">
          <span id="title">STATUS PEMBAYARAN</span>
          <span class="larger" id="detail">{{$transaction->status}}</span>
        </div>
        <div class="mg-left-auto">
          @if ($transaction->lama_sewa)
          <div class="wrapper wrapper-inline">
            <span id="title">LAMA SEWA</span>
            <span id="detail">{{$transaction->lama_sewa}} Hari</span>
          </div>
          @else
              
          @endif
          
          <div class="wrapper wrapper-inline">
            <span id="title">SUB TOTAL HARGA</span>
            <span id="detail">Rp. {{number_format($transaction->sub_total)}}</span>
          </div>
          <div class="wrapper wrapper-inline">
            <span id="title">DISKON</span>
            <span id="detail">Rp. {{number_format($transaction->diskon)}}0</span>
          </div>
          <div id="total" class="wrapper wrapper-inline">
            <span id="title"> TOTAL </span>
            <span id="detail">Rp. {{number_format($transaction->total)}}</span>
          </div>
          <div id="total" class="wrapper wrapper-inline">
            <span id="title">DIBAYAR</span>
            <span id="detail">Rp. {{number_format($transaction->total_bayar)}}</span>
          </div>
        </div>
      </div>

      <!-- TANDA TANGAN -->
      <div class="invoice-signature">
        <div id="ttd" class="flex flex-center">
          <span id="title">Penyewa</span>
          <div id="signature"></div>
          <span id="title">{{$transaction->penyewa}}</span>
        </div>
        <div class="flex flex-center">
          <img src="/images/trarmada/{{$transaction->qr_code}}" alt="" />
          <span id="title">{{$transaction->invoice}}</span>
        </div>
        <div id="ttd" class="flex flex-center">
          <span id="title">PETUGAS</span>
          <div id="signature"></div>
          @if ($transaction->user->name == null)
          <span id="title">(...................................)</span>
          @else
          <span id="title">{{$transaction->user->name}}</span>
          @endif
        </div>
      </div>

      <!-- FOOTER -->
      <div class="invoice-footer">
        <span id="date">{{$transaction->created_at->format('d M Y')}}</span>
        <span id="id">{{$transaction->invoice}}</span>
      </div>

      <!-- FLOATING BUTTON -->
      <div class="invoice-button">
        <button onclick="window.print()">Cetak Halaman</button>
        <a href="{{route('transactionarmada.index')}}">Back</a>
      </div>
    </div>
  </body>
  {{-- <script src="{{asset('blog/js/kmj.js')}}"></script> --}}
</html>