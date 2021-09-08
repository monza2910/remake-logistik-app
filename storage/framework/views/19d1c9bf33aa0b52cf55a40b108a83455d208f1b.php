


<?php $__env->startSection('title'); ?>
    Shipping Rates
<?php $__env->stopSection(); ?>

<?php $__env->startSection('title-page'); ?>
    <h1>Shipping Rate</h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="<?php echo e(route('rate.create')); ?>" class="btn btn-icon icon-left btn-primary"><i class="fas fa-plus"></i> Add Shipping Rate</a>
            
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
                            <th>Origin</th>
                            <th>Destination</th>
                            <th>Under Terms Rate</th>
                            <th>Above Terms Rate</th>
                            <th>Estimated arrived</th>
                            <th>Variant Service</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $rates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $rate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>    
                        <tr>
                            <td><?php echo e($index + 1); ?></td>
                            <td><?php echo e($rate->origin->province.', '.$rate->origin->city.', '.$rate->origin->subdistrict); ?></td>
                            <td><?php echo e($rate->destination->province.', '.$rate->destination->city.', '.$rate->destination->subdistrict); ?></td>
                            <td>Rp. <?php echo e($rate->under_terms); ?></td>
                            <td>Rp. <?php echo e($rate->above_terms); ?></td>
                            <td><?php echo e($rate->est_arrived); ?> Days</td>
                            <td><?php echo e($rate->variantservice->variant_service); ?></td>
                            <td >
                                <form action="<?php echo e(route('rate.destroy',$rate->id)); ?>" method="POST">
                                    
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    
                                    <a href="<?php echo e(route('rate.edit',$rate->id)); ?>" class="btn btn-icon icon-left btn-warning"><i class="fas fa-pencil-alt"></i> Update</a>
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
<?php echo $__env->make('dashboard-admin.home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Monza\Developer\Project\KMJ-trans\logistic-app\resources\views/dashboard-admin/shippingrate/index.blade.php ENDPATH**/ ?>