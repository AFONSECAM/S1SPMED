@extends("layouts.app")
@section("contenido")
    <div class="row">
        <div class="col-12">
            <a href="/empresa/empleados">
                <button type="button" class="btn btn-info text-white float-left">
                    <svg class="c-icon c-icon-lg">
                        <use xlink:href="{{asset('assets/dashboard/vendors/@coreui/icons/svg/free.svg#cil-chevron-circle-left-alt')}}"></use>                    
                    </svg>
                    @lang('Regresar')
                </button>
            </a>                         
        </div>
    </div>
    <hr>
    <div class="card">
        <div class="card-header">
            <strong>@lang('Editar Empleado')</strong>
        </div>
        <div class="card-body">
            @include('flash::message')            
            <form action="/empresa/empleados/actualizar" method="POST">
                @csrf
                <input type="hidden" name="id" value="{{$empleado->id}}"/>
                <div class="row">
                    <div class="col-12">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                              <li class="breadcrumb-item font-weight-bold" aria-current="page">@lang('Datos Personales')</li>
                            </ol>
                          </nav>
                    </div> 
                    
                    <div class="col-sm-12 col-md-3 col-lg-3">                        
                        <div class="form-group">
                            <label for="primerNom">@lang('Primer Nombre')</label>
                            <input type="text"  class="form-control @error('primerNom') is-invalid @enderror" name="primerNom" id="primerNom" value="{{ $empleado->pNom}}">
                            @error('primerNom')
                                <div class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-3 col-lg-3">
                        <div class="form-group">
                            <label for="segundoNom">@lang('Segundo Nombre')</label>
                            <input type="text"  class="form-control @error('segundoNom') is-invalid @enderror" name="segundoNom" id="segundoNom" value="{{ $empleado->sNom}}">
                            @error('segundoNom')
                                <div class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-3 col-lg-3">
                        <div class="form-group">
                            <label for="primerApe">@lang('Primer Apellido')</label>
                            <input type="text"  class="form-control @error('primerApe') is-invalid @enderror" name="primerApe" id="primerApe" value="{{ $empleado->pApe}}">
                            @error('primerApe')
                                <div class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-3 col-lg-3">
                        <div class="form-group">
                            <label for="segundoApe">@lang('Segundo Apellido')</label>
                            <input type="text"  class="form-control @error('segundoApe') is-invalid @enderror" name="segundoApe" id="segundoApe" value="{{ $empleado->sApe}}">
                            @error('segundoApe')
                                <div class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-3 col-lg-3">
                        <div class="form-group">
                            <label for="tipoId">@lang('Tipo Identificación')</label>
                            <select name="tipoId" class="form-control @error('tipoId') is-invalid @enderror" name="tipoId" id="tipoId">                            
                                @foreach ($tiposId as $tipoId)
                                    <option value="{{$tipoId->tipoId}}" 
                                        @if ($tipoId->tipoId == $empleado->tipoId)    
                                        selected>{{$tipoId->nomTipo}}</option>                                                                           
                                    @else
                                    >{{$tipoId->nomTipo}}</option>
                                    @endif
                                @endforeach                                                 
                            </select>
                            @error('ips')
                                <div class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror                                                       
                        </div>
                    </div>                    
                    <div class="col-sm-12 col-md-3 col-lg-3">
                        <div class="form-group">
                            <label for="numeroId">@lang('Número Identificación')</label>
                            <input type="text"  class="form-control @error('numeroId') is-invalid @enderror" name="numeroId" id="numeroId" value="{{ $empleado->nIdEmp}}">
                            @error('numeroId')
                                <div class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-3 col-lg-3">
                        <div class="form-group">
                            <label for="fechaNac">@lang('Fecha Nacimiento')</label>
                            <input type="date"  class="form-control @error('fechaNac') is-invalid @enderror" name="fechaNac" id="fechaNac" value="{{ $empleado->fecNac}}">
                            @error('fechaNac')
                                <div class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-3 col-lg-3">
                        <div class="form-group">
                            <label for="genero">@lang('Género')</label>
                            <select name="genero" class="form-control @error('genero') is-invalid @enderror" name="genero" id="tipoId">
                                @if($empleado->genero == "I")
                                    <option value="{{$empleado->genero}}" selected>Indefinido</option>                                                                                                               
                                    <option value="F">Femenino</option>
                                    <option value="M">Masculino</option>
                                @elseif($empleado->genero == "F")
                                    <option value="{{$empleado->genero}}" selected>Femenino</option>                                                                                                               
                                    <option value="I">Femenino</option>
                                    <option value="M">Masculino</option>
                                @else
                                    <option value="{{$empleado->genero}}" selected>Masculino</option>                                                                                                               
                                    <option value="I">Indefinido</option>
                                    <option value="M">Femenino</option>
                                @endif                                                                                                                         
                            </select>                                                                                     
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-2 col-lg-3">
                        <label for="rh">RH</label>
                        <div class="form-group form-inline">                            
                            <select name="rh" id="rh" class="form-control">
                                @if ($empleado->rh == "N/A")
                                <option value="A" selected>A</option>   
                                @else
                                <option value="{{ $empleado->rh[0] }}">{{ $empleado->rh[0] }}</option> 
                                @endif                                
                                <option value="B">B</option>
                                <option value="O">O</option>
                                <option value="AB">AB</option>
                            </select>
                            <select name="rhS" id="rhS" class="form-control">
                                @if ($empleado->rh == "N/A")
                                    <option value="+" selected>+</option>
                                @else
                                    <option value="{{ $empleado->rh[1] }}" selected>{{ $empleado->rh[1] }}</option>
                                    @if ($empleado->rh[1] == "+")
                                    <option value="-">-</option>
                                @else
                                    <option value="+">+</option>                       
                                @endif
                                @endif                                
                            </select>
                        </div>
                    </div> 
                    <div class="col-sm-12 col-md-3 col-lg-3">
                        <div class="form-group">
                            <label for="estadoCivil">@lang('Estado Civíl')</label>
                            <select name="estadoCivil" class="form-control @error('estadoCivil') is-invalid @enderror" name="estadoCivil" id="estadoCivil">                                
                                @if ($empleado->eCivil == "C")
                                    <option value="{{$empleado->eCivil}}" selected>Casado</option>
                                    <option value="S">Soltero</option>                            
                                    <option value="U">Unión Libre</option>
                                    <option value="V">Viudo</option>
                                @elseif($empleado->eCivil == "S")
                                    <option value="{{$empleado->eCivil}}" selected>Soltero</option>
                                    <option value="C">Casado</option>                            
                                    <option value="U">Unión Libre</option>
                                    <option value="V">Viudo</option> 
                                @elseif($empleado->eCivil == "U")
                                    <option value="{{$empleado->eCivil}}" selected>Unión Libre</option>
                                    <option value="C">Casado</option>                            
                                    <option value="S">Soltero</option>
                                    <option value="V">Viudo</option> 
                                @elseif($empleado->eCivil == "V")
                                    <option value="{{$empleado->eCivil}}" selected>Viudo</option>
                                    <option value="C">Casado</option>                            
                                    <option value="S">Soltero</option>
                                    <option value="U">Unión Libre</option> 
                                @endif                                 
                                                                                                                               
                                                            
                            </select>
                            @error('estadoCivil')
                                <div class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror                                                       
                        </div>
                    </div>                                       
                    {{-- Datos de Contacto --}}                  
                    <div class="col-12">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                              <li class="breadcrumb-item font-weight-bold" aria-current="page">@lang('Datos Contacto')</li>
                            </ol>
                          </nav>
                    </div>   
                    
                    <div class="col-sm-12 col-md-3 col-lg-3">
                        <div class="form-group">
                            <label for="ciudad">@lang('Ciudad')</label>
                            <input type="text"  class="form-control @error('ciudad') is-invalid @enderror" name="ciudad" id="ciudad" value="{{ $empleado->ciuRes}}">
                            @error('ciudad')
                                <div class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                        </div>
                    </div> 
                    <div class="col-sm-12 col-md-3 col-lg-3">
                        <div class="form-group">
                            <label for="direccion">@lang('Dirección')</label>
                            <input type="text"  class="form-control @error('ciudirecciondad') is-invalid @enderror" name="direccion" id="direccion" value="{{ $empleado->dirRes}}">
                            @error('direccion')
                                <div class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                        </div>
                    </div> 
                    <div class="col-sm-12 col-md-3 col-lg-3">
                        <div class="form-group">
                            <label for="telefono">@lang('Teléfono')</label>
                            <input type="text"  class="form-control @error('telefono') is-invalid @enderror" name="telefono" id="telefono" value="{{ $empleado->telEmp}}">
                            @error('telefono')
                                <div class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                        </div>
                    </div> 
                    <div class="col-sm-12 col-md-3 col-lg-3">
                        <div class="form-group">
                            <label for="email">@lang('Correo')</label>
                            <input type="email"  class="form-control @error('email') is-invalid @enderror" name="email" id="email" value="{{ $empleado->mailEmp}}">
                            @error('email')
                                <div class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                        </div>
                    </div> 

                    {{-- Datos de EPS --}}                  
                    <div class="col-12">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                              <li class="breadcrumb-item font-weight-bold" aria-current="page">@lang('Datos Seguridad Social')</li>
                            </ol>
                          </nav>
                    </div>   
                    
                    <div class="col-sm-12 col-md-3 col-lg-3">
                        <div class="form-group">
                            <label for="arl">@lang('ARL')</label>
                            <select name="arl" class="form-control @error('arl') is-invalid @enderror" name="arl" id="arl">                            
                                @foreach ($arls as $arl)
                                    <option value="{{$arl->nomArl}}" 
                                        @if ($arl->id == $empleado->arl_id)    
                                        selected>{{$arl->nomArl}}</option>                                                                           
                                    @else
                                    >{{$arl->nomArl}}</option>
                                    @endif
                                @endforeach                                                 
                            </select>
                            @error('arl')
                                <div class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror                                                       
                        </div>
                    </div>
                    
                    <div class="col-sm-12 col-md-3 col-lg-3">
                        <div class="form-group">
                            <label for="eps">@lang('EPS')</label>
                            <select name="eps" class="form-control @error('eps') is-invalid @enderror" name="eps" id="eps">                            
                                @foreach ($epss as $eps)
                                    <option value="{{$eps->nomEps}}" 
                                        @if ($eps->id == $empleado->eps_id)    
                                        selected>{{$eps->nomEps}}</option>                                                                           
                                    @else
                                    >{{$eps->nomEps}}</option>
                                    @endif
                                @endforeach                                                 
                            </select>
                            @error('ips')
                                <div class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror                                                       
                        </div>
                    </div>                    
                    
                    {{-- Datos de Empresa --}}                  
                    <div class="col-12">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                              <li class="breadcrumb-item font-weight-bold" aria-current="page">@lang('Datos Empresa')</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-sm-12 col-md-3 col-lg-3">
                        <div class="form-group">
                            <label for="fechaIng">@lang('Fecha Ingreso')</label>
                            <input type="date"  class="form-control @error('fechaIng') is-invalid @enderror" name="fechaIng" id="fechaIng" value="{{ $empleado->fecIng}}">
                            <small>@lang('Esta es la fecha en la que ingresó a la empresa.')</small>
                            @error('fechaIng')
                                <div class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                        </div>
                    </div>                    
                    <div class="col-sm-12 col-md-3 col-lg-3">
                        <div class="form-group">
                            <label for="cargo">@lang('Cargo')</label>
                            <select name="cargo" class="form-control @error('rol') is-invalid @enderror" name="cargo" id="cargo">
                                @foreach ($cargos as $cargo)
                                    <option value="{{$cargo->nomCar}}" 
                                        @if ($cargo->nomCar == $empleado->cargo->nomCar)    
                                        selected>{{$cargo->nomCar}}</option>                                                                           
                                    @else
                                    >{{$cargo->nomCar}}</option>
                                    @endif
                                @endforeach                                                                                          
                            </select>
                            @error('rol')
                                <div class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror                                                       
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-3 col-lg-3">
                        <div class="form-group">
                            <label for="estado">@lang('Estado')</label>
                            <select class="form-control @error('estado') is-invalid @enderror" name="estado" id="estado" value="Activo" aria-describedby="helpEstado">
                                @if($empleado->estado == 1)
                                    <option selected value="{{ $empleado->estado}}">Activo</option>
                                    <option value="0">Inactivo</option>
                                @else
                                <option selected value="{{$empleado->estado}}">Inactivo</option>
                                <option value="1">Activo</option>
                                @endif
                            </select>                                                                              
                            @error('estado')
                                <div class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                        </div>
                    </div> 
                </div> 
                <div class="col-12">
                    <button type="submit" class="btn btn-success float-right"><i class="fa fa-save"></i> @lang('Actualizar')</button>               
                </div>                
            </form>
        </div>
    </div>
@endsection