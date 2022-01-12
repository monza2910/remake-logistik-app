


<?php $__env->startSection('title'); ?>
    Articles
<?php $__env->stopSection(); ?>

<?php $__env->startSection('title-page'); ?>
    <h1>articles</h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="<?php echo e(route('article.create')); ?>" class="btn btn-icon icon-left btn-primary"><i class="fas fa-plus"></i> Add article</a>
            
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
                            <th>View</th>
                            <th>Category</th>
                            <th>Tags</th>
                            <th>Status</th>
                            <th>Author</th>
                            <th>Created At</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $articles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>    
                        <tr>
                            <td><?php echo e($index + 1); ?></td> 
                            <td>
                                <img src="<?php echo e($article->thumbnail); ?>"  class="img-fluid" height="200px" width="200px" alt="Preview image">
                            </td>
                            <td><?php echo e($article->title); ?></td>
                            <td><?php echo e($article->view_count); ?></td>
                            <td>
                                <?php if($article->category): ?>
                                    <?php echo e($article->category->name); ?> 
                                <?php else: ?>
                                   
                                <?php endif; ?>
                            </td>
                            <td>
                                <?php $__currentLoopData = $article->tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <ul>
                                    <li><?php echo e($tag->name); ?></li>
                                </ul>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </td>
                            <td>
                                <?php if($article->status == 0): ?>
                                    Draft
                                <?php else: ?>
                                    Active
                                <?php endif; ?>
                            </td>
                            
                            
                            <td>
                                <?php if($article->user->name != null): ?>
                                <?php echo e($article->user->name.' ('.$article->user->role->name.')'); ?></td>
                                <?php else: ?>
                                    
                                <?php endif; ?>
                            <td><?php echo e($article->created_at); ?></td>
                            <td >
                                <form action="<?php echo e(route('article.destroy',$article->id)); ?>" method="POST">
                                    
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <a href="<?php echo e(route('article.edit',$article->id)); ?>" class="btn btn-icon icon-left btn-warning"><i class="fas fa-pencil-alt"></i> Update</a>
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
<?php echo $__env->make('dashboard-admin.home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Monza\Developer\Project\KMJ-trans\logistic-app\resources\views/dashboard-admin/article/index.blade.php ENDPATH**/ ?>