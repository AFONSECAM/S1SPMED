@extends("layouts.app")
@section("contenido")
    <div class="row">
        <div class="col-12">
            <a href="/empresa/pacientes">
                <button type="button" class="btn btn-info text-white float-left">
                    <svg class="c-icon c-icon-lg">
                        <use xlink:href="{{asset('assets/dashboard/vendors/@coreui/icons/svg/free.svg#cil-chevron-circle-left-alt')}}"></use>                    
                    </svg>
                    Regresar
                </button>
            </a>                         
        </div>
    </div>
    <hr>
    <div class="card">
        <div class="card-header">
            <strong>Crear Paciente</strong>
        </div>
        <div class="card-body">
            @include('flash::message')
            <form action="/empresa/pacientes/guardar" method="POST">
                @csrf
                <div class="row">
                    <div class="col-12">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                              <li class="breadcrumb-item active" aria-current="page">Datos Personales</li>
                            </ol>
                          </nav>
                    </div> 
                    
                    <div class="col-sm-12 col-md-3 col-lg-3">                        
                        <div class="form-group">
                            <label for="primerNom">Primer Nombre</label>
                            <input type="text"  class="form-control @error('primerNom') is-invalid @enderror" name="primerNom" id="primerNom">
                            @error('primerNom')
                                <div class="invalid-feedback"></div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-3 col-lg-3">
                        <div class="form-group">
                            <label for="segundoNom">Segundo Nombre</label>
                            <input type="text"  class="form-control @error('segundoNom') is-invalid @enderror" name="segundoNom" id="segundoNom">
                            @error('segundoNom')
                                <div class="invalid-feedback"></div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-3 col-lg-3">
                        <div class="form-group">
                            <label for="primerApe">Primer Apellido</label>
                            <input type="text"  class="form-control @error('primerApe') is-invalid @enderror" name="primerApe" id="primerApe">
                            @error('primerApe')
                                <div class="invalid-feedback"></div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-3 col-lg-3">
                        <div class="form-group">
                            <label for="segundoApe">Segundo Apellido</label>
                            <input type="text"  class="form-control @error('segundoApe') is-invalid @enderror" name="segundoApe" id="segundoApe">
                            @error('segundoApe')
                                <div class="invalid-feedback"></div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-3 col-lg-3">
                        <div class="form-group">
                            <label for="tipoId">Tipo Identificación</label>
                            <select name="tipoId" class="form-control @error('tipoId') is-invalid @enderror" name="tipoId" id="tipoId">
                                <option>--Seleccione una opción--</option>     
                                @foreach ($tiposId as $tipoId)
                                    <option value="{{$tipoId->id}}">{{$tipoId->nomTipo}}</option>
                                @endforeach                                                                                                                
                            </select>
                            @error('tipoId')
                                <div class="invalid-feedback"></div>
                            @enderror                                                       
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-3 col-lg-3">
                        <div class="form-group">
                            <label for="numeroId">Número Identificación</label>
                            <input type="text"  class="form-control @error('numeroId') is-invalid @enderror" name="numeroId" id="numeroId">
                            @error('numeroId')
                                <div class="invalid-feedback"></div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-3 col-lg-3">
                        <div class="form-group">
                            <label for="fechaNac">Fecha Nacimiento</label>
                            <input type="date"  class="form-control @error('fechaNac') is-invalid @enderror" name="fechaNac" id="fechaNac">
                            @error('fechaNac')
                                <div class="invalid-feedback"></div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-3 col-lg-3">  
                        <div>
                            <span>Género</span>
                        </div>                    
                        <div class="form-check form-check-inline">                                
                            <input type="checkbox" class="form-check-input" id="chkGeneroM" name="chkGenero" value="M">
                            <label class="form-check-label" for="exampleCheck1">Masculino</label>
                        </div>
                        <div class="form-check form-check-inline">                                
                            <input type="checkbox" class="form-check-input" id="chkGeneroF" name="chkGenero" value="F">
                            <label class="form-check-label" for="exampleCheck1">Femenino</label>
                        </div>                                                    
                        <div class="form-check form-check-inline">                                
                            <input type="checkbox" class="form-check-input" id="chkGeneroI" name="chkGenero" value="I">
                            <label class="form-check-label" for="exampleCheck1">Indefinido</label>
                        </div>                                                    
                    </div>
                    <div class="col-sm-12 col-md-3 col-lg-3">
                        <div class="form-group">
                            <label for="rh">RH</label>
                            <input type="text"  class="form-control @error('rh') is-invalid @enderror" name="rh" id="rh">
                            @error('rh')
                                <div class="invalid-feedback"></div>
                            @enderror
                        </div>
                    </div> 
                    <div class="col-sm-12 col-md-3 col-lg-3">
                        <div class="form-group">
                            <label for="estadoCivil">Estado Civíl</label>
                            <select name="estadoCivil" class="form-control @error('estadoCivil') is-invalid @enderror" name="estadoCivil" id="estadoCivil">
                                <option>--Seleccione una opción--</option>
                                <option value="C">Casado</option>  
                                <option value="S">Soltero</option>
                                <option value="U">Unión Libre</option>                            
                                <option value="V">Viudo</option>                                                          
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
                              <li class="breadcrumb-item active" aria-current="page">Datos Contacto</li>
                            </ol>
                          </nav>
                    </div>   
                    
                    <div class="col-sm-12 col-md-3 col-lg-3">
                        <div class="form-group">
                            <label for="ciudad">Ciudad Residencia</label>
                            <input type="text"  class="form-control @error('ciudad') is-invalid @enderror" name="ciudad" id="ciudad">
                            @error('ciudad')
                                <div class="invalid-feedback"></div>
                            @enderror
                        </div>
                    </div> 
                    <div class="col-sm-12 col-md-3 col-lg-3">
                        <div class="form-group">
                            <label for="direccion">Dirección Residencia</label>
                            <input type="text"  class="form-control @error('ciudirecciondad') is-invalid @enderror" name="direccion" id="direccion">
                            @error('direccion')
                                <div class="invalid-feedback"></div>
                            @enderror
                        </div>
                    </div> 
                    <div class="col-sm-12 col-md-3 col-lg-3">
                        <div class="form-group">
                            <label for="telefono">Teléfono</label>
                            <input type="text"  class="form-control @error('telefono') is-invalid @enderror" name="telefono" id="telefono">
                            @error('telefono')
                                <div class="invalid-feedback"></div>
                            @enderror
                        </div>
                    </div> 
                    <div class="col-sm-12 col-md-3 col-lg-3">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email"  class="form-control @error('email') is-invalid @enderror" name="email" id="email">
                            @error('email')
                                <div class="invalid-feedback"></div>
                            @enderror
                        </div>
                    </div> 

                    {{-- Datos de EPS --}}                  
                    <div class="col-12">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                              <li class="breadcrumb-item active" aria-current="page">Datos EPS</li>
                            </ol>
                          </nav>
                    </div>   
                    
                    <div class="col-sm-12 col-md-3 col-lg-3">
                        <div class="form-group">
                            <label for="regimen">Régimen</label>
                            <select name="regimen" class="form-control @error('regimen') is-invalid @enderror" id="regimen">
                                <option value="">-- Seleccione una opción --</option>
                                <option value="C">Contributivo</option>
                                <option value="S">Subsidiado</option>                                                                                     
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
                                <option>-- Seleccione una opción --</option>
                                @foreach ($epss as $eps)
                                    <option value="{{$eps->id}}">{{$eps->nomEps}}</option>
                                @endforeach                         
                            </select>
                            @error('eps')
                                <div class="invalid-feedback"></div>
                            @enderror                                                       
                        </div>
                    </div>                    
                    {{-- <div class="col-sm-12 col-md-3 col-lg-3">
                        <div class="form-group">
                            <label for="estado">Estado</label>
                            <input type="estado" readonly class="form-control @error('estado') is-invalid @enderror" name="estado" id="estado" value="Activo" aria-describedby="helpEstado">
                            <small id="helpEstado" class="form-text text-muted">
                                Por defecto el estado es Activo al crear un paciente.
                              </small
                            @error('estado')
                                <div class="invalid-feedback"></div>
                            @enderror
                        </div>
                    </div> --}} 
                </div> 
                <div class="col-12">
                    <button type="submit" class="btn btn-success float-right"><i class="fa fa-save"></i> Guardar</button>               
                </div>                
            </form>
        </div>
    </div>
@endsection