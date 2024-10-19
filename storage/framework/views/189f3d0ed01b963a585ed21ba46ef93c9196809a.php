


<?php $__env->startSection('title'); ?>
    travels
<?php $__env->stopSection(); ?>

<?php $__env->startSection('title-page'); ?>
    <h1>travels</h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="<?php echo e(route('travelcart')); ?>" class="btn btn-icon icon-left btn-primary"><i class="fas fa-plus"></i> Add Transaction</a>
            
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
                                <form action="<?php echo e(route('transactiontravel.destroy',$tr->id)); ?>" method="POST">
                                    
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <a href="<?php echo e(route('transactiontravel.show',$tr->id)); ?>" class="btn btn-icon icon-left btn-info"><i class="fas fa-info"></i></a>
                                    <?php if($tr->status =='debit'): ?>
                                        
                                    <a href="<?php echo e(route('transactiontravel.edit',$tr->id)); ?>" class="btn btn-icon icon-left btn-warning"><i class="fas fa-pencil-alt"></i> </a>
                                    <?php endif; ?>
                                    <a href="<?php echo e(route('printtravel',$tr->id)); ?>" class="btn btn-danger btn-icon icon-left"><i class="fas fa-file-pdf"></i></a> 
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
<?php echo $__env->make('dashboard-admin.home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Envoin\Product\Website\Project\remake-logistik-app\resources\views/dashboard-admin/travel_transaction/index.blade.php ENDPATH**/ ?>