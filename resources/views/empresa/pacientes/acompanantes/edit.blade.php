@extends("layouts.app")
@section("contenido")
    <div class="row">
        <div class="col-12">
            <a href="/empresa/pacientes/acompanantes">
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
            <strong>Editar Acompañante</strong>
        </div>
        <div class="card-body">
            @include('flash::message')
            <form action="/empresa/pacientes/acompanantes/actualizar" method="POST">
                @csrf
                <input type="hidden" name="id" value="{{$acompanante->id}}"/>
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
                            <input type="text"  class="form-control @error('primerNom') is-invalid @enderror" name="primerNom" id="primerNom" value="{{ $acompanante->pNom}}">
                            @error('primerNom')
                                <div class="invalid-feedback"></div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-3 col-lg-3">
                        <div class="form-group">
                            <label for="segundoNom">Segundo Nombre</label>
                            <input type="text"  class="form-control @error('segundoNom') is-invalid @enderror" name="segundoNom" id="segundoNom" value="{{ $acompanante->sNom}}">
                            @error('segundoNom')
                                <div class="invalid-feedback"></div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-3 col-lg-3">
                        <div class="form-group">
                            <label for="primerApe">Primer Apellido</label>
                            <input type="text"  class="form-control @error('primerApe') is-invalid @enderror" name="primerApe" id="primerApe" value="{{ $acompanante->pApe}}">
                            @error('primerApe')
                                <div class="invalid-feedback"></div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-3 col-lg-3">
                        <div class="form-group">
                            <label for="segundoApe">Segundo Apellido</label>
                            <input type="text"  class="form-control @error('segundoApe') is-invalid @enderror" name="segundoApe" id="segundoApe" value="{{ $acompanante->sApe}}">
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
                                        @if ($tipo->id == $acompanante->tipoId_id)    
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
                            <label for="numeroId">Número Identificación</label>
                            <input type="text"  class="form-control @error('numeroId') is-invalid @enderror" name="numeroId" id="numeroId" value="{{ $acompanante->nIdAcom}}">
                            @error('numeroId')
                                <div class="invalid-feedback"></div>
                            @enderror
                        </div>
                    </div>                    
                    <div class="col-sm-12 col-md-3 col-lg-3">  
                        <div class="form-group">
                            <label for="edad">Edad</label>
                            <input type="number"  class="form-control @error('edad') is-invalid @enderror" name="edad" id="edad" value="{{ $acompanante->edad}}">
                            @error('edad')
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
                            <label for="telefono">Teléfono</label>
                            <input type="text"  class="form-control @error('telefono') is-invalid @enderror" name="telefono" id="telefono" value="{{ $acompanante->telAcom}}"> 
                            @error('telefono')
                                <div class="invalid-feedback"></div>
                            @enderror
                        </div>
                    </div> 
                    <div class="col-sm-12 col-md-3 col-lg-3">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email"  class="form-control @error('email') is-invalid @enderror" name="email" id="email" value="{{ $acompanante->mailAcom}}">
                            @error('email')
                                <div class="invalid-feedback"></div>
                            @enderror
                        </div>
                    </div> 

                    {{-- Datos con paciente --}}                  
                    <div class="col-12">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                              <li class="breadcrumb-item active" aria-current="page">Datos Paciente</li>
                            </ol>
                          </nav>
                    </div>   
                    
                    <div class="col-sm-12 col-md-3 col-lg-3">
                        <div class="form-group">
                            <label for="parentesco">Parentesco</label>
                            <input type="parentesco"  class="form-control @error('parentesco') is-invalid @enderror" name="parentesco" id="parentesco" value="{{ $acompanante->parPac}}">
                            @error('parentesco')
                                <div class="invalid-feedback"></div>
                            @enderror
                        </div>
                    </div>                     
                </div> 
                <div class="col-12">
                    <button type="submit" class="btn btn-success float-right"><i class="fa fa-save"></i> Guardar</button>               
                </div>                
            </form>
        </div>
    </div>
@endsection