<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="<?php echo e(asset('blog/css/invoice.css')); ?>" />
    <title>Invoice</title>
    
  </head>
  <body onload="window.print()">
    <div class="invoice">
      <!-- KOP -->
      <div class="invoice-header">
        <span>kmjtrans - INVOICE</span>
        <span class="mg-left-auto"><?php echo e($transaction->variantservice->variant_service); ?></span>
      </div>

      <!-- PENGIRIM/PENERIMA -->
      <div class="invoice-person">
        <!-- PENGIRIM -->
        <div id="pengirim">
          <div class="wrapper">
            <span id="title" style="margin-top: 0">PENGIRIM</span>
            <span id="detail"><?php echo e($transaction->pengirim); ?></span>
          </div>
          <div class="wrapper">
            <span id="title">NO.HP</span>
            <span id="detail"><?php echo e($transaction->no_pengirim); ?></span>
          </div>
          <div class="wrapper">
            <span id="title">ALAMAT</span>
            <span id="detail"><?php echo e($transaction->alamat_pengirim); ?></span>
          </div>
        </div>
        <!-- PENERIMA -->
        <div id="penerima">
          <div class="wrapper">
            <span id="title" style="margin-top: 0">PENERIMA</span>
            <span id="detail"><?php echo e($transaction->penerima); ?></span>
            <span id="subdetail"><?php echo e($transaction->no_penerima); ?></span>
          </div>
          <div class="wrapper">
            <span id="title">ALAMAT</span>
            <span class="smaller" id="detail"
              ><?php echo e($transaction->alamat_penerima); ?></span
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
        <?php $__currentLoopData = $packages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $pkg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
          <td><?php echo e($index+1); ?></td>
          <td><?php echo e($pkg->nama_barang); ?></td>
          <td><?php echo e($pkg->berat); ?></td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </table>

      <!-- TABEL KEDUA -->
      <div class="invoice-status">
        <div class="wrapper">
          <span id="title">STATUS PEMBAYARAN</span>
          <span class="larger" id="detail"><?php echo e($transaction->status); ?></span>
        </div>
        <div class="mg-left-auto">
          <div class="wrapper wrapper-inline">
            <span id="title">TOTAL BERAT (kg)</span>
            <span id="detail">Kg <?php echo e(number_format($transaction->berat_total)); ?></span>
          </div>
          <div class="wrapper wrapper-inline">
            <span id="title">HARGA (kg)</span>
            <span id="detail">Rp. <?php echo e(number_format($transaction->harga_kg)); ?></span>
          </div>
          <div class="wrapper wrapper-inline">
            <span id="title">SUB TOTAL HARGA</span>
            <span id="detail">Rp. <?php echo e(number_format($transaction->sub_total)); ?></span>
          </div>
          <div class="wrapper wrapper-inline">
            <span id="title">DISKON</span>
            <span id="detail">Rp. <?php echo e(number_format($transaction->diskon)); ?>0</span>
          </div>
          <div id="total" class="wrapper wrapper-inline">
            <span id="title">TOTAL BAYAR</span>
            <span id="detail">Rp. <?php echo e(number_format($transaction->total_bayar)); ?></span>
          </div>
          <div id="total" class="wrapper wrapper-inline">
            <span id="title">SUB TOTAL </span>
            <span id="detail">Rp. <?php echo e(number_format($transaction->total)); ?></span>
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
          <img src="/images/transaction/<?php echo e($transaction->qr_code); ?>" alt="" />
          <span id="title">No. Resi : <?php echo e($transaction->tracking_number); ?></span>
        </div>
        <div id="ttd" class="flex flex-center">
          <span id="title">PETUGAS</span>
          <div id="signature"></div>
          <?php if($transaction->user->name == null): ?>
          <span id="title">(...................................)</span>
          <?php else: ?>
          <span id="title"><?php echo e($transaction->user->name); ?></span>
          <?php endif; ?>
        </div>
      </div>

      <!-- FOOTER -->
      <div class="invoice-footer">
        <span id="date"><?php echo e($transaction->created_at->format('d M Y')); ?></span>
        <span id="id"><?php echo e($transaction->invoice); ?></span>
      </div>
    </div>
  </body>
  
</html><?php /**PATH C:\Monza\Developer\Project\KMJ-trans\logistic-app\resources\views/blog/layout/invoice.blade.php ENDPATH**/ ?>