@extends('layouts.app')
@section('contenido')
    <div class="row">
        <div class="col-12">
            <a href="/inventario/insumos">
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
            <strong>@lang('Editar Insumo')</strong>
        </div>
        <div class="card-body">
            @include('flash::message')
            <form action="/inventario/insumos/actualizar" method="POST">
                @csrf
                <input type="hidden" name="id" value="{{$insumo->id}}" />
                <div class="row">
                    <div class="col-sm-12 col-md-3 col-lg-3">
                        <div class="form-group">
                            <label for="">@lang('Código')</label>
                            <input type="text"  class="form-control @error('codigo') is-invalid @enderror" name="codigo" id="codigo" value="{{$insumo->codIns}}">
                            @error('codigo')
                                <div class="invalid-feedback"></div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-3 col-lg-3">
                        <div class="form-group">
                            <label for="">@lang('Nombre')</label>
                            <input type="text"  class="form-control" name="nombre" value="{{$insumo->nomIns}}">
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-3 col-lg-3">
                        <div class="form-group">
                            <label for="">@lang('Laboratorio')</label>
                            <input type="text"  class="form-control" name="laboratorio" value="{{$insumo->labora}}">
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-3 col-lg-3">
                        <div class="form-group">
                            <label for="">@lang('Concentración')</label>
                            <input type="text"  class="form-control" name="concentracion" value="{{$insumo->concen}}"> 
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-3 col-lg-3">
                        <div class="form-group">
                            <label for="">@lang('Presentación')</label>
                            <input type="text"  class="form-control" name="presentacion" value="{{$insumo->pres}}">
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-3 col-lg-3">
                        <div class="form-group">
                            <label for="">@lang('Unidad')</label>
                            <input type="text"  class="form-control" name="unidad" value="{{$insumo->unid}}">
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-3 col-lg-3">
                        <div class="form-group">
                            <label for="">@lang('Precio')</label>
                            <span class="input-group-addon">$</span>
                            <input type="text"  class="form-control" name="precio" value="{{$insumo->precioU}}">
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-3 col-lg-3">
                        <div class="form-group">
                            <label for="">@lang('Fecha Vencimiento')</label>
                            <input type="date"  class="form-control" name="fecha" value="{{$insumo->fecVen}}">
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-3 col-lg-3">
                        <div class="form-group">
                            <label for="tipoId">@lang('Categoría')</label>
                            <select name="categoria" class="form-control @error('categoria') is-invalid @enderror" name="categoria" id="categoria">                                                                                            
                                @foreach ($categorias as $categoria)
                                    <option value="{{$categoria->nomCate}}" 
                                        @if ($categoria->nomCate == $insumo->nomCate)    
                                        selected>{{$categoria->nomCate}}</option>                                                                           
                                    @else
                                    >{{$categoria->nomCate}}</option>
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
                </div>
                <button type="submit" class="btn btn-success float-right">
                    <svg class="c-icon c-icon-lg">
                        <use xlink:href="{{asset('assets/dashboard/vendors/@coreui/icons/svg/free.svg#cil-save')}}"></use>                    
                    </svg>
                    @lang('Guardar')
                </button>                          
            </form>            
        </div>
    </div>
@endsection