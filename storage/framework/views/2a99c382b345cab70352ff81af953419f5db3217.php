
<?php $__env->startSection("contenido"); ?>
    <div class="row">
        <div class="col-12">
            <a href="/empresa/empleados">
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
            <strong><?php echo app('translator')->get('Editar Empleado'); ?></strong>
        </div>
        <div class="card-body">
            <?php echo $__env->make('flash::message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>            
            <form action="/empresa/empleados/actualizar" method="POST">
                <?php echo csrf_field(); ?>
                <input type="hidden" name="id" value="<?php echo e($empleado->id); ?>"/>
                <div class="row">
                    <div class="col-12">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                              <li class="breadcrumb-item font-weight-bold" aria-current="page"><?php echo app('translator')->get('Datos Personales'); ?></li>
                            </ol>
                          </nav>
                    </div> 
                    
                    <div class="col-sm-12 col-md-3 col-lg-3">                        
                        <div class="form-group">
                            <label for="primerNom"><?php echo app('translator')->get('Primer Nombre'); ?></label>
                            <input type="text"  class="form-control <?php $__errorArgs = ['primerNom'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="primerNom" id="primerNom" value="<?php echo e($empleado->pNom); ?>">
                            <?php $__errorArgs = ['primerNom'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="invalid-feedback" role="alert">
                                    <strong><?php echo e($message); ?></strong>
                                </div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-3 col-lg-3">
                        <div class="form-group">
                            <label for="segundoNom"><?php echo app('translator')->get('Segundo Nombre'); ?></label>
                            <input type="text"  class="form-control <?php $__errorArgs = ['segundoNom'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="segundoNom" id="segundoNom" value="<?php echo e($empleado->sNom); ?>">
                            <?php $__errorArgs = ['segundoNom'];
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
                    <div class="col-sm-12 col-md-3 col-lg-3">
                        <div class="form-group">
                            <label for="primerApe"><?php echo app('translator')->get('Primer Apellido'); ?></label>
                            <input type="text"  class="form-control <?php $__errorArgs = ['primerApe'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="primerApe" id="primerApe" value="<?php echo e($empleado->pApe); ?>">
                            <?php $__errorArgs = ['primerApe'];
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
                    <div class="col-sm-12 col-md-3 col-lg-3">
                        <div class="form-group">
                            <label for="segundoApe"><?php echo app('translator')->get('Segundo Apellido'); ?></label>
                            <input type="text"  class="form-control <?php $__errorArgs = ['segundoApe'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="segundoApe" id="segundoApe" value="<?php echo e($empleado->sApe); ?>">
                            <?php $__errorArgs = ['segundoApe'];
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
                    <div class="col-sm-12 col-md-3 col-lg-3">
                        <div class="form-group">
                            <label for="tipoId"><?php echo app('translator')->get('Tipo Identificación'); ?></label>
                            <select name="tipoId" class="form-control <?php $__errorArgs = ['tipoId'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="tipoId" id="tipoId">                            
                                <?php $__currentLoopData = $tiposId; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tipoId): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($tipoId->tipoId); ?>" 
                                        <?php if($tipoId->tipoId == $empleado->tipoId): ?>    
                                        selected><?php echo e($tipoId->nomTipo); ?></option>                                                                           
                                    <?php else: ?>
                                    ><?php echo e($tipoId->nomTipo); ?></option>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                                                 
                            </select>
                            <?php $__errorArgs = ['ips'];
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
                    <div class="col-sm-12 col-md-3 col-lg-3">
                        <div class="form-group">
                            <label for="numeroId"><?php echo app('translator')->get('Número Identificación'); ?></label>
                            <input type="text"  class="form-control <?php $__errorArgs = ['numeroId'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="numeroId" id="numeroId" value="<?php echo e($empleado->nIdEmp); ?>">
                            <?php $__errorArgs = ['numeroId'];
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
                    <div class="col-sm-12 col-md-3 col-lg-3">
                        <div class="form-group">
                            <label for="fechaNac"><?php echo app('translator')->get('Fecha Nacimiento'); ?></label>
                            <input type="date"  class="form-control <?php $__errorArgs = ['fechaNac'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="fechaNac" id="fechaNac" value="<?php echo e($empleado->fecNac); ?>">
                            <?php $__errorArgs = ['fechaNac'];
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
                    <div class="col-sm-12 col-md-3 col-lg-3">
                        <div class="form-group">
                            <label for="genero"><?php echo app('translator')->get('Género'); ?></label>
                            <select name="genero" class="form-control <?php $__errorArgs = ['genero'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="genero" id="tipoId">
                                <?php if($empleado->genero == "I"): ?>
                                    <option value="<?php echo e($empleado->genero); ?>" selected>Indefinido</option>                                                                                                               
                                    <option value="F">Femenino</option>
                                    <option value="M">Masculino</option>
                                <?php elseif($empleado->genero == "F"): ?>
                                    <option value="<?php echo e($empleado->genero); ?>" selected>Femenino</option>                                                                                                               
                                    <option value="I">Femenino</option>
                                    <option value="M">Masculino</option>
                                <?php else: ?>
                                    <option value="<?php echo e($empleado->genero); ?>" selected>Masculino</option>                                                                                                               
                                    <option value="I">Indefinido</option>
                                    <option value="M">Femenino</option>
                                <?php endif; ?>                                                                                                                         
                            </select>                                                                                     
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-2 col-lg-3">
                        <label for="rh">RH</label>
                        <div class="form-group form-inline">                            
                            <select name="rh" id="rh" class="form-control">
                                <?php if($empleado->rh == "N/A"): ?>
                                <option value="A" selected>A</option>   
                                <?php else: ?>
                                <option value="<?php echo e($empleado->rh[0]); ?>"><?php echo e($empleado->rh[0]); ?></option> 
                                <?php endif; ?>                                
                                <option value="B">B</option>
                                <option value="O">O</option>
                                <option value="AB">AB</option>
                            </select>
                            <select name="rhS" id="rhS" class="form-control">
                                <?php if($empleado->rh == "N/A"): ?>
                                    <option value="+" selected>+</option>
                                <?php else: ?>
                                    <option value="<?php echo e($empleado->rh[1]); ?>" selected><?php echo e($empleado->rh[1]); ?></option>
                                    <?php if($empleado->rh[1] == "+"): ?>
                                    <option value="-">-</option>
                                <?php else: ?>
                                    <option value="+">+</option>                       
                                <?php endif; ?>
                                <?php endif; ?>                                
                            </select>
                        </div>
                    </div> 
                    <div class="col-sm-12 col-md-3 col-lg-3">
                        <div class="form-group">
                            <label for="estadoCivil"><?php echo app('translator')->get('Estado Civíl'); ?></label>
                            <select name="estadoCivil" class="form-control <?php $__errorArgs = ['estadoCivil'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="estadoCivil" id="estadoCivil">                                
                                <?php if($empleado->eCivil == "C"): ?>
                                    <option value="<?php echo e($empleado->eCivil); ?>" selected>Casado</option>
                                    <option value="S">Soltero</option>                            
                                    <option value="U">Unión Libre</option>
                                    <option value="V">Viudo</option>
                                <?php elseif($empleado->eCivil == "S"): ?>
                                    <option value="<?php echo e($empleado->eCivil); ?>" selected>Soltero</option>
                                    <option value="C">Casado</option>                            
                                    <option value="U">Unión Libre</option>
                                    <option value="V">Viudo</option> 
                                <?php elseif($empleado->eCivil == "U"): ?>
                                    <option value="<?php echo e($empleado->eCivil); ?>" selected>Unión Libre</option>
                                    <option value="C">Casado</option>                            
                                    <option value="S">Soltero</option>
                                    <option value="V">Viudo</option> 
                                <?php elseif($empleado->eCivil == "V"): ?>
                                    <option value="<?php echo e($empleado->eCivil); ?>" selected>Viudo</option>
                                    <option value="C">Casado</option>                            
                                    <option value="S">Soltero</option>
                                    <option value="U">Unión Libre</option> 
                                <?php endif; ?>                                 
                                                                                                                               
                                                            
                            </select>
                            <?php $__errorArgs = ['estadoCivil'];
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
                                      
                    <div class="col-12">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                              <li class="breadcrumb-item font-weight-bold" aria-current="page"><?php echo app('translator')->get('Datos Contacto'); ?></li>
                            </ol>
                          </nav>
                    </div>   
                    
                    <div class="col-sm-12 col-md-3 col-lg-3">
                        <div class="form-group">
                            <label for="ciudad"><?php echo app('translator')->get('Ciudad'); ?></label>
                            <input type="text"  class="form-control <?php $__errorArgs = ['ciudad'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="ciudad" id="ciudad" value="<?php echo e($empleado->ciuRes); ?>">
                            <?php $__errorArgs = ['ciudad'];
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
                    <div class="col-sm-12 col-md-3 col-lg-3">
                        <div class="form-group">
                            <label for="direccion"><?php echo app('translator')->get('Dirección'); ?></label>
                            <input type="text"  class="form-control <?php $__errorArgs = ['ciudirecciondad'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="direccion" id="direccion" value="<?php echo e($empleado->dirRes); ?>">
                            <?php $__errorArgs = ['direccion'];
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
                    <div class="col-sm-12 col-md-3 col-lg-3">
                        <div class="form-group">
                            <label for="telefono"><?php echo app('translator')->get('Teléfono'); ?></label>
                            <input type="text"  class="form-control <?php $__errorArgs = ['telefono'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="telefono" id="telefono" value="<?php echo e($empleado->telEmp); ?>">
                            <?php $__errorArgs = ['telefono'];
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
                    <div class="col-sm-12 col-md-3 col-lg-3">
                        <div class="form-group">
                            <label for="email"><?php echo app('translator')->get('Correo'); ?></label>
                            <input type="email"  class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="email" id="email" value="<?php echo e($empleado->mailEmp); ?>">
                            <?php $__errorArgs = ['email'];
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

                                      
                    <div class="col-12">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                              <li class="breadcrumb-item font-weight-bold" aria-current="page"><?php echo app('translator')->get('Datos Seguridad Social'); ?></li>
                            </ol>
                          </nav>
                    </div>   
                    
                    <div class="col-sm-12 col-md-3 col-lg-3">
                        <div class="form-group">
                            <label for="arl"><?php echo app('translator')->get('ARL'); ?></label>
                            <select name="arl" class="form-control <?php $__errorArgs = ['arl'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="arl" id="arl">                            
                                <?php $__currentLoopData = $arls; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $arl): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($arl->nomArl); ?>" 
                                        <?php if($arl->id == $empleado->arl_id): ?>    
                                        selected><?php echo e($arl->nomArl); ?></option>                                                                           
                                    <?php else: ?>
                                    ><?php echo e($arl->nomArl); ?></option>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                                                 
                            </select>
                            <?php $__errorArgs = ['arl'];
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
                    
                    <div class="col-sm-12 col-md-3 col-lg-3">
                        <div class="form-group">
                            <label for="eps"><?php echo app('translator')->get('EPS'); ?></label>
                            <select name="eps" class="form-control <?php $__errorArgs = ['eps'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="eps" id="eps">                            
                                <?php $__currentLoopData = $epss; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $eps): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($eps->nomEps); ?>" 
                                        <?php if($eps->id == $empleado->eps_id): ?>    
                                        selected><?php echo e($eps->nomEps); ?></option>                                                                           
                                    <?php else: ?>
                                    ><?php echo e($eps->nomEps); ?></option>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                                                 
                            </select>
                            <?php $__errorArgs = ['ips'];
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
                    
                                      
                    <div class="col-12">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                              <li class="breadcrumb-item font-weight-bold" aria-current="page"><?php echo app('translator')->get('Datos Empresa'); ?></li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-sm-12 col-md-3 col-lg-3">
                        <div class="form-group">
                            <label for="fechaIng"><?php echo app('translator')->get('Fecha Ingreso'); ?></label>
                            <input type="date"  class="form-control <?php $__errorArgs = ['fechaIng'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="fechaIng" id="fechaIng" value="<?php echo e($empleado->fecIng); ?>">
                            <small><?php echo app('translator')->get('Esta es la fecha en la que ingresó a la empresa.'); ?></small>
                            <?php $__errorArgs = ['fechaIng'];
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
                    <div class="col-sm-12 col-md-3 col-lg-3">
                        <div class="form-group">
                            <label for="cargo"><?php echo app('translator')->get('Cargo'); ?></label>
                            <select name="cargo" class="form-control <?php $__errorArgs = ['rol'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="cargo" id="cargo">
                                <?php $__currentLoopData = $cargos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cargo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($cargo->nomCar); ?>" 
                                        <?php if($cargo->nomCar == $empleado->nomCar): ?>    
                                        selected><?php echo e($cargo->nomCar); ?></option>                                                                           
                                    <?php else: ?>
                                    ><?php echo e($cargo->nomCar); ?></option>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                                                                                          
                            </select>
                            <?php $__errorArgs = ['rol'];
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
                    <div class="col-sm-12 col-md-3 col-lg-3">
                        <div class="form-group">
                            <label for="estado"><?php echo app('translator')->get('Estado'); ?></label>
                            <select class="form-control <?php $__errorArgs = ['estado'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="estado" id="estado" value="Activo" aria-describedby="helpEstado">
                                <?php if($empleado->estado == 1): ?>
                                    <option selected value="<?php echo e($empleado->estado); ?>">Activo</option>
                                    <option value="0">Inactivo</option>
                                <?php else: ?>
                                <option selected value="<?php echo e($empleado->estado); ?>">Inactivo</option>
                                <option value="1">Activo</option>
                                <?php endif; ?>
                            </select>                                                                              
                            <?php $__errorArgs = ['estado'];
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
                <div class="col-12">
                    <button type="submit" class="btn btn-success float-right"><i class="fa fa-save"></i> <?php echo app('translator')->get('Actualizar'); ?></button>               
                </div>                
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make("layouts.app", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\andre\Desktop\sismped\sispmed\resources\views/empresa/empleados/edit.blade.php ENDPATH**/ ?>