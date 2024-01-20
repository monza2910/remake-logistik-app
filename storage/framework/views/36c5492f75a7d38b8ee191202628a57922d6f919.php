


<?php $__env->startSection('title'); ?>
    Transactions
<?php $__env->stopSection(); ?>

<?php $__env->startSection('title-page'); ?>
    <h1>Transactions</h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="<?php echo e(route('logisticcart')); ?>" class="btn btn-icon icon-left btn-primary mx-2 my-2"><i class="fas fa-plus"></i> Add transaction(kg)</a>
            <a href="<?php echo e(route('logistictoncart')); ?>" class="btn btn-icon icon-left btn-primary mx-2 my-2"><i class="fas fa-plus"></i> Add transaction(ton)</a>
        </div>
        <?php if($message = Session::get('success')): ?>
        <div class="alert alert-success mx-4 my-4">
            <p><?php echo e($message); ?></p>
        </div>
        <?php elseif($message = session::get('deleted')): ?>
        <div class="alert alert-danger mx-4 my-4">
            <p><?php echo e($message); ?></p>
        </div>
        <?php endif; ?>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Barcode</th>
                            <th>Invoice</th>
                            <th>Tracking Number </th>
                            <th>Recipient</th>
                            <th>Sender</th>
                            <th>Satuan</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $transactions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $transaction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>    
                        <tr>
                            <td><?php echo e($index +1); ?></td> 
                            <td><img src="/images/transaction/<?php echo e($transaction->qr_code); ?>" alt="" width="100px" height="100px"></td>
                            <td><?php echo e($transaction->invoice); ?></td>
                            <td><?php echo e($transaction->tracking_number); ?></td>
                            <td><?php echo e($transaction->penerima); ?></td>
                            <td><?php echo e($transaction->pengirim); ?></td>
                            <td><?php echo e($transaction->satuan); ?></td>
                            <td><?php echo e($transaction->status); ?></td>
                            <td >
                                <form action="<?php echo e(route('transaction.destroy',$transaction->id)); ?>" method="POST">
                                    
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <a href="<?php echo e(route('transaction.show',$transaction->id)); ?>" class="btn btn-icon icon-left btn-info"><i class="fas fa-info"></i></a>
                                    <?php if($transaction->status =="debit"): ?>
                                    <a href="<?php echo e(route('transaction.edit',$transaction->id)); ?>" class="btn btn-icon icon-left btn-warning"><i class="fas fa-pencil-alt"></i> </a>
                                    <?php endif; ?>
                                    <a href="<?php echo e(route('printlogistic',$transaction->id)); ?>" class="btn btn-danger btn-icon icon-left"><i class="fas fa-file-pdf"></i></a> 
                                    
                                    <button type="submit" class="btn btn-icon icon-left btn-primary" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"><i class="fas fa-trash-alt"></i></button>
                                </form>
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('dashboard-admin.home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\Developer\Website\Project\logistic-app\resources\views/dashboard-admin/transaction/index.blade.php ENDPATH**/ ?>