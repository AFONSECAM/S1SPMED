
<?php $__env->startSection("contenido"); ?>
<?php echo $__env->make('flash::message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="row">
        <div class="col-12">
            <a href="/pacientes/crear">
                <button type="button" class="btn btn-success text-white float-right">
                    <?php echo app('translator')->get('Crear paciente'); ?>
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
            <h4><?php echo app('translator')->get('Pacientes'); ?> 
                <a href="/pacientes/crear"><span class="badge badge-success"> <i class="fa fa-plus"></i></a>
            </h4>        
        </div>    
    </div> 
    <div class="row">       
        <?php $__currentLoopData = $pacientes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $paciente): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-md-4 col-lg-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body" style="padding-bottom: 5px;">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <a href="/pacientes/view/<?php echo e($paciente->id); ?>">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                        <?php echo e($paciente->pNom); ?> <?php echo e($paciente->sNom); ?> <?php echo e($paciente->pApe); ?> <?php echo e($paciente->pApe); ?>

                                        <?php if($paciente->estado == "Activo"): ?>
                                            <i class="fa fa-circle" style="color: green;" aria-hidden="true"></i>
                                        <?php else: ?>
                                            <i class="fa fa-circle" style="color: red;" aria-hidden="true"></i>
                                        <?php endif; ?>
                                    </div>
                                </a>
                                <div class="text-xs font-weight-bold mb-1">
                                    <?php echo e($paciente->tipoId); ?> - <?php echo e($paciente->nIdPac); ?> / <?php echo e($paciente->edad); ?> <?php echo app('translator')->get('años'); ?>
                                </div>
                                <div class="text-xs font-weight-bold mb-1">
                                    <?php echo e($paciente->regimen); ?>

                                </div>
                                <div class="text-xs font-weight-bold mb-1">
                                    <?php echo e($paciente->nomSede); ?>

                                </div>
                            </div>
                        </div>
                    </div>
                    <center>
                    <div>
                        <a href="/pacientes/view/<?php echo e($paciente->id); ?>" class="btn btn-xs btn-info" title="Ver Información"><i class="fa fa-eye"></i> </a>
                        <a href="/pacientes/editar/<?php echo e($paciente->id); ?>" class="btn btn-xs btn-warning" title="Editar"><i class="fa fa-pen"></i> </a>
                        <?php if($paciente->estado == "Activo"): ?>
                            <a href="/pacientes/cambiarestado/<?php echo e($paciente->id); ?>/Inactivo" class="btn btn-xs btn-danger" title="Inactivar"><i class="fa fa-times"></i> </a>
                        <?php else: ?>
                        <a href="/pacientes/cambiarestado/<?php echo e($paciente->id); ?>/Activo" class="btn btn-xs btn-success"><i class="fa fa-check" title="Activar"></i> </a>
                        <?php endif; ?>                        
                    </div>
                    </center>
                </div>
            </div>                           
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>           
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make("layouts.app", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\andre\Desktop\proyecto\resources\views/pacientes/index.blade.php ENDPATH**/ ?>