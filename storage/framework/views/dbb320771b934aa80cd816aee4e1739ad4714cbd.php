
<?php $__env->startSection('contenido'); ?>
    <div class="row">
        <div class="col-12">
            <a href="/empresa">
                <button type="button" class="btn btn-info text-white float-left">
                    <svg class="c-icon c-icon-lg">
                        <use xlink:href="<?php echo e(asset('assets/dashboard/vendors/@coreui/icons/svg/free.svg#cil-chevron-circle-left-alt')); ?>"></use>                    
                    </svg>
                    <?php echo app('translator')->get('Regresar'); ?>
                </button>
            </a>             
            <a href="/empresa/tiposid/crear">
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
            <strong><?php echo app('translator')->get('Tipos Identificación'); ?></strong>           
        </div>
        <div class="card-body">
            <?php echo $__env->make('flash::message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <table class="table" id="tblTiposid" style="width: 100%;">
                <thead>                    
                    <th><?php echo app('translator')->get('Tipo'); ?></th>
                    <th><?php echo app('translator')->get('Nombre'); ?></th>
                    <th><?php echo app('translator')->get('Acción'); ?></th>                      
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
        autoWidth: false,
        processing: true,
        serverSide: true,
        ajax: '/empresa/tiposid/listar',
        columns: [        
            {data: 'tipoId', name: 'tipoId'},
            {data: 'nomTipo', name: 'nomTipo'},
            {
                    data: 'editar', 
                    name: 'editar', 
                    orderable: false, 
                    searchable: false
            }
        ]
    });
    $('#flash-overlay-modal').modal();    
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\andre\Desktop\proyecto\resources\views/empresa/tiposid/index.blade.php ENDPATH**/ ?>