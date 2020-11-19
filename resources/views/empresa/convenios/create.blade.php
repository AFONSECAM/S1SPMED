@extends('layouts.app')
@section('contenido')
    <div class="row">
        <div class="col-12">
            <a href="/empresa/convenios">
                <button type="button" class="btn btn-sm btn-info text-white float-left">
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
            <strong>@lang('Crear Convenio')</strong>
        </div>
        <div class="card-body">
            @include('flash::message')
            <form action="/empresa/convenios/guardar" method="POST">
                @csrf
                <div class="row">
                    <div class="col-sm-12 col-md-4 col-lg-4">
                        <div class="form-group">
                            <label for="">@lang('Fecha Apertura')</label>
                            <input type="date"  class="form-control" name="fechaConv">
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-4 col-lg-4">
                        <div class="form-group">
                            <label for="eps_id">IPS</label>
                            <select name="eps_id" class="form-control @error('eps_id') is-invalid @enderror" name="eps_id" id="eps_id">
                                <option value="">--Seleccione una opción--</option>     
                                @foreach ($eps as $epsId)
                                    <option value="{{$epsId->id}}">{{$epsId->nomEps}}</option>
                                @endforeach                                                                                                                
                            </select>
                            @error('eps_id')
                                <div class="invalid-feedback"></div>
                            @enderror                                                       
                        </div>
                    </div>
            
                    <div class="col-sm-12 col-md-4 col-lg-4">
                        <div class="form-group">
                            <label for="">@lang('Nombre')</label>
                            <input type="text"  class="form-control @error('nombreConv') is-invalid @enderror" name="nombreConv" id="">
                            @error('nombreConv')
                                <div class="invalid-feedback"></div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-4 col-lg-4">
                        <div class="form-group">
                            <label for="">@lang('Resolución')</label>
                            <input type="text"  class="form-control @error('resolucion') is-invalid @enderror" name="resolucion" id="">
                            @error('resolucion')
                                <div class="invalid-feedback"></div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-4 col-lg-4">
                        <div class="form-group">
                            <label for="">@lang('Objeto')</label>
                            <textarea name="objetoConv" class="form-control" cols="20" rows="5"></textarea>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-4 col-lg-4">
                        <div class="form-group">
                            <label for="">@lang('Duración (meses)')</label>
                            <input type="number"  class="form-control @error('duracion') is-invalid @enderror" name="duracion" id="">
                            @error('duracion')
                                <div class="invalid-feedback"></div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-4 col-lg-4">
                        <div class="form-group">
                            <label for="">@lang('Costo')</label>
                            <input type="number"  class="form-control @error('costo') is-invalid @enderror" name="costo" id="">
                            @error('costo')
                                <div class="invalid-feedback"></div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-4 col-lg-4">
                        <div class="form-group">
                            <label for="">@lang('Estado')</label>
                            <input type="text"  class="form-control" readonly value="Activo" name="estado">
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-success float-right"><i class="fa fa-save"></i> @lang('Guardar')</button>
            </form>            
        </div>
    </div>
@endsection