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
            <strong>@lang('Crear Sede')</strong>
        </div>
        <div class="card-body">
            @include('flash::message')
            <form action="/empresa/sedes/guardar" method="POST">
                @csrf
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="">@lang('Nombre')</label>
                            <input type="text"  class="form-control @error('nombreSede') is-invalid @enderror" name="nombreSede" id="">
                            @error('nombreSede')
                                <div class="invalid-feedback"></div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="">@lang('Dirección')</label>
                            <input type="text"  class="form-control" name="direccionSede">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="">@lang('Teléfono')</label>
                            <input type="text"  class="form-control" name="telefonoSede">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="">@lang('Estado')</label>
                            <input type="text"  class="form-control" readonly value="Activo" name="estado">
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-success float-right">@lang('Guardar')</button>
            </form>            
        </div>
    </div>
@endsection