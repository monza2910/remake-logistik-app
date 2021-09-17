


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
                            <th>Barcode</th>
                            <th>Invoice</th>
                            <th>Nama Penumpang </th>
                            <th>No Penumpang</th>
                            <th>Titik Penjemputan</th>
                            <th>Tanggal Pemberangkatan</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $transactions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $tr): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>    
                        <tr>
                            <td><?php echo e($index +1); ?></td> 
                            <td><img src="/images/trtravel/<?php echo e($tr->qrcode); ?>" alt="" width="100px" height="100px"></td>
                            <td><?php echo e($tr->invoice); ?></td>
                            <td><?php echo e($tr->nama_penumpang); ?></td>
                            <td><?php echo e($tr->no_penumpang); ?></td>
                            <td><?php echo e($tr->alamat_penjemputan); ?></td>
                            <td><?php echo e($tr->tgl_berangkat.' '.$tr->jam_berangkat); ?></td>
                            <td><?php echo e($tr->status); ?></td>
                            <td >
                                <form action="<?php echo e(route('transactiontravel.kill',$tr->id)); ?>" method="POST">
                                    
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <a href="<?php echo e(route('transactiontravel.restore',$tr->id)); ?>" class="btn btn-icon icon-left btn-warning"><i class="fas fa-pencil-alt"></i> Restore</a>
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
<?php echo $__env->make('dashboard-admin.home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Monza\Developer\Project\KMJ-trans\logistic-app\resources\views/dashboard-admin/travel_transaction/trash.blade.php ENDPATH**/ ?>