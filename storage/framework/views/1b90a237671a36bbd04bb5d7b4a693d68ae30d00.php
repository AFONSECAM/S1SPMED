
<?php $__env->startSection('contenido'); ?>
    <div class="row">
        <div class="col-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item active" aria-current="page">Insumos</li>
                </ol>
            </nav>
        </div> 
        <div class="col-sm-6 col-lg-6">            
            <div class="card">                                                 
                <svg>
                    <use xlink:href="<?php echo e(asset('assets/dashboard/vendors/@coreui/icons/svg/free.svg#cil-lan')); ?>"></use>                    
                </svg>
                <a style="text-decoration: none; padding:0; margin:0;" href="/inventario/categorias"> 
                <div class="text-value-lg text-center">
                    <span><?php echo app('translator')->get('Categorías de Insumos'); ?></span>                                
                </div> 
                </a>                        
            </div>
        </div>

        <div class="col-sm-6 col-lg-6">            
            <div class="card">                                                 
                <svg>
                    <use xlink:href="<?php echo e(asset('assets/dashboard/vendors/@coreui/icons/svg/free.svg#cil-barcode')); ?>"></use>
                </svg>
                <a style="text-decoration: none; padding:0; margin:0;" href="/inventario/insumos"> 
                <div class="text-value-lg text-center">
                    <span><?php echo app('translator')->get('Listado de Insumos'); ?></span>                                
                </div> 
                </a>                        
            </div>
        </div>

        <div class="col-sm-6 col-lg-6">            
            <div class="card">                                                 
                <svg>
                    <use xlink:href="<?php echo e(asset('assets/dashboard/vendors/@coreui/icons/svg/free.svg#cil-loop-circular')); ?>"></use>
                </svg>
                <a style="text-decoration: none; padding:0; margin:0;" href="/inventario/entradas"> 
                <div class="text-value-lg text-center">
                    <span><?php echo app('translator')->get('Entradas'); ?></span>                                
                </div> 
                </a>                        
            </div>
        </div>
        

        <div class="col-sm-6 col-lg-6">            
            <div class="card">                                                 
                <svg>
                    <use xlink:href="<?php echo e(asset('assets/dashboard/vendors/@coreui/icons/svg/free.svg#cil-contact')); ?>"></use>
                </svg>
                <a style="text-decoration: none; padding:0; margin:0;" href="/inventario/salidas"> 
                <div class="text-value-lg text-center">
                    <span><?php echo app('translator')->get('Salidas'); ?></span>                                
                </div> 
                </a>                        
            </div>
        </div>
    </div>


    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\andre\Desktop\sismped\sispmed\resources\views/inventario/inventario.blade.php ENDPATH**/ ?>