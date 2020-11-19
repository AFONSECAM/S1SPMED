<?php $__env->startSection('contenido'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><?php echo e(__('Dashboard')); ?></div>
                <div class="card-body">
                    <?php if(Auth::check()): ?>                        
                        <span>Bienvenid@ <?php echo e(Auth::user()->name); ?></span>
                        <?php if((Auth::user()->rol) == "Enfermer"): ?>                            
                            <hr>
                                                         
                            <div class="row">
                                
                                <div class="col-sm-6 col-md-6 col-lg-6">
                                    <div class="card-footer px-3 py-2">
                                        <a class="btn-block text-muted d-flex justify-content-between" href="/inventario/categorias"><span class="font-weight-bold">Ver Categorias</span>
                                            <svg class="c-icon">
                                                <use xlink:href="<?php echo e(asset('assets/dashboard/vendors/@coreui/icons/svg/free.svg#cil-chevron-right')); ?>"></use>
                                            </svg>
                                        </a>
                                    </div>  
                                    <div class="card text-white bg-gradient-info">
                                        <div class="card-body">
                                            <div class="text-muted text-right mb-4">
                                                <svg class="c-icon c-icon-4xl">
                                                    <use xlink:href="<?php echo e(asset('assets/dashboard/vendors/@coreui/icons/svg/free.svg#cil-layers')); ?>"></use>
                                                </svg>
                                            </div>
                                            <div class="text-value-lg">
                                                <?php echo e($categorias); ?>

                                            </div>
                                            <h4 class="text-uppercase font-weight-bold">
                                                <?php if($categorias == 1): ?>
                                                Categoría
                                            <?php else: ?>
                                                Categorías
                                            <?php endif; ?> 
                                            </h4>
                                            <div class="progress progress-white progress-xs mt-3">
                                                <div class="progress-bar" role="progressbar" style="width: <?php echo e($categorias); ?>%" aria-valuenow="<?php echo e($categorias); ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </div>
                                                                      
                                </div>

                                                         
                                <div class="col-sm-6 col-md-6 col-lg-6">
                                    <div class="card-footer px-3 py-2">
                                        <a class="btn-block text-muted d-flex justify-content-between" href="/inventario/insumos"><span class="font-weight-bold">Ver Insumos</span>
                                            <svg class="c-icon">
                                                <use xlink:href="<?php echo e(asset('assets/dashboard/vendors/@coreui/icons/svg/free.svg#cil-chevron-right')); ?>"></use>
                                            </svg>
                                        </a>
                                    </div>  
                                    <div class="card text-white bg-gradient-success">
                                        <div class="card-body">
                                            <div class="text-muted text-right mb-4">
                                                <svg class="c-icon c-icon-4xl">
                                                    <use xlink:href="<?php echo e(asset('assets/dashboard/vendors/@coreui/icons/svg/free.svg#cil-barcode')); ?>"></use>
                                                </svg>
                                            </div>
                                            <div class="text-value-lg"><?php echo e($insumos); ?></div>
                                            <h4 class="text-uppercase font-weight-bold">
                                                <?php if($insumos == 1): ?>
                                                Insumo
                                            <?php else: ?>
                                                Insumos
                                            <?php endif; ?> 
                                            </h4>
                                            <div class="progress progress-white progress-xs mt-3">
                                                <div class="progress-bar" role="progressbar" style="width: <?php echo e($insumos); ?>%" aria-valuenow="<?php echo e($insumos); ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>  
                            </div>                                                          
                        <?php else: ?>                        
                            <hr>
                                                         
                            <div class="row">
                                
                                <div class="col-sm-12 col-md-3 col-lg-3">
                                    <div class="card-footer px-3 py-2">
                                        <a class="btn-block text-muted d-flex justify-content-between" href="/empleados"><span class="font-weight-bold">Ver Empleados</span>
                                            <svg class="c-icon">
                                                <use xlink:href="<?php echo e(asset('assets/dashboard/vendors/@coreui/icons/svg/free.svg#cil-chevron-right')); ?>"></use>
                                            </svg>
                                        </a>
                                    </div>  
                                    <div class="card text-white bg-gradient-info">
                                        <div class="card-body">
                                            <div class="text-muted text-right mb-4">
                                                <svg class="c-icon c-icon-4xl">
                                                    <use xlink:href="<?php echo e(asset('assets/dashboard/vendors/@coreui/icons/svg/free.svg#cil-user')); ?>"></use>
                                                </svg>
                                            </div>
                                            <div class="text-value-lg">
                                                <?php echo e($empleados); ?>

                                            </div>
                                            <h4 class="text-uppercase font-weight-bold">
                                                <?php if($empleados == 1): ?>
                                                    Empleado
                                                <?php else: ?>
                                                    Empleados
                                                <?php endif; ?> 
                                            </h4>
                                            <div class="progress progress-white progress-xs mt-3">
                                                <div class="progress-bar" role="progressbar" style="width: <?php echo e($empleados); ?>%" aria-valuenow="<?php echo e($empleados); ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </div>
                                                                    
                                </div>
                                
                                
                                <div class="col-sm-12 col-md-3 col-lg-3">
                                    <div class="card-footer px-3 py-2">
                                        <a class="btn-block text-muted d-flex justify-content-between" href="/pacientes">
                                            <span class="font-weight-bold">Ver Pacientes</span>
                                            <svg class="c-icon">
                                                <use xlink:href="<?php echo e(asset('assets/dashboard/vendors/@coreui/icons/svg/free.svg#cil-chevron-right')); ?>"></use>
                                            </svg>
                                        </a>
                                    </div>  
                                    <div class="card text-white bg-gradient-success">
                                        <div class="card-body">
                                            <div class="text-muted text-right mb-4">
                                                <svg class="c-icon c-icon-4xl">
                                                    <use xlink:href="<?php echo e(asset('assets/dashboard/vendors/@coreui/icons/svg/free.svg#cil-people')); ?>"></use>
                                                </svg>
                                            </div>
                                            <div class="text-value-lg"><?php echo e($pacientes); ?></div>
                                            <h4 class="text-uppercase font-weight-bold">
                                                <?php if($pacientes == 1): ?>
                                                    Paciente
                                                <?php else: ?>
                                                    Pacientes
                                                <?php endif; ?> 
                                            </h4>
                                            <div class="progress progress-white progress-xs mt-3">
                                                <div class="progress-bar" role="progressbar" style="width: <?php echo e($pacientes); ?>%" aria-valuenow="<?php echo e($pacientes); ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>  

                                
                                <div class="col-sm-12 col-md-3 col-lg-3">
                                    <div class="card-footer px-3 py-2">
                                        <a class="btn-block text-muted d-flex justify-content-between" href="/usuarios">
                                            <span class="font-weight-bold">Ver Usuarios</span>
                                            <svg class="c-icon">
                                                <use xlink:href="<?php echo e(asset('assets/dashboard/vendors/@coreui/icons/svg/free.svg#cil-chevron-right')); ?>"></use>
                                            </svg>
                                        </a>
                                    </div>  
                                    <div class="card text-white bg-gradient-primary">
                                        <div class="card-body">
                                            <div class="text-muted text-right mb-4">
                                                <svg class="c-icon c-icon-4xl">
                                                    <use xlink:href="<?php echo e(asset('assets/dashboard/vendors/@coreui/icons/svg/free.svg#cil-walk')); ?>"></use>
                                                </svg>
                                            </div>
                                            <div class="text-value-lg"><?php echo e($usuarios); ?></div>
                                            <h4 class="text-uppercase font-weight-bold">
                                                <?php if($usuarios == 1): ?>
                                                    Usuario
                                                <?php else: ?>
                                                    Usuarios
                                                <?php endif; ?>                                            
                                            </h4>
                                            <div class="progress progress-white progress-xs mt-3">
                                                <div class="progress-bar" role="progressbar" style="width: <?php echo e($usuarios); ?>%" aria-valuenow="<?php echo e($usuarios); ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div> 
                                
                                
                                <div class="col-sm-12 col-md-3 col-lg-3">
                                    <div class="card-footer px-3 py-2">
                                        <a class="btn-block text-muted d-flex justify-content-between" href="/empresa/sedes">
                                            <span class="font-weight-bold">Ver Sedes</span>
                                            <svg class="c-icon">
                                                <use xlink:href="<?php echo e(asset('assets/dashboard/vendors/@coreui/icons/svg/free.svg#cil-chevron-right')); ?>"></use>
                                            </svg>
                                        </a>
                                    </div>  
                                    <div class="card text-white bg-gradient-warning">
                                        <div class="card-body">
                                            <div class="text-muted text-right mb-4">
                                                <svg class="c-icon c-icon-4xl">
                                                    <use xlink:href="<?php echo e(asset('assets/dashboard/vendors/@coreui/icons/svg/free.svg#cil-hospital')); ?>"></use>
                                                </svg>
                                            </div>
                                            <div class="text-value-lg"><?php echo e($sedes); ?></div>
                                            <h4 class="text-uppercase font-weight-bold">
                                                <?php if($sedes == 1): ?>
                                                    Sede
                                                <?php else: ?>
                                                    Sedes
                                                <?php endif; ?>                                            
                                            </h4>
                                            <div class="progress progress-white progress-xs mt-3">
                                                <div class="progress-bar" role="progressbar" style="width: <?php echo e($sedes); ?>%" aria-valuenow="<?php echo e($sedes); ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> 
                        
                        <?php endif; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\andre\Desktop\proyecto\resources\views/home.blade.php ENDPATH**/ ?>