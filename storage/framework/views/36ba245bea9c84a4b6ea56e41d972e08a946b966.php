<?php $__env->startSection('title'); ?>
    Logistic
<?php $__env->stopSection(); ?>
<?php $__env->startSection('title-page'); ?>
    Add Transaction Logistic
<?php $__env->stopSection(); ?>
<div class="container-fluid">

    <div class="row">
        <div class="col-md-12">
            <?php if(session()->has('success')): ?>
            <div class="alert alert-success" role="alert">
                <?php echo e(session('success')); ?>

            </div>
        <?php elseif(session()->has('error')): ?>
            <div class="alert alert-danger" role="alert">
                <?php echo e(session('error')); ?>

            </div>
        <?php endif; ?>
        </div>    
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
                            <label>Weight(ton)</label>
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
                    <div class="table-responsive">
                        <table class="table table-bordered"  width="100%" cellspacing="0">
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
                            <tr>
                                <td colspan="3">
                                    <h6 class="text-center">Empty Cart</h6>
                                </td>
                            </tr>
                            <?php endif; ?>
                        
                        </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-8">
            <form wire:submit.prevent="submitHandle">
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
                                    <?php if($origin->origin): ?>
                                    <option value="<?php echo e($origin->origin_id); ?>"><?php echo e($origin->origin->province.', '.$origin->origin->city.', '.$origin->origin->subdistrict); ?></option>
                                    <?php else: ?>
                                    
                                    <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    
                                </select>
                                <?php $__errorArgs = ['from'];
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
                            <div class="form-group select-box">
                                <label >Dikirim Ke</label>
                                <select class="form-control " wire:model="to" >
                                <?php if(!empty($destinations)): ?>
                                <option value="" >Pilih</option>
                                    <?php $__currentLoopData = $destinations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $destination): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                    <?php if($destination->destination): ?>
                                    <option value="<?php echo e($destination->destination_id); ?>"><?php echo e($destination->destination->province.', '.$destination->destination->city.', '.$destination->destination->subdistrict); ?></option>
                                        
                                    <?php else: ?>
                                        
                                    <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php else: ?>
                                    <option value="" >Not Found</option>
                                
                                <?php endif; ?>
                                </select>
                                <?php $__errorArgs = ['to'];
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
                            <div class="form-group select-box">
                                <label >Jenis Layanan</label>
                                <select class="form-control " wire:model="service" >
                                <?php if(!empty($variants)): ?>
                                <option value="" >Pilih</option>

                                    <?php $__currentLoopData = $variants; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $variant): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                    <?php if($variant->variantservice): ?>
                                    <option value="<?php echo e($variant->variantservice_id); ?>"><?php echo e($variant->variantservice->variant_service.'( '.$variant->est_arrived.' Days)'); ?></option>
                                        
                                    <?php else: ?>
                                        
                                    <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php else: ?>
                                    <option value="" >Not Found</option>
                                
                                <?php endif; ?>
                                </select>
                                <?php $__errorArgs = ['service'];
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

                            <div class="row">
                                <div class="form-group col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="">Berat Keseluruhan(Kg) </label>
                                        <input type="text" wire:model="sub_berat" readonly  class="form-control">
                                    </div>
                                    <?php $__errorArgs = ['sub_berat'];
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
                                    <div class="form-group">
                                        <label for="">Harga /Kg</label>
                                        <?php if(!empty($prices)): ?>
                                            
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">Rp</span>
                                            <input type="text" wire:model="harga_kg"  readonly  class="form-control">
                                        </div>               
                                                
                                        <?php else: ?>
                                            <input type="text" wire:model="harga_kg" readonly value="Kosong" class="form-control">
                                        <?php endif; ?> 
                                        <?php $__errorArgs = ['harga_kg'];
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
                                <div class="form-group col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="">Sub Total </label>
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">Rp</span>
                                            <input type="text" wire:model="sub_total"  readonly  class="form-control">
                                        </div>
                                        <?php $__errorArgs = ['sub_total'];
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
                                <div class="form-group col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="">Diskon</label>
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">Rp</span>
                                            <input type="number" wire:model="diskon"   class="form-control">
                                        </div>
                                        <?php $__errorArgs = ['diskon'];
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
                                <div class="form-group col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="">Total </label>
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">Rp</span>
                                            <input type="number" wire:model="total" readonly  class="form-control">
                                        </div>
                                        <?php $__errorArgs = ['total'];
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
                                <div class="form-group col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="">Dibayar</label>
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">Rp</span>
                                            <input type="number" wire:model="dibayar"   class="form-control">
                                        </div>
                                        <?php $__errorArgs = ['dibayar'];
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
                                <div class="form-group col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="">Status</label>
                                        <select wire:model="status" class="form-control">
                                            <option value="">Pilih</option>
                                            <option value="paid">Full Paid</option>
                                            <option value="debit">Debit</option>
                                        </select>
                                        <?php $__errorArgs = ['status'];
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
                    </div>
                </div>

                <div class="card shadow mb-4">
                    <div class="card-header"><h3>Detail Order</h3></div>
                    <div class="card-body">
                            <div class="form-group">
                                <label>Nama Pengirim</label>
                                <input type="text" wire:model="pengirim" value="<?php echo e(old('pengirim')); ?>" class="form-control">
                                <?php $__errorArgs = ['pengirim'];
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
                                <input type="text" wire:model="no_pengirim" value="<?php echo e(old('no_pengirim')); ?>"  class="form-control">
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
                                <input type="text" wire:model="penerima" value="<?php echo e(old('penerima')); ?>" class="form-control">
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
                                <label>Alamat Penerima </label>
                                <textarea wire:model="alamat_penerima" class="form-control"  cols="30" rows="10"></textarea>
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
                                <label>No Penerima</label>
                                <input type="text" wire:model="no_penerima" value="<?php echo e(old('no_penerima')); ?>" class="form-control">
                                <?php $__errorArgs = ['no_penerima'];
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
                            <a href="<?php echo e(route('transaction.index')); ?>" class="btn btn-info  mb-2"> Back</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    
      
    </div>
</div>
<?php /**PATH C:\Monza\Developer\Project\KMJ-trans\logistic-app\resources\views/livewire/logisticton.blade.php ENDPATH**/ ?>