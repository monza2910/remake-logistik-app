<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="<?php echo e(asset('blog/css/invoice.css')); ?>" />
    <title>Invoice</title>
    
  </head>
  <body >

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
          <span id="detail"><?php echo e($transaction->travel->name); ?></span>
        </div>
        <div class="wrapper">
          <span id="title">FASILITAS</span>
          <?php $__currentLoopData = $transaction->travel->facilitys; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fasilitas): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <span id="detail">- <?php echo e($fasilitas->name); ?></span>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <div class="wrapper">
          <span id="title">KAPASITAS</span>
          <span id="detail">1</span>
        </div>
        <div class="wrapper">
          <span id="title">HARGA KURSI</span>
          <span id="detail">Rp. <?php echo e(number_format($transaction->subtotal)); ?></span>
        </div>
      </div>

      <!-- TABEL -->
      <div class="invoice-point">
        <div class="wrapper">
          <span id="title">PENJEMPUTAN</span>
          <span id="detail"><?php echo e($transaction->alamat_penjemputan); ?></span>
        </div>
        <div class="wrapper">
          <span id="title">DESTINASI</span>
          <span id="detail"><?php echo e($transaction->travel->destination->province.', '.$transaction->travel->destination->city.', '.$transaction->travel->destination->subdistrict); ?></span>
          <span id="detail"><?php echo e($transaction->alamat_pemberhentian); ?></span>
        </div>
        <div class="wrapper wrapper-small">
          <span id="title">TANGGAL PEMBERANGKATAN</span>
          <span id="detail"><?php echo e($transaction->tgl_berangkat); ?></span>
        </div>
        <div class="wrapper wrapper-small">
          <span id="title">JAM</span>
          <span id="detail"><?php echo e($transaction->jam_berangkat); ?></span>
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
          <td><?php echo e($transaction->nama_penumpang); ?></td>
          <td><?php echo e($transaction->no_penumpang); ?></td>
          <td><?php echo e($transaction->alamat_penumpang); ?></td>
        </tr>
      </table>

      <!-- TABEL KEDUA -->
      <div class="invoice-status">
        <div class="wrapper">
          <span id="title">STATUS PEMBAYARAN</span>
          <span class="larger" id="detail">
          <?php if($transaction->status == 'paid'): ?>
             LUNAS 
          <?php else: ?>
              HUTANG
          <?php endif; ?>  
          </span>
        </div>
        <div class="mg-left-auto">
          <div class="wrapper wrapper-inline">
            <span id="title">SUBTOTAL</span>
            <span id="detail">Rp. <?php echo e(number_format($transaction->subtotal)); ?></span>
          </div>
          <div class="wrapper wrapper-inline">
            <span id="title">DISKON</span>
            <span id="detail">Rp. <?php echo e(number_format($transaction->diskon)); ?></span>
          </div>
          <div id="total" class="wrapper wrapper-inline">
            <span id="title">TOTAL BAYAR</span>
            <span id="detail">Rp. <?php echo e(number_format($transaction->total)); ?></span>
          </div>
        </div>
      </div>

      <!-- TANDA TANGAN -->
      <div class="invoice-signature">
        <div id="ttd" class="flex flex-center">
          <span id="title">PENUMPANG</span>
          <div id="signature"></div>
          <span id="title"><?php echo e($transaction->nama_penumpang); ?></span>
        </div>
        <div class="flex flex-center">
          <img src="/images/trtravel/<?php echo e($transaction->qrcode); ?>" alt="" />

          <span id="title"><?php echo e($transaction->invoice); ?></span>
        </div>
        <div id="ttd" class="flex flex-center">
          <span id="title">PETUGAS</span>
          <div id="signature"></div>
          <span id="title"><?php echo e($transaction->user->name); ?></span>
        </div>
      </div>

      <!-- FOOTER -->
      <div class="invoice-footer">
        <span id="date"><?php echo e($transaction->created_at->format('d M Y')); ?></span>
      </div>

      <div class="invoice-button">
        <button onclick="window.print()">Cetak Halaman</button>
        <a href="<?php echo e(route('transactiontravel.index')); ?>">Back</a>
      </div>
    </div>
  </body>
  
</html><?php /**PATH C:\Monza\Developer\Project\KMJ-trans\logistic-app\resources\views/blog/layout/invoicetravel.blade.php ENDPATH**/ ?>