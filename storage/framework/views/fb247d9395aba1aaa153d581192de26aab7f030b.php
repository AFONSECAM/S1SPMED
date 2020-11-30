
<?php $__env->startSection('contenido'); ?>
    <div class="row">
        <div class="col-12">
            <a href="/inventario/insumos">
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
            <strong><?php echo app('translator')->get('Editar Insumo'); ?></strong>
        </div>
        <div class="card-body">
            <?php echo $__env->make('flash::message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <form action="/inventario/insumos/actualizar" method="POST">
                <?php echo csrf_field(); ?>
                <input type="hidden" name="id" value="<?php echo e($insumo->id); ?>" />
                <div class="row">
                    <div class="col-sm-12 col-md-3 col-lg-3">
                        <div class="form-group">
                            <label for=""><?php echo app('translator')->get('Código'); ?></label>
                            <input type="text"  class="form-control <?php $__errorArgs = ['codigo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="codigo" id="codigo" value="<?php echo e($insumo->codIns); ?>">
                            <?php $__errorArgs = ['codigo'];
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
                    <div class="col-sm-12 col-md-3 col-lg-3">
                        <div class="form-group">
                            <label for=""><?php echo app('translator')->get('Nombre'); ?></label>
                            <input type="text"  class="form-control" name="nombre" value="<?php echo e($insumo->nomIns); ?>">
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-3 col-lg-3">
                        <div class="form-group">
                            <label for=""><?php echo app('translator')->get('Laboratorio'); ?></label>
                            <input type="text"  class="form-control" name="laboratorio" value="<?php echo e($insumo->labora); ?>">
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-3 col-lg-3">
                        <div class="form-group">
                            <label for=""><?php echo app('translator')->get('Concentración'); ?></label>
                            <input type="text"  class="form-control" name="concentracion" value="<?php echo e($insumo->concen); ?>"> 
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-3 col-lg-3">
                        <div class="form-group">
                            <label for=""><?php echo app('translator')->get('Presentación'); ?></label>
                            <input type="text"  class="form-control" name="presentacion" value="<?php echo e($insumo->pres); ?>">
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-3 col-lg-3">
                        <div class="form-group">
                            <label for=""><?php echo app('translator')->get('Unidad'); ?></label>
                            <input type="text"  class="form-control" name="unidad" value="<?php echo e($insumo->unid); ?>">
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-3 col-lg-3">
                        <div class="form-group">
                            <label for=""><?php echo app('translator')->get('Precio'); ?></label>
                            <span class="input-group-addon">$</span>
                            <input type="text"  class="form-control" name="precio" value="<?php echo e($insumo->precioU); ?>">
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-3 col-lg-3">
                        <div class="form-group">
                            <label for=""><?php echo app('translator')->get('Fecha Vencimiento'); ?></label>
                            <input type="date"  class="form-control" name="fecha" value="<?php echo e($insumo->fecVen); ?>">
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-3 col-lg-3">
                        <div class="form-group">
                            <label for="tipoId"><?php echo app('translator')->get('Categoría'); ?></label>
                            <select name="categoria" class="form-control <?php $__errorArgs = ['categoria'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="categoria" id="categoria">                                                                                            
                                <?php $__currentLoopData = $categorias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categoria): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($categoria->nomCate); ?>" 
                                        <?php if($categoria->nomCate == $insumo->nomCate): ?>    
                                        selected><?php echo e($categoria->nomCate); ?></option>                                                                           
                                    <?php else: ?>
                                    ><?php echo e($categoria->nomCate); ?></option>
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
                </div>
                <button type="submit" class="btn btn-success float-right">
                    <svg class="c-icon c-icon-lg">
                        <use xlink:href="<?php echo e(asset('assets/dashboard/vendors/@coreui/icons/svg/free.svg#cil-save')); ?>"></use>                    
                    </svg>
                    <?php echo app('translator')->get('Guardar'); ?>
                </button>                          
            </form>            
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\andre\Desktop\sismped\sispmed\resources\views/inventario/insumos/edit.blade.php ENDPATH**/ ?>