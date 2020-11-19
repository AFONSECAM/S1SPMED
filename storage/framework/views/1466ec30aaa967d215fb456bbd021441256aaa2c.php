
<?php $__env->startSection('contenido'); ?>
    <div id="container">

    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\andre\Desktop\proyecto\resources\views/graficas/graficarEmpleados.blade.php ENDPATH**/ ?>