<?php $__env->startSection('contenido'); ?>
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Recaudos</li>
    </ol>
    <div class="container-fluid">
        <div class="animated fadeIn">
             <?php echo $__env->make('flash::message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
             <div class="row">
                 <div class="col-lg-12">
                     <div class="card">
                         <div class="card-header">
                             <i class="fa fa-align-justify"></i>
                             Recaudos
                             <a class="pull-right" href="<?php echo e(route('recaudos.create')); ?>"><i class="fa fa-plus-square fa-md"></i></a>
                         </div>
                         <div class="card-body">
                             <?php echo $__env->make('recaudos.table', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                              <div class="pull-right mr-3">
                                     
                              </div>
                         </div>
                     </div>
                  </div>
             </div>
         </div>
    </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\andre\Desktop\proyecto\resources\views/recaudos/index.blade.php ENDPATH**/ ?>