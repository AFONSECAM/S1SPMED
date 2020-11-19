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
            
            <a href="/inventario/insumos/crear">
                <button type="button" class="btn btn-success text-white float-right">
                    @lang('Nuevo')
                    <svg class="c-icon c-icon-lg">
                        <use xlink:href="{{asset('assets/dashboard/vendors/@coreui/icons/svg/free.svg#cil-library-add')}}"></use>                    
                    </svg>                    
                </button>
            </a>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-12">
            <a href="#" class="btn btn-sm btn-primary float-right" data-toggle="modal" data-target="#import" title="Carga masiva de datos">
                <svg class="c-icon c-icon-lg">
                    <use xlink:href="{{asset('assets/dashboard/vendors/@coreui/icons/svg/free.svg#cil-paperclip')}}"></use>                    
                </svg>
            </a>             
        </div>
    </div>

    
    <div class="card">
        <div class="card-header"> 
            <form action="/inventario/insumos/exportar" method="POST">
                @csrf
                <button name="pdf" type="submit" class="btn btn-sm btn-danger float-right" value="pdf">
                    PDF
                </button>                                
                <button name="excel" type="submit" class="btn btn-sm btn-success float-right" value="excel">
                    XLS
                </button>                            
            </form>
            <strong>@lang('Insumos')</strong>           
        </div>
        <div class="card-body">
            @include('flash::message')
            <table class="table table-responsive" id="tblInsumos">
                <thead>                    
                    <th>@lang('Código')</th>
                    <th>@lang('Nombre')</th>
                    <th>@lang('Laboratorio')</th>
                    <th>@lang('Concentración')</th>
                    <th>@lang('Presentación')</th>
                    <th>@lang('Unidad')</th>
                    <th>@lang('Precio')</th>
                    <th>@lang('Fecha Vencimiento')</th>
                    <th>@lang('Categoría')</th>
                    <th>@lang('Acción')</th>                      
                </thead>
                <tbody>
                </tbody>
            </table> 
        </div>
    </div>
    <div class="row">
        <div class="col-6">
            <div id="container" style="width: 900px; height: 500px;"></div>
        </div>
    </div>

    <div class="modal fade" id="import">    
        <form action="/inventario/insumos/importar" method="POST" enctype="multipart/form-data">
            @csrf        
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">
                            <span>×</span>
                        </button>                        
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="file">@lang('Seleccine archivo a cargar')</label>
                            <input type="file" name="file" id="fileInput" class="form-control">                            
                        </div>
                        <div class="progress">
                            <div id="bar" class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
                                <span id="bar-info">0% @lang('Completado')</span>
                            </div>                            
                        </div>
                        <span id="bar-listo"></span>
                        <hr>                      
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" id="button" disabled>@lang('Importar datos')</button>
                    </div>
                </div>
            </div>    
        </form>
    </div>
@endsection

@section('scripts')
<script>
    $('#tblInsumos').DataTable({
    autoWidth: false,
    processing: true,
    serverSide: true,
    responsive: true,
    dom: 'Bfrtip',
    buttons: [
            'copy', 'csv', 'excel', 'pdf'
    ],    
    ajax: '/inventario/insumos/listar',
    columns: [        
        {data: 'codIns', name: 'codIns'},
        {data: 'nomIns', name: 'nomIns'},
        {data: 'labora', name: 'labora'},
        {data: 'concen', name: 'concen'},
        {data: 'pres', name: 'pres'},
        {data: 'unid', name: 'unid'},
        {data: 'precio', name: 'precio'},
        {data: 'fecVen', name: 'fecVen'},
        {data: 'nomCate', name: 'nomCate'},
        {
            data: 'editar', 
            name: 'editar', 
            orderable: false, 
            searchable: false
        }
    ]    
});

$("#fileInput").change(function(){
    var msj = "subiendo archivo.";
    $('#bar-listo').text("Espere, " + msj);
    var progreso = 0;
    var idIterval = setInterval(function(){   
    // Aumento en 10 el progeso
    progreso +=10;
    $('#bar').css('width', progreso + '%');
    $('#bar-info').text(progreso + '%');
   
    //Si llegó a 100 elimino el interval
    if(progreso == 100){
        clearInterval(idIterval);
        $('#bar-listo').text("Archivo subido correctamente. De click en importar para cargar la información al sistema.");
        progreso = 0;
        $("button").prop("disabled",false);
  }
},1000);
});
</script>

<script type="text/javascript">
    var userData = <?php echo json_encode($userData)?>;

    Highcharts.chart('container', {
        title: {
            text: 'Medicamentos x Categoría'
        },
        subtitle: {
            text: 'Source: db.sismed.4'
        },
        xAxis: {
            categories: [
               
                'Analgésico', 'Otra', 'Otrica', 'April', 'May', 'June', 'July', 'August', 'September',
                'October', 'November', 'December'
            ]
        },
        yAxis: {
            title: {
                text: 'Número de medicamentos'
            }
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle'
        },
        plotOptions: {
            series: {
                allowPointSelect: true
            }
        },
        series: [{
            name: 'Medicamentos',
            data: userData
        }],
        responsive: {
            rules: [{
                condition: {
                    maxWidth: 800
                },
                chartOptions: {
                    legend: {
                        layout: 'horizontal',
                        align: 'center',
                        verticalAlign: 'bottom'
                    }
                }
            }]
        }
    });

</script>
@endsection