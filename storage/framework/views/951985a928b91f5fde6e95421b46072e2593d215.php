
<?php $__env->startSection('contenido'); ?>
    <div class="row">
        <div class="col-12">
            <a href="/inventario">
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
            <strong><?php echo app('translator')->get('Editar Categoría'); ?></strong>
        </div>
        <div class="card-body">
            <?php echo $__env->make('flash::message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <form action="/inventario/categorias/actualizar" method="POST">
                <input type="hidden" name="id" id="id" value="<?php echo e($categoria->id); ?>">
                <?php echo csrf_field(); ?>
                <div class="row">
                    <div class="col-sm-12 col-md-4 col-lg-4">
                        <div class="form-group">
                            <label for=""><?php echo app('translator')->get('Nombre'); ?></label>
                            <input type="text"  class="form-control <?php $__errorArgs = ['nombre'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="nombre" id="" value="<?php echo e($categoria->nomCate); ?>">
                            <?php $__errorArgs = ['nombre'];
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
                            <label for="tipoCate"><?php echo app('translator')->get('Tipo Categoría'); ?></label>
                            <select name="tipoCate" class="form-control <?php $__errorArgs = ['tipoCate'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="tipoCate" id="tipoCate">
                                <?php if($categoria->tipoCate == "0"): ?>
                                    <option value="<?php echo e($categoria->tipoCate); ?>" selected>Insumos</option>                                                                                                               
                                    <option value="1">Medicamentos</option>
                                <?php else: ?>
                                <option value="<?php echo e($categoria->tipoCate); ?>" selected>Medicamentos</option>                                                                                                               
                                <option value="0">Insumos</option>
                                <?php endif; ?>                                                                                                                         
                            </select>                               
                        </div>
                    </div>                    
                </div>
                <button type="submit" class="btn btn-success float-right"><i class="fa fa-save"></i> <?php echo app('translator')->get('Guardar'); ?></button>
            </form>            
        </div>
    </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\andre\Desktop\sismped\sispmed\resources\views/inventario/categorias/edit.blade.php ENDPATH**/ ?>