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
      </div>

      <!-- PENGIRIM/PENERIMA -->
      <div class="invoice-person">
        <!-- PENGIRIM -->
        <div id="pengirim">
          <div class="wrapper">
            <span id="title" style="margin-top: 0">Penyewa</span>
            <span id="detail"><?php echo e($transaction->penyewa); ?></span>
          </div>
          <div class="wrapper">
            <span id="title">NO.HP</span>
            <span id="detail"><?php echo e($transaction->no_penyewa); ?></span>
          </div>
          <div class="wrapper">
            <span id="title">ALAMAT</span>
            <span id="detail"><?php echo e($transaction->alamat_penyewa); ?></span>
          </div>
        </div>
        <!-- PENERIMA -->
        <div id="penerima">
          <div class="wrapper">
            <span id="title" style="margin-top: 0">Tanggal Berangakat</span>
            <span id="subdetail"><?php echo e($transaction->tgl_berangkat); ?></span>
            <span id="title" style="margin-top: 0">Tanggal Kembali</span>
            <span id="subdetail"><?php echo e($transaction->tgl_kembali); ?></span>
          </div>
          <div class="wrapper">
            <span id="title">Tanggal Order</span>
            <span class="smaller" id="detail"
              ><?php echo e($transaction->created_at); ?></span
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
        <?php $__currentLoopData = $details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $detail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                
        <tr>
            <td>
              <?php echo e($index+1); ?>

            </td>
            <td>
              <?php if($detail->armada): ?>
              <?php echo e($detail->armada->name); ?>

              <?php else: ?>
                  
              <?php endif; ?>
            </td>
            <td>
              <?php if($detail->armada->origin): ?>
              <?php echo e($detail->armada->origin->province); ?> ,
              <?php echo e($detail->armada->origin->city); ?> , 
              <?php echo e($detail->armada->origin->subdistrict); ?>  
              <?php else: ?>
                  
              <?php endif; ?>
            <td>
              <?php if($detail->armada->destination): ?>
              <?php echo e($detail->armada->destination->province); ?>,
              <?php echo e($detail->armada->destination->city); ?> , 
              <?php echo e($detail->armada->destination->subdistrict); ?>

              <?php else: ?>
                  
              <?php endif; ?>
            </td>
            <td>
              <?php echo e($detail->qty); ?>

            </td>
            <td>
              <?php echo e($detail->harga); ?>

            </td>
            
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
            <span id="title">SUB TOTAL HARGA</span>
            <span id="detail">Rp. <?php echo e(number_format($transaction->sub_total)); ?></span>
          </div>
          <div class="wrapper wrapper-inline">
            <span id="title">DISKON</span>
            <span id="detail">Rp. <?php echo e(number_format($transaction->diskon)); ?>0</span>
          </div>
          <div id="total" class="wrapper wrapper-inline">
            <span id="title"> TOTAL </span>
            <span id="detail">Rp. <?php echo e(number_format($transaction->total)); ?></span>
          </div>
          <div id="total" class="wrapper wrapper-inline">
            <span id="title">DIBAYAR</span>
            <span id="detail">Rp. <?php echo e(number_format($transaction->total_bayar)); ?></span>
          </div>
        </div>
      </div>

      <!-- TANDA TANGAN -->
      <div class="invoice-signature">
        <div id="ttd" class="flex flex-center">
          <span id="title">Penyewa</span>
          <div id="signature"></div>
          <span id="title"><?php echo e($transaction->penyewa); ?></span>
        </div>
        <div class="flex flex-center">
          <img src="/images/trarmada/<?php echo e($transaction->qr_code); ?>" alt="" />
          <span id="title"><?php echo e($transaction->invoice); ?></span>
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

      <!-- FLOATING BUTTON -->
      <div class="invoice-button">
        <button onclick="window.print()">Cetak Halaman</button>
        <a href="<?php echo e(route('transactionarmada.index')); ?>">Back</a>
      </div>
    </div>
  </body>
  
</html><?php /**PATH C:\Monza\Developer\Project\KMJ-trans\logistic-app\resources\views/blog/layout/invoicearmada.blade.php ENDPATH**/ ?>