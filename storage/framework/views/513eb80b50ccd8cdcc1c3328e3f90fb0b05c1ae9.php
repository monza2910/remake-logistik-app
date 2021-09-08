<?php $__env->startSection('title'); ?>
    Logistic
<?php $__env->stopSection(); ?>
<?php $__env->startSection('title-page'); ?>
    Add Transaction Logistic
<?php $__env->stopSection(); ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-4">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <form wire:submit.prevent="addItem">
                        <?php echo csrf_field(); ?>
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" wire:model="name"  class="form-control">
                            <?php $__errorArgs = ['wire:model'];
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
                            <label>Weight(kg)</label>
                            <input type="number" wire:model="weight" min="0" class="form-control">
                            <?php $__errorArgs = ['weight'];
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
                        <div class="form-group text-right">
                            <button class="btn btn-primary mb-2" type="submit">Add</button>
                            <a href="#" wire:click="resetFields()" class="btn btn-info  mb-2"> Clear</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Weight(Kg)</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>    
                            <?php $__empty_1 = true; $__currentLoopData = $carts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index=>$cart): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr>
                                <td><?php echo e($cart['name']); ?></td>
                                <td>
                                    <a href="#" wire:click="minItem('<?php echo e($cart['rowId']); ?>')" class="btn btn-warning btn-sm" ><i class="fas fa-minus"></i></a>
                                    <?php echo e($cart['qty']); ?> 
                                    <a href="#" wire:click="increaseItem('<?php echo e($cart['rowId']); ?>')" class="btn btn-primary btn-sm" ><i class="fas fa-plus"></i></i>
                                    </td> 
                                <td>
                                    <a href="#"  wire:click="removeItem('<?php echo e($cart['rowId']); ?>')" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i>Delete</a>    
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

                            <?php endif; ?>
                        
                        </tbody>
                    </table>
                    <h4><?php echo e($qtyTotal); ?></h4>
                </div>
            </div>
            <div class="card shadow mb-4">
                <div class="card-header"><h1>Detail Order</h1></div>
                <div class="card-body">
                    <form action="<?php echo e(route('variant.store')); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" wire:model="name"  class="form-control">
                            <?php $__errorArgs = ['wire:model'];
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
                            <label>Weight(kg)</label>
                            <input type="number" wire:model="weight" class="form-control">
                            <?php $__errorArgs = ['weight'];
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
                            <label>Description</label>
                            <input type="text" wire:model="description"  class="form-control">
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
                        <div class="form-group text-right">
                            <button class="btn btn-primary mb-2" type="submit">Submit</button>
                            <a href="<?php echo e(route('variant.index')); ?>" class="btn btn-info  mb-2"> Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php /**PATH C:\Monza\Developer\Project\KMJ-trans\logistic-app\resources\views/livewire/logistic.blade.php ENDPATH**/ ?>