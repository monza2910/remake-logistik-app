


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
            <a href="<?php echo e(route('travel.create')); ?>" class="btn btn-icon icon-left btn-primary"><i class="fas fa-plus"></i> Add travel</a>
            
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
                            <th>Image</th>
                            <th>Name</th>
                            <th>Variant</th>
                            <th>Facility</th>
                            <th>Origin</th>
                            <th>Destination</th>
                            <th>Price</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $travels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $travel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>    
                        <tr>
                            <td><?php echo e($index + 1); ?></td> 
                            <td>
                                <img src="/images/travels/<?php echo e($travel->thumbnail); ?>"  class="img-fluid" width="300px" alt="Preview image">
                            </td>
                            <td><?php echo e($travel->name); ?></td>
                            <td><?php echo e($travel->variant); ?></td>
                            <td>
                                <?php $__currentLoopData = $travel->facilitys; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $facility): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <ul>
                                    <li><?php echo e($facility->name); ?></li>
                                </ul>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </td>
                            <td>
                                <?php if($travel->origin ): ?>
                                <?php echo e($travel->origin->city); ?>

                                
                                <?php else: ?>
                                    
                                <?php endif; ?>
                            </td>
                            
                            <td>
                                <?php if($travel->destination ): ?>
                                <?php echo e($travel->destination->city); ?>

                                
                                <?php else: ?>
                                    
                                <?php endif; ?>
                            </td>
                        
                            <td><?php echo e($travel->price); ?></td>
                            <td >
                                <form action="<?php echo e(route('travel.kill',$travel->id)); ?>" method="POST">
                                    
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <a href="<?php echo e(route('travel.restore',$travel->id)); ?>" class="btn btn-icon icon-left btn-warning"><i class="fas fa-pencil-alt"></i> Restore</a>
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
<?php echo $__env->make('dashboard-admin.home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Monza\Developer\Project\KMJ-trans\logistic-app\resources\views/dashboard-admin/travel/trash.blade.php ENDPATH**/ ?>