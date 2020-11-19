
<?php $__env->startSection("contenido"); ?>
    <div class="row">
        <div class="col-12">
            <a href="/pacientes">
                <button type="button" class="btn btn-info text-white float-left">
                    <svg class="c-icon c-icon-lg">
                        <use xlink:href="<?php echo e(asset('assets/dashboard/vendors/@coreui/icons/svg/free.svg#cil-chevron-circle-left-alt')); ?>"></use>                    
                    </svg>
                    <?php echo app('translator')->get('Regresar'); ?>
                </button>
            </a> 
            
            <a href="/pacientes/editar/<?php echo e($paciente->id); ?>">
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
                    <a class="nav-link" href="/pacientes/acompanantes/<?php echo e($paciente->nIdPac); ?>">
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
                    <?php echo e($paciente->tipoId); ?> <?php echo e($paciente->nIdPac); ?> - 
                    <?php echo e($paciente->pNom); ?> <?php echo e($paciente->sNom); ?> <?php echo e($paciente->pApe); ?> <?php echo e($paciente->sApe); ?> 
                </dt>
            </div>
        </div>                     
    </div>

    <div class="row">
        <div class="col-md-auto">
            <dl class="text-right">
                <dt><?php echo app('translator')->get('Tipo Documento'); ?></dt>
                <dt><?php echo app('translator')->get('Número Documento'); ?></dt>
                <dt><?php echo app('translator')->get('Primer Apellido'); ?></dt>
                <dt><?php echo app('translator')->get('Segundo Apellido'); ?></dt>
                <dt><?php echo app('translator')->get('Primer Nombre'); ?></dt>
                <dt><?php echo app('translator')->get('Segundo Nombre'); ?></dt>
                <dt><?php echo app('translator')->get('Género'); ?></dt>
                <dt><?php echo app('translator')->get('Fecha Nacimiento'); ?></dt>
                <dt><?php echo app('translator')->get('Edad'); ?></dt>
                <dt><?php echo app('translator')->get('Grupo Sanguíneo'); ?></dt>
            </dl>
        </div>
        <div class="col-md-auto">
            <dl class="text-left">                    
                <dt><?php echo e($paciente->tipoId); ?></dt>
                <dt><?php echo e($paciente->nIdPac); ?></dt>
                <dt><?php echo e($paciente->pApe); ?></dt>
                <dt><?php echo e($paciente->sApe); ?></dt>
                <dt><?php echo e($paciente->pNom); ?></dt>
                <dt><?php echo e($paciente->sNom); ?></dt>
                <dt><?php echo e($paciente->genero); ?></dt>
                <dt><?php echo e($paciente->fNaci); ?></dt>
                <dt><?php echo e($paciente->edad); ?></dt>
                <dt><?php echo e($paciente->rh); ?></dt>
            </dl>
        </div>
        
        <div class="col-md-auto">
            <dl class="text-right">
                <dt><?php echo app('translator')->get('Régimen'); ?></dt>
                <dt><?php echo app('translator')->get('Estado'); ?></dt>
                <dt><?php echo app('translator')->get('Sede'); ?></dt>
                <dt><?php echo app('translator')->get('Ciudad'); ?></dt>
                <dt><?php echo app('translator')->get('Dirección'); ?></dt>
                <dt><?php echo app('translator')->get('Teléfono'); ?></dt>
                <dt><?php echo app('translator')->get('Correo'); ?></dt>
                <dt><?php echo app('translator')->get('Estado Civil'); ?></dt>
                <dt><?php echo app('translator')->get('Ocupación'); ?></dt>
                <dt>EPS</dt>
            </dl>
        </div>

        <div class="col-md-auto">
            <dl class="text-left">
                <dt><?php echo e($paciente->regimen); ?></dt>
                <dt><?php echo e($paciente->estado); ?></dt>
                <dt><?php echo e($paciente->nomSede); ?></dt>
                <dt><?php echo e($paciente->ciudad); ?></dt>
                <dt><?php echo e($paciente->dirResi); ?></dt>
                <dt><?php echo e($paciente->telPac); ?></dt>
                <dt><?php echo e($paciente->emailPac); ?></dt>
                <dt><?php echo e($paciente->eCivil); ?></dt>
                <dt>N/A</dt>
                <dt><?php echo e($paciente->nomIPS); ?></dt>
            </dl>        
        </div>

        <div class="col-md-auto col-lg-auto">
            
            <br>            
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make("layouts.app", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\andre\Desktop\proyecto\resources\views/pacientes/view.blade.php ENDPATH**/ ?>