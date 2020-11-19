
<?php $__env->startSection('contenido'); ?>
    <div class="card">
        <div class="card-header">
            <strong>Sedes</strong>
            <a href="/empresa/sedes/crear"><span class="badge badge-success">Nueva +</span></a>
        </div>
        <div class="card-body">
            <?php echo $__env->make('flash::message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <table id="tbl_sedes" class="table" style="width: 100%;">
                <thead>                                      
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Dirección</th>
                    <th>Teléfono</th>
                    <th>Estado</th>
                    <th>Editar</th> 
                    <th>Cambiar Estado</th>                                            
                </thead>
                <tbody>                    
                </tbody>
            </table>        
        </div>        
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection("scripts"); ?>
    <script>
        $('#tbl_sedes').DataTable({
        processing: true,
        serverSide: true,
        ajax: '/empresa/sedes/listar',
        columns: [
            {
                data: 'id', 
                name: 'id'
            },
            {
                data: 'nomSede', 
                name: 'nomSede'
            },
            {
                data: 'dirSede', 
                name: 'dirSede'
            },            
            {
                data: 'telSede', 
                name: 'telSede'
            },
            {
                data: 'estado', 
                name: 'estado'
            },
            {
                data: 'editar', 
                name: 'editar', 
                orderable: false, 
                searchable: false
            },
            {
                data: 'cambiar', 
                name: 'cambiar', 
                orderable: false, 
                searchable: false
            }
        ]
    });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\proyecto\resources\views/empresa/sedes/index.blade.php ENDPATH**/ ?>