
<?php $__env->startSection('contenido'); ?>
    <div class="row">
        <div class="col-12">
            <a href="/home">
                <button type="button" class="btn btn-info text-white float-left">
                    <svg class="c-icon c-icon-lg">
                        <use xlink:href="<?php echo e(asset('assets/dashboard/vendors/@coreui/icons/svg/free.svg#cil-chevron-circle-left-alt')); ?>"></use>                    
                    </svg>
                    <?php echo app('translator')->get('Regresar'); ?>
                </button>
            </a> 
            
            
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-12">
            <a href="#" class="btn btn-sm btn-primary float-right" data-toggle="modal" data-target="#import" title="Carga masiva de datos">
                <svg class="c-icon c-icon-lg">
                    <use xlink:href="<?php echo e(asset('assets/dashboard/vendors/@coreui/icons/svg/free.svg#cil-paperclip')); ?>"></use>                    
                </svg>
            </a>             
        </div>
    </div>

    
    <div class="card">
        <div class="card-header"> 
            <form action="/inventario/insumos/exportar" method="POST">
                <?php echo csrf_field(); ?>
                <button name="pdf" type="submit" class="btn btn-sm btn-danger float-right" value="pdf">
                    PDF
                </button>                                
                <button name="excel" type="submit" class="btn btn-sm btn-success float-right" value="excel">
                    XLS
                </button>                            
            </form>
            <strong><?php echo app('translator')->get('Citas'); ?></strong>           
        </div>
        <div class="card-body">
            <?php echo $__env->make('flash::message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <table class="table" id="tblCitas">
                <thead>                    
                    <th><?php echo app('translator')->get('Fecha'); ?></th>
                    <th><?php echo app('translator')->get('Hora Inicial'); ?></th>
                    <th><?php echo app('translator')->get('Hora Final'); ?></th>                    
                    <th><?php echo app('translator')->get('Descripción'); ?></th>                                        
                    <th><?php echo app('translator')->get('Paciente'); ?></th>
                    <th><?php echo app('translator')->get('Empleado'); ?></th>
                    <th><?php echo app('translator')->get('Sede'); ?></th>                                                                        
                    <th><?php echo app('translator')->get('Acción'); ?></th>                                       
                </thead>
                <tbody>                    
                    
                </tbody>
            </table> 
        </div>
    </div>
    <div class="modal fade" id="import">    
        <form action="/inventario/insumos/importar" method="POST" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>        
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">
                            <span>×</span>
                        </button>                        
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="file"><?php echo app('translator')->get('Seleccine archivo a cargar'); ?></label>
                            <input type="file" name="file" id="fileInput" class="form-control">                            
                        </div>
                        <div class="progress">
                            <div id="bar" class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
                                <span id="bar-info">0% <?php echo app('translator')->get('Completado'); ?></span>
                            </div>                            
                        </div>
                        <span id="bar-listo"></span>
                        <hr>                      
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" id="button" disabled><?php echo app('translator')->get('Importar datos'); ?></button>
                    </div>
                </div>
            </div>    
        </form>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script>
    $('#tblCitas').DataTable({
    autoWidth: false,
    processing: true,
    serverSide: true,
    responsive: true,
    ajax: '/consulta/listar',
    columns: [        
        {data: 'fecha', name: 'fecha'},
        {data: 'hora_inicio', name: 'hora_inicio'},
        {data: 'hora_final', name: 'hora_final'},
        {data: 'descripcion', name: 'descripcion'},
        {data: 'paciente_id', name: 'paciente_id'},
        {data: 'empleado_id', name: 'empleado_id'},
        {data: 'sede_id', name: 'sede_id'},                
        {
            data: 'accion', 
            name: 'accion', 
            orderable: false, 
            searchable: false
        }
    ]    
});
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\andre\Desktop\sismped\sispmed\resources\views/consulta/index.blade.php ENDPATH**/ ?>