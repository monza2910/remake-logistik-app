


<?php $__env->startSection('title'); ?>
    article
<?php $__env->stopSection(); ?>

<?php $__env->startSection('title-page'); ?>
    <h1>Create article</h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <div class="card shadow mb-4">
          <div class="card-body">

            
            <form action="<?php echo e(route('article.store')); ?>" method="post" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <div class="form-group">
                    <label>Title </label>
                    <input type="text" name="title" value="<?php echo e(old('title')); ?>" class="form-control">
                    <?php $__errorArgs = ['title'];
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
                    <label>Slug (optional) </label>
                    <input type="text" name="slug" value="<?php echo e(old('slug')); ?>" class="form-control">
                    <?php $__errorArgs = ['slug'];
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
                    <label for="image" >Thumbnail</label>
                    <input  id="cat_image" type="file" name="thumbnail" value="<?php echo e(old('thumbnail')); ?>" class="form-control">
                    <?php $__errorArgs = ['thumbnail'];
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
                    <label >Category</label>
                    <select class="form-control selectric" name="category_id">
                            <option value="">Select Category</option>
                        <?php $__currentLoopData = $categorys; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>

                <div class="form-group">
                    <label >Tags</label>
                    <select class="form-control selectpicker" multiple="" name="tags[]">
                        <?php $__currentLoopData = $tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($tag->id); ?>"><?php echo e($tag->name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Content</label>
                    <textarea class="form-control" id="content" name="content" rows="3"><?php echo e(old('content')); ?></textarea>
                    <?php $__errorArgs = ['content'];
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
                        <option value="0">Draft</option>
                        <option value="1">Active</option>
                    </select>
                </div>
                <div class="form-group text-right">
                    <button class="btn btn-primary mb-2" type="submit">Submit</button>
                    <a href="<?php echo e(route('article.index')); ?>" class="btn btn-info  mb-2"> Back</a>
                </div>
            </form>
          </div>
    </div>
    

</div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?>
    <script >
      
    CKEDITOR.replace( 'content',{
      filebrowserUploadUrl      : "<?php echo e(route('article.upload',['_token' => csrf_token()])); ?>",
      filebrowserUploadMethod   : "form",

    } );
    
  </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('dashboard-admin.home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\Kerjaan\BOIS\Project\KMJTRANS\LogisticApp\resources\views/dashboard-admin/article/create.blade.php ENDPATH**/ ?>