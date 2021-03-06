
<?php $__env->startSection('contenido'); ?>
<div class="row">
    <div class="col-12">
        <a href="/empresa/convenios">
            <button type="button" class="btn btn-sm btn-info text-white float-left">
                <svg class="c-icon c-icon-lg">
                    <use xlink:href="<?php echo e(asset('assets/dashboard/vendors/@coreui/icons/svg/free.svg#cil-chevron-circle-left-alt')); ?>"></use>                    
                </svg>
                <?php echo app('translator')->get('Regresar'); ?>
            </button>
        </a>             
    </div>
</div>
<hr>
    <div class="card">
        <div class="card-header">
            <strong><?php echo app('translator')->get('Editar Convenio'); ?></strong>
        </div>
        <div class="card-body">
            <?php echo $__env->make('flash::message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <form action="/empresa/convenios/actualizar" method="POST">
            <?php echo csrf_field(); ?>
            <input type="hidden" name="id" value="<?php echo e($convenio->id); ?>" />
            <div class="row">                
                <div class="col-sm-12 col-md-4 col-lg-4">
                    <div class="form-group">
                        <label for=""><?php echo app('translator')->get('Fecha Apertura'); ?></label>
                        <input type="date" readonly class="form-control" name="fechaConv" value="<?php echo e($convenio->fecAper); ?>">
                    </div>
                </div>
                <div class="col-sm-12 col-md-4 col-lg-4">
                    <div class="form-group">
                        <label for="eps_id"><?php echo app('translator')->get('Tipo Identificación'); ?></label>
                        <select name="eps_id" class="form-control <?php $__errorArgs = ['tipoId'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="eps_id" id="eps_id">
                            <?php $__currentLoopData = $eps; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $epsId): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($epsId->id); ?>" 
                                    <?php if($epsId->id == $convenio->eps_id): ?>    
                                    selected><?php echo e($epsId->nomEps); ?></option>                                                                           
                                <?php else: ?>
                                ><?php echo e($epsId->nomEps); ?></option>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                                                                                          
                        </select>
                        <?php $__errorArgs = ['tipoId'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="invalid-feedback">
                                <strong><?php echo e($message); ?></strong>
                            </div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>                                                       
                    </div>
                </div>
                <div class="col-sm-12 col-md-4 col-lg-4">
                    <div class="form-group">
                        <label for=""><?php echo app('translator')->get('Nombre'); ?></label>
                        <input type="text"  class="form-control <?php $__errorArgs = ['nombreConv'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="nombreConv" value="<?php echo e($convenio->nomConv); ?>">
                        <?php $__errorArgs = ['nombreConv'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="invalid-feedback"></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                </div>
                <div class="col-sm-12 col-md-4 col-lg-4">
                    <div class="form-group">
                        <label for=""><?php echo app('translator')->get('Resolución'); ?></label>
                        <input type="text"  class="form-control <?php $__errorArgs = ['resolucion'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="resolucion" value="<?php echo e($convenio->resolu); ?>">
                        <?php $__errorArgs = ['resolucion'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="invalid-feedback"></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                </div>
                <div class="col-sm-12 col-md-4 col-lg-4">
                    <div class="form-group">
                        <label for=""><?php echo app('translator')->get('Objeto'); ?></label>
                        <textarea name="objetoConv" class="form-control" cols="20" rows="5"><?php echo e($convenio->objConv); ?></textarea>
                    </div>
                </div>
                <div class="col-sm-12 col-md-4 col-lg-4">
                    <div class="form-group">
                        <label for=""><?php echo app('translator')->get('Duración (meses)'); ?></label>
                        <input type="number" class="form-control <?php $__errorArgs = ['duracion'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="duracion" value="<?php echo e($convenio->durConv); ?>">
                        <?php $__errorArgs = ['duracion'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="invalid-feedback"></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                </div>
                <div class="col-sm-12 col-md-4 col-lg-4">
                    <div class="form-group">
                        <label for=""><?php echo app('translator')->get('Costo'); ?></label>
                        <input type="number"  class="form-control <?php $__errorArgs = ['costo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="costo" value="<?php echo e($convenio->cosConv); ?>">
                        <?php $__errorArgs = ['costo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="invalid-feedback"></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                </div>
                <div class="col-sm-12 col-md-4 col-lg-4">
                    <div class="form-group">
                        <label for=""><?php echo app('translator')->get('Estado'); ?></label>
                        <select name="estado" class="form-control">
                        <?php if($convenio->estado == 1): ?>
                            <option selected value="<?php echo e($convenio->estado); ?>">Activo</option>    
                            <option value="0">Inactivo</option>
                        <?php else: ?>
                            <option value="1">Activo</option>    
                            <option selected value="<?php echo e($convenio->estado); ?>">Inactivo</option>                                                           
                        <?php endif; ?>                            
                        </select>                            
                    </div>
                </div>
            </div>
                <button type="submit" class="btn btn-warning float-right"><b><?php echo app('translator')->get('Actualizar'); ?></b></button>
            </form>            
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\andre\Desktop\sismped\sispmed\resources\views/empresa/convenios/edit.blade.php ENDPATH**/ ?>