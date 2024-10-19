
	<style type="text/css">
		.my-active span{
			background-color: #ff5200 !important;
			color: white !important;
			border-color: #ff5200 !important;
		}
	</style>
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<?php if($paginator->hasPages()): ?>
    <ul class="pager">
       
        
        <?php if($paginator->onFirstPage()): ?>
            <li class="disabled"><span>← Previous</span></li>
        <?php else: ?>
            <li><a href="<?php echo e($paginator->previousPageUrl()); ?>" rel="prev">← Previous</a></li>
        <?php endif; ?>


      
        <?php $__currentLoopData = $elements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
           
            <?php if(is_string($element)): ?>
                <li class="disabled"><span><?php echo e($element); ?></span></li>
            <?php endif; ?>


           
            <?php if(is_array($element)): ?>
                <?php $__currentLoopData = $element; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page => $url): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($page == $paginator->currentPage()): ?>
                        <li class="active my-active"><span><?php echo e($page); ?></span></li>
                    <?php else: ?>
                        <li><a href="<?php echo e($url); ?>"><?php echo e($page); ?></a></li>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


        
        <?php if($paginator->hasMorePages()): ?>
            <li><a href="<?php echo e($paginator->nextPageUrl()); ?>" rel="next">Next →</a></li>
        <?php else: ?>
            <li class="disabled"><span>Next →</span></li>
        <?php endif; ?>
    </ul>
<?php endif; ?> 
 <?php /**PATH D:\Envoin\Product\Website\Project\remake-logistik-app\resources\views/blog/vendor/paginator.blade.php ENDPATH**/ ?>