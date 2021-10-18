<?php $__env->startSection('title'); ?>
    Logistic
<?php $__env->stopSection(); ?>
<?php $__env->startSection('title-page'); ?>
    Add Transaction Armada Pickup
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
                        <div class="form-group select-box">
                            <label >Dikirim Dari</label>
                            <select class="form-control " wire:model="from" >
                                <option value="" selected > Pilih </option>
                                <?php $__currentLoopData = $origins; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $origin): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($origin->origin_id); ?>"><?php echo e($origin->origin->province.', '.$origin->origin->city.', '.$origin->origin->subdistrict); ?></option>
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
                                <option value="<?php echo e($destination->destination_id); ?>"><?php echo e($destination->destination->province.', '.$destination->destination->city.', '.$destination->destination->subdistrict); ?></option>
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
                            <label >Jenis Kendaraan</label>
                            <select class="form-control " wire:model="armada_id" >
                                <?php if(!empty($armadas)): ?>
                                <option value="" >Pilih</option>

                                    <?php $__currentLoopData = $armadas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $armada): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                    <option value="<?php echo e($armada->id); ?>"><?php echo e($armada->name.'( '.$armada->variant.'Rp. '.$armada->price.' )'); ?></option>
                                    
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php else: ?>
                                    <option value="" >Not Found</option>
                                
                                <?php endif; ?>
                            </select>
                            <?php $__errorArgs = ['armada_id'];
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

                            
                            <?php if(empty($armadas)): ?>

                            <?php else: ?>
                                <?php if(empty($facilitys)): ?>
                                    
                                <?php else: ?>
                                <div class="form-group">
                                    <label for="">Armada Name </label>
                                    <input type="text"  wire:model="armada_name" readonly class="form-control">
                                    <?php $__errorArgs = ['armada_name'];
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
                                    <label for="">Armada Price </label>
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">Rp.</span>
                                        <input type="text"  wire:model="armada_price" readonly class="form-control">
                                    </div>
                                    <?php $__errorArgs = ['armada_price'];
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
                                <div class="table-responsive">
                                    <table class="table table-bordered"  width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Fasilitas</th>
                                            </tr>
                                        </thead>
                                        <tbody>    
                                            <?php $__currentLoopData = $facilitys; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $fasilitas): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                
                                            <tr>
                                                <td>
                                                    <?php $__currentLoopData = $fasilitas->facilitys; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $facility): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <ul>
                                                        <li><?php echo e($facility->name); ?></li>
                                                    </ul>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </td>
                                            </tr>
                                            
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>
                                    </table>
                                </div>
    
                                <div class="form-group">
                                    <label for="">Qty </label>
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">Unit</span>
                                        <input type="number" min="1" wire:model="qty"  class="form-control">
                                    </div>
                                    <?php $__errorArgs = ['qty'];
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
                                <?php endif; ?>
                            <?php endif; ?>
                            
                        
                        <div class="form-group text-right">
                            <button class="btn btn-primary mb-2" type="submit">Add</button>
                            <a href="#" wire:click="resetFields()" class="btn btn-info  mb-2"> Clear</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
        <div class="col-md-4">
            <div class="card shadow mb-4">
                <div class="card-header">
                    <h3>Paket</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered"  width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Qty(Kg)</th>
                                <th>Price</th>
                                <th>Subtotal</th>
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
                                <td><?php echo e($cart['pricesingle']); ?></td>
                                <td><?php echo e($cart['price']); ?></td>
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
                    <form wire:submit.prevent="submitHandle">
                    <div class="row">
                            
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
                                    <input type="number" min="0" wire:model="diskon"   class="form-control">
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
                                <label for="">Tanggal Berangkat</label>
                                <div class="input-group-prepend">
                                    <input type="date" wire:model="tgl_brkt"   class="form-control">
                                </div>
                                <?php $__errorArgs = ['tgl_brkt'];
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
                                <label for="">Tanggal Kembali</label>
                                <div class="input-group-prepend">
                                    <input type="date" wire:model="tgl_kembali"   class="form-control">
                                </div>
                                <?php $__errorArgs = ['tgl_kembali'];
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
                                <input type="text" wire:model="lama_sewa" class="form-control">
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
        </div>

        
            <div class="col-md-4">
                <div class="card shadow mb-4">
                    <div class="card-header"><h3>Detail Order</h3></div>
                    <div class="card-body">
                            <div class="form-group">
                                <label>Nama Penyewa</label>
                                <input type="text" wire:model="penyewa" value="<?php echo e(old('penyewa')); ?>" class="form-control">
                                <?php $__errorArgs = ['penyewa'];
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
                                <label>Alamat Penyewa</label>
                                <textarea wire:model="alamat_penyewa" class="form-control" cols="30" rows="10"><?php echo e(old('alamat_penyewa')); ?></textarea>
                                <?php $__errorArgs = ['alamat_penyewa'];
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
                                <label>No Penyewa</label>
                                <input type="text" wire:model="no_penyewa" value="<?php echo e(old('no_penyewa')); ?>"  class="form-control">
                                <?php $__errorArgs = ['no_penyewa'];
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
                            <a href="<?php echo e(route('transactionarmada.index')); ?>" class="btn btn-info  mb-2"> Back</a>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    
      
    </div>
</div>
<?php /**PATH C:\Monza\Developer\Project\KMJ-trans\logistic-app\resources\views/livewire/armada.blade.php ENDPATH**/ ?>