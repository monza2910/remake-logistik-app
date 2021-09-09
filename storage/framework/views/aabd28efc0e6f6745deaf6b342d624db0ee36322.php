


<?php $__env->startSection('title'); ?>
    gallery
<?php $__env->stopSection(); ?>

<?php $__env->startSection('title-page'); ?>
    <h1>Update gallery</h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <div class="card shadow mb-4">
          <div class="card-body">

            
            <form action="<?php echo e(route('gallery.update',$gallery->id)); ?>" method="post" enctype="multipart/form-data">
                <?php echo method_field('PUT'); ?>
                <?php echo csrf_field(); ?>
                
                <div class="form-group">
                    <label for="image" >Image</label>
                    <br>
                    <img src="/images/gallery/<?php echo e($gallery->image); ?>"  class="img-fluid" width="500px" alt="Preview image">
                </div>
                <div class="form-group">
                    <label for="image" >New Image(Optional)</label>
                    <input  id="cat_image" type="file" name="image" value="<?php echo e($gallery->image); ?>" class="form-control">
                    <?php $__errorArgs = ['image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <small class="text-danger"><?php echo e($message); ?></small>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
                <div class="form-group">
                    <img src="#" id="category-img-tag" class="img-fluid" width="500px" alt="Preview image">
                </div>
                <div class="form-group">
                    <label  >Description</label>
                    <textarea name="description" cols="30" rows="10" class="form-control"><?php echo e($gallery->description); ?></textarea>
                    <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <small class="text-danger"><?php echo e($message); ?></small>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
                <div class="form-group">
                    <label >Status</label>
                    <br>
                    <select class="form-control selectric" name="status">
                        <?php if($gallery->status == 0 ): ?>
                            <option selected value="0">Draft</option>
                            <option value="1">Active</option>
                            <?php elseif($gallery->status == 1): ?>
                            <option value="0">Draft</option>
                            <option selected value="1">Active</option>
                        <?php endif; ?>
                    </select>
                </div>
                <div class="form-group text-right">
                    <button class="btn btn-primary mb-2" type="submit">Submit</button>
                    <a href="<?php echo e(route('gallery.index')); ?>" class="btn btn-info  mb-2"> Back</a>
                </div>
            </form>
          </div>
    </div>
    

</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('dashboard-admin.home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Monza\Developer\Project\KMJ-trans\logistic-app\resources\views/dashboard-admin/gallery/edit.blade.php ENDPATH**/ ?>