


<?php $__env->startSection('title'); ?>
    Transactions
<?php $__env->stopSection(); ?>

<?php $__env->startSection('title-page'); ?>
    <h1>Show Transactions</h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid">

    <!-- DataTales Example -->

    <div class="card card-primary shadow mb-4">

        <div class="card-body">

            <?php if($message = Session::get('success')): ?>
            <div class="alert alert-success mx-4 my-4">
                <p><?php echo e($message); ?></p>
            </div>
            <?php elseif($message = session::get('deleted')): ?>
            <div class="alert alert-danger mx-4 my-4">
                <p><?php echo e($message); ?></p>
            </div>
            <?php endif; ?>
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
                            
                            <a href="<?php echo e(route('printarmada',$transaction->id)); ?>" class="btn btn-primary btn-sm"><i class="fas fa-file-pdf"></i> Print Pdf</a> 
                            
                          </div>
                        </div>
                        <hr>
                        <div class="row">
                          <div class="col-md-4">
                            <div class="col-md-6 text-md-left">
                              <address>
                                <strong>Tanggal Order:</strong><br>
                                <?php echo e($transaction->created_at); ?><br><br>
                                <strong>Tanggal Keberangkatan:</strong><br>
                                <?php echo e($transaction->tgl_berangkat); ?><br><br>
                                <strong>Tanggal Kembali:</strong><br>
                                <?php echo e($transaction->tgl_kembali); ?><br><br>
                              </address>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <address>
                              <strong>Invoice:</strong><br>
                              <?php echo e($transaction->invoice); ?>

                              <br>
                              <img src="/images/trarmada/<?php echo e($transaction->qr_code); ?>" class="image-fluid" style="height: 100px; width:100;">
                              <br>
                              <strong>Status : <?php echo e($transaction->status); ?></strong>
                              
                            </address>
                          </div>
                          <div class="col-md-4 text-md-right">
                            <address>
                              <strong>Penyewa:</strong><br><br>
                              <?php echo e($transaction->penyewa); ?><br>
                              <?php echo e($transaction->no_penyewa); ?><br>
                              <?php echo e($transaction->alamat_penyewa); ?>

                            </address>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-6">
                            <address>
                              
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
                            <tr>
                                <td colspan="4"></td>
                                <td >Subtotal</td>
                                <td>Rp. <?php echo e(number_format($transaction->sub_total)); ?></td>
                            </tr>
                            <tr>
                                <td colspan="4"></td>
                                <td>Diskon</td>
                                <td>Rp. <?php echo e(number_format($transaction->diskon)); ?></td>
                            </tr>
                            <tr>
                                <td colspan="4"></td>
                                <td >Total</td>
                                <td>Rp. <?php echo e(number_format($transaction->total)); ?></td>
                            </tr>
                            <tr>
                                <td colspan="4"></td>
                                <td >Dibayar</td>
                                <td>Rp. <?php echo e(number_format($transaction->total_bayar)); ?></td>
                            </tr>
                              
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>
                  <hr>
                  <div class="text-md-right">
                    <a class="btn btn-warning btn-icon icon-left" href="<?php echo e(route('transactionarmada.index')); ?>"> Back</a>
                  </div>
                </div>
              </div>
        </div>
    </div>

</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('dashboard-admin.home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Monza\Developer\Project\KMJ-trans\logistic-app\resources\views/dashboard-admin/armada_transaction/show.blade.php ENDPATH**/ ?>