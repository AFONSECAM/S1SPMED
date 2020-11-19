
<?php $__env->startSection('contenido'); ?>
    <div class="card">
        <div class="card-header">
            <strong>Modificar Sede</strong>
        </div>
        <div class="card-body">
            <?php echo $__env->make('flash::message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <form action="/sedes/actualizar" method="POST">
            <?php echo csrf_field(); ?>
            <input type="hidden" name="id" value="<?php echo e($sede->id); ?>" />
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="">Nombre Sede</label>
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
                            <label for="">Dirección Sede</label>
                            <input type="text"  class="form-control" name="direccionSede" value="<?php echo e($sede->dirSede); ?>">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="">Teléfono Sede</label>
                            <input type="text"  class="form-control" name="telefonoSede" value="<?php echo e($sede->telSede); ?>">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="">Estado</label>
                            <select name="estado" class="form-control">
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
                <button type="submit" class="btn btn-warning float-right"><b>Modificar</b></button>
            </form>            
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\proyecto\resources\views/sedes/edit.blade.php ENDPATH**/ ?>