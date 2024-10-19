


<?php $__env->startSection('title'); ?>
    Profile Setting
<?php $__env->stopSection(); ?>

<?php $__env->startSection('title-page'); ?>
    <h1>Profile Setting</h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="section-body">
        
        <h2 class="section-title">Hi, <?php echo e(auth::user()->name); ?></h2>
        <p class="section-lead">
          Change information about yourself on this page.
        </p>
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
            <div class="card">
              <form  action="<?php echo e(route('profile.update',$user->id)); ?>" method="post" enctype="multipart/form-data" >
                <?php echo csrf_field(); ?>
                <?php echo method_field('put'); ?>
                <div class="card-header">
                  <h4>Edit Profile</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="form-group col-md-12 col-12">
                            <label> Name</label>
                            <input type="text" class="form-control" value="<?php echo e($user->name); ?>" name="name">
                            <?php $__errorArgs = ['name'];
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
                    <div class="row">
                      <div class="form-group col-md-6 col-12">
                        <div class="form-group">
                            <label for="image" >Old Image</label>
                            <br>
                            <img src="<?php echo e($user->image); ?>"  class="img-fluid" width="100px" alt="Preview image">
                        </div>
                      </div>
                      <div class="form-group col-md-6 col-12">
                        <div class="form-group">
                            <label for="image" >New Image Profile(Optional)</label>
                            <input  id="cat_image" type="file" name="image"  class="form-control">
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
                            <img src="#" id="category-img-tag" class="img-fluid" width="200px" alt="Preview image">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group col-md-6 col-12">
                        <label>Email</label>
                        <input type="email" class="form-control" value="<?php echo e($user->email); ?>" readonly>
                        <?php $__errorArgs = ['email'];
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
                      <div class="form-group col-md-6 col-12">
                        <label>New Email(Optional)</label>
                        <input type="email" class="form-control" value="<?php echo e(old('email')); ?>" name="email">
                        <?php $__errorArgs = ['email'];
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
                    <div class="row">
                      <div class="form-group col-md-6 col-12">
                        <label>Phone(Optional)</label>
                        <input type="tel" class="form-control" 
                        <?php if($user->phone != null): ?>
                        value="<?php echo e($user->phone); ?>"
                        <?php else: ?>
                        value="<?php echo e(old('phone')); ?>"
                        <?php endif; ?>
                         name="phone">
                      </div>
                      <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                      <small class="text-danger"><?php echo e($message); ?></small>
                      <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                      <div class="form-group col-md-6 col-12">
                        <label>New Password(Optional)</label>
                        <input type="password" class="form-control" name="newpassword">
                        <?php $__errorArgs = ['newpassword'];
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
          </div>
        </div>
      </div>

</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('dashboard-admin.home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Envoin\Product\Website\Project\remake-logistik-app\resources\views/dashboard-admin/user/profilesetting.blade.php ENDPATH**/ ?>