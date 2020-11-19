@extends('layouts.app');
@section('contenido')
    <div class="row">
        <div class="col-12">
            <a href="/empresa/procedimientos">
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
            <strong>@lang('Crear Procedimiento')</strong>
        </div>
        @include('flash::message')
        <div class="card-body">            
            <form action="/empresa/procedimientos/guardar" method="POST">                
                @csrf
                <div class="row">
                    <div class="col-sm-12 col-md-6 col-lg-6">
                        <div class="form-group">
                            <label for="codigoProc">@lang('Código')</label>
                            <input id="codigoProc" type="text" class="form-control @error('codigoProc') is-invalid @enderror" name="codigoProc" >
                            @error('codigoProc')
                                <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-6">
                        <div class="form-group">
                            <label for="nombreProc">@lang('Nombre')</label>
                            <input id="nombreProc" type="text" name="nombreProc" class="form-control @error('nombreProc') is-invalid @enderror">
                            @error('nombreProc')
                                <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-6">
                        <div class="form-group">
                            <label for="condicionesProc">@lang('Pre-condiciones')</label>
                            <textarea id="condicionesProc" name="condicionesProc" class="form-control @error('condicionesProc') is-invalid @enderror" cols="30" rows="10"></textarea>                            
                            @error('condicionesProc')
                                <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-6">
                        <div class="form-group">
                            <label for="valorProc">@lang('Valor')</label>
                            <input id="valorProc" type="text" class="form-control @error('valorProc') is-invalid @enderror" name="valorProc">
                            @error('valorProc')
                                <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-success float-right">@lang('Guardar')</button>
            </form>
        </div>
    </div>
@endsection