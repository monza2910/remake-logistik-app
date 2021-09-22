


<?php $__env->startSection('title'); ?>
    armada
<?php $__env->stopSection(); ?>

<?php $__env->startSection('title-page'); ?>
    <h1>armada</h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="<?php echo e(route('armada.create')); ?>" class="btn btn-icon icon-left btn-primary"><i class="fas fa-plus"></i> Add armada</a>
            
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
                        <?php $__currentLoopData = $armadas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $armada): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>    
                        <tr>
                            <td><?php echo e($index + 1); ?></td> 
                            <td>
                                <img src="/images/armadas/<?php echo e($armada->thumbnail); ?>"  class="img-fluid" width="300px" alt="Preview image">
                            </td>
                            <td><?php echo e($armada->name); ?></td>
                            <td><?php echo e($armada->variant); ?></td>
                            <td>
                                <?php $__currentLoopData = $armada->facilitys; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $facility): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <ul>
                                    <li><?php echo e($facility->name); ?></li>
                                </ul>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </td>
                            <td>
                                <?php if($armada->origin->city != null ): ?>
                                <?php echo e($armada->origin->city); ?>

                                
                                <?php else: ?>
                                    
                                <?php endif; ?>
                            </td>
                            
                            <td>
                                <?php if($armada->destination->city != null ): ?>
                                <?php echo e($armada->destination->city); ?>

                                
                                <?php else: ?>
                                    
                                <?php endif; ?>
                            </td>
                        
                            <td><?php echo e($armada->price); ?></td>
                            <td >
                                <form action="<?php echo e(route('armada.kill',$armada->id)); ?>" method="POST">
                                    
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <a href="<?php echo e(route('armada.restore',$armada->id)); ?>" class="btn btn-icon icon-left btn-warning"><i class="fas fa-pencil-alt"></i> Restore</a>
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
<?php echo $__env->make('dashboard-admin.home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Monza\Developer\Project\KMJ-trans\logistic-app\resources\views/dashboard-admin/armada/trash.blade.php ENDPATH**/ ?>