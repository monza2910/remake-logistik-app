


<?php $__env->startSection('title'); ?>
    Testimonials
<?php $__env->stopSection(); ?>

<?php $__env->startSection('title-page'); ?>
    <h1>Testimonials</h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="<?php echo e(route('testimonial.create')); ?>" class="btn btn-icon icon-left btn-primary"><i class="fas fa-plus"></i> Add Testimonial</a>
            
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
                            <th>Position</th>
                            <th>Company</th>
                            <th>Quote</th>
                            <th>status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $testimonials; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $testimonial): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>    
                        <tr>
                            <td><?php echo e($index + $testimonials->firstitem()); ?></td>
                            <td>     
                                <img src="/testimonials/<?php echo e($testimonial->image); ?>"  class="img-fluid" width="100px" alt="Preview image">
                            </td>
                            <td><?php echo e($testimonial->name); ?></td>
                            <td><?php echo e($testimonial->position); ?></td>
                            <td><?php echo e($testimonial->company); ?></td>
                            <td><?php echo e($testimonial->quote); ?></td>
                            <?php if($testimonial->status == 0): ?>
                            <td>Draft</td>
                            <?php else: ?>
                            <td>Active</td>
                            <?php endif; ?>
                            <td >
                                <form action="<?php echo e(route('testimonial.destroy',$testimonial->id)); ?>" method="POST">
                                    
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <a href="<?php echo e(route('testimonial.edit',$testimonial->id)); ?>" class="btn btn-icon icon-left btn-warning"><i class="fas fa-pencil-alt"></i> Update</a>
                                    <button type="submit" class="btn btn-icon icon-left btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
                <?php echo e($testimonials->links()); ?>

            </div>
        </div>
    </div>

</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('dashboard-admin.home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\Kerjaan\BOIS\Project\KMJTRANS\example-appcompany-profile\resources\views/dashboard-admin/testimonial/index.blade.php ENDPATH**/ ?>