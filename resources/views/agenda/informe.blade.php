@extends('layouts.app')

@section('contenido')
@include('flash::message')
    <form action="/agenda/generar/informe" method="POST">
    @csrf
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="">@lang('Fecha Inicial')</label>
                        <input type="date" name="txtFechaInicial" class="form-control">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="">@lang('Fecha Final')</label>
                        <input type="date" name="txtFechaFinal" class="form-control">
                    </div>
                </div>
                <div class="col-lg-6">
                    <button name="pdf" type="submit" class="btn btn-danger float-right" value="pdf">@lang('Generar') PDF</button>
                </div>
                <div class="col-lg-6">
                    <button name="excel" type="submit" class="btn btn-success float-left" value="excel">@lang('Generar') Excel</button>
                </div>
            </div>
        </div>
    </div>    
    </form>                
@endsection