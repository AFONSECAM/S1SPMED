
<?php $__env->startSection("contenido"); ?>
<?php echo $__env->make('flash::message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="row">
        <div class="col-sm-5 col-md-6 col-lg-6">
            <a href="/empresa">
                <button type="button" class="btn btn-sm btn-info text-white float-left">
                    <svg class="c-icon c-icon-lg">
                        <use xlink:href="<?php echo e(asset('assets/dashboard/vendors/@coreui/icons/svg/free.svg#cil-chevron-circle-left-alt')); ?>"></use>                    
                    </svg>
                    <?php echo app('translator')->get('Regresar'); ?>
                </button>
            </a>
        </div>

        <div class="col-sm-5 col-md-6 col-lg-6">
            <a href="/empresa/empleados/crear">
                <button type="button" class="btn btn-sm btn-success text-white float-right">
                    <?php echo app('translator')->get('Registrar empleado'); ?>
                    <svg class="c-icon c-icon-lg">
                        <use xlink:href="<?php echo e(asset('assets/dashboard/vendors/@coreui/icons/svg/free.svg#cil-library-add')); ?>"></use>                    
                    </svg>                    
                </button>
            </a>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="card-body">
            <form action="/empresa/empleados/exportar" method="POST">
                <?php echo csrf_field(); ?>
                <button name="pdf" type="submit" class="btn btn-sm btn-danger float-right" value="pdf">
                    PDF
                </button>                                
                <button name="excel" type="submit" class="btn btn-sm btn-success float-right" value="excel">
                    XLS
                </button>                            
            </form>
            <h4><?php echo app('translator')->get('Empleados'); ?> 
                <a href="/empleados/crear"><span class="badge badge-success"> <i class="fa fa-plus"></i></a>
            </h4>        
        </div>    
    </div> 
 
    <div class="row">
       
        <?php $__currentLoopData = $empleados; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $empleado): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-sm-12 col-md-3 col-lg-3">
                <div class="card border-left-danger shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">                                
                                <div class="text-lg font-weight-bold text-uppercase mb-1">                                    
                                    <b class="card-title">                                        
                                        <h5><?php if($empleado->estado == 1): ?>
                                            <i class="fa fa-circle" style="color: green;" aria-hidden="true"></i>
                                        <?php else: ?>
                                            <i class="fa fa-circle" style="color: red;" aria-hidden="true"></i>
                                        <?php endif; ?> <?php echo e($empleado->cargo->nomCar); ?></h5>
                                    </b>
                                    
                                    <span class="badge badge-primary"><?php echo e($empleado->cargo->nomCar); ?></span>                            
                                </div>  
                                <hr>                              
                                <div class="text-xs font-weight-bold mb-1">
                                    <a href="/empresa/empleados/view/<?php echo e($empleado->id); ?>"><?php echo e($empleado->pNom); ?> <?php echo e($empleado->sNom); ?> <?php echo e($empleado->pApe); ?></a>
                                </div>
                                <div class="text-xs font-weight-bold mb-1">                                    
                                    <?php echo e($empleado->tiposId_id); ?> / <?php echo e($empleado->nIdEmp); ?> 
                                </div>
                                <div class="text-xs font-weight-bold mb-1">
                                    <?php echo e($empleado->mailEmp); ?>

                                </div>
                            </div>
                        </div>
                    </div>
                    
                    
                    
                </div>
            </div>                           
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>           
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make("layouts.app", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\andre\Desktop\sismped\sispmed\resources\views/empresa/empleados/index.blade.php ENDPATH**/ ?>