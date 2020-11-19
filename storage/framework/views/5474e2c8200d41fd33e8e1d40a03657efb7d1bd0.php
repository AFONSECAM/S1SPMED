

<?php $__env->startSection('contenido'); ?>
    <form action="/agenda/generar/informe" method="POST">
    <?php echo csrf_field(); ?>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="">Fecha Inicial</label>
                        <input type="date" name="txtFechaInicial" class="form-control">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="">Fecha Final</label>
                        <input type="date" name="txtFechaFinal" class="form-control">
                    </div>
                </div>
                <div class="col-lg-6">
                    <button name="pdf" type="submit" class="btn btn-danger float-right" value="pdf">Generar PDF</button>
                </div>
                <div class="col-lg-6">
                    <button name="excel" type="submit" class="btn btn-success float-left" value="excel">Generar Excel</button>
                </div>
            </div>
        </div>
    </div>    
    </form>                
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\proyecto\resources\views/agenda/informe.blade.php ENDPATH**/ ?>