
<?php $__env->startSection("contenido"); ?>
    <div class="row">
        <div class="col-12">
            <a href="/empresa/pacientes">
                <button type="button" class="btn btn-info text-white float-left">
                    <svg class="c-icon c-icon-lg">
                        <use xlink:href="<?php echo e(asset('assets/dashboard/vendors/@coreui/icons/svg/free.svg#cil-chevron-circle-left-alt')); ?>"></use>                    
                    </svg>
                    <?php echo app('translator')->get('Regresar'); ?>
                </button>
            </a> 
            
            <a href="/empresa/pacientes/editar/<?php echo e($paciente->id); ?>">
                <button type="button" class="btn btn-success text-white float-right">                    
                    <svg class="c-icon c-icon-lg">
                        <use xlink:href="<?php echo e(asset('assets/dashboard/vendors/@coreui/icons/svg/free.svg#cil-pencil')); ?>"></use>                    
                    </svg>                    
                    <?php echo app('translator')->get('Editar'); ?>
                </button>
            </a>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-12">
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link active" href="<?php echo e($paciente->id); ?>">
                        <i class="fa fa-bars fa-sm"> <?php echo app('translator')->get('Datos Personales'); ?></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/empresa/pacientes/acompanantes/<?php echo e($paciente->id); ?>">
                        <i class="fas fa-user-friends fa-sm" > <?php echo app('translator')->get('Acompañantes'); ?></i>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="alert alert-success" role="alert">
                <dt>
                    <b><?php echo app('translator')->get('Paciente'); ?>: </b>
                    <?php echo e($paciente->tipoId_id); ?> <?php echo e($paciente->nIdPac); ?> - 
                    <?php echo e($paciente->pNom); ?> <?php echo e($paciente->sNom); ?> <?php echo e($paciente->pApe); ?> <?php echo e($paciente->sApe); ?> 
                </dt>
            </div>
        </div>                     
    </div>

    <div class="row">
        <div class="col-md-auto">
            <dl class="text-right">
                <dt><?php echo app('translator')->get('Tipo Documento'); ?></dt>
                <dt><?php echo app('translator')->get('Primer Nombre'); ?></dt>                
                <dt><?php echo app('translator')->get('Primer Apellido'); ?></dt>
                <dt><?php echo app('translator')->get('Grupo Sanguíneo'); ?></dt>                                                
                <dt><?php echo app('translator')->get('Fecha Nacimiento'); ?></dt>
                <dt>EPS</dt>
                <dt><?php echo app('translator')->get('Ciudad'); ?></dt>
                <dt><?php echo app('translator')->get('Teléfono'); ?></dt>
            </dl>
        </div>
        <div class="col-md-auto">
            <dl class="text-left">                    
                <dt><?php echo e($paciente->tipoId_id); ?></dt>                
                <dt><?php echo e($paciente->pNom); ?></dt>
                <dt><?php echo e($paciente->pApe); ?></dt>
                <dt><?php echo e($paciente->rh); ?></dt>                                
                <dt><?php echo e($paciente->fecNac->format('d-m-Y')); ?></dt>
                <dt><?php echo e($paciente->eps->nomEps); ?></dt>
                <dt><?php echo e($paciente->ciuRes); ?></dt>
                <dt><?php echo e($paciente->telPac); ?></dt>
            </dl>
        </div>
        
        <div class="col-md-auto">
            <dl class="text-right">
                <dt><?php echo app('translator')->get('Número Documento'); ?></dt>
                <dt><?php echo app('translator')->get('Segundo Nombre'); ?></dt>
                <dt><?php echo app('translator')->get('Segundo Apellido'); ?></dt>
                <dt><?php echo app('translator')->get('Género'); ?></dt>
                <dt><?php echo app('translator')->get('Edad'); ?></dt>
                <dt><?php echo app('translator')->get('Régimen'); ?></dt>                                                
                <dt><?php echo app('translator')->get('Dirección'); ?></dt>                
                <dt><?php echo app('translator')->get('Correo'); ?></dt>
                <dt><?php echo app('translator')->get('Estado Civil'); ?></dt>                                
            </dl>
        </div>

        <div class="col-md-auto">
            <dl class="text-left">
                <dt><?php echo e($paciente->nIdPac); ?></dt>
                <dt><?php echo e($paciente->sNom); ?></dt>
                <dt><?php echo e($paciente->sApe); ?></dt>
                <dt><?php if($paciente->genero == "I"): ?> Indefinido <?php elseif($paciente->genero == "F"): ?> Femenino <?php else: ?> Masculino <?php endif; ?></dt>
                <dt><?php echo e($paciente->fecNac->age); ?> años</dt>
                <dt><?php if($paciente->regimen == "C"): ?> Contributivo <?php else: ?> Subsidiado <?php endif; ?></dt>                                                
                <dt><?php echo e($paciente->dirRes); ?></dt>                
                <dt><?php echo e($paciente->mailPac); ?></dt>
                <dt><?php if($paciente->eCivil == "C"): ?> Casado <?php elseif($paciente->eCivil == "S"): ?> Soltero <?php elseif($paciente->eCivil == "U"): ?> Union Libre <?php else: ?> Viudo <?php endif; ?></dt>                                
            </dl>        
        </div>

        <div class="col-md-auto col-lg-auto">
            
            <br>            
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make("layouts.app", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\andre\Desktop\sismped\sispmed\resources\views/empresa/pacientes/view.blade.php ENDPATH**/ ?>