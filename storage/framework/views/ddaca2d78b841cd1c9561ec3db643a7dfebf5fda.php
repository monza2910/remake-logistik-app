


<?php $__env->startSection('title'); ?>
    User
<?php $__env->stopSection(); ?>

<?php $__env->startSection('title-page'); ?>
    <h1>User Deleted</h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            
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
                            <th>image</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Outlet</th>
                            <th>phone</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>    
                        <tr>
                            <td><?php echo e($index + 1); ?></td>
                            <td>     
                                <?php if($user->image != null): ?>
                                    <img src="/users/<?php echo e($user->image); ?>"  class="img-fluid" width="75px">
                                <?php else: ?>
                                    Image Not Found
                                <?php endif; ?>
                            </td>
                            <td><?php echo e($user->name); ?></td>
                            <td><?php echo e($user->email); ?></td>
                            <?php if($user->role_id != null): ?>
                               <td><?php echo e($user->role->name); ?></td>
                            <?php else: ?>
                                <td></td>
                            <?php endif; ?>
                            <?php if($user->outlet_id != null): ?>
                                <td><?php echo e($user->outlet->name); ?></td>
                            <?php else: ?>
                                <td></td>
                            <?php endif; ?>
                            <td><?php echo e($user->phone); ?></td>
                            <td >
                                <form action="<?php echo e(route('user.kill',$user->id)); ?>" method="POST">
                                    
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    
                                    <a href="<?php echo e(route('user.restore',$user->id)); ?>" class="btn btn-icon icon-left btn-warning"><i class="fas fa-pencil-alt"></i> Restore</a>
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
<?php echo $__env->make('dashboard-admin.home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\Kerjaan\BOIS\Project\KMJTRANS\LogisticApp\resources\views/dashboard-admin/user/trash.blade.php ENDPATH**/ ?>