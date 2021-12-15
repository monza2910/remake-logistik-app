<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Perluasan Daerah di Area Jawa Barat</title>
    <link rel="stylesheet" href="<?php echo e(asset('blog/css/splide.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('blog/css/splide-theme.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('blog/css/kmj.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('blog/src/fontisto/css/fontisto/fontisto.css')); ?>" />
  </head>
  <body>
    <!-- NAVBAR -->
   <?php echo $__env->make('blog.layout.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <!-- ARTICLE HEADER -->
    <div class="section section-blue section-wider">
        <div class="grid col col-40-60 grid-res">
          
          <div class="card card-text-white grid-right-50">
            <span class="card-nav">HUBUNGI KAMI</span>
            <span class="card-title"
              >Hubungi kami melalui kontak di bawah atau isi form yang
              tertera</span
            >
            <div id="socmed">
              <a href="">
                <div class="flex flex-inline">
                  <i class="fi fi-instagram fi-circle"></i>
                  <span>@kmjtrans</span>
                </div>
              </a>
              <a href="">
                <div class="flex flex-inline">
                  <i class="fi fi-facebook fi-circle"></i>
                  <span>Karuni Maju Jaya Trans</span>
                </div>
              </a>
              <a href="">
                <div class="flex flex-inline">
                  <i class="fi fi-whatsapp fi-circle"></i>
                  <span>+6285-125-679-092</span>
                </div>
              </a>
            </div>
          </div>
          <div>
            <form action="<?php echo e(route('blog.storecontactus')); ?>" method="POST" class="form">
                <?php echo csrf_field(); ?>
                <?php if($message = Session::get('success')): ?>
                <div class="alert alert-success mx-4 my-4">
                    <p><?php echo e($message); ?></p>
                </div>
                <?php elseif($message = session::get('deleted')): ?>
                <div class="alert alert-danger mx-4 my-4">
                    <p><?php echo e($message); ?></p>
                </div>
                <?php endif; ?>
              <div class="input-line">
                <span class="input-title">Nama</span>
                <input type="text" name="name" value="<?php echo e(old('name')); ?>"/>
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
              <div class="input-line">
                <span class="input-title">E-Mail</span>
                <input type="text" name="email" value="<?php echo e(old('email')); ?>"/>
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
              <div class="input-line">
                <span class="input-title">WA/Telp</span>
                <input type="text" name="phone" value="<?php echo e(old('phone')); ?>"/>
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
              </div>
              <div class="input-line">
                <span class="input-title">Pesan</span>
                <textarea name="message" id="" cols="30" rows="10"><?php echo e(old('message')); ?></textarea>
                <?php $__errorArgs = ['message'];
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
              <p id="disclaimer">
                Informasi anda akan disimpan aman dan tidak akan disalah gunakan
              </p>
              <button type="submit">Kirim Pesan</button>
            </form>
          </div>
        </div>
      </div>

    <!-- FOOTER -->
    <?php echo $__env->make('blog.layout.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  </body>

  <!-- JAVASCRIP IMPORT (DON'T MIND ABOUT THIS) -->
  <script src="<?php echo e(asset('blog/js/kmj.js')); ?>"></script>
</html>
<?php /**PATH C:\Monza\Developer\Project\KMJ-trans\logistic-app\resources\views/blog/contact-us.blade.php ENDPATH**/ ?>