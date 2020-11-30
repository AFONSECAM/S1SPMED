
<?php $__env->startSection('contenido'); ?>
    <div class="row">
        <div class="col-12">
            <h4>Consulta paciente: <?php echo e($citas->paciente->pNom); ?> <?php echo e($citas->paciente->sNom); ?> <?php echo e($citas->paciente->pApe); ?></h4>
            
        </div>
    </div>
    <hr>
    

    
    <div class="card">
        
        <div class="card-body">
            <?php echo $__env->make('flash::message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>  
            <div class="row">
                <div class="col-md-12">
                    <ul class="nav nav-pills">
                        <li class="nav-item">
                            <a class="nav-link active" id="link1">1. Indentificación</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="link2">2. Anamnesis</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="link3">3. Revisión por sistemas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="link4">4. Examen fisico</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="link5">5. Resultados paraclinicos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="link6">6. Diagnosticos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="link7">7. Plan tratamiento</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="link8">8. Medicamentos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="link9">9. Responsable</a>
                        </li>
                    </ul>
                </div>
            </div> 
            <hr>
               
            <form action="/consulta/guardar" method="POST">                
            <?php echo csrf_field(); ?>    
            <input type="text" name="citaId" id="" value="<?php echo e($citas->id); ?>" hidden>
            <input type="text" name="pacienteId" id="" value="<?php echo e($citas->paciente->id); ?>" hidden>
            <input type="text" name="acompananteId" id="" value="<?php echo e($citas->acompanante->id); ?>" hidden>
            <input type="text" name="empleadoId" id="" value="<?php echo e($citas->empleado->id); ?>" hidden>
            
            
            <div class="row" id="identificacion">
                <div class="col-6">                
                    <div class="form-group">
                        <label for="fecha">Fecha</label>
                        <input type="date" class="form-control" id="fecha" name="fecha" value="<?php echo e($citas->fecha->format('Y-m-d')); ?>">
                    </div>                
                </div>
                <div class="col-6">                
                    <div class="form-group">
                        <label for="hora">Hora</label>
                        <input type="time" class="form-control" id="hora" name="hora"value="<?php echo e($citas->hora_inicio->toTimeString()); ?>">
                    </div>                
                </div>
                <div class="col-3">                
                    <div class="form-group">
                        <label for="txtTipoId">Tipo Documento</label>
                        <input type="text" class="form-control" id="txtTipoId" name="txtTipoId" value="<?php echo e($citas->paciente->tipoId_id); ?>" readonly>
                    </div>                
                </div>
                <div class="col-3">                
                    <div class="form-group">
                        <label for="txtNiD">Número Documento</label>
                        <input type="text" class="form-control" id="txtNiD" name="txtNiD" value="<?php echo e($citas->paciente->nIdPac); ?>" readonly>
                    </div>                
                </div>
                <div class="col-3">                
                    <div class="form-group">
                        <label for="txtGenero">Sexo</label>
                        <input type="text" class="form-control" id="txtGenero" name="txtGenero" <?php if($citas->paciente->genero == "I"): ?>  value="Indefinido" <?php elseif($citas->paciente->genero == "F"): ?>  value="Femenino" <?php else: ?> value="Masculino" <?php endif; ?>  readonly>
                    </div>                
                </div>
                <div class="col-3">                
                    <div class="form-group">
                        <label for="txtEps">EPS</label>
                        <input type="text" class="form-control" id="txtEps" name="txtEps" value="<?php echo e($citas->paciente->eps->nomEps); ?>" readonly>
                    </div>                
                </div>
                <div class="col-3">                
                    <div class="form-group">
                        <label for="txtEcivil">Estado Civil</label>
                        <input type="text" class="form-control" id="txtEcivil" name="txtEcivil" <?php if($citas->paciente->eCivil == "C"): ?> value="Casado" <?php elseif($citas->paciente->eCivil == "S"): ?> value="Soltero" <?php elseif($citas->paciente->eCivil == "U"): ?> value="Union Libre" <?php else: ?> value="Viudo" <?php endif; ?> readonly>
                    </div>                
                </div>
                <div class="col-3">                
                    <div class="form-group">
                        <label for="txtFecNac">Fecha nacimiento</label>
                        <input type="date" class="form-control" id="txtFecNac" name="txtFecNac" value="<?php echo e($citas->paciente->fecNac->format('Y-m-d')); ?>" readonly>
                    </div>                
                </div>
                <div class="col-12">
                    <a class="btn btn-primary float-right text-white" onclick="cambiaVisibilidad(2)">Siguiente</a>
                </div>
            </div>

            <div class="row d-none" id="anamnesis">
                <div class="col-6">                
                    <div class="form-group">
                        <label for="motivo">Motivo de la consulta</label>
                        <textarea name="motivo" class="form-control" id="motivo" cols="30" rows="3"></textarea>                        
                    </div>                
                </div>
                <div class="col-6">                
                    <div class="form-group">
                        <label for="enfActual">Enfermedad actual</label>
                        <textarea name="enfActual" class="form-control" id="enfActual" cols="30" rows="3"></textarea>                        
                    </div>                
                </div>
                <div class="col-12">
                    <strong>Antecedentes:</strong>
                </div>
                <div class="col-2">
                    <div class="form-group">
                        <label for="pato">Patologicos</label>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="pato" value="si"> Si
                            </label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="pato" value="no"> No
                            </label>
                        </div>                                  
                    </div>   
                </div>
                <div class="col-2">
                    <div class="form-group">
                        <label for="alergi">Alergicos</label>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="alergi" id="alergicosSi" value="si"> Si
                            </label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="alergi" id="alergicosNo" value="no"> No
                            </label>
                        </div>                                     
                    </div>   
                </div>
                <div class="col-2">
                    <div class="form-group">
                        <label for="quirur">Quirurgicos</label>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="quirur" id="quirurSi" value="si"> Si
                            </label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="quirur" id="quirurNo" value="no"> No
                            </label>
                        </div>                                     
                    </div>   
                </div>
                <div class="col-2">
                    <div class="form-group">
                        <label for="farma">Farmacologicos</label>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="farma" id="farmasSi" value="si"> Si
                            </label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="farma" id="farmaNo" value="no"> No
                            </label>
                        </div>                                      
                    </div>   
                </div>
                <div class="col-2">
                    <div class="form-group">
                        <label for="traumaticos">Traumaticos</label>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="trauma" id="traumaSi" value="si"> Si
                            </label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="trauma" id="traumaNo" value="no"> No
                            </label>
                        </div>                                     
                    </div>   
                </div>
                <div class="col-2">
                    <div class="form-group">
                        <label for="toxicologicos">Toxicologicos</label>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="toxi" id="toxiSi" value="si"> Si
                            </label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="toxi" id="toxiNo" value="no"> No
                            </label>
                        </div>                                     
                    </div>   
                </div> 
                <div class="col-2">
                    <div class="form-group">
                        <label for="gineco">Toxicologicos</label>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="gineco" id="ginecoSi" value="si"> Si
                            </label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="gineco" id="ginecoNo" value="no"> No
                            </label>
                        </div>                                     
                    </div>   
                </div> 
                <div class="col-6">                
                    <div class="form-group">
                        <label for="anteFam">Antecedentes Familiares</label>
                        <textarea name="anteFam" class="form-control" id="anteFam" cols="30" rows="3"></textarea>                        
                    </div>                
                </div>
                <div class="col-12">
                    <a class="btn btn-primary float-left text-white" onclick="cambiaVisibilidad(1)">Anterior</a>
                    <a class="btn btn-primary float-right text-white" onclick="cambiaVisibilidad(3)">Siguiente</a>
                </div>               
            </div>

            <div class="row d-none" id="revisionsistemas">                
                <div class="col-6">                
                    <div class="form-group">
                        <label for="txtMotivo">Sistema</label>
                        <select class="form-control" name="sistema" id="sistema">
                            <option value="Sistema Nervioso">Sistema Nervioso</option>
                            <option value="Sistema Endocrino">Sistema Endocrino</option>
                            <option value="Sistema Circulatorio">Sistema Circulatorio</option>
                            <option value="Sistema Digestivo">Sistema Digestivo</option>
                            <option value="Sistema Respiratorio">Sistema Respiratorio</option>
                            <option value="Sistema Respiratorio">Sistema Excretor</option>
                            <option value="Sistema Reproductor">Sistema Reproductor</option>
                            <option value="Sistema Muscular">Sistema Muscular</option>
                            <option value="Sistema Esquelético">Sistema Esquelético</option>
                            <option value="Sistema Inmunológico">Sistema Inmunológico</option>
                            <option value="Sistema Linfático">Sistema Linfático</option>
                            <option value="Sistema Integumentario">Sistema Integumentario</option>
                        </select>                       
                    </div>                
                </div>
                <div class="col-6">                
                    <div class="form-group">
                        <label for="obsSistema">Observación</label>
                        <textarea name="obsSistema" class="form-control" id="obsSistema" cols="30" rows="3"></textarea>                        
                    </div>                
                </div>
                <div class="col-12">
                    <a class="btn btn-primary float-left text-white" onclick="cambiaVisibilidad(2)">Anterior</a>
                    <a class="btn btn-primary float-right text-white" onclick="cambiaVisibilidad(4)">Siguiente</a>
                </div>  
            </div>

            <div class="row d-none" id="examenfisico">
                <div class="col-12">
                    <table class="table table-bordered">
                        <thead>
                          <tr class="text-center">
                            <th colspan="6">SIGNOS VITALES</th>
                          </tr>
                        </thead>
                        <tbody class="text-center">
                            <tr>
                                <td>TA</td>
                                <td>FC</td>
                                <td>FR</td>
                                <td>SAT</td>
                                <td>T°</td>                            
                            </tr>
                            <tr>
                                <td>                                
                                    <input type="text" class="form-control input-sm" name="ta">                                                                
                                </td>
                                <td>
                                    <input type="text" class="form-control input-sm" name="fc">
                                </td>
                                <td>
                                    <input type="text" class="form-control input-sm" name="fr">
                                </td>
                                <td>
                                    <input type="text" class="form-control input-sm" name="sat">
                                </td>
                                <td>
                                    <input type="text" class="form-control input-sm" name="temp">
                                </td>                           
                            </tr>
                        </tbody>
                    </table>
                </div> 

                <div class="col-6">
                    <strong>ORGANOS DE LOS SENTIDOS</strong>                    
                </div>
                <div class="col-6 float-right text-right">
                    <input type="checkbox" name="sinAlteOrganos" id="sinAlteOrganos" value="si"> Sin alteraciones
                </div>
                <div class="col-12">
                    <table class="table table-bordered">
                        <tbody class="text-center">
                            <tr>
                                <td>BOCA</td>
                                <td>
                                    <input type="radio" name="boca" id="bocaD" value="D"> D
                                    <input type="radio" name="boca" id="bocaI" value="I"> I
                                    <input type="radio" name="boca" id="bocaN" value="N"> N
                                </td>   
                                <td>
                                    <input type="text" class="form-control input-sm" name="bocaObs">
                                </td> 
                            </tr>
                            <tr>
                                <td>OJO</td> 
                                <td>
                                    <input type="radio" name="ojo" id="ojoD" value="D"> D
                                    <input type="radio" name="ojo" id="ojoI" value="I"> I
                                    <input type="radio" name="ojo" id="ojoN" value="N"> N
                                </td>   
                                <td>
                                    <input type="text" class="form-control input-sm" name="ojoObs">
                                </td>                                        
                            </tr>
                            <tr>
                                <td>OIDO</td>
                                <td>
                                    <input type="radio" name="oido" id="oidoD" value="D"> D
                                    <input type="radio" name="oido" id="oidoI" value="I"> I
                                    <input type="radio" name="oido" id="oidoN" value="N"> N
                                </td>   
                                <td>
                                    <input type="text" class="form-control input-sm" name="oidoObs">
                                </td> 
                            </tr>
                            <tr>
                                <td>NARIZ</td>
                                <td>
                                    <input type="radio" name="nariz" id="narizD" value="D"> D
                                    <input type="radio" name="nariz" id="narizI" value="I"> I
                                    <input type="radio" name="nariz" id="narizN" value="N"> N
                                </td>   
                                <td>
                                    <input type="text" class="form-control input-sm" name="narizObs">
                                </td> 
                            </tr>
                            
                        </tbody>
                    </table>
                </div> 


                <div class="col-6">
                    <strong>NEURO-PSIQUIATRICO</strong>                    
                </div>
                <div class="col-6 float-right text-right">
                    <input type="checkbox" name="sinAlteNeuro" id="sinAlteNeuro" value="si"> Sin alteraciones
                </div>
                <div class="col-12">
                    <table class="table table-bordered">
                        <tbody class="text-center">
                            <tr>
                                <td>
                                    <input type="checkbox" name="eutimico" id="eutimicoS" value="si"> S                                  
                                    <input type="checkbox" name="eutimico" id="eutimicoN" value="no"> N                                 
                                </td>
                                <td>EUTIMICO</td>                                                                                                          
                            </tr>
                            <tr>
                                <td>
                                    <input type="checkbox" name="ansioso" id="ansiosoS" value="si"> S 
                                    <input type="checkbox" name="ansioso" id="ansiosoN" value="no"> N                                  
                                </td>
                                <td>ANSIOSO</td>                                                                  
                            </tr>
                            <tr>
                                <td>
                                    <input type="checkbox" name="depresivo" id="depresivoS" value="si"> S  
                                    <input type="checkbox" name="depresivo" id="depresivoN" value="no"> N                                  
                                </td>   
                                <td>DEPRESIVO</td>                               
                            </tr>
                            <tr>
                                <td>
                                    <input type="checkbox" name="maniaco" id="maniacoS" value="si"> S 
                                    <input type="checkbox" name="maniaco" id="maniacoN" value="no"> N                                 
                                </td>   
                                <td>MANIACO</td>                                 
                            </tr>
                            <tr>
                                <td>
                                    <input type="checkbox" name="psicotico" id="psicoticoS" value="si"> S
                                    <input type="checkbox" name="psicotico" id="psicoticoN" value="no"> N                                   
                                </td>   
                                <td>PSICOTICO</td>                                
                            </tr>
                            <tr>
                                <td>
                                    <input type="checkbox" name="rigidezNuca" id="rigidezNucaS" value="si"> S 
                                    <input type="checkbox" name="rigidezNuca" id="rigidezNucaN" value="no"> N                                  
                                </td>   
                                <td>RIGIDEZ NUCA</td>                                
                            </tr>
                            <tr>
                                <td>
                                    <input type="checkbox" name="otro" id="otro" value="si"> S
                                    <input type="checkbox" name="otro" id="otroN" value="no"> N                                   
                                </td>   
                                <td>OTRO</td>
                                <td>
                                    <input class="form-control" type="text" class="form-control" name="otroObs" id="otroObs">
                                </td>
                            </tr> 
                            <tr>
                                <td>
                                    <input type="radio" name="hemiparesia" id="hemiparesiaD" value="D"> D
                                    <input type="radio" name="hemiparesia" id="hemiparesiaI" value="I"> I
                                    <input type="radio" name="hemiparesia" id="hemiparesiaN" value="N"> N
                                </td>  
                                <td>HEMIPARESIA</td>
                            </tr>                                                            
                            <tr>
                                <td>
                                    <input type="radio" name="hemiplejia" id="hemiplejiaD" value="D"> D
                                    <input type="radio" name="hemiplejia" id="hemiplejiaI" value="I"> I
                                    <input type="radio" name="hemiplejia" id="hemiplejiaN" value="N"> N
                                </td>  
                                <td>HEMIPLEJIA</td>
                            </tr>                                                            
                            <tr>
                                <td>
                                    <input type="radio" name="babinski" id="babinskiD" value="D"> D
                                    <input type="radio" name="babinski" id="babinskiI" value="I"> I
                                    <input type="radio" name="babinski" id="babinskiN" value="N"> N
                                </td>  
                                <td>BABINSKI</td>
                            </tr>                                                            
                            <tr>
                                <td>
                                    <input type="radio" name="lassegue" id="lassegueD" value="D"> D
                                    <input type="radio" name="lassegue" id="lassegueI" value="I"> I
                                    <input type="radio" name="lassegue" id="lassegueN" value="N"> N
                                </td>  
                                <td>LASSEGUE</td>
                            </tr>                                                            
                            <tr>
                                <td>
                                    <input type="radio" name="glassglow" id="glassglowD" value="D"> D
                                    <input type="radio" name="glassglow" id="glassglowI" value="I"> I
                                    <input type="radio" name="glassglow" id="glassglowN" value="N"> N
                                </td>  
                                <td>GLASSGOW</td>
                                <td>
                                    <input type="text" name="glass1" id="glass1">/
                                    <input type="text" name="glass2" id="glass2">
                                </td>
                            </tr>                                                            
                            <tr>
                                <td>
                                    <input type="radio" name="pupilas" id="pupilasD" value="D"> D
                                    <input type="radio" name="pupilas" id="pupilasI" value="I"> I
                                    <input type="radio" name="pupilas" id="pupilasN" value="N"> N
                                </td>  
                                <td>PUPILAS</td>
                                <td>
                                    <input class="form-control" type="text" name="pupilasObs" id="pupilasObs">
                                </td>
                            </tr> 
                            <tr>
                                <td>
                                    <input type="radio" name="rot" id="rotD" value="D"> D
                                    <input type="radio" name="rot" id="rotI" value="I"> I
                                    <input type="radio" name="rot" id="rotN" value="N"> N
                                </td>  
                                <td>ROT</td>
                                <td>
                                    <input class="form-control" type="text" name="rotObs" id="rotObs">
                                </td>
                            </tr>                                                            
                            <tr>
                                <td>FUERZA MUSCULAR</td>
                                <td>
                                    <input class="form-control" type="text" name="fzaMuscular" id="fzaMuscular">
                                </td>  
                            </tr>                                                            
                            <tr>
                                <td>
                                    <input type="radio" name="fondoOjo" id="fondoOjoD" value="D"> D
                                    <input type="radio" name="fondoOjo" id="fondoOjoI" value="I"> I
                                    <input type="radio" name="fondoOjo" id="fondoOjoN" value="N"> N
                                </td>  
                                <td>FONDO DE OJO</td>
                                <td>
                                    <input type="text" name="fondoOjoObs" id="fondoOjoObs">
                                </td>
                            </tr>                                                            
                        </tbody>
                    </table>
                </div>


                <div class="col-6">
                    <strong>RESPIRATORIO</strong>                    
                </div>
                <div class="col-6 float-right text-right">
                    <input type="checkbox" name="sinAlteRespi" id="sinAlteRespi" value="si"> Sin alteraciones
                </div>
                <div class="col-12">
                    <table class="table table-bordered">
                        <tbody class="text-center">
                            <tr>
                                <td>
                                    <input type="radio" name="crepitos" id="crepitosD" value="D"> D
                                    <input type="radio" name="crepitos" id="crepitosI" value="I"> I
                                    <input type="radio" name="crepitos" id="crepitosN" value="N"> N
                                </td>
                                <td>CREPITOS</td>                                    
                                <td>
                                    <input type="text" class="form-control input-sm" name="crepitosObs">
                                </td>                                        
                            </tr>
                            <tr>
                                <td>
                                    <input type="radio" name="estertores" id="estertoresD" value="D"> D
                                    <input type="radio" name="estertores" id="estertoresI" value="I"> I
                                    <input type="radio" name="estertores" id="estertoresN" value="N"> N
                                </td>
                                <td>ESTERTORES</td>                                   
                                <td>
                                    <input type="text" class="form-control input-sm" name="estertoresObs">
                                </td> 
                            </tr>
                            <tr>
                                <td>
                                    <input type="radio" name="fremito" id="fremitoD" value="D"> D
                                    <input type="radio" name="fremito" id="fremitoI" value="I"> I
                                    <input type="radio" name="fremito" id="fremitoN" value="N"> N
                                </td>   
                                <td>FREMITO</td>
                                <td>
                                    <input type="text" class="form-control input-sm" name="fremitoObs">
                                </td> 
                            </tr>
                            <tr>
                                <td>
                                    <input type="radio" name="percusion" id="percusionD" value="D"> D
                                    <input type="radio" name="percusion" id="percusionI" value="I"> I
                                    <input type="radio" name="percusion" id="percusionN" value="N"> N
                                </td>   
                                <td>PERCUSIÓN</td>
                                <td>
                                    <input type="text" class="form-control input-sm" name="percusionObs">
                                </td> 
                            </tr>
                            <tr>
                                <td>
                                    <input type="radio" name="roncus" id="roncusD" value="D"> D
                                    <input type="radio" name="roncus" id="roncusI" value="I"> I
                                    <input type="radio" name="roncus" id="roncusN" value="N"> N
                                </td>   
                                <td>RONCUS</td>
                                <td>
                                    <input type="text" class="form-control input-sm" name="roncusObs">
                                </td> 
                            </tr>
                            <tr>
                                <td>
                                    <input type="radio" name="sibilancias" id="sibilanciasD" value="D"> D
                                    <input type="radio" name="sibilancias" id="sibilanciasI" value="I"> I
                                    <input type="radio" name="sibilancias" id="sibilanciasN" value="N"> N
                                </td>   
                                <td>SIBILANCIAS</td>
                                <td>
                                    <input type="text" class="form-control input-sm" name="sibilanciasObs">
                                </td> 
                            </tr>
                            <tr>
                                <td>
                                    <input type="radio" name="tirajes" id="tirajesD" value="D"> D
                                    <input type="radio" name="tirajes" id="tirajesI" value="I"> I
                                    <input type="radio" name="tirajes" id="tirajesN" value="N"> N
                                </td>   
                                <td>TIRAJES</td>
                                <td>
                                    <input type="text" class="form-control input-sm" name="tirajesObs">
                                </td> 
                            </tr>
                        </tbody>
                    </table>
                </div>
                
                
                <div class="col-6">
                    <strong>CARDIOVASCULAR</strong>                    
                </div>
                <div class="col-6 float-right text-right">
                    <input type="checkbox" name="sinAlteCardio" id="sinAlteCardio" value="si"> Sin alteraciones
                </div>
                <div class="col-12">
                    <table class="table table-bordered">
                        <tbody class="text-center">
                            <tr>
                                <td>
                                    <input type="checkbox" name="arritmico" id="arritmico" value="si"> S                                   
                                    <input type="checkbox" name="arritmico" id="arritmicoN" value="no"> N                                  
                                </td>
                                <td>ARRITMICO</td>                                    
                                <td>
                                    <input type="text" class="form-control input-sm" name="arritmicoObs">
                                </td>                                        
                            </tr>
                            <tr>
                                <td>
                                    <input type="checkbox" name="edemas" id="edemas" value="si"> S                                    
                                    <input type="checkbox" name="edemas" id="edemasN" value="no"> N                                   
                                </td>
                                <td>EDEMAS</td>                                   
                                <td>
                                    <input type="text" class="form-control input-sm" name="edemasObs">
                                </td> 
                            </tr>
                            <tr>
                                <td>
                                    <input type="checkbox" name="inurgi" id="inurgi" value="si"> S                                    
                                    <input type="checkbox" name="inurgi" id="inurgiN" value="no"> N                                   
                                </td>   
                                <td>INURGITACIÓN YUGULAR</td>
                                <td>
                                    <input type="text" class="form-control input-sm" name="inurgiObs">
                                </td> 
                            </tr>
                            <tr>
                                <td>
                                    <input type="checkbox" name="pulsos" id="pulsos" value="si"> S                                  
                                    <input type="checkbox" name="pulsos" id="pulsosN" value="no"> N                                 
                                </td>   
                                <td>PULSOS</td>
                                <td>
                                    <input type="text" class="form-control input-sm" name="pulsosObs">
                                </td> 
                            </tr>
                            <tr>
                                <td>
                                    <input type="checkbox" name="soplos" id="soplos" value="si"> S                                   
                                    <input type="checkbox" name="soplos" id="soplosN" value="no"> N                                  
                                </td>   
                                <td>SOPLOS</td>
                                <td>
                                    <input type="text" class="form-control input-sm" name="soplosObs">
                                </td> 
                            </tr>
                            <tr>
                                <td>
                                    <input type="checkbox" name="otros" id="otros" value="si"> S                                   
                                    <input type="checkbox" name="otros" id="otrosN" value="no"> N                                  
                                </td>   
                                <td>OTROS</td>
                                <td>
                                    <input type="text" class="form-control input-sm" name="otrosObs">
                                </td> 
                            </tr>                            
                        </tbody>
                    </table>
                </div>


                
                <div class="col-6">
                    <strong>ABDOMEN</strong>                    
                </div>
                <div class="col-6 float-right text-right">
                    <input type="checkbox" name="sinAlteAbdo" id="sinAlteAbdo" value="si"> Sin alteraciones
                </div>
                <div class="col-12">
                    <table class="table table-bordered">
                        <tbody class="text-center">
                            <tr>
                                <td>
                                    <input type="checkbox" name="ascitis" id="ascitis" value="si"> S                                   
                                    <input type="checkbox" name="ascitis" id="ascitisN" value="no"> N                                  
                                </td>
                                <td>ASCITIS</td>                                                                                                          
                            </tr>
                            <tr>
                                <td>
                                    <input type="checkbox" name="blumberg" id="blumberg" value="si"> S                                    
                                    <input type="checkbox" name="blumberg" id="blumbergN" value="no"> N                                   
                                </td>
                                <td>BLUMBERG</td>                                                                  
                            </tr>
                            <tr>
                                <td>
                                    <input type="checkbox" name="distenido" id="distenido" value="si"> S                                    
                                    <input type="checkbox" name="distenido" id="distenidoN" value="no"> N                                   
                                </td>   
                                <td>DISTENIDO</td>                               
                            </tr>
                            <tr>
                                <td>
                                    <input type="checkbox" name="dolor" id="dolor" value="si"> S                                  
                                    <input type="checkbox" name="dolor" id="dolorN" value="no"> N                                  
                                </td>   
                                <td>DOLOR</td>                                 
                            </tr>
                            <tr>
                                <td>
                                    <input type="checkbox" name="espleno" id="espleno" value="si"> S                                   
                                    <input type="checkbox" name="espleno" id="esplenoN" value="no"> N                                  
                                </td>   
                                <td>ESPLENOMEGALIA</td>                                
                            </tr>
                            <tr>
                                <td>
                                    <input type="checkbox" name="hepato" id="hepato" value="si"> S                                   
                                    <input type="checkbox" name="hepato" id="hepatoN" value="no"> N                                  
                                </td>   
                                <td>HEPATOMEGALIA</td>
                            </tr>                            
                            <tr>
                                <td>
                                    <input type="checkbox" name="hernia" id="hernia" value="si"> S                                   
                                    <input type="checkbox" name="hernia" id="herniaN" value="no"> N                                  
                                </td>   
                                <td>HERNIA</td>
                            </tr>                            
                            <tr>
                                <td>
                                    <input type="checkbox" name="masa" id="masa" value="si"> S                                   
                                    <input type="checkbox" name="masa" id="masaN" value="no"> N                                   
                                </td>   
                                <td>MASA</td>
                            </tr>                            
                            <tr>
                                <td>
                                    <input type="checkbox" name="perista" id="perista" value="si"> S                                   
                                    <input type="checkbox" name="perista" id="peristaN" value="no"> N                                  
                                </td>   
                                <td>PERISTALTISMO</td>
                            </tr>                            
                            <tr>
                                <td>
                                    <input type="checkbox" name="rovsing" id="rovsing" value="si"> S                                   
                                    <input type="checkbox" name="rovsing" id="rovsingN" value="no"> N                                  
                                </td>   
                                <td>ROVSING</td>
                            </tr>                            
                            <tr>                                
                                <td>DESCRIPCIÓN</td>
                                <td>
                                    <input type="text" class="form-control input-sm" name="descAbdo">
                                </td> 
                            </tr>                            
                        </tbody>
                    </table>
                </div>

                
                <div class="col-6">
                    <strong>PIEL</strong>                    
                </div>
                <div class="col-6 float-right text-right">
                    <input type="checkbox" name="sinAltePiel" id="sinAltePiel" value="si"> Sin alteraciones
                </div>
                <div class="col-12">
                    <table class="table table-bordered">
                        <tbody class="text-center">
                            <tr>
                                <td>
                                    <input type="checkbox" name="alopecia" id="alopecia" value="si"> S                                   
                                    <input type="checkbox" name="alopecia" id="alopeciaN" value="no"> N                                  
                                </td>
                                <td>ALOPECIA</td>                                                                                                          
                            </tr>
                            <tr>
                                <td>
                                    <input type="checkbox" name="ampolla" id="ampolla" value="si"> S                                    
                                    <input type="checkbox" name="ampolla" id="ampollaN" value="no"> N                                   
                                </td>
                                <td>AMPOLLA</td>                                                                  
                            </tr>
                            <tr>
                                <td>
                                    <input type="checkbox" name="atrofia" id="atrofia" value="si"> S                                    
                                    <input type="checkbox" name="atrofia" id="atrofiaN" value="no"> N                                   
                                </td>   
                                <td>ATROFIA</td>                               
                            </tr>
                            <tr>
                                <td>
                                    <input type="checkbox" name="costra" id="costra" value="si"> S                                  
                                    <input type="checkbox" name="costra" id="costraN" value="no"> N                                 
                                </td>   
                                <td>COSTRA</td>                                 
                            </tr>
                            <tr>
                                <td>
                                    <input type="checkbox" name="despig" id="despig" value="si"> S                                   
                                    <input type="checkbox" name="despig" id="despigN" value="no"> N                                  
                                </td>   
                                <td>DESPIGMENTACION</td>                                
                            </tr>
                            <tr>
                                <td>
                                    <input type="checkbox" name="escama" id="escama" value="si"> S                                   
                                    <input type="checkbox" name="escama" id="escamaN" value="no"> N                                  
                                </td>   
                                <td>ESCAMA</td>
                            </tr>                            
                            <tr>
                                <td>
                                    <input type="checkbox" name="esclerosis" id="esclerosis" value="si"> S                                   
                                    <input type="checkbox" name="esclerosis" id="esclerosisN" value="no"> N                                  
                                </td>   
                                <td>ESCLEROSIS</td>
                            </tr>                            
                            <tr>
                                <td>
                                    <input type="checkbox" name="escoriacion" id="escoriacion" value="si"> S                                   
                                    <input type="checkbox" name="escoriacion" id="escoriacionN" value="no"> N                                  
                                </td>   
                                <td>ESCORIACION</td>
                            </tr>                            
                            <tr>
                                <td>
                                    <input type="checkbox" name="fisura" id="fisura" value="si"> S                                   
                                    <input type="checkbox" name="fisura" id="fisuraN" value="no"> N                                  
                                </td>   
                                <td>FISURA</td>
                            </tr>                            
                            <tr>
                                <td>
                                    <input type="checkbox" name="habon" id="habon" value="si"> S                                   
                                    <input type="checkbox" name="habon" id="habonN" value="no"> N                                   
                                </td>   
                                <td>HABON</td>
                            </tr>                            
                            <tr>
                                <td>
                                    <input type="checkbox" name="liquen" id="liquen" value="si"> S                                   
                                    <input type="checkbox" name="liquen" id="liquenN" value="no"> N                                  
                                </td>   
                                <td>LIQUENIFICACION</td>
                            </tr>                            
                            <tr>
                                <td>
                                    <input type="checkbox" name="macula" id="macula" value="si"> S                                   
                                    <input type="checkbox" name="macula" id="maculaN" value="no"> N                                  
                                </td>   
                                <td>MACULA</td>
                            </tr>                            
                            <tr>
                                <td>
                                    <input type="checkbox" name="nodulo" id="nodulo" value="si"> S                                   
                                    <input type="checkbox" name="nodulo" id="noduloN" value="no"> N                                  
                                </td>   
                                <td>NODULO</td>
                            </tr>                            
                            <tr>
                                <td>
                                    <input type="checkbox" name="papula" id="papula" value="si"> S                                   
                                    <input type="checkbox" name="papula" id="papulaN" value="no"> N                                  
                                </td>   
                                <td>PAPULA</td>
                            </tr>                            
                            <tr>
                                <td>
                                    <input type="checkbox" name="placa" id="placa" value="si"> S                                   
                                    <input type="checkbox" name="placa" id="placaN" value="no"> N                                  
                                </td>   
                                <td>PLACA</td>
                            </tr>                            
                            <tr>
                                <td>
                                    <input type="checkbox" name="pustula" id="pustula" value="si"> S                                   
                                    <input type="checkbox" name="pustula" id="pustulaN" value="no"> N                                  
                                </td>   
                                <td>PUSTULA</td>
                            </tr>                                                                                
                            <tr>
                                <td>
                                    <input type="checkbox" name="querato" id="querato" value="si"> S                                   
                                    <input type="checkbox" name="querato" id="queratoN" value="no"> N                                   
                                </td>   
                                <td>QUERATOSIS</td>
                            </tr>                            
                            <tr>
                                <td>
                                    <input type="checkbox" name="quiste" id="quiste" value="si"> S                                   
                                    <input type="checkbox" name="quiste" id="quisteN" value="no"> N                                  
                                </td>   
                                <td>QUISTE</td>
                            </tr>                            
                            <tr>
                                <td>
                                    <input type="checkbox" name="tumor" id="tumor" value="si"> S                                   
                                    <input type="checkbox" name="tumor" id="tumorN" value="no"> N                                  
                                </td>   
                                <td>TUMOR</td>
                            </tr>                            
                            <tr>
                                <td>
                                    <input type="checkbox" name="ulcera" id="ulcera" value="si"> S                                   
                                    <input type="checkbox" name="ulcera" id="ulceraN" value="no"> N                                  
                                </td>   
                                <td>ULCERA</td>
                            </tr>                            
                            <tr>
                                <td>
                                    <input type="checkbox" name="vesicula" id="vesicula" value="si"> S                                   
                                    <input type="checkbox" name="vesicula" id="vesiculaN" value="no"> N                                  
                                </td>   
                                <td>VESICULA</td>
                            </tr>                            
                            <tr>
                                <td>DESCRIPCION</td>
                                <td>
                                    <input type="text" class="form-control input-sm" name="descPiel">
                                </td> 
                            </tr>                            
                        </tbody>
                    </table>
                </div>


                <div class="col-12">
                    <strong>OSTEO-MUSCULAR</strong>                    
                </div>
                <div class="col-12">
                    <table class="table table-bordered">
                        <tbody class="text-center">                         
                            <tr>
                                <td>DESCRIPCION</td>
                                <td>
                                    <input type="text" class="form-control input-sm" name="descOsteo">
                                </td> 
                            </tr>                            
                        </tbody>
                    </table>
                </div>


                <div class="col-6">
                    <strong>GENITOURINARIO Y OBSTETRICO:</strong>                    
                </div>
                <div class="col-6 float-right text-right">
                    <input type="checkbox" name="sinAlte" value="si"> Sin alteraciones
                </div>
                <div class="col-12">
                    <table class="table table-bordered">
                        <tbody class="text-center">                         
                            <tr>
                                <td>DESCRIPCION</td>
                                <td>
                                    <input type="text" class="form-control input-sm" name="descGenito">
                                </td> 
                            </tr>                            
                        </tbody>
                    </table>
                </div>
                <div class="col-12">
                    <a class="btn btn-primary float-left text-white" onclick="cambiaVisibilidad(3)">Anterior</a>
                    <a class="btn btn-primary float-right text-white" onclick="cambiaVisibilidad(5)">Siguiente</a>
                </div>                  
            </div>


            <div class="row d-none" id="resultados">
                <strong>Resultados de paraclinicos.</strong>
                <div class="col-12">                
                    <div class="form-group">                        
                        <textarea name="descResult" id="descResult" class="form-control" id="" cols="30" rows="3"></textarea>                        
                    </div>                
                </div>
                <div class="col-12">
                    <a class="btn btn-primary float-left text-white" onclick="cambiaVisibilidad(4)">Anterior</a>
                    <a class="btn btn-primary float-right text-white" onclick="cambiaVisibilidad(6)">Siguiente</a>
                </div>  
            </div>

            <div class="row d-none" id="diagnosticos">
                <div class="col-6">                
                    <div class="form-group">
                        <label for="dx1">Dx 1</label>
                        <textarea name="dx1" class="form-control" id="dx1" cols="30" rows="3"></textarea>                        
                    </div>                
                </div>
                <div class="col-6">                
                    <div class="form-group">
                        <label for="dx2">Dx 2</label>
                        <textarea name="dx2" class="form-control" id="dx2" cols="30" rows="3"></textarea>                        
                    </div>                
                </div>
                <div class="col-6">                
                    <div class="form-group">
                        <label for="dx3">Dx 3</label>
                        <textarea name="dx3" class="form-control" id="dx3" cols="30" rows="3"></textarea>                        
                    </div>                
                </div>
                <div class="col-6">                
                    <div class="form-group">
                        <label for="dx4">Dx 4</label>
                        <textarea name="dx4" class="form-control" id="dx4" cols="30" rows="3"></textarea>                        
                    </div>                
                </div>
                <div class="col-12">
                    <a class="btn btn-primary float-left text-white" onclick="cambiaVisibilidad(5)">Anterior</a>
                    <a class="btn btn-primary float-right text-white" onclick="cambiaVisibilidad(7)">Siguiente</a>
                </div>  
            </div>

            <div class="row d-none" id="plan">
                <div class="col-6">                
                    <div class="form-group">
                        <label for="descPlan">Plan o tratamiento</label>
                        <textarea name="descPlan" class="form-control" id="descPlan" cols="30" rows="3"></textarea>                        
                    </div>                
                </div>
                <div class="col-12">
                    <a class="btn btn-primary float-left text-white" onclick="cambiaVisibilidad(6)">Anterior</a>
                    <a class="btn btn-primary float-right text-white" onclick="cambiaVisibilidad(8)">Siguiente</a>
                </div>  
            </div>

            <div class="row d-none" id="medicamentos">
                <div class="col-12">
                    <table class="table table-bordered">
                        <thead>
                          <tr class="text-center">
                            <th colspan="5">Medicamentos</th>
                          </tr>
                        </thead>
                        <tbody class="text-center">
                            <tr>
                                <td>Nombre</td>                                
                                <td>Dosis</td>
                                <td>Via administra</td>
                                <td>Tiempo Tto</td>                                
                            </tr>
                            <tr>
                                <td> 
                                    
                                    <div class="form-group">                                            
                                            <select name="insumosId" class="form-control <?php $__errorArgs = ['insumosId'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="insumosId">
                                                <option value=""><?php echo app('translator')->get('--Seleccione una opción--'); ?></option>     
                                                <?php $__currentLoopData = $insumos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $insumo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($insumo->id); ?>"><?php echo e($insumo->nomIns); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                                                                                                                
                                            </select>
                                            <?php $__errorArgs = ['insumosId'];
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
                                </td>                                
                                <td>
                                    <input type="text" name="dosis" class="form-control input-sm">
                                </td>
                                <td>
                                    <input type="text" name="viaAdmin" class="form-control input-sm">
                                </td>
                                <td>
                                    <input type="text" name="tiempoTra" class="form-control input-sm">
                                </td>                                
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-12">
                    <a class="btn btn-primary float-left text-white" onclick="cambiaVisibilidad(7)">Anterior</a>
                    <a class="btn btn-primary float-right text-white" onclick="cambiaVisibilidad(9)">Siguiente</a>
                    <button type="submit" class="btn btn-success float-right">Guardar consulta</button>
                </div>  
            </div>

            <div class="row d-none" id="responsable">                
                <div class="col-6">                
                    <div class="form-group">
                        <label for="responsable">Responsable</label>
                        <input name="responsable" class="form-control" id="responsable" value="<?php echo e($citas->empleado->pNom); ?> <?php echo e($citas->empleado->pApe); ?>">
                    </div>                
                </div>
                <div class="col-12">
                    <a class="btn btn-primary float-left text-white" onclick="cambiaVisibilidad(8)">Anterior</a>
                    <button type="submit" class="btn btn-success float-right">Guardar consulta</button>                    
                </div>  
            </div>

            </form>
        </div>
    </div>    
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script>
    function cambiaVisibilidad(idBoton) {
        var i = 0;
        var link1 = document.getElementById('link1');
        var div1 = document.getElementById('identificacion');
        var link2 = document.getElementById('link2');
        var div2 = document.getElementById('anamnesis');
        var link3 = document.getElementById('link3');
        var div3 = document.getElementById('revisionsistemas');
        var link4 = document.getElementById('link4');
        var div4 = document.getElementById('examenfisico');
        var link5 = document.getElementById('link5');
        var div5 = document.getElementById('resultados');
        var link6 = document.getElementById('link6');
        var div6 = document.getElementById('diagnosticos');
        var link7 = document.getElementById('link7');
        var div7 = document.getElementById('plan');
        var link8 = document.getElementById('link8');
        var div8 = document.getElementById('medicamentos');
        var link9 = document.getElementById('link9');
        var div9 = document.getElementById('responsable');
        switch(idBoton) {
            case 1:                                                        
                div1.classList.remove('d-none');
                link1.classList.add('active');                                
                link2.classList.remove('active');                                
                link3.classList.remove('active');                                
                link4.classList.remove('active');                                
                link5.classList.remove('active');                                
                link6.classList.remove('active');                                
                link7.classList.remove('active');                                
                link8.classList.remove('active');                                
                link9.classList.remove('active');                                
                div2.classList.add('d-none');                                
                div3.classList.add('d-none');                                
                div4.classList.add('d-none');                                
                div5.classList.add('d-none');                                
                div6.classList.add('d-none');                                
                div7.classList.add('d-none');                                
                div8.classList.add('d-none');                                
                div9.classList.add('d-none');                                                
                break;
            case 2:
                div2.classList.remove('d-none');           
                link2.classList.add('active');           
                link1.classList.remove('active');
                link3.classList.remove('active');                                
                link4.classList.remove('active');                                
                link5.classList.remove('active');                                
                link6.classList.remove('active');                                
                link7.classList.remove('active');                                
                link8.classList.remove('active');                                
                link9.classList.remove('active'); 
                div1.classList.add('d-none'); 
                div3.classList.add('d-none');                                
                div4.classList.add('d-none');                                
                div5.classList.add('d-none');                                
                div6.classList.add('d-none');                                
                div7.classList.add('d-none');                                
                div8.classList.add('d-none');                                
                div9.classList.add('d-none');                                
                break;             
            case 3:
                div3.classList.remove('d-none');  
                link3.classList.add('active');  
                link1.classList.remove('active');
                link2.classList.remove('active');                                
                link4.classList.remove('active');                                
                link5.classList.remove('active');                                
                link6.classList.remove('active');                                
                link7.classList.remove('active');                                
                link8.classList.remove('active');                                
                link9.classList.remove('active');  
                div1.classList.add('d-none'); 
                div2.classList.add('d-none');                                
                div4.classList.add('d-none');                                
                div5.classList.add('d-none');                                
                div6.classList.add('d-none');                                
                div7.classList.add('d-none');                                
                div8.classList.add('d-none');                                
                div9.classList.add('d-none');                                
                break;             
            case 4:
                div4.classList.remove('d-none');           
                link4.classList.add('active');           
                link1.classList.remove('active');
                link2.classList.remove('active');                                
                link3.classList.remove('active');                                
                link5.classList.remove('active');                                
                link6.classList.remove('active');                                
                link7.classList.remove('active');                                
                link8.classList.remove('active');                                
                link9.classList.remove('active');           
                div1.classList.add('d-none'); 
                div2.classList.add('d-none');                                
                div3.classList.add('d-none');                                
                div5.classList.add('d-none');                                
                div6.classList.add('d-none');                                
                div7.classList.add('d-none');                                
                div8.classList.add('d-none');                                
                div9.classList.add('d-none');                                
                break;     
            case 5:
                div5.classList.remove('d-none');  
                link5.classList.add('active');           
                link1.classList.remove('active');
                link2.classList.remove('active');                                
                link3.classList.remove('active');                                
                link4.classList.remove('active');                                
                link6.classList.remove('active');                                
                link7.classList.remove('active');                                
                link8.classList.remove('active');                                
                link9.classList.remove('active');          
                div1.classList.add('d-none'); 
                div2.classList.add('d-none');                                
                div3.classList.add('d-none');                                
                div4.classList.add('d-none');                                
                div6.classList.add('d-none');                                
                div7.classList.add('d-none');                                
                div8.classList.add('d-none');                                
                div9.classList.add('d-none');                                
                break; 
            case 6:
                div6.classList.remove('d-none');   
                link6.classList.add('active');           
                link1.classList.remove('active');
                link2.classList.remove('active');                                
                link3.classList.remove('active');                                
                link4.classList.remove('active');                                
                link5.classList.remove('active');                                
                link7.classList.remove('active');                                
                link8.classList.remove('active');                                
                link9.classList.remove('active');         
                div1.classList.add('d-none'); 
                div2.classList.add('d-none');                                
                div3.classList.add('d-none');                                
                div4.classList.add('d-none');                                
                div5.classList.add('d-none');                                
                div7.classList.add('d-none');                                
                div8.classList.add('d-none');                                
                div9.classList.add('d-none');                                
                break; 
            case 7:
                div7.classList.remove('d-none');  
                link7.classList.add('active');           
                link1.classList.remove('active');
                link2.classList.remove('active');                                
                link3.classList.remove('active');                                
                link4.classList.remove('active');                                
                link5.classList.remove('active');                                
                link6.classList.remove('active');                                
                link8.classList.remove('active');                                
                link9.classList.remove('active');          
                div1.classList.add('d-none'); 
                div2.classList.add('d-none');                                
                div3.classList.add('d-none');                                
                div4.classList.add('d-none');                                
                div5.classList.add('d-none');                                
                div6.classList.add('d-none');                                
                div8.classList.add('d-none');                                
                div9.classList.add('d-none');                                
                break; 
            case 8:
                div8.classList.remove('d-none'); 
                link8.classList.add('active');           
                link1.classList.remove('active');
                link2.classList.remove('active');                                
                link3.classList.remove('active');                                
                link4.classList.remove('active');                                
                link5.classList.remove('active');                                
                link6.classList.remove('active');                                
                link7.classList.remove('active');                                
                link9.classList.remove('active');           
                div1.classList.add('d-none'); 
                div2.classList.add('d-none');                                
                div3.classList.add('d-none');                                
                div4.classList.add('d-none');                                
                div5.classList.add('d-none');                                
                div6.classList.add('d-none');                                
                div7.classList.add('d-none');                                
                div9.classList.add('d-none');                                
                break; 
            case 9:
                div9.classList.remove('d-none');
                link9.classList.add('active');                                
                link1.classList.remove('active'); 
                link2.classList.remove('active');                                
                link3.classList.remove('active');                                
                link4.classList.remove('active');                                
                link5.classList.remove('active');                                
                link6.classList.remove('active');                                
                link7.classList.remove('active');                                
                link8.classList.remove('active');           
                div1.classList.add('d-none'); 
                div2.classList.add('d-none');                                
                div3.classList.add('d-none');                                
                div4.classList.add('d-none');                                
                div5.classList.add('d-none');                                
                div6.classList.add('d-none');                                
                div7.classList.add('d-none');                                
                div8.classList.add('d-none');                                
                break; 
                            
            default:
                alert("hay un problema: No existe el producto.")
        }    
   }   

    $('#tblCita').DataTable({
    autoWidth: false,
    processing: true,
    serverSide: true,
    responsive: true,
    ajax: '/inventario/insumos/listar',
        columns: [        
            {data: 'codIns', name: 'codIns'},
            {data: 'nomIns', name: 'nomIns'},
            {data: 'labora', name: 'labora'},
            {data: 'concen', name: 'concen'},
            {data: 'pres', name: 'pres'},
            {data: 'unid', name: 'unid'},
            {data: 'precio', name: 'precio'},
            {data: 'fecVen', name: 'fecVen'},
            {data: 'nomCate', name: 'nomCate'},
            {
                data: 'editar', 
                name: 'editar', 
                orderable: false, 
                searchable: false
            }
        ]    
    });

     
    $("#sinAlteOrganos").on('change', function() {
        if( $(this).is(':checked') ) {
            $("#bocaN").prop("checked", true);
            $("#narizN").prop("checked", true);
            $("#oidoN").prop("checked", true);
            $("#ojoN").prop("checked", true);
            // Hacer algo si el checkbox ha sido seleccionado        
        } else {
            // Hacer algo si el checkbox ha sido deseleccionado
            $("#bocaN").prop("checked", false);
            $("#narizN").prop("checked", false);
            $("#oidoN").prop("checked", false);
            $("#ojoN").prop("checked", false);
        }
    });

    $("#sinAlteNeuro").on('change', function() {
        if( $(this).is(':checked') ) {
            $("#eutimicoN").prop("checked", true);
            $("#ansiosoN").prop("checked", true);
            $("#depresivoN").prop("checked", true);
            $("#maniacoN").prop("checked", true);
            $("#psicoticoN").prop("checked", true);
            $("#rigidezNucaN").prop("checked", true);
            $("#otroN").prop("checked", true);
            $("#hemiparesiaN").prop("checked", true);
            $("#hemiplejiaN").prop("checked", true);
            $("#babinskiN").prop("checked", true);
            $("#lassegueN").prop("checked", true);
            $("#glassglowN").prop("checked", true);
            $("#pupilasN").prop("checked", true);
            $("#rotN").prop("checked", true);
            $("#fondoOjoN").prop("checked", true);            
            // Hacer algo si el checkbox ha sido seleccionado        
        }else {
            // Hacer algo si el checkbox ha sido deseleccionado
            $("#eutimicoN").prop("checked", false);
            $("#ansiosoN").prop("checked", false);
            $("#depresivoN").prop("checked", false);
            $("#maniacoN").prop("checked", false);
            $("#psicoticoN").prop("checked", false);
            $("#rigidezNucaN").prop("checked", false);
            $("#otroN").prop("checked", false);
            $("#hemiparesiaN").prop("checked", false);
            $("#hemiplejiaN").prop("checked", false);
            $("#babinskiN").prop("checked", false);
            $("#lessegueN").prop("checked", false);
            $("#glassglowN").prop("checked", false);
            $("#pupilasN").prop("checked", false);
            $("#rotN").prop("checked", false);
            $("#fondoOjoN").prop("checked", false);
        }
    }); 

    $("#sinAlteRespi").on('change', function() {
        if( $(this).is(':checked') ) {
            $("#crepitosN").prop("checked", true);
            $("#estertoresN").prop("checked", true);
            $("#fremitoN").prop("checked", true);
            $("#percusionN").prop("checked", true);
            $("#roncusN").prop("checked", true);
            $("#sibilanciasN").prop("checked", true);
            $("#tirajesN").prop("checked", true);
            // Hacer algo si el checkbox ha sido seleccionado        
        }else {
            // Hacer algo si el checkbox ha sido deseleccionado
            $("#crepitosN").prop("checked", false);
            $("#estertoresN").prop("checked", false);
            $("#fremitoN").prop("checked", false);
            $("#percusionN").prop("checked", false);
            $("#roncusN").prop("checked", false);
            $("#sibilanciasN").prop("checked", false);
            $("#tirajesN").prop("checked", false);
        }
    });

    $("#sinAlteCardio").on('change', function() {
        if( $(this).is(':checked') ) {
            $("#arritmicoN").prop("checked", true);
            $("#edemasN").prop("checked", true);
            $("#inurgiN").prop("checked", true);
            $("#pulsosN").prop("checked", true);
            $("#soplosN").prop("checked", true);
            $("#otrosN").prop("checked", true);            
            // Hacer algo si el checkbox ha sido seleccionado        
        }else {
            // Hacer algo si el checkbox ha sido deseleccionado
            $("#arritmicoN").prop("checked", false);
            $("#edemasN").prop("checked", false);
            $("#inurgiN").prop("checked", false);
            $("#pulsosN").prop("checked", false);
            $("#soplosN").prop("checked", false);
            $("#otrosN").prop("checked", false); 
        }
    });

    $("#sinAlteAbdo").on('change', function() {
        if( $(this).is(':checked') ) {
            $("#ascitisN").prop("checked", true);
            $("#blumbergN").prop("checked", true);
            $("#distenidoN").prop("checked", true);
            $("#dolorN").prop("checked", true);
            $("#esplenoN").prop("checked", true);
            $("#hepatoN").prop("checked", true);            
            $("#herniaN").prop("checked", true);            
            $("#masaN").prop("checked", true);            
            $("#peristaN").prop("checked", true);            
            $("#rovsingN").prop("checked", true);                                    
            // Hacer algo si el checkbox ha sido seleccionado        
        } else {
            // Hacer algo si el checkbox ha sido deseleccionado
            $("#ascitisN").prop("checked", false);
            $("#blumbergN").prop("checked", false);
            $("#distenidoN").prop("checked", false);
            $("#dolorN").prop("checked", false);
            $("#esplenoN").prop("checked", false);
            $("#hepatoN").prop("checked", false);            
            $("#herniaN").prop("checked", false);            
            $("#masaN").prop("checked", false);            
            $("#peristaN").prop("checked", false);            
            $("#rovsingN").prop("checked", false); 
        }
    });

    $("#sinAltePiel").on('change', function() {
        if( $(this).is(':checked') ) {
            $("#alopeciaN").prop("checked", true);
            $("#ampollaN").prop("checked", true);
            $("#atrofiaN").prop("checked", true);
            $("#costraN").prop("checked", true);
            $("#despigN").prop("checked", true);
            $("#escamaN").prop("checked", true);            
            $("#esclerosisN").prop("checked", true);            
            $("#escoriacionN").prop("checked", true);            
            $("#fisuraN").prop("checked", true);            
            $("#habonN").prop("checked", true);            
            $("#liquenN").prop("checked", true);                                    
            $("#maculaN").prop("checked", true);                                    
            $("#noduloN").prop("checked", true);                                    
            $("#papulaN").prop("checked", true);                                    
            $("#placaN").prop("checked", true);                                    
            $("#pustulaN").prop("checked", true);                                    
            $("#queratoN").prop("checked", true);                                    
            $("#quisteN").prop("checked", true);                                    
            $("#tumorN").prop("checked", true);                                    
            $("#ulceraN").prop("checked", true);                                     
            $("#vesiculaN").prop("checked", true);                                     
            // Hacer algo si el checkbox ha sido seleccionado        
        }else {
            // Hacer algo si el checkbox ha sido deseleccionado
            $("#alopeciaN").prop("checked", false);
            $("#ampollaN").prop("checked", false);
            $("#atrofiaN").prop("checked", false);
            $("#costraN").prop("checked", false);
            $("#despigN").prop("checked", false);
            $("#escamaN").prop("checked", false);            
            $("#esclerosisN").prop("checked", false);            
            $("#escoriacionN").prop("checked", false);            
            $("#fisuraN").prop("checked", false);
            $("#habonN").prop("checked", false);              
            $("#liquenN").prop("checked", false);                                    
            $("#maculaN").prop("checked", false);                                    
            $("#noduloN").prop("checked", false);                                    
            $("#papulaN").prop("checked", false);                                    
            $("#placaN").prop("checked", false);                                    
            $("#pustulaN").prop("checked", false);                                    
            $("#queratoN").prop("checked", false);                                    
            $("#quisteN").prop("checked", false);                                    
            $("#tumorN").prop("checked", false);                                    
            $("#ulceraN").prop("checked", false);                                     
            $("#vesiculaN").prop("checked", false); 
        }
    });
    
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\andre\Desktop\sismped\sispmed\resources\views/consulta/consulta.blade.php ENDPATH**/ ?>