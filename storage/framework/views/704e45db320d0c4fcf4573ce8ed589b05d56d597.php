


<?php $__env->startSection('title'); ?>
    Transactions
<?php $__env->stopSection(); ?>

<?php $__env->startSection('title-page'); ?>
    <h1>Deleted Transactions</h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
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
                            <th>Invoice </th>
                            <th>Tracking Number </th>
                            <th>Recipient</th>
                            <th>address Recipient</th>
                            <th>Sender</th>
                            <th>address Sender</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $transactions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $transaction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>    
                        <tr>
                            <td><?php echo e($index +1); ?></td> 
                            <td><?php echo e($transaction->invoice); ?></td>
                            <td><?php echo e($transaction->tracking_number); ?></td>
                            <td><?php echo e($transaction->penerima); ?></td>
                            <td><?php echo e($transaction->alamat_penerima); ?></td>
                            <td><?php echo e($transaction->pengirim); ?></td>
                            <td><?php echo e($transaction->alamat_pengirim); ?></td>
                            <td >
                                <form action="<?php echo e(route('transaction.kill',$transaction->id)); ?>" method="POST">
                                    
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <a href="<?php echo e(route('transaction.restore',$transaction->id)); ?>" class="btn btn-icon icon-left btn-warning"><i class="fas fa-pencil-alt"></i> Restore</a>
                                    <button type="submit" class="btn btn-icon icon-left btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</button>
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
<?php echo $__env->make('dashboard-admin.home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Monza\Developer\Project\KMJ-trans\logistic-app\resources\views/dashboard-admin/transaction/trash.blade.php ENDPATH**/ ?>