@extends('layouts.app')
@section('contenido')
    <div class="row">
        <div class="col-12">
            <a href="/inventario">
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
            <strong>@lang('Crear Categoría')</strong>
        </div>
        <div class="card-body">
            @include('flash::message')
            <form action="/inventario/categorias/guardar" method="POST">
                @csrf
                <div class="row">
                    <div class="col-sm-12 col-md-6 col-lg-6">
                        <div class="form-group">
                            <label for="">@lang('Nombre')</label>
                            <input type="text"  class="form-control @error('nombre') is-invalid @enderror" name="nombre" id="">
                            @error('nombre')
                                <div class="invalid-feedback"></div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-6">
                        <div class="form-group">
                            <label for="tipoCate">Tipo</label>
                            <select name="tipoCate" class="form-control @error('tipoCate') is-invalid @enderror" name="tipoCate" id="tipoCate">
                                <option>--Seleccione una opción--</option>
                                <option value="0">Insumos</option>
                                <option value="1">Medicamentos</option>                                                            
                            </select>
                            @error('tipoCate')
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