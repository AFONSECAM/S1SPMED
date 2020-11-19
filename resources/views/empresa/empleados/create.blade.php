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
            <strong>@lang('Crear Empleado')</strong>
        </div>
        <div class="card-body">
            @include('flash::message')            
            <form action="/empleados/guardar" method="POST">
                @csrf
                <div class="row">
                    <div class="col-12">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                              <li class="breadcrumb-item active" aria-current="page">@lang('Datos Personales')</li>
                            </ol>
                          </nav>
                    </div> 
                    
                    <div class="col-sm-12 col-md-3 col-lg-3">                        
                        <div class="form-group">
                            <label for="primerNom">@lang('Primer Nombre')</label>
                            <input type="text"  class="form-control @error('primerNom') is-invalid @enderror" name="primerNom" id="primerNom" autofocus>
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
                            <input type="text"  class="form-control @error('segundoNom') is-invalid @enderror" name="segundoNom" id="segundoNom">
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
                            <input type="text"  class="form-control @error('primerApe') is-invalid @enderror" name="primerApe" id="primerApe">
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
                            <input type="text"  class="form-control @error('segundoApe') is-invalid @enderror" name="segundoApe" id="segundoApe">
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
                                <option value="">@lang('--Seleccione una opción--')</option>     
                                @foreach ($tiposId as $tipoId)
                                    <option value="{{$tipoId->id}}">{{$tipoId->nomTipo}}</option>
                                @endforeach                                                                                                                
                            </select>
                            @error('tipoId')
                                <div class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror                                                       
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-3 col-lg-3">
                        <div class="form-group">
                            <label for="numeroId">@lang('Número Identificación')</label>
                            <input type="text"  class="form-control @error('numeroId') is-invalid @enderror" name="numeroId" id="numeroId">
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
                            <input type="date"  class="form-control @error('fechaNac') is-invalid @enderror" name="fechaNac" id="fechaNac">
                            @error('fechaNac')
                                <div class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-3 col-lg-3">  
                        <div>
                            <span>@lang('Género')</span>
                        </div>                    
                        <div class="form-check">                                
                            <input type="checkbox" class="form-check-input" id="chkGeneroM" name="chkGenero" value="M">
                            <label class="form-check-label" for="exampleCheck1">@lang('Masculino')</label>
                        </div>
                        <div class="form-check">                                
                            <input type="checkbox" class="form-check-input" id="chkGeneroF" name="chkGenero" value="F">
                            <label class="form-check-label" for="exampleCheck1">@lang('Femenino')</label>
                        </div>                                                    
                        <div class="form-check">                                
                            <input type="checkbox" class="form-check-input" id="chkGeneroI" name="chkGenero" value="I">
                            <label class="form-check-label" for="exampleCheck1">@lang('Indefinido')</label>
                        </div>                                                    
                    </div>
                    <div class="col-sm-12 col-md-3 col-lg-3">
                        <label for="rh">RH</label>
                        <div class="form-group form-inline">                            
                            <select name="rh" id="rh" class="form-control">
                                <option value="A">A</option>
                                <option value="B">B</option>
                                <option value="O">O</option>
                                <option value="AB">AB</option>
                            </select>
                            <select name="rhS" id="rhS" class="form-control">
                                <option value="+">+</option>
                                <option value="-">-</option>                            
                            </select>
                        </div>
                    </div> 
                    <div class="col-sm-12 col-md-3 col-lg-3">
                        <div class="form-group">
                            <label for="estadoCivil">@lang('Estado Civíl')</label>
                            <select name="estadoCivil" class="form-control @error('estadoCivil') is-invalid @enderror" name="estadoCivil" id="estadoCivil">
                                <option>@lang('--Seleccione una opción--')</option>
                                <option value="C">Casado</option>                            
                                <option value="S">Soltero</option>
                                <option value="U">Unión Libre</option>                            
                                <option value="V">Viudo</option>                            
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
                              <li class="breadcrumb-item active" aria-current="page">@lang('Datos Contacto')</li>
                            </ol>
                          </nav>
                    </div>   
                    
                    <div class="col-sm-12 col-md-3 col-lg-3">
                        <div class="form-group">
                            <label for="ciudad">@lang('Ciudad')</label>
                            <input type="text"  class="form-control @error('ciudad') is-invalid @enderror" name="ciudad" id="ciudad">
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
                            <input type="text"  class="form-control @error('ciudirecciondad') is-invalid @enderror" name="direccion" id="direccion">
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
                            <input type="text"  class="form-control @error('telefono') is-invalid @enderror" name="telefono" id="telefono">
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
                            <input type="email"  class="form-control @error('email') is-invalid @enderror" name="email" id="email">
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
                              <li class="breadcrumb-item active" aria-current="page">@lang('Datos Seguridad Social')</li>
                            </ol>
                          </nav>
                    </div>   
                    
                    {{-- <div class="col-sm-12 col-md-3 col-lg-3">
                        <div class="form-group">
                            <label for="arl">ARL</label>
                            <select name="arl" class="form-control @error('arl') is-invalid @enderror" id="arl">
                                <option value="">@lang('--Seleccione una opción--')</option>
                                <option value="Sura">ARP SURA</option>  
                                <option value="Bolivar">CIA DE SEGUROS BOLIVAR SA</option> 
                                <option value="Aurora">COMPAÑIA DE SEGUROS DE VIDA AURORA</option> 
                                <option value="Equidad">LA EQUIDAD SEGUROS DE VIDA ORGANISMO COOPERATIVO LA EQUIDAD VIDA</option>
                                <option value="Liberty">LIBERTY SEGUROS DE VIDA</option> 
                                <option value="Mapfre">MAPFRE COLOMBIA VIDA SEGUROS SA</option>
                                <option value="Positiva">POSITIVA COMPAÑIA DE SEGURO</option>  
                                <option value="Colmena">RIESGOS PROFESIONALES COLMENA SA COMPAÑIA DE SEGUROS DE VIDA</option>  
                                <option value="Alfa">SEGUROS DE VIDA ALFA SA</option>                                                                             
                                <option value="Colpatría">SEGUROS DE VIDA COLPATRIA SA</option>                                                                                                                                                                                                                                                                                                         
                            </select>
                            @error('arl')
                                <div class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror                                                       
                        </div>
                    </div> --}}
                    <div class="col-sm-12 col-md-3 col-lg-3">
                        <div class="form-group">
                            <label for="arl">@lang('ARL')</label>
                            <select name="arl" class="form-control @error('eps') is-invalid @enderror" name="arl" id="arl">
                                <option>@lang('--Seleccione una opción--')</option>
                                @foreach ($arls as $arl)
                                    <option value="{{$arl->id}}">{{$arl->nomArl}}</option>
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
                                <option>@lang('--Seleccione una opción--')</option>
                                @foreach ($epss as $eps)
                                    <option value="{{$eps->id}}">{{$eps->nomEps}}</option>
                                @endforeach                         
                            </select>
                            @error('eps')
                                <div class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror                                                       
                        </div>
                    </div>                                        
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
                            <input type="date"  class="form-control @error('fechaIng') is-invalid @enderror" name="fechaIng" id="fechaIng">
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
                            <select name="cargo" class="form-control @error('cargo') is-invalid @enderror" name="cargo" id="cargo">
                                <option>@lang('--Seleccione una opción--')</option>
                                @foreach ($cargos as $cargo)
                                    <option value="{{$cargo->id}}">{{$cargo->nomCar}}</option> 
                                @endforeach                                                                                          
                            </select>
                            @error('cargo')
                                <div class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror                                                       
                        </div>
                    </div> 
                    <div class="col-sm-12 col-md-3 col-lg-3">
                        <div class="form-group">
                            <label for="estado">@lang('Estado')</label>
                            <input type="estado" readonly class="form-control @error('estado') is-invalid @enderror" name="estado" id="estado" value="Activo" aria-describedby="helpEstado">
                                <small id="helpEstado" class="form-text text-muted">
                                    @lang('Por defecto el estado es Activo al crear un empleado.')
                                </small>
                            @error('estado')
                                <div class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>
                
                <div class="col-12">
                    <button type="submit" class="btn btn-success float-right"><i class="fa fa-save"></i> @lang('Guardar')</button>               
                </div>                
            </form>
        </div>
    </div>
@endsection