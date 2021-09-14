


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
                            <label for="">Invoice #<?php echo e($transaction->invoice); ?></label> 
                          
                            <br>
                            <a href="<?php echo e(route('printlogistic',$transaction->id)); ?>" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Print Pdf</a> 
                            
                          </div>
                        </div>
                        <hr>
                        <div class="row">
                          <div class="col-md-4">
                            <address>
                              <strong>Posted By:</strong><br>
                                <?php echo e($transaction->pengirim); ?><br>
                                <?php echo e($transaction->no_pengirim); ?><br>
                                <?php echo e($transaction->alamat_pengirim); ?>

                            </address>
                          </div>
                          <div class="col-md-4">
                            <address>
                              <strong>Tracking Number :</strong><br>
                              <?php echo e($transaction->tracking_number); ?>

                              <br>
                              <img src="/images/transaction/<?php echo e($transaction->qr_code); ?>" class="image-fluid" style="height: 100px; width:100;">
                            </address>
                          </div>
                          <div class="col-md-4 text-md-right">
                            <address>
                              <strong>Shipped To:</strong><br>
                              <?php echo e($transaction->penerima); ?><br>
                              <?php echo e($transaction->no_penerima); ?><br>
                              <?php echo e($transaction->alamat_penerima); ?>

                            </address>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-6">
                            <address>
                              
                            </address>
                          </div>
                          <div class="col-md-6 text-md-right">
                            <address>
                              <strong>Order Date:</strong><br>
                              <?php echo e($transaction->created_at); ?><br><br>
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
                              <?php if($packages != null): ?>
                              <?php $__currentLoopData = $packages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index =>$pkg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <tr>
                                <td><?php echo e($index+1); ?></td>
                                <td><?php echo e($pkg->nama_barang); ?></td>
                                <td class="text-center"><?php echo e($pkg->berat); ?></td>  
                              </tr>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                              <tfoot>
                                <tr>
                                  <th></th>
                                  <th id="total"  >Total Berat :</th>
                                  <td class="text-center"><?php echo e($transaction->berat_total); ?></td>
                                </tr>
                                <tr>
                                  <th></th>
                                  <th id="total"  >Harga /kg :</th>
                                  <td class="text-center">Rp. <?php echo e($transaction->harga_kg); ?></td>
                                </tr>
                                <tr>
                                  <th></th>
                                  <th id="total"  >Diskon :</th>
                                  <td class="text-center">Rp. <?php echo e($transaction->diskon); ?></td>
                                </tr>
                                <tr>
                                  <th></th>
                                  <th id="total"  >Sub Total harga :</th>
                                  <td class="text-center">Rp. <?php echo e($transaction->sub_total); ?></td>
                                </tr>
                                <tr>
                                  <th></th>
                                  <th id="total"  >Total harga :</th>
                                  <td class="text-center">Rp. <?php echo e($transaction->total); ?></td>
                                </tr>
                                
                               </tfoot>
                              <?php else: ?>
                              <tr>
                                  <td colspan="3">Not Found</td>
                              </tr>
                              <?php endif; ?>
                                
                            </table>
                          </div>

                        <div class="section-title">
                            <div class="float-left">Tracking</div> 
                            <div class="float-right mx-2 my-2">
                                <a href="<?php echo e(route('tracking.add',$transaction->id)); ?>" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Add Tracking</a> 
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
                            <?php if($trackings != null): ?>
                            <?php $__currentLoopData = $trackings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $track): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($track->created_at); ?></td>
                                <td><?php echo e($track->status); ?></td>
                                <td class="text-center"><?php echo e($track->location); ?></td>
                                <td class="text-center">
                                    <form action="<?php echo e(route('tracking.kill',$track->id)); ?>" method="POST">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                        <button type="submit" class="btn btn-icon icon-left btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"><i class="fas fa-trash-alt"></i></button>
                                    </form>
                                </td>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tr>
                            <?php else: ?>
                            <tr>
                                
                                <td></td>
                                <td>Mouse Wireless</td>
                                <td class="text-center">$10.99</td>
                            </tr>
                            <?php endif; ?>
                              
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>
                  <hr>
                  <div class="text-md-right">
                    <a class="btn btn-warning btn-icon icon-left" href="<?php echo e(route('transaction.index')); ?>"> Back</a>
                  </div>
                </div>
              </div>
        </div>
    </div>

</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('dashboard-admin.home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Monza\Developer\Project\KMJ-trans\logistic-app\resources\views/dashboard-admin/transaction/show.blade.php ENDPATH**/ ?>