

<?php $__env->startSection('contenido'); ?>
<?php echo $__env->make('flash::message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <form action="/agenda/generar/informe" method="POST">
    <?php echo csrf_field(); ?>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for=""><?php echo app('translator')->get('Fecha Inicial'); ?></label>
                        <input type="date" name="txtFechaInicial" class="form-control">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for=""><?php echo app('translator')->get('Fecha Final'); ?></label>
                        <input type="date" name="txtFechaFinal" class="form-control">
                    </div>
                </div>
                <div class="col-lg-6">
                    <button name="pdf" type="submit" class="btn btn-danger float-right" value="pdf"><?php echo app('translator')->get('Generar'); ?> PDF</button>
                </div>
                <div class="col-lg-6">
                    <button name="excel" type="submit" class="btn btn-success float-left" value="excel"><?php echo app('translator')->get('Generar'); ?> Excel</button>
                </div>
            </div>
        </div>
    </div>    
    </form>                
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\andre\Desktop\proyecto\resources\views/agenda/informe.blade.php ENDPATH**/ ?>