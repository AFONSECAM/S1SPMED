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
            <strong>@lang('Editar Procedimiento')</strong>
        </div>
        <div class="card-body">
            @include('flash::message')
            <form action="/empresa/procedimientos/actualizar" method="POST" >
                @csrf
                <input type="hidden" name="id" value="{{$procedimiento->id}}" />
                <div class="row">
                    <div class="col-sm-12 col-md-6 col-lg-6">
                        <div class="form-group">
                            <label for="">@lang('Código')</label>
                        <input type="text" name="codigoProc" class="form-control @error('codigoProc') is-invalid @enderror" value="{{ $procedimiento->codProc}}">
                            @error('codigoProc')
                                <div class="invalid-feedback"></div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-6">
                        <div class="form-group">
                            <label for="">@lang('Nombre')</label>
                            <input type="text" name="nombreProc" class="form-control @error('nombreProc') is-invalid @enderror" value="{{ $procedimiento->nomProc}}">
                            @error('nombreProc')
                                <div class="invalid-feedback"></div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-6">
                        <div class="form-group">
                            <label for="condicionesProc">@lang('Pre-condiciones')</label>
                            <textarea class="form-control @error('codigoProc') is-invalid @enderror" name="condicionesProc"  rows="2">{{$procedimiento->conProc}}</textarea>                         
                            @error('condicionesProc')
                                <div class="invalid-feedback"></div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-3 col-lg-3">
                        <div class="form-group">
                            <label for="">@lang('Valor')</label>
                            <input type="text" name="valorProc" class="form-control @error('valorProc') is-invalid @enderror" value="{{ $procedimiento->valProc}}">
                            @error('valorProc')
                                <div class="invalid-feedback"></div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-3 col-lg-3">
                        <div class="form-group">
                            <label for="">@lang('Estado')</label>
                            <select name="estado" class="form-control">
                            @if ($procedimiento->estado == 1)
                                <option selected value="{{$procedimiento->estado}}">Activo</option>    
                                <option value="0">Inactivo</option>
                            @else
                                <option value="1">Activo</option>    
                                <option selected value="{{$procedimiento->estado}}">Inactivo</option>                                                           
                            @endif                            
                            </select>                            
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-warning float-right"><i class="fa fa-save"></i> @lang('Actualizar')</button>                
                <a href="/empresa/procedimientos"><button type="button" class="btn btn-info float-right">@lang('Cancelar')</button></a>                
            </form>
            
        </div>
    </div>
@endsection