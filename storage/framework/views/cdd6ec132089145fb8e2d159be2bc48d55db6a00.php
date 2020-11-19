;
<?php $__env->startSection('contenido'); ?>
    <div class="row">
        <div class="col-12">
            <a href="/tesoreria/recaudos/crear">
                <button type="button" class="btn btn-success text-white float-right">
                    Registrar ingreso
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
            <strong>Recaudos</strong>
            <a href="/tesoreria/recaudos/crear"><span class="badge badge-success"><i class="fa fa-plus"></i></a>
        </div>
        <div class="card-body">
            <?php echo $__env->make('flash::message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <table id="tbl_recaudos" class="table" style="width: 100%;">
                <thead>
                    <th>Código</th>
                    <th>Fecha</th>
                    <th>Concepto</th>
                    <th>Valor</th>
                    <th>Acción</th>
                </thead>
                <tbody>

                </tbody>
            </table>            
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection("scripts"); ?>
    <script>
        $('#tbl_recaudos').DataTable({
            autoWidth: false,
            processing: true,
            serverSide: true,
            ajax: '/tesoreria/recaudos/listar',
            columns: [
                {
                    data: 'codReca',
                    name: 'codReca'
                },
                {
                    data: 'fecReca',
                    name: 'fecReca'
                },
                {
                    data: 'concep',
                    name: 'concep'
                },
                {
                    data: 'valor',
                    name: 'valor'
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
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\andre\Desktop\proyecto\resources\views/tesoreria/recaudos/index.blade.php ENDPATH**/ ?>