


<?php $__env->startSection('title'); ?>
    Sliders
<?php $__env->stopSection(); ?>

<?php $__env->startSection('title-page'); ?>
    <h1>Sliders</h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="<?php echo e(route('slider.create')); ?>" class="btn btn-icon icon-left btn-primary"><i class="fas fa-plus"></i> Add Slider</a>
            
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
                            <th>Title</th>
                            <th>Description</th>
                            <th>Button</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $sliders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $slider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>    
                        <tr>
                            <td><?php echo e($index + 1); ?></td>
                            <td>     
                                <img src="<?php echo e($slider->image); ?>"  class="img-fluid" width="200px" alt="Preview image">
                            </td>
                            <td><?php echo e($slider->title_one.''.$slider->title_two); ?></td>
                            <td><?php echo e($slider->description); ?></td>
                            <?php if($slider->button != null): ?>
                            <td><?php echo e($slider->button->name); ?></td>
                            <?php else: ?>
                            <td>
                            </td>
                            <?php endif; ?>
                            
                            <td>

                            <?php if($slider->status == '0'): ?>
                                Draft
                            <?php else: ?>
                                Active
                            <?php endif; ?>

                            </td>
                            <td >
                                <form action="<?php echo e(route('slider.destroy',$slider->id)); ?>" method="POST">
                                    
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <a href="<?php echo e(route('slider.edit',$slider->id)); ?>" class="btn btn-icon icon-left btn-warning"><i class="fas fa-pencil-alt"></i> Update</a>
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
<?php echo $__env->make('dashboard-admin.home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Monza\Developer\Project\KMJ-trans\logistic-app\resources\views/dashboard-admin/slider/index.blade.php ENDPATH**/ ?>