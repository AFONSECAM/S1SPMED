@extends('layouts.app')
@section('contenido')
    <div class="row">
        <div class="col-12">
            <h4>Consulta paciente: {{$citas->paciente->pNom}} {{$citas->paciente->sNom}} {{$citas->paciente->pApe}}</h4>
            {{-- <a href="/home">
                <button type="button" class="btn btn-info text-white float-left">
                    <svg class="c-icon c-icon-lg">
                        <use xlink:href="{{asset('assets/dashboard/vendors/@coreui/icons/svg/free.svg#cil-chevron-circle-left-alt')}}"></use>                    
                    </svg>
                    @lang('Regresar')
                </button>
            </a> 
            
            <a href="/agenda">
                <button type="button" class="btn btn-success text-white float-right">
                    @lang('New')
                    <svg class="c-icon c-icon-lg">
                        <use xlink:href="{{asset('assets/dashboard/vendors/@coreui/icons/svg/free.svg#cil-library-add')}}"></use>                    
                    </svg>                    
                </button>
            </a> --}}
        </div>
    </div>
    <hr>
    {{-- <div class="row">
        <div class="col-12">
            <a href="#" class="btn btn-sm btn-primary float-right" data-toggle="modal" data-target="#import" title="Carga masiva de datos">
                <svg class="c-icon c-icon-lg">
                    <use xlink:href="{{asset('assets/dashboard/vendors/@coreui/icons/svg/free.svg#cil-paperclip')}}"></use>                    
                </svg>
            </a>             
        </div>
    </div> --}}

    
    <div class="card">
        {{-- <div class="card-header"> 
            <form action="/inventario/insumos/exportar" method="POST">
                @csrf
                <button name="pdf" type="submit" class="btn btn-sm btn-danger float-right" value="pdf">
                    PDF
                </button>                                
                <button name="excel" type="submit" class="btn btn-sm btn-success float-right" value="excel">
                    XLS
                </button>                            
            </form>
            <strong>@lang('Citas hoy')</strong>           
        </div> --}}
        <div class="card-body">
            @include('flash::message')  
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
            {{-- IDENFICACIÖN --}}   
            <form action="/consulta/guardar" method="POST">
            @csrf    
            <div class="row" id="identificacion">
                <div class="col-6">                
                    <div class="form-group">
                        <label for="txtFecha">Fecha</label>
                        <input type="date" class="form-control" id="txtFecha" name="txtFecha" value="{{$citas->fecha->format('Y-m-d')}}">
                    </div>                
                </div>
                <div class="col-6">                
                    <div class="form-group">
                        <label for="txtHora">Hora</label>
                        <input type="time" class="form-control" id="txtHora" name="txtHora" aria-describedby="emailHelp" value="{{$citas->hora_inicio->toTimeString()}}">
                    </div>                
                </div>
                <div class="col-3">                
                    <div class="form-group">
                        <label for="txtTipoId">Tipo Documento</label>
                        <input type="text" class="form-control" id="txtTipoId" name="txtTipoId" value="{{$citas->paciente->tipoId_id}}" readonly>
                    </div>                
                </div>
                <div class="col-3">                
                    <div class="form-group">
                        <label for="txtNiD">Número Documento</label>
                        <input type="text" class="form-control" id="txtNiD" name="txtNiD" value="{{$citas->paciente->nIdPac}}" readonly>
                    </div>                
                </div>
                <div class="col-3">                
                    <div class="form-group">
                        <label for="txtGenero">Sexo</label>
                        <input type="text" class="form-control" id="txtGenero" name="txtGenero" @if ($citas->paciente->genero == "I")  value="Indefinido" @elseif($citas->paciente->genero == "F")  value="Femenino" @else value="Masculino" @endif  readonly>
                    </div>                
                </div>
                <div class="col-3">                
                    <div class="form-group">
                        <label for="txtEps">EPS</label>
                        <input type="text" class="form-control" id="txtEps" name="txtEps" value="{{$citas->paciente->eps->nomEps}}" readonly>
                    </div>                
                </div>
                <div class="col-3">                
                    <div class="form-group">
                        <label for="txtEcivil">Estado Civil</label>
                        <input type="text" class="form-control" id="txtEcivil" name="txtEcivil" @if($citas->paciente->eCivil == "C") value="Casado" @elseif($citas->paciente->eCivil == "S") value="Soltero" @elseif($citas->paciente->eCivil == "U") value="Union Libre" @else value="Viudo" @endif readonly>
                    </div>                
                </div>
                <div class="col-3">                
                    <div class="form-group">
                        <label for="txtFecNac">Fecha nacimiento</label>
                        <input type="date" class="form-control" id="txtFecNac" name="txtFecNac" value="{{$citas->paciente->fecNac->format('Y-m-d')}}" readonly>
                    </div>                
                </div>
                <div class="col-12">
                    <a class="btn btn-primary float-right text-white" onclick="cambiaVisibilidad(2)">Siguiente</a>
                </div>
            </div>

            <div class="row d-none" id="anamnesis">
                <div class="col-6">                
                    <div class="form-group">
                        <label for="txtMotivo">Motivo de la consulta</label>
                        <textarea name="txtMotivo" class="form-control" id="txtMotivo" cols="30" rows="3"></textarea>                        
                    </div>                
                </div>
                <div class="col-6">                
                    <div class="form-group">
                        <label for="txtEnfAct">Enfermedad actual</label>
                        <textarea name="txtEnfAct" class="form-control" id="txtEnfAct" cols="30" rows="3"></textarea>                        
                    </div>                
                </div>
                <div class="col-12">
                    <strong>Antecedentes:</strong>
                </div>
                <div class="col-2">
                    <div class="form-group">
                        <label for="patologicos">Patologicos</label>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="patologicos" value="Si">Si
                            </label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="patologicos" value="No">No
                            </label>
                        </div>                                  
                    </div>   
                </div>
                <div class="col-2">
                    <div class="form-group">
                        <label for="alergicos">Alergicos</label>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="alergicos" id="alergicosSi" value="Si">Si
                            </label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="alergicos" id="alergicosNo" value="No">No
                            </label>
                        </div>                                     
                    </div>   
                </div>
                <div class="col-2">
                    <div class="form-group">
                        <label for="quirurgicos">Quirurgicos</label>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="quirurgicos" id="quirurgicosSi" value="Si">Si
                            </label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="quirurgicos" id="quirurgicosNo" value="No">No
                            </label>
                        </div>                                     
                    </div>   
                </div>
                <div class="col-2">
                    <div class="form-group">
                        <label for="farmacologicos">Farmacologicos</label>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="farmacologicos" id="farmacologicosSi" value="Si">Si
                            </label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="farmacologicos" id="farmacologicosNo" value="No">No
                            </label>
                        </div>                                      
                    </div>   
                </div>
                <div class="col-2">
                    <div class="form-group">
                        <label for="traumaticos">Traumaticos</label>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="traumaticos" id="traumaticosSi" value="Si">Si
                            </label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="traumaticos" id="traumaticosNo" value="No">No
                            </label>
                        </div>                                     
                    </div>   
                </div>
                <div class="col-2">
                    <div class="form-group">
                        <label for="toxicologicos">Toxicologicos</label>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="toxicologicos" id="toxicologicosSi" value="Si">Si
                            </label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="toxicologicos" id="toxicologicosNo" value="No">No
                            </label>
                        </div>                                     
                    </div>   
                </div> 
                <div class="col-12">
                    <a class="btn btn-primary float-left text-white" onclick="cambiaVisibilidad(1)">Anterior</a>
                    <a class="btn btn-primary float-right text-white" onclick="cambiaVisibilidad(3)">Siguiente</a>
                </div>               
            </div>

            <div class="row d-none" id="revisionsistemas">
                <h2>Revisión sistemas</h2>
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
                                <td>SAT2</td>
                            </tr>
                            <tr>
                                <td>                                
                                    <input type="text" class="form-control input-sm" name="TA">                                                                
                                </td>
                                <td>
                                    <input type="text" class="form-control input-sm" name="FC">
                                </td>
                                <td>
                                    <input type="text" class="form-control input-sm" name="FR">
                                </td>
                                <td>
                                    <input type="text" class="form-control input-sm" name="SAT">
                                </td>
                                <td>
                                    <input type="text" class="form-control input-sm" name="T">
                                </td>
                                <td>
                                    <input type="text" class="form-control input-sm" name="SAT2">
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div> 

                <strong>Organos de los sentidos &nbsp;   </strong>
                <div class="checkbox">
                    <label><input type="checkbox" name="sinAlter" value="No">Sin alteraciones</label>
                </div>
                <div class="col-12">
                    <table class="table table-bordered">
                        <tbody class="text-center">
                            <tr>
                                <td>OJO</td> 
                                <td>
                                    <input type="radio" name="ojoD" id="ojoD" value="S">Der
                                    <input type="radio" name="ojoI" id="ojoI" value="S">Izq
                                </td>   
                                <td>
                                    <input type="text" class="form-control input-sm">
                                </td>                                        
                            </tr>
                            <tr>
                                <td>OIDO</td>
                                <td>
                                    <input type="radio" name="oidoD" id="oidoD">Der
                                    <input type="radio" name="oidoI" id="oidoI">Izq
                                </td>   
                                <td>
                                    <input type="text" class="form-control input-sm">
                                </td> 
                            </tr>
                            <tr>
                                <td>NARIZ</td>
                                <td>
                                    <input type="radio" name="narizD" id="narizD">Der
                                    <input type="radio" name="narizI" id="narizI">Izq
                                </td>   
                                <td>
                                    <input type="text" class="form-control input-sm">
                                </td> 
                            </tr>
                            <tr>
                                <td>BOCA</td>
                                <td>
                                    <input type="radio" name="bocaD" id="bocaD">Der
                                    <input type="radio" name="bocaI" id="bocaI">Izq
                                </td>   
                                <td>
                                    <input type="text" class="form-control input-sm">
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
                        <textarea name="motivo" id="motivo" class="form-control" id="" cols="30" rows="3"></textarea>                        
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
                        <label for="plan">Plan o tratamiento</label>
                        <textarea name="plan" class="form-control" id="plan" cols="30" rows="3"></textarea>                        
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
                                <td>Presentacion</td>
                                <td>Dosis</td>
                                <td>Via administra</td>
                                <td>Tiempo Tto</td>                                
                            </tr>
                            <tr>
                                <td>                                
                                    <input type="text" name="medNom" class="form-control input-sm">                                                                
                                </td>
                                <td>
                                    <input type="text" name="medPres" class="form-control input-sm">
                                </td>
                                <td>
                                    <input type="text" name="medDos" class="form-control input-sm">
                                </td>
                                <td>
                                    <input type="text" name="medVia" class="form-control input-sm">
                                </td>
                                <td>
                                    <input type="text" name="medTiempo" class="form-control input-sm">
                                </td>                                
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-12">
                    <a class="btn btn-primary float-left text-white" onclick="cambiaVisibilidad(7)">Anterior</a>
                    <a class="btn btn-primary float-right text-white" onclick="cambiaVisibilidad(9)">Siguiente</a>
                </div>  
            </div>
            <div class="row d-none" id="responsable">                
                <div class="col-6">                
                    <div class="form-group">
                        <label for="responsable">Responsable</label>
                        <input name="responsable" class="form-control" id="responsable" value="{{$citas->empleado->pNom}} {{$citas->empleado->pApe}}">
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
@endsection

@section('scripts')
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
</script>

@endsection