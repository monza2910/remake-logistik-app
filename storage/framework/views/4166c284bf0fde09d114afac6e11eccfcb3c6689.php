


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
                            
                            <a href="<?php echo e(route('printtravel',$transaction->id)); ?>" class="btn btn-primary btn-sm"><i class="fas fa-file-pdf"></i> Print Pdf</a> 
                            
                          </div>
                        </div>
                        <hr>
                        <div class="row">
                          <div class="col-md-4">
                            <div class="col-md-6 text-md-left">
                              <address>
                                <strong>Tanggal Order:</strong><br>
                                <?php echo e($transaction->created_at); ?><br><br>
                                <strong>Waktu Keberangkatan:</strong><br>
                                <?php echo e($transaction->tgl_berangkat.' '.$transaction->jam_berangkat); ?><br><br>
                              </address>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <address>
                              <strong>Invoice:</strong><br>
                              <?php echo e($transaction->invoice); ?>

                              <br>
                              <img src="/images/trtravel/<?php echo e($transaction->qrcode); ?>" class="image-fluid" style="height: 100px; width:100;">
                              <br>
                              <strong>Status : <?php echo e($transaction->status); ?></strong>
                              
                            </address>
                          </div>
                          <div class="col-md-4 text-md-right">
                            <address>
                              <strong>Shipped To:</strong><br><br>
                              <?php echo e($transaction->nama_penumpang); ?><br>
                              <?php echo e($transaction->no_penumpang); ?><br>
                              <?php echo e($transaction->alamat_penumpang); ?>

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
                                <th>Name</th>
                                <th>Variant</th>
                                <th>Origin</th>
                                <th>Destination</th>
                                <th>Price</th>
                            </tr>
                            <tr>
                                <td><?php echo e($transaction->travel->name); ?></td>
                                <td><?php echo e($transaction->travel->variant); ?></td>
                                <td><?php echo e($transaction->travel->origin->province.', '.$transaction->travel->origin->city.', '.$transaction->travel->origin->subdistrict); ?></td>
                                <td><?php echo e($transaction->travel->destination->province.', '.$transaction->travel->destination->city.', '.$transaction->travel->destination->subdistrict); ?></td>
                                <td>Rp. <?php echo e(number_format($transaction->subtotal)); ?></td>
                            </tr>
                            <tr>
                                <td colspan="3"></td>
                                <td >Subtotal</td>
                                <td>Rp. <?php echo e(number_format($transaction->subtotal)); ?></td>
                            </tr>
                            <tr>
                                <td colspan="3"></td>
                                <td>Diskon</td>
                                <td>Rp. <?php echo e(number_format($transaction->diskon)); ?></td>
                            </tr>
                            <tr>
                                <td colspan="3"></td>
                                <td >Total</td>
                                <td>Rp. <?php echo e(number_format($transaction->total)); ?></td>
                            </tr>
                              
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>
                  <hr>
                  <div class="text-md-right">
                    <a class="btn btn-warning btn-icon icon-left" href="<?php echo e(route('transactiontravel.index')); ?>"> Back</a>
                  </div>
                </div>
              </div>
        </div>
    </div>

</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('dashboard-admin.home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Monza\Developer\Project\KMJ-trans\logistic-app\resources\views/dashboard-admin/travel_transaction/show.blade.php ENDPATH**/ ?>