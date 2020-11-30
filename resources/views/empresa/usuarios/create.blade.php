@extends('layouts.app')
@section('contenido')
<div class="row">
    <div class="col-12">
        <a href="/empresa/usuarios">
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
<div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card mx-4">
          <div class="card-body p-4 text-center">
              <img src="{{ asset('assets/landing/assets/img/logo2.png')}}" alt="" class="img-responsive" width="200px">
            <p class="text-muted">Crear cuenta</p>
            <form action="/empresa/usuarios/guardar" method="POST" id="form">
              @csrf

                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Empleado') }}</label>
                    <div class="col-md-6">               
                        <select id="empleado" class="form-control @error('name') is-invalid @enderror" name="empleado" required autocomplete="name" autofocus>
                            <option value="">Seleccione Empleado</option>    
                            @foreach ($empleados as $empleado)                                                        
                                <option value="{{$empleado->id}}">
                                    {{$empleado->pNom}} {{$empleado->pApe}}
                                </option>                                
                            @endforeach
                        </select>
                      @error('name')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                    </div>
                </div>              
                <div class="form-group row">
                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}</label>

                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="" required autocomplete="email">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                  </div>
                </div>

                <div class="form-group row">
                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                    <div class="col-md-6">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>                

                <div class="form-group row">
                    <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirmar Password') }}</label>

                    <div class="col-md-6">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                    </div>
                </div>  
              
                <div class="form-group row">
                    <label for="rol" class="col-md-4 col-form-label text-md-right">{{ __('Rol') }}</label>
                    <div class="col-md-6">
                        <select name="rol" class="form-control @error('rol') is-invalid @enderror" name="rol" id="rol">
                            <option>Seleccione cargo</option>
                            @foreach ($roles as $rol)
                                <option value="{{$rol->id}}">{{$rol->nomRol}}</option> 
                            @endforeach                                                                                          
                        </select>
                        @error('rol')
                            <div class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror 
                    </div>                    
                </div>
            </div>

              <div class="form-group row mb-0">
                  <div class="col-md-6 offset-md-4">
                      <button type="submit" class="btn btn-primary">
                          {{ __('Register') }}
                      </button>
                  </div>
              </div>
              <input type="hidden" name="name" id="name" value="">
          </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
@section('scripts')
    <script>        
        $('#nIdEmp').change(function(){
            var empleados = document.getElementById("empleado");
            document.getElementById("name").value = empleados.options[empleados.selectedIndex].text;                                                  
        });
    </script>
@endsection