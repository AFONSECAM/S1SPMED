@extends('layouts.app');
@section('contenido')
    <div class="row">
        <div class="col-12">
            <a href="/empresa/tesoreria/gastos">
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
            <strong>Editar Gasto</strong>
        </div>
        @include('flash::message')
        <div class="card-body">            
            <form action="/empresa/tesoreria/gastos/actualizar" method="POST">                
                @csrf
                <input type="hidden" name="id" value="{{$gasto->id}}" />
                <div class="row">                    
                    <div class="col-sm-12 col-md-4 col-lg-4">
                        <div class="form-group">
                            <label for="fechaGas">Fecha Gasto</label>
                            <input id="fechaGas" type="date" name="fechaGas" class="form-control @error('fechaGas') is-invalid @enderror" value="{{ $gasto->fecGasto->format('Y-m-d')}}" readonly>
                            @error('fechaGas')
                                <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-4 col-lg-4">
                        <div class="form-group">
                            <label for="formaPago">Medio Pago</label>
                            <input id="formaPago" type="text" name="formaPago" class="form-control @error('formaPago') is-invalid @enderror" value="{{$gasto->forPago}}" readonly>
                            @error('formaPago')
                                <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-4 col-lg-4">
                        <label for="valorGas">@lang('Valor')</label>
                        <div class="form-group">
                            <div class="input-group mb-2">                                
                                <div class="input-group-prepend">
                                  <div class="input-group-text">$</div>
                                </div>
                            <input type="text"  class="form-control @error('valorGas') is-invalid @enderror" name="valorGas" value="{{number_format($gasto->valor,0)}}">
                                @error('valorGas')
                                <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                            </div>                                                        
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-4 col-lg-4">
                        <div class="form-group">
                            <label for="conceptoGas">Concepto(de qué se recibió)</label>
                            <textarea id="conceptoGas" name="conceptoGas" class="form-control @error('conceptoGas') is-invalid @enderror" cols="30" rows="10">{{$gasto->concepto}}</textarea>                            
                            @error('conceptoGas')
                                <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-4 col-lg-4">
                        <div class="form-group">
                            <label for="">@lang('Empleado')</label>
                            <select name="empleado" class="form-control @error('empleado') is-invalid @enderror" name="empleado" id="empleado">                            
                                @foreach ($empleados as $empleado)
                                    <option value="{{$empleado->id}}" 
                                        @if ($empleado->id == $gasto->empleado_id)    
                                        selected>{{$empleado->pNom}} {{$empleado->pApe}}</option>                                                                           
                                    @else
                                    >{{$empleado->pNom}} {{$empleado->pApe}}</option>
                                    @endif
                                @endforeach                                                 
                            </select>
                            @error('empleado')
                                <div class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror                                                       
                        </div>
                    </div>
                    
                </div>
                <button type="submit" class="btn btn-warning float-right"><i class="fa fa-save"></i> Modificar</button>                
                <a href="/empresa/tesoreria/gastos"><button type="button" class="btn btn-info float-right">Cancelar</button></a>  
            </form>
        </div>
    </div>
@endsection