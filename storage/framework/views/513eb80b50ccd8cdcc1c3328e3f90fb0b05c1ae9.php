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
                <div class="card-header">
                    <h3>Tambah Paket </h3>
                </div>
                <div class="card-body">
                    <form wire:submit.prevent="addItem">
                        <?php echo csrf_field(); ?>
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" wire:model="name"  class="form-control">
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
            <div class="card shadow mb-4">
                <div class="card-header">
                    <h3>Paket</h3>
                </div>
                <div class="card-body">
                    <table class="table" width="100%" cellspacing="0">
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
                                    <a wire:click="minItem('<?php echo e($cart['rowId']); ?>')" class="btn btn-warning btn-sm" ><i class="fas fa-minus"></i></a>
                                    <?php echo e($cart['qty']); ?> 
                                    <a  wire:click="increaseItem('<?php echo e($cart['rowId']); ?>')" class="btn btn-primary btn-sm" ><i class="fas fa-plus"></i></i>
                                    </td> 
                                <td>
                                    <a wire:click="removeItem('<?php echo e($cart['rowId']); ?>')" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i>Delete</a>    
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

                            <?php endif; ?>
                        
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-md-8">
            <div class="card shadow mb-4">
                <div class="card-header">
                    <h3>Service Yang Dipilih</h3>
                </div>
                <div class="card-body">
                   
                    <div class="form-group select-box">
                        <label >Dikirim Dari</label>
                        <select class="form-control " wire:model="from" >
                            <option value="" selected > Pilih </option>
                            <?php $__currentLoopData = $origins; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $origin): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($origin->origin_id); ?>"><?php echo e($origin->origin->province.', '.$origin->origin->city.', '.$origin->origin->subdistrict); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <div class="form-group select-box">
                        <label >Dikirim Ke</label>
                        <select class="form-control " wire:model="to" >
                        <?php if(!empty($destinations)): ?>
                        <option value="" >Pilih</option>
                            <?php $__currentLoopData = $destinations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $destination): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                            <option value="<?php echo e($destination->destination_id); ?>"><?php echo e($destination->destination->province.', '.$destination->destination->city.', '.$destination->destination->subdistrict); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php else: ?>
                            <option value="" >Not Found</option>
                        
                        <?php endif; ?>
                        </select>
                    </div>
                    <div class="form-group select-box">
                        <label >Jenis Layanan</label>
                        <select class="form-control " wire:model="service" >
                        <?php if(!empty($variants)): ?>
                            <?php $__currentLoopData = $variants; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $variant): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                            <option value="<?php echo e($variant->variantservice_id); ?>"><?php echo e($variant->variantservice->variant_service); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php else: ?>
                            <option value="" >Not Found</option>
                        
                        <?php endif; ?>
                        </select>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6 col-12">
                            <div class="form-group">
                                <label for="">Berat Keseluruhan(Kg) </label>
                                <input type="text" wire:model="berat_keseluruhan" value=""  class="form-control">
                            </div>
                        </div>
                        <div class="form-group col-md-6 col-12">
                            <div class="form-group">
                                <label for="">Harga /Kg</label>
                                <?php if(!empty($prices)): ?>
                                    <?php $__currentLoopData = $prices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $price): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <input type="text" wire:model="harga_kg" value="<?php echo e($price->above_terms); ?>" class="form-control">                
                                        
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php else: ?>
                                    <input type="text" wire:model="harga_kg" readonly value="Kosong" class="form-control">
                                <?php endif; ?>    
                            </div>
                        </div>
                        <div class="form-group col-md-6 col-12">
                            <div class="form-group">
                                <label for="">Sub Total </label>
                                <input type="text" wire:model="sub_total"  class="form-control">
                            </div>
                        </div>
                        <div class="form-group col-md-6 col-12">
                            <div class="form-group">
                                <label for="">Diskon </label>
                                <input type="text" wire:model="diskon"  class="form-control">
                            </div>
                        </div>
                        <h2>Total Harga     : </h2>
                    </div>
                </div>
            </div>

            <div class="card shadow mb-4">
                <div class="card-header"><h3>Detail Order</h3></div>
                <div class="card-body">
                    <form >
                        <?php echo csrf_field(); ?>

                            <div class="form-group">
                                <label>Nama Pengirim</label>
                                <input type="text" wire:model="nama_pengirim"  class="form-control">
                                <?php $__errorArgs = ['nama_pengirim'];
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
                                <label>Alamat Pengirim</label>
                                <textarea wire:model="alamat_pengirim" class="form-control" cols="30" rows="10"></textarea>
                                <?php $__errorArgs = ['alamat_pengirim'];
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
                                <label>No Pengirim</label>
                                <input type="text" wire:model="no_pengirim"  class="form-control">
                                <?php $__errorArgs = ['no_pengirim'];
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
                                <label>Penerima</label>
                                <input type="text" wire:model="penerima"  class="form-control">
                                <?php $__errorArgs = ['penerima'];
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
                                <label>ALaamt Penerima </label>
                                <textarea wire:model="alamat_penerima" class="form-control" cols="30" rows="10"></textarea>
                                <?php $__errorArgs = ['alamat_penerima'];
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
                                <label>No Pengirim</label>
                                <input type="text" wire:model="no_pengirim"  class="form-control">
                                <?php $__errorArgs = ['no_pengirim'];
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