
<?php $__env->startSection("contenido"); ?>
<div class="row">
    <div class="col-12">
        <a href="/empleados" class="btn btn-md btn-primary"><i class="fa fa-arrow-circle-left"></i> Regresar</a>
        <a href="/empleados/edit/<?php echo e($empleado->id); ?>" class="btn btn-md btn-warning float-right"><i class="fa fa-pen"></i> Editar</a>
    </div>
</div>
    <div class="row">
        <div class="col-12">
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo e($empleado->id); ?>">
                        <i class="fa fa-bars fa-sm"> Datos Personales</i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active">
                        <i class="fas fa-user-friends fa-sm"> Otra Cosa</i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active">
                        <i class="fas fa-calendar-alt fa-sm"> Historial Citas</i>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="alert alert-success" role="alert">
                <dt>
                    <b>Emmpleado: </b>
                    <?php echo e($empleado->tipoId); ?> <?php echo e($empleado->nIdEmp); ?> - 
                    <?php echo e($empleado->pNom); ?> <?php echo e($empleado->sNom); ?> <?php echo e($empleado->pApe); ?> <?php echo e($empleado->sApe); ?> 
                </dt>
            </div>
        </div>                     
    </div>

    <div class="row">
        <div class="col-md-auto">
            <dl class="text-right">
                <dt>Tipo Documento</dt>
                <dt>Número Documento</dt>
                <dt>Primer Apellido</dt>
                <dt>Segundo Apellido</dt>
                <dt>Primer Nombre</dt>
                <dt>Segundo Nombre</dt>
                <dt>Género</dt>
                <dt>Fecha Nacimiento</dt>
                <dt>Edad</dt>
                <dt>Grupo Sanguíneo</dt>
                <dt>ARL</dt>
            </dl>
        </div>
        <div class="col-md-auto">
            <dl class="text-left">                    
                <dt><?php echo e($empleado->tipoId); ?></dt>
                <dt><?php echo e($empleado->nIdEmp); ?></dt>
                <dt><?php echo e($empleado->pApe); ?></dt>
                <dt><?php echo e($empleado->sApe); ?></dt>
                <dt><?php echo e($empleado->pNom); ?></dt>
                <dt><?php echo e($empleado->sNom); ?></dt>
                <?php if($empleado->genero == "M"): ?>
                    <dt>Masculino</dt>
                <?php else: ?>
                    <dt>Femenino</dt>
                <?php endif; ?>                
                <dt><?php echo e($empleado->fecNac); ?></dt>
                <dt><?php echo e($edad); ?></dt>
                <dt><?php echo e($empleado->rh); ?></dt>
                <dt><?php echo e($empleado->arl); ?></dt>
            </dl>
        </div>
        
        <div class="col-md-auto">
            <dl class="text-right">            
                <dt>EPS</dt>                            
                <dt>Ciudad</dt>
                <dt>Dirección</dt>
                <dt>Teléfono</dt>
                <dt>Email</dt>
                <dt>Estado Civil</dt>
                <dt>Nivel Educativo</dt>
                <dt>Fecha Ingreso</dt>
                <dt>Cargo</dt>
                <dt>Sede asignada</dt>
                <dt>Estado</dt>
            </dl>
        </div>

        <div class="col-md-auto">
            <dl class="text-left">
                <dt><?php echo e($empleado->eps); ?></dt>
                <dt><?php echo e($empleado->ciuRes); ?></dt>
                <dt><?php echo e($empleado->dirRes); ?></dt>
                <dt><?php echo e($empleado->telEmp); ?></dt>
                <dt><?php echo e($empleado->emailEmp); ?></dt>
                <dt><?php echo e($empleado->eCivil); ?></dt>
                <dt><?php echo e($empleado->nivlEdu); ?></dt>
                <dt><?php echo e($empleado->fecIng); ?></dt>
                <dt><?php echo e($empleado->nomCar); ?></dt>
                <dt><?php echo e($empleado->nomSede); ?></dt>
                <?php if($empleado->estado == 1): ?>
                    <dt style="color: green;">
                        Activo
                    </dt>
                    <?php else: ?>
                    <dt style="color: red;">
                        Inactivo
                    </dt>
                    <?php endif; ?>
                </dt>
            </dl>        
        </div>

        <div class="col-md-auto col-lg-auto">
            
            <br>            
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make("layouts.app", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\andre\Desktop\proyecto\resources\views//empleados/view.blade.php ENDPATH**/ ?>