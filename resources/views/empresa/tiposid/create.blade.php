@extends('layouts.app')
@section('contenido')
    <div class="row">
        <div class="col-12">
            <a href="/empresa/tiposid">
                <button type="button" class="btn btn-info text-white float-left">
                    <svg class="c-icon c-icon-lg">
                        <use xlink:href="{{asset('assets/dashboard/vendors/@coreui/icons/svg/free.svg#cil-chevron-circle-left-alt')}}"></use>                    
                    </svg>
                    @lang('Regresar')
                </button>
            </a>                         
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <strong>@lang('Crear Tipo de Identificación')</strong>
        </div>
        <div class="card-body">
            @include('flash::message')
            <form action="/empresa/tiposid/guardar" method="POST">
                @csrf
                <div class="row">
                    <div class="col-sm-12 col-md-6 col-lg-6">
                        <div class="form-group">
                            <label for="">@lang('Tipo Identificación')</label>
                            <input type="text"  class="form-control @error('tipo') is-invalid @enderror" name="tipo" id="tipo">
                            @error('tipo')
                                <div class="invalid-feedback"></div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-6">
                        <div class="form-group">
                            <label for="nombreTipo">@lang('Nombre')</label>
                            <input type="text"  class="form-control @error('nombreTipo') is-invalid @enderror" name="nombreTipo" id="nombreTipo">
                            @error('nombreTipo')
                                <div class="invalid-feedback"></div>
                            @enderror
                        </div>
                    </div>                   
                </div>
                <button type="submit" class="btn btn-success float-right"><i class="fa fa-save"></i> @lang('Guardar')</button>
            </form>            
        </div>
    </div>
@endsection