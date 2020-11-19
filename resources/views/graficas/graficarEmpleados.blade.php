@extends('layouts.app')
@section('contenido')
    <div id="container">

    </div>
@endsection
@section('scripts')
    <script>
        var empleados = <?php echo json_encode($empleados)?>;
        Highcharts.chart('container', {
            title: {
                text: "Empleados registrados en el sistema"
            },
            
            subtitle:{
                text: "Por mes"
            },

            xAxis: {
                categories: []
            },

            yAxis: {
                title: {
                    text: 'Nuevos empleados'
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

            series: [
                {
                    name: 'Nuevos empleados',
                    data: empleados
                }
            ],
        });
    </script>
@endsection