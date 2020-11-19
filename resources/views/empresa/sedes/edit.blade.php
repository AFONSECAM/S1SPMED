@extends('layouts.app')
@section('contenido')
    <div class="row">
        <div class="col-12">
            <a href="/empresa/sedes">
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
            <strong>@lang('Editar Sede')</strong>
        </div>
        <div class="card-body">
            @include('flash::message')
            <form action="/empresa/sedes/actualizar" method="POST">
            @csrf
            <input type="hidden" name="id" value="{{$sede->id}}" />
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="">@lang('Nombre')</label>
                        <input type="text"  class="form-control @error('nombreSede') is-invalid @enderror" name="nombreSede" value="{{$sede->nomSede}}">
                            @error('nombreSede')
                                <div class="invalid-feedback"></div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="">@lang('Dirección')</label>
                            <input type="text"  class="form-control" name="direccionSede" value="{{$sede->dirSede}}">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="">@lang('Teléfono')</label>
                            <input type="text"  class="form-control" name="telefonoSede" value="{{$sede->telSede}}">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="">@lang('Estado')</label>
                            <select name="ddlestado" class="form-control">
                            @if ($sede->estado == 1)
                                <option selected value="{{$sede->estado}}">Activo</option>    
                                <option value="0">Inactivo</option>
                            @else
                                <option value="1">Activo</option>    
                                <option selected value="{{$sede->estado}}">Inactivo</option>                                                           
                            @endif                            
                            </select>                            
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-warning float-right"><b>@lang('Actualizar')</b></button>
            </form>            
        </div>
    </div>
@endsection