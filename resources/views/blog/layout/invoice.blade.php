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
    <div id="options">
      <button id="printPageButton" onClick="window.print();">Print</button>
      <a id="printPageButton" href="{{route('transaction.index')}}">Transaction List</a>
    </div>
    <div class="invoice">
      <!-- KOP -->
      <div class="invoice-header">
        <span>kmjtrans - INVOICE</span>
        <span class="mg-left-auto">{{$transaction->variantservice->variant_service}}</span>
      </div>

      <!-- PENGIRIM/PENERIMA -->
      <div class="invoice-person">
        <!-- PENGIRIM -->
        <div id="pengirim">
          <div class="wrapper">
            <span id="title" style="margin-top: 0">PENGIRIM</span>
            <span id="detail">{{$transaction->pengirim}}</span>
          </div>
          <div class="wrapper">
            <span id="title">NO.HP</span>
            <span id="detail">{{$transaction->no_pengirim}}</span>
          </div>
          <div class="wrapper">
            <span id="title">ALAMAT</span>
            <span id="detail">{{$transaction->alamat_pengirim}}</span>
          </div>
        </div>
        <!-- PENERIMA -->
        <div id="penerima">
          <div class="wrapper">
            <span id="title" style="margin-top: 0">PENERIMA</span>
            <span id="detail">{{$transaction->penerima}}</span>
            <span id="subdetail">{{$transaction->no_penerima}}</span>
          </div>
          <div class="wrapper">
            <span id="title">ALAMAT</span>
            <span class="smaller" id="detail"
              >{{$transaction->alamat_penerima}}</span
            >
          </div>
        </div>
      </div>

      <!-- TABEL -->
      <table class="invoice-table">
        <tr>
            <th>#</th>
            <th>NAMA BARANG</th>
            <th>BERAT (kg)</th>
        </tr>
        @foreach ($packages as $index => $pkg)
        <tr>
          <td>{{$index+1}}</td>
          <td>{{$pkg->nama_barang}}</td>
          <td>{{$pkg->berat}}</td>
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
          <div class="wrapper wrapper-inline">
            <span id="title">TOTAL BERAT (kg)</span>
            <span id="detail">Kg {{number_format($transaction->berat_total)}}</span>
          </div>
          <div class="wrapper wrapper-inline">
            <span id="title">HARGA (kg)</span>
            <span id="detail">Rp. {{number_format($transaction->harga_kg)}}</span>
          </div>
          <div class="wrapper wrapper-inline">
            <span id="title">SUB TOTAL HARGA</span>
            <span id="detail">Rp. {{number_format($transaction->sub_total)}}</span>
          </div>
          <div class="wrapper wrapper-inline">
            <span id="title">DISKON</span>
            <span id="detail">Rp. {{number_format($transaction->diskon)}}0</span>
          </div>
          <div id="total" class="wrapper wrapper-inline">
            <span id="title">TOTAL BAYAR</span>
            <span id="detail">Rp. {{number_format($transaction->total_bayar)}}</span>
          </div>
          <div id="total" class="wrapper wrapper-inline">
            <span id="title">SUB TOTAL </span>
            <span id="detail">Rp. {{number_format($transaction->total)}}</span>
          </div>
        </div>
      </div>

      <!-- TANDA TANGAN -->
      <div class="invoice-signature">
        <div id="ttd" class="flex flex-center">
          <span id="title">PENERIMA</span>
          <div id="signature"></div>
          <span id="title">(...................................)</span>
        </div>
        <div class="flex flex-center">
          <img src="/images/transaction/{{$transaction->qr_code}}" alt="" />
          <span id="title">No. Resi : {{$transaction->tracking_number}}</span>
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
    </div>
  </body>
  {{-- <script src="{{asset('blog/js/kmj.js')}}"></script> --}}
</html>