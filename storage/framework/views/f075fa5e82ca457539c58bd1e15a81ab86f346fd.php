;
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
            <a href="/empresa/procedimientos/crear">
                <button type="button" class="btn btn-success text-white float-right">
                    <?php echo app('translator')->get('Nuevo'); ?>
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
            <form action="/empresa/procedimientos/exportar" method="POST">
                <?php echo csrf_field(); ?>
                <button name="pdf" type="submit" class="btn btn-sm btn-danger float-right" value="pdf">
                    PDF
                </button>                                
                <button name="excel" type="submit" class="btn btn-sm btn-success float-right" value="excel">
                    XLS
                </button>                            
            </form>
            <strong><?php echo app('translator')->get('Procedimientos'); ?></strong>
            <a href="/empresa/procedimientos/crear"><span class="badge badge-success"><?php echo app('translator')->get('Nuevo'); ?> +</span></a>            
        </div>
        <div class="card-body">
            <?php echo $__env->make('flash::message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <table id="tbl_procedimientos" class="table" style="width: 100%;">
                <thead>
                    <th><?php echo app('translator')->get('Código'); ?></th>
                    <th><?php echo app('translator')->get('Nombre'); ?></th>
                    <th><?php echo app('translator')->get('Pre-condiciones'); ?></th>
                    <th><?php echo app('translator')->get('Valor'); ?></th>
                    <th><?php echo app('translator')->get('Estado'); ?></th>
                    <th><?php echo app('translator')->get('Acción'); ?></th>
                </thead>
                <tbody>

                </tbody>
            </table>            
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection("scripts"); ?>
    <script>
        $('#tbl_procedimientos').DataTable({
            autoWidth: false,
            processing: true,
            serverSide: true,
            ajax: '/empresa/procedimientos/listar',
            columns: [
                {
                    data: 'codProc',
                    name: 'codProc'
                },
                {
                    data: 'nomProc',
                    name: 'nomProc'
                },
                {
                    data: 'conProc',
                    name: 'conProc'
                },
                {
                    data: 'valProc',
                    name: 'valProc'
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
                }
            ]
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\andre\Desktop\sismped\sispmed\resources\views/empresa/procedimientos/index.blade.php ENDPATH**/ ?>