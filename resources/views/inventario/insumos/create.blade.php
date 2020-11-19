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
            <strong>@lang('Crear Insumo')</strong>
        </div>
        <div class="card-body">
            @include('flash::message')
            <form action="/inventario/insumos/guardar" method="POST">
                @csrf
                <div class="row">
                    <div class="col-sm-12 col-md-2 col-lg-2">
                        <div class="form-group">
                            <label for="">@lang('Código')</label>
                            <input type="text"  class="form-control @error('codigo') is-invalid @enderror" name="codigo" id="codigo" autofocus>
                            @error('codigo')
                                <div class="invalid-feedback"></div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-3 col-lg-3">
                        <div class="form-group">
                            <label for="">@lang('Nombre')</label>
                            <input type="text"  class="form-control" name="nombre">
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-3 col-lg-3">
                        <div class="form-group">
                            <label for="">@lang('Laboratorio')</label>
                            <input type="text"  class="form-control" name="laboratorio">
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-2 col-lg-2">
                        <div class="form-group">
                            <label for="">@lang('Concentración')</label>
                            <input type="text"  class="form-control" name="concentracion">
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-2 col-lg-2">
                        <div class="form-group">
                            <label for="">@lang('Presentación')</label>
                            <input type="text"  class="form-control" name="presentacion">
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-2 col-lg-2">
                        <div class="form-group">
                            <label for="">@lang('Unidad')</label>
                            <input type="text"  class="form-control" name="unidad">
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-3 col-lg-3">
                        <label for="">@lang('Precio')</label>
                        <div class="form-group">
                            <div class="input-group mb-2">                                
                                <div class="input-group-prepend">
                                  <div class="input-group-text">$</div>
                                </div>
                                <input type="text"  class="form-control" name="precio">
                            </div>                                                        
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-3 col-lg-3">
                        <div class="form-group">
                            <label for="">@lang('Fecha Vencimiento')</label>
                            <input type="date"  class="form-control" name="fecha">
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-4 col-lg-4">
                        <div class="form-group">
                            <label for="categoria">@lang('Categoría')</label>
                            <select name="categoria" class="form-control @error('categoría') is-invalid @enderror" name="categoria" id="categoria">
                                <option> -- Seleccione una categoría --</option>
                                @foreach ($categorias as $categoria)
                                    <option value="{{$categoria->nomCate}}">{{$categoria->nomCate}}</option> 
                                @endforeach                                                                                          
                            </select>
                            @error('categoria')
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