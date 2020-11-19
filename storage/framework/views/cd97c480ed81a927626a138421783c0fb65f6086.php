;
<?php $__env->startSection('contenido'); ?>
    <div class="row">
        <div class="col-sm-5 col-md-6 col-lg-6">
            <a href="/empresa">
                <button type="button" class="btn btn-sm btn-info text-white float-left">
                    <svg class="c-icon c-icon-lg">
                        <use xlink:href="<?php echo e(asset('assets/dashboard/vendors/@coreui/icons/svg/free.svg#cil-chevron-circle-left-alt')); ?>"></use>                    
                    </svg>
                    <?php echo app('translator')->get('Regresar'); ?>
                </button>
            </a>
        </div>
        <div class="col-sm-5 col-md-6 col-lg-6">
            <a href="/empresa/tesoreria/gastos/crear">
                <button type="button" class="btn btn-success text-white float-right">
                    Registrar gasto
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
            <form action="/empresa/tesoreria/gastos/exportar" method="POST">
                <?php echo csrf_field(); ?>
                <button name="pdf" type="submit" class="btn btn-sm btn-danger float-right" value="pdf">
                    PDF
                </button>                                
                <button name="excel" type="submit" class="btn btn-sm btn-success float-right" value="excel">
                    XLS
                </button>                            
            </form>
            <strong>Gastos</strong>
            <a href="/empresa/tesoreria/gastos/crear"><span class="badge badge-success"><i class="fa fa-plus"></i></a>
        </div>
        <div class="card-body">
            <?php echo $__env->make('flash::message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <table id="tbl_gastos" class="table" style="width: 100%;">
                <thead>                    
                    <th>Fecha</th>
                    <th>Concepto</th>
                    <th>Medio Pago</th>
                    <th>Empleado</th>
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
        $('#tbl_gastos').DataTable({
            autoWidth: false,
            processing: true,
            serverSide: true,
            ajax: '/empresa/tesoreria/gastos/listar',
            columns: [
                {
                    data: 'fecGasto',
                    name: 'fecGasto'
                },
                {
                    data: 'concepto',
                    name: 'concepto'
                },
                {
                    data: 'forPago',
                    name: 'forPago'
                },
                {
                    data: 'empleado_id',
                    name: 'empleado_id'
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
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\andre\Desktop\sismped\sispmed\resources\views/empresa/tesoreria/gastos/index.blade.php ENDPATH**/ ?>