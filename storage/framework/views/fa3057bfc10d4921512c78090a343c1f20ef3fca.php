<?php $__env->startSection('title'); ?>
    Travel
<?php $__env->stopSection(); ?>
<?php $__env->startSection('title-page'); ?>
    Add Transaction Travel
<?php $__env->stopSection(); ?>
<div class="container-fluid">

    <form wire:submit.prevent="submitHandle">
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

        
            <div class="col-md-6">
                <div class="card shadow mb-4">
                    <div class="card-header">
                        <h3>Tambah Paket </h3>
                    </div>
                    <div class="card-body">
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
                            <select class="form-control " wire:model="travel_id" >
                                <?php if(!empty($travels)): ?>
                                <option value="" >Pilih</option>

                                    <?php $__currentLoopData = $travels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $travel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                    <option value="<?php echo e($travel->id); ?>"><?php echo e($travel->name.'( '.$travel->variant.'Rp. '.$travel->price.' )'); ?></option>
                                    
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php else: ?>
                                    <option value="" >Not Found</option>
                                
                                <?php endif; ?>
                            </select>
                            <?php $__errorArgs = ['travel_id'];
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
                        <?php if(!empty($travels)): ?>
                        
                            <?php if(!empty($facilitys)): ?>
                            
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
                                        <input type="date" wire:model="tgl_berangkat"   class="form-control">
                                    </div>
                                    <?php $__errorArgs = ['tgl_berangkat'];
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
                                    <label for="">Jam Berangkat</label>
                                    <div class="input-group-prepend">
                                        <input type="time" wire:model="jam_berangkat"   class="form-control">
                                    </div>
                                    <?php $__errorArgs = ['jam_berangkat'];
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
                            <?php endif; ?>     
        
                        <?php endif; ?>

                        <div class="form-group text-right">
                            <a href="#" wire:click="resetFields()" class="btn btn-info  mb-2"> Clear</a>
                        </div>
                    </div>
                </div>
                
            </div>
            <div class="col-md-6">
                <div class="card shadow mb-4">
                    <div class="card-header"><h3>Detail Order</h3></div>
                    <div class="card-body">
                            <div class="form-group">
                                <label>Nama Penumpang</label>
                                <input type="text" wire:model="nama_penumpang" value="<?php echo e(old('nama_penumpang')); ?>" class="form-control">
                                <?php $__errorArgs = ['nama_penumpang'];
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
                                <label>Alamat Penumpang</label>
                                <textarea wire:model="alamat_penumpang" class="form-control" cols="30" rows="10"></textarea>
                                <?php $__errorArgs = ['alamat_penumpang'];
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
                                <label>No Penumpang</label>
                                <input type="text" wire:model="no_penumpang" value="<?php echo e(old('no_pengirim')); ?>"  class="form-control">
                                <?php $__errorArgs = ['no_penumpang'];
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
                                <label>Alamat Penjemputan</label>
                                <textarea wire:model="alamat_penjemputan" class="form-control" cols="30" rows="10"></textarea>
                                <?php $__errorArgs = ['alamat_penjemputan'];
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
                                <label>Alamat Pemberhentian</label>
                                <textarea wire:model="alamat_pemberhentian" class="form-control" cols="30" rows="10"></textarea>
                                <?php $__errorArgs = ['alamat_pemberhentian'];
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
                            <a href="<?php echo e(route('transactiontravel.index')); ?>" class="btn btn-info  mb-2"> Back</a>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </form>
</div>
<?php /**PATH C:\Monza\Developer\Project\KMJ-trans\logistic-app\resources\views/livewire/travel.blade.php ENDPATH**/ ?>