
<?php $__env->startSection('contenido'); ?>
    <div class="card">
        <div class="card-header"> 
            <strong>Tipos Identificación</strong>           
        </div>
        <div class="card-body">
            <table class="table table-bordered" id="tblTiposid">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tipo</th>
                        <th>Nombre</th>
                        <th>Editar</th>
                        <th>Fecha Creación</th>                        
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
    ajax: '/producto/listar',
    columns: [
        {data: 'id_tipo', name: 'id_tipo'},
        {data: 'tipoId', name: 'Tipo'},
        {data: 'nomTipo', name: 'Nombre'},
        {data: 'created_at', name: 'created_at'},        
        {data: 'editar', name: 'editar', orderable: false, searchable: false},
        {data: 'cambiar', name: 'cambiar', orderable: false, searchable: false}
    ]
});
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\proyecto\resources\views/tiposid/index.blade.php ENDPATH**/ ?>