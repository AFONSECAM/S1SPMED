
<?php $__env->startSection('contenido'); ?>
    <div class="row">
        <div class="col-12">
            <a href="/empresa/sedes">
                <button type="button" class="btn btn-info text-white float-left">
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
            <strong><?php echo app('translator')->get('Editar Sede'); ?></strong>
        </div>
        <div class="card-body">
            <?php echo $__env->make('flash::message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <form action="/empresa/sedes/actualizar" method="POST">
            <?php echo csrf_field(); ?>
            <input type="hidden" name="id" value="<?php echo e($sede->id); ?>" />
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for=""><?php echo app('translator')->get('Nombre'); ?></label>
                        <input type="text"  class="form-control <?php $__errorArgs = ['nombreSede'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="nombreSede" value="<?php echo e($sede->nomSede); ?>">
                            <?php $__errorArgs = ['nombreSede'];
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
                    <div class="col-6">
                        <div class="form-group">
                            <label for=""><?php echo app('translator')->get('Dirección'); ?></label>
                            <input type="text"  class="form-control" name="direccionSede" value="<?php echo e($sede->dirSede); ?>">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for=""><?php echo app('translator')->get('Teléfono'); ?></label>
                            <input type="text"  class="form-control" name="telefonoSede" value="<?php echo e($sede->telSede); ?>">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for=""><?php echo app('translator')->get('Estado'); ?></label>
                            <select name="ddlestado" class="form-control">
                            <?php if($sede->estado == 1): ?>
                                <option selected value="<?php echo e($sede->estado); ?>">Activo</option>    
                                <option value="0">Inactivo</option>
                            <?php else: ?>
                                <option value="1">Activo</option>    
                                <option selected value="<?php echo e($sede->estado); ?>">Inactivo</option>                                                           
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
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\andre\Desktop\proyecto\resources\views/empresa/sedes/edit.blade.php ENDPATH**/ ?>