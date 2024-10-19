


<?php $__env->startSection('title'); ?>
    General Setting
<?php $__env->stopSection(); ?>

<?php $__env->startSection('title-page'); ?>
    <h1>General Setting</h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="section-body">
        
        <div class="row mt-sm-4">
            <?php if($message = Session::get('success')): ?>
            <div class="alert alert-success mx-4 my-4">
                <p><?php echo e($message); ?></p>
            </div>
            <?php elseif($message = session::get('deleted')): ?>
            <div class="alert alert-danger mx-4 my-4">
                <p><?php echo e($message); ?></p>
            </div>
            <?php endif; ?>
          <div class="col-12 col-md-12 col-lg-12">
            <?php $__currentLoopData = $generals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $general): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($general->page_name == 'logo'): ?>
            <div class="card">
                <form  action="<?php echo e(route('generalsetting.update',$general->page_name)); ?>" method="post" enctype="multipart/form-data" >
                  <?php echo csrf_field(); ?>
                  <?php echo method_field('put'); ?>
                  <div class="card-header">
                    <h4>Logo</h4>
                  </div>
                  <div class="row">
                    <div class="form-group col-md-6 col-12">
                      <div class="form-group ml-4">
                          <label for="image" >Old Logo</label>
                          <br>
                          <img src="/assets/logo/<?php echo e($general->image); ?>"  class="img-fluid" width="100px" alt="Preview image">
                      </div>
                    </div>
                    <div class="form-group col-md-6 col-12">
                      <div class="form-group ml-4">
                          <label for="image" >New Logo(Optional)</label>
                          <input  id="cat_image" type="file" name="image" width="100px" class="form-control">
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
                      <div class="form-group ml-4">
                          <img src="#" id="category-img-tag" class="img-fluid" width="200px" alt="Preview image">
                      </div>
                    </div>
                  </div>
                  <div class="card-footer text-right">
                    <button class="btn btn-primary">Save Changes</button>
                  </div>
                </form>
            </div>
            <?php elseif($general->page_name == 'about_us'): ?>
            <div class="card">
              <form  action="<?php echo e(route('generalsetting.update',$general->page_name)); ?>" method="post" enctype="multipart/form-data" >
                <?php echo csrf_field(); ?>
                <?php echo method_field('put'); ?>
                <div class="card-header">
                  <h4>About us</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="form-group col-md-12 col-12">
                            <label> Content</label>
                            <textarea name="content" id="" cols="30" rows="10" class="form-control" ><?php echo e($general->content); ?></textarea>
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
                    </div>
                    
                </div>
                <div class="card-footer text-right">
                  <button class="btn btn-primary">Save Changes</button>
                </div>
              </form>
            </div>
            
            <?php elseif($general->page_name == 'main_address'): ?>
            <div class="card">
                <form  action="<?php echo e(route('generalsetting.update',$general->page_name)); ?>" method="post" enctype="multipart/form-data" >
                  <?php echo csrf_field(); ?>
                  <?php echo method_field('put'); ?>
                  <div class="card-header">
                    <h4>Main Address</h4>
                  </div>
                  <div class="card-body">
                      <div class="row">
                          <div class="form-group col-md-12 col-12">
                              <label> Address</label>
                              <textarea name="content" id="" cols="30" rows="10" class="form-control" ><?php echo e($general->content); ?></textarea>
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
                      </div>
                      
                  </div>
                  <div class="card-footer text-right">
                    <button class="btn btn-primary">Save Changes</button>
                  </div>
                </form>
              </div>
            <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </div>
        </div>
      </div>

</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('dashboard-admin.home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Envoin\Product\Website\Project\remake-logistik-app\resources\views/dashboard-admin/setting/generalsetting/index.blade.php ENDPATH**/ ?>