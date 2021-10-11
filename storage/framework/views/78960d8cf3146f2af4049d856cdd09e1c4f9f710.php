


<?php $__env->startSection('title'); ?>
    armadas
<?php $__env->stopSection(); ?>

<?php $__env->startSection('title-page'); ?>
    <h1>armadas</h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="<?php echo e(route('armadacart')); ?>" class="btn btn-icon icon-left btn-primary"><i class="fas fa-plus"></i> Add Transaction</a>
            
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
                            <th>Nama Penyewa </th>
                            <th>No Penyewa</th>
                            <th>Alamat</th>
                            <th>Tgl Berangkat</th>
                            <th>Tgl Kembali</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $transactions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $tr): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>    
                        <tr>
                            <td><?php echo e($index +1); ?></td> 
                            <td><img src="/images/trarmada/<?php echo e($tr->qr_code); ?>" alt="" width="100px" height="100px"></td>
                            <td><?php echo e($tr->invoice); ?></td>
                            <td><?php echo e($tr->penyewa); ?></td>
                            <td><?php echo e($tr->no_penyewa); ?></td>
                            <td><?php echo e($tr->alamat_penyewa); ?></td>
                            <td><?php echo e($tr->tgl_berangkat); ?></td>
                            <td><?php echo e($tr->tgl_kembali); ?></td>
                            <td><?php echo e($tr->status); ?></td>
                            <td >
                                <form action="<?php echo e(route('transactionarmada.destroy',$tr->id)); ?>" method="POST">
                                    
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <a href="<?php echo e(route('transactionarmada.show',$tr->id)); ?>" class="btn btn-icon icon-left btn-info"><i class="fas fa-info"></i></a>
                                    <?php if($tr->status =='debit'): ?>
                                        
                                    <a href="<?php echo e(route('transactionarmada.edit',$tr->id)); ?>" class="btn btn-icon icon-left btn-warning"><i class="fas fa-pencil-alt"></i> </a>
                                    <?php endif; ?>
                                    
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
<?php echo $__env->make('dashboard-admin.home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Monza\Developer\Project\KMJ-trans\logistic-app\resources\views/dashboard-admin/armada_transaction/index.blade.php ENDPATH**/ ?>