<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>KMJ Trans & Logistic</title>
        <link rel="stylesheet" href="<?php echo e(asset('blog/css/splide.css')); ?>" />
        <link rel="stylesheet" href="<?php echo e(asset('blog/css/splide-theme.css')); ?>" />
        <link rel="stylesheet" href="<?php echo e(asset('blog/css/kmj.css')); ?>" />
        <link rel="stylesheet" href="<?php echo e(asset('blog/src/fontisto/css/fontisto/fontisto.css')); ?>" />
        <?php echo \Livewire\Livewire::styles(); ?>

    </head>

  <body>
    <!-- NAVBAR -->
    

   <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('landingpage', [])->html();
} elseif ($_instance->childHasBeenRendered('5N6gQGY')) {
    $componentId = $_instance->getRenderedChildComponentId('5N6gQGY');
    $componentTag = $_instance->getRenderedChildComponentTagName('5N6gQGY');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('5N6gQGY');
} else {
    $response = \Livewire\Livewire::mount('landingpage', []);
    $html = $response->html();
    $_instance->logRenderedChild('5N6gQGY', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
   <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('bayar', [])->html();
} elseif ($_instance->childHasBeenRendered('tTlKMh8')) {
    $componentId = $_instance->getRenderedChildComponentId('tTlKMh8');
    $componentTag = $_instance->getRenderedChildComponentTagName('tTlKMh8');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('tTlKMh8');
} else {
    $response = \Livewire\Livewire::mount('bayar', []);
    $html = $response->html();
    $_instance->logRenderedChild('tTlKMh8', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
   <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('tracking-package', [])->html();
} elseif ($_instance->childHasBeenRendered('ZI8WyTU')) {
    $componentId = $_instance->getRenderedChildComponentId('ZI8WyTU');
    $componentTag = $_instance->getRenderedChildComponentTagName('ZI8WyTU');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('ZI8WyTU');
} else {
    $response = \Livewire\Livewire::mount('tracking-package', []);
    $html = $response->html();
    $_instance->logRenderedChild('ZI8WyTU', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
   <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('lokasi', [])->html();
} elseif ($_instance->childHasBeenRendered('RVdkSL4')) {
    $componentId = $_instance->getRenderedChildComponentId('RVdkSL4');
    $componentTag = $_instance->getRenderedChildComponentTagName('RVdkSL4');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('RVdkSL4');
} else {
    $response = \Livewire\Livewire::mount('lokasi', []);
    $html = $response->html();
    $_instance->logRenderedChild('RVdkSL4', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>

    
    <?php echo \Livewire\Livewire::scripts(); ?>

  </body>

  <!-- JAVASCRIPT IMPORT (DON'T MIND ABOUT THIS) -->
  <script src="<?php echo e(asset('blog/js/kmj.js')); ?>"></script>
  <script src="<?php echo e(asset('blog/src/splidejs/dist/js/splide.min.js')); ?>"></script>
  <script src="<?php echo e(asset('blog/js/splide.js')); ?>"></script>
</html><?php /**PATH C:\Monza\Developer\Project\KMJ-trans\logistic-app\resources\views/blog/anu.blade.php ENDPATH**/ ?>