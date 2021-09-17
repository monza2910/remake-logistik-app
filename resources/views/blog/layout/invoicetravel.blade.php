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
      <a id="printPageButton" href="{{route('transactiontravel.index')}}">Transaction List</a>
    </div>
    <div class="invoice">
      <!-- KOP -->
      <div class="invoice-header">
        <span>kmjtrans - INVOICE</span>
        <span class="mg-left-auto">TRAVEL</span>
      </div>

      <!-- PENGIRIM/PENERIMA -->
      <div class="invoice-travel">
        <div class="wrapper">
          <span id="title">NAMA KENDARAAN</span>
          <span id="detail">{{$transaction->travel->name}}</span>
        </div>
        <div class="wrapper">
          <span id="title">FASILITAS</span>
          @foreach ($transaction->travel->facilitys as $fasilitas)
              <span id="detail">- {{$fasilitas->name}}</span>
          @endforeach
        </div>
        <div class="wrapper">
          <span id="title">KAPASITAS</span>
          <span id="detail">1</span>
        </div>
        <div class="wrapper">
          <span id="title">HARGA KURSI</span>
          <span id="detail">Rp. {{number_format($transaction->subtotal)}}</span>
        </div>
      </div>

      <!-- TABEL -->
      <div class="invoice-point">
        <div class="wrapper">
          <span id="title">PENJEMPUTAN</span>
          <span id="detail">{{$transaction->alamat_penjemputan}}</span>
        </div>
        <div class="wrapper">
          <span id="title">DESTINASI</span>
          <span id="detail">{{$transaction->travel->destination->province.', '.$transaction->travel->destination->city.', '.$transaction->travel->destination->subdistrict  }}</span>
          <span id="detail">{{$transaction->alamat_pemberhentian }}</span>
        </div>
        <div class="wrapper wrapper-small">
          <span id="title">TANGGAL PEMBERANGKATAN</span>
          <span id="detail">{{ $transaction->tgl_berangkat}}</span>
        </div>
        <div class="wrapper wrapper-small">
          <span id="title">JAM</span>
          <span id="detail">{{$transaction->jam_berangkat}}</span>
        </div>
      </div>

      <!-- <table class="invoice-table table-2" style="margin-top: 0">
        <tr>
          <th>TANGGAL PEMBERANGKATAN</th>
          <th>JAM</th>
        </tr>
        <tr>
          <td>Kamis, 16 September 2021</td>
          <td>09:00</td>
        </tr>
      </table> -->

      <table class="invoice-table">
        <tr>
          <th>NAMA PENUMPANG</th>
          <th>NO HP</th>
          <th>ALAMAT</th>
        </tr>
        <tr>
          <td>{{$transaction->nama_penumpang}}</td>
          <td>{{$transaction->no_penumpang}}</td>
          <td>{{$transaction->alamat_penumpang}}</td>
        </tr>
      </table>

      <!-- TABEL KEDUA -->
      <div class="invoice-status">
        <div class="wrapper">
          <span id="title">STATUS PEMBAYARAN</span>
          <span class="larger" id="detail">
          @if ($transaction->status == 'paid')
             LUNAS 
          @else
              HUTANG
          @endif  
          </span>
        </div>
        <div class="mg-left-auto">
          <div class="wrapper wrapper-inline">
            <span id="title">SUBTOTAL</span>
            <span id="detail">Rp. {{number_format($transaction->subtotal)}}</span>
          </div>
          <div class="wrapper wrapper-inline">
            <span id="title">DISKON</span>
            <span id="detail">Rp. {{number_format($transaction->diskon)}}</span>
          </div>
          <div id="total" class="wrapper wrapper-inline">
            <span id="title">TOTAL BAYAR</span>
            <span id="detail">Rp. {{number_format($transaction->total)}}</span>
          </div>
        </div>
      </div>

      <!-- TANDA TANGAN -->
      <div class="invoice-signature">
        <div id="ttd" class="flex flex-center">
          <span id="title">PENUMPANG</span>
          <div id="signature"></div>
          <span id="title">{{$transaction->nama_penumpang}}</span>
        </div>
        <div class="flex flex-center">
          <img src="/images/trtravel/{{$transaction->qrcode}}" alt="" />

          <span id="title">{{$transaction->invoice}}</span>
        </div>
        <div id="ttd" class="flex flex-center">
          <span id="title">PETUGAS</span>
          <div id="signature"></div>
          <span id="title">{{$transaction->user->name}}</span>
        </div>
      </div>

      <!-- FOOTER -->
      <div class="invoice-footer">
        <span id="date">{{$transaction->created_at->format('d M Y')}}</span>
      </div>
    </div>
  </body>
  {{-- <script src="{{asset('blog/js/kmj.js')}}"></script> --}}
</html>