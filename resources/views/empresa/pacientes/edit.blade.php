@extends("layouts.app")
@section("contenido")
    <div class="row">
        <div class="col-12">
            <a href="/empresa/pacientes">
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
            <strong>@lang('Editar Paciente')</strong>
        </div>
        <div class="card-body">
            @include('flash::message')
            <form action="/empresa/pacientes/actualizar" method="POST">
                @csrf
                <input type="hidden" name="id" value="{{$paciente->id}}"/>
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
                        <input type="text"  class="form-control @error('primerNom') is-invalid @enderror" name="primerNom" id="primerNom" value="{{ $paciente->pNom}}">
                            @error('primerNom')
                                <div class="invalid-feedback"></div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-3 col-lg-3">
                        <div class="form-group">
                            <label for="segundoNom">@lang('Segundo Nombre')</label>
                            <input type="text"  class="form-control @error('segundoNom') is-invalid @enderror" name="segundoNom" id="segundoNom" value="{{ $paciente->sNom}}">
                            @error('segundoNom')
                                <div class="invalid-feedback"></div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-3 col-lg-3">
                        <div class="form-group">
                            <label for="primerApe">@lang('Primer Apellido')</label>
                            <input type="text"  class="form-control @error('primerApe') is-invalid @enderror" name="primerApe" id="primerApe" value="{{ $paciente->pApe}}">
                            @error('primerApe')
                                <div class="invalid-feedback"></div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-3 col-lg-3">
                        <div class="form-group">
                            <label for="segundoApe">@lang('Segundo Apellido')</label>
                            <input type="text"  class="form-control @error('segundoApe') is-invalid @enderror" name="segundoApe" id="segundoApe" value="{{ $paciente->sApe}}">
                            @error('segundoApe')
                                <div class="invalid-feedback"></div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-3 col-lg-3">
                        <div class="form-group">
                            <label for="tipoId">@lang('Tipo Identificación')</label>
                            <select name="tipoId" class="form-control @error('tipoId') is-invalid @enderror" name="tipoId" id="tipoId">
                                @foreach ($tiposId as $tipo)
                                    <option value="{{$tipo->id}}" 
                                        @if ($tipo->id == $paciente->tipoId_id)    
                                        selected>{{$tipo->nomTipo}}</option>                                                                           
                                    @else
                                    >{{$tipo->nomTipo}}</option>
                                    @endif
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
                            <input type="text"  class="form-control @error('numeroId') is-invalid @enderror" name="numeroId" id="numeroId" value="{{ $paciente->nIdPac}}">
                            @error('numeroId')
                                <div class="invalid-feedback"></div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-3 col-lg-3">
                        <div class="form-group">
                            <label for="fechaNac">@lang('Fecha Nacimiento')</label>
                            <input type="date"  class="form-control @error('fechaNac') is-invalid @enderror" name="fechaNac" id="fechaNac" value="{{ $paciente->fecNac->format('Y-m-d')}}">
                            @error('fechaNac')
                                <div class="invalid-feedback"></div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-3 col-lg-3">
                        <div class="form-group">
                            <label for="genero">@lang('Género')</label>
                            <select name="genero" class="form-control @error('genero') is-invalid @enderror" name="genero" id="genero">
                                @if($paciente->genero == "I")
                                    <option value="{{$paciente->genero}}" selected>Indefinido</option>                                                                                                               
                                    <option value="F">Femenino</option>
                                    <option value="M">Masculino</option>
                                @elseif($paciente->genero == "F")
                                    <option value="{{$paciente->genero}}" selected>Femenino</option>                                                                                                               
                                    <option value="I">Indefinido</option>
                                    <option value="M">Masculino</option>
                                @else
                                    <option value="{{$paciente->genero}}" selected>Masculino</option>                                                                                                               
                                    <option value="I">Indefinido</option>
                                    <option value="I">Femenino</option>
                                @endif                                                                                                                         
                            </select>                                                                                     
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-3 col-lg-3">
                        <div class="form-group">
                            <label for="rh">RH</label>
                            <input type="text"  class="form-control @error('rh') is-invalid @enderror" name="rh" id="rh" value="{{ $paciente->rh}}">
                            @error('rh')
                                <div class="invalid-feedback"></div>
                            @enderror
                        </div>
                    </div> 
                    <div class="col-sm-12 col-md-3 col-lg-3">
                        <div class="form-group">
                            <label for="estadoCivil">@lang('Estado Civíl')</label>
                            <select name="estadoCivil" class="form-control @error('estadoCivil') is-invalid @enderror" name="estadoCivil" id="estadoCivil">
                                @if($paciente->eCivil == "C")
                                    <option value="{{$paciente->eCivil}}" selected>Casado</option>                                                                                                               
                                    <option value="S">Soltero</option>
                                    <option value="U">Unión Libre</option>
                                    <option value="V">Viudo</option>
                                @elseif($paciente->genero == "S")
                                    <option value="{{$paciente->eCivil}}" selected>Soltero</option>                                                                                                               
                                    <option value="C">Casado</option>
                                    <option value="U">Unión Libre</option>
                                    <option value="V">Viudo</option>
                                @elseif($paciente->genero == "U")
                                    <option value="{{$paciente->eCivil}}" selected>Unión Libre</option>                                                                                                               
                                    <option value="C">Casado</option>
                                    <option value="S">Soltero</option>
                                    <option value="V">Viudo</option>
                                @else
                                    <option value="{{$paciente->eCivil}}" selected>Viudo</option>                                                                                                               
                                    <option value="C">Casado</option>
                                    <option value="S">Soltero</option>
                                    <option value="U">Unión Libre</option>
                                @endif                                                         
                            </select>
                            @error('estadoCivil')
                                <div class="invalid-feedback"></div>
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
                            <input type="text"  class="form-control @error('ciudad') is-invalid @enderror" name="ciudad" id="ciudad" value="{{ $paciente->ciuRes}}">
                            @error('ciudad')
                                <div class="invalid-feedback"></div>
                            @enderror
                        </div>
                    </div> 
                    <div class="col-sm-12 col-md-3 col-lg-3">
                        <div class="form-group">
                            <label for="direccion">@lang('Dirección')</label>
                            <input type="text"  class="form-control @error('ciudirecciondad') is-invalid @enderror" name="direccion" id="direccion" value="{{ $paciente->dirRes}}">
                            @error('direccion')
                                <div class="invalid-feedback"></div>
                            @enderror
                        </div>
                    </div> 
                    <div class="col-sm-12 col-md-3 col-lg-3">
                        <div class="form-group">
                            <label for="telefono">@lang('Teléfono')</label>
                            <input type="text"  class="form-control @error('telefono') is-invalid @enderror" name="telefono" id="telefono" value="{{ $paciente->telPac}}">
                            @error('telefono')
                                <div class="invalid-feedback"></div>
                            @enderror
                        </div>
                    </div> 
                    <div class="col-sm-12 col-md-3 col-lg-3">
                        <div class="form-group">
                            <label for="email">@lang('Correo')</label>
                            <input type="email"  class="form-control @error('email') is-invalid @enderror" name="email" id="email" value="{{ $paciente->mailPac}}">
                            @error('email')
                                <div class="invalid-feedback"></div>
                            @enderror
                        </div>
                    </div> 

                    {{-- Datos de EPS --}}                  
                    <div class="col-12">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                              <li class="breadcrumb-item font-weight-bold" aria-current="page">@lang('Datos EPS')</li>
                            </ol>
                          </nav>
                    </div>   
                    
                    <div class="col-sm-12 col-md-3 col-lg-3">
                        <div class="form-group">
                            <label for="regimen">@lang('Régimen')</label>
                            <select name="regimen" class="form-control @error('regimen') is-invalid @enderror" id="regimen">
                                @if($paciente->regimen == "C")
                                    <option value="{{$paciente->regimen}}" selected>Contributivo</option>
                                    <option value="S">Subsidiado</option>
                                @else
                                    <option value="{{$paciente->regimen}}" selected>Subsidiado</option>
                                    <option value="C">Contributivo</option>
                                @endif                                                                                    
                            </select>
                            @error('regimen')
                                <div class="invalid-feedback"></div>
                            @enderror                                                       
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-3 col-lg-3">
                        <div class="form-group">
                            <label for="eps">EPS</label>
                            <select name="eps" class="form-control @error('eps') is-invalid @enderror" name="eps" id="eps">                            
                                @foreach ($epss as $eps)
                                    <option value="{{$eps->id}}" 
                                        @if ($eps->nomEps == $paciente->eps_id)    
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
                    {{-- <div class="col-sm-12 col-md-3 col-lg-3">
                        <div class="form-group">
                            <label for="estado">@lang('Estado')</label>
                            <select class="form-control @error('estado') is-invalid @enderror" name="estado" id="estado" aria-describedby="helpEstado">
                                @if($paciente->estado == "Activo")
                                    <option selected value="{{ $paciente->estado}}">Activo</option>
                                    <option value="0">Inactivo</option>
                                @else
                                <option selected value="{{$paciente->estado}}">Inactivo</option>
                                <option value="1">Activo</option>
                                @endif
                            </select>                                                                              
                            @error('estado')
                                <div class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                        </div>
                    </div>  --}}
                </div> 
                <div class="col-12">
                    <button type="submit" class="btn btn-success float-right"><i class="fa fa-save"></i> @lang('Guardar')</button>               
                </div>                
            </form>
        </div>
    </div>
@endsection