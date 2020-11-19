
<?php $__env->startSection('contenido'); ?>
    <div class="card">
        <div class="card-header"> 
            <strong>Roles/Cargos</strong>           
        </div>
        <div class="card-body">
            <?php echo $__env->make('flash::message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <table class="table" id="tblRoles" style="width: 100%;">
                <thead>                                        
                    <th>Nombre Rol</th>
                    <th>Acción</th>                      
                </thead>
                <tbody>

                </tbody>
            </table> 
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script>
    $('#tblRoles').DataTable({
    processing: true,
    serverSide: true,
    ajax: '/empresa/roles/listar',
    columns: [                
        {data: 'nomRol', name: 'nomRol'},
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
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\andre\Desktop\proyecto\resources\views/empresa/roles/index.blade.php ENDPATH**/ ?>