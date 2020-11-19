
<?php $__env->startSection('contenido'); ?>
    <div class="card">
        <div class="card-header"> 
            <strong>Tipos Identificación</strong>           
        </div>
        <div class="card-body">
            <table class="table table-bordered" id="tblTiposid">
                <thead>
                    <tr>                        
                        <th>Tipo</th>
                        <th>Nombre</th>
                        <th>Editar</th>                      
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table> 
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script>
    $('#tblTiposid').DataTable({
    processing: true,
    serverSide: true,
    ajax: '/tiposid/listar',
    columns: [        
        {data: 'tipoId', name: 'Tipo'},
        {data: 'nomTipo', name: 'Nombre'},
        {
                data: 'editar', 
                name: 'editar', 
                orderable: false, 
                searchable: false
        }
    ]
});
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\andre\Desktop\proyecto\resources\views/tiposid/index.blade.php ENDPATH**/ ?>