
<?php $__env->startSection('contenido'); ?>
    <div class="row">
        <div class="col-12">           
            <a href="/usuarios/crear">
                <button type="button" class="btn btn-success text-white float-right">
                    Nuevo
                    <svg class="c-icon c-icon-lg">
                        <use xlink:href="<?php echo e(asset('assets/dashboard/vendors/@coreui/icons/svg/free.svg#cil-library-add')); ?>"></use>                    
                    </svg>                    
                </button>
            </a>
        </div>
    </div>
    <hr>
    <div class="card">
        <div class="card-header">
            <strong>Usuarios</strong>
            <a href="/usuarios/crear"><span class="badge badge-success">Nuevo +</span></a>
        </div>
        <div class="card-body">
            <?php echo $__env->make('flash::message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <table id="tbl_usuarios" class="table" style="width: 100%;">
                <thead>                                      
                    <th>Nombre</th>
                    <th>Correo</th>
                    <th>Cargo</th>                                          
                    <th>Estado</th>                                                                                   
                </thead>
                <tbody>                    
                </tbody>
            </table>        
        </div>        
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection("scripts"); ?>
    <script>
        $('#tbl_usuarios').DataTable({
        autoWidth: false,
        processing: true,
        serverSide: true,
        ajax: '/usuarios/listar',
        columns: [
            {
                data: 'name', 
                name: 'name'
            },
            {
                data: 'email', 
                name: 'email'
            },            
            {
                data: 'cargo', 
                name: 'cargo'
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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\andre\Desktop\proyecto\resources\views/usuarios/index.blade.php ENDPATH**/ ?>