
<?php $__env->startSection('contenido'); ?>
    <div class="row">
        <div class="col-12">
            <a href="/inventario">
                <button type="button" class="btn btn-info text-white float-left">
                    <svg class="c-icon c-icon-lg">
                        <use xlink:href="<?php echo e(asset('assets/dashboard/vendors/@coreui/icons/svg/free.svg#cil-chevron-circle-left-alt')); ?>"></use>                    
                    </svg>
                    <?php echo app('translator')->get('Regresar'); ?>
                </button>
            </a>             
            <a href="/inventario/categorias/crear">
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
    <div class="row">
        <div class="col-12">
            <a href="#" class="btn btn-sm btn-primary float-right" data-toggle="modal" data-target="#create">
                <svg class="c-icon c-icon-lg">
                    <use xlink:href="<?php echo e(asset('assets/dashboard/vendors/@coreui/icons/svg/free.svg#cil-paperclip')); ?>"></use>                    
                </svg>
            </a> 
        </div>
    </div>
    
    <div class="card">
        <div class="card-header"> 
            <form action="/inventario/categorias/exportar" method="POST">
                <?php echo csrf_field(); ?>
                <button name="pdf" type="submit" class="btn btn-sm btn-danger float-right" value="pdf">
                    PDF
                </button>                                
                <button name="excel" type="submit" class="btn btn-sm btn-success float-right" value="excel">
                    XLS
                </button>                            
            </form>
            <strong><?php echo app('translator')->get('Categorías'); ?></strong>           
        </div>
        <div class="card-body">
            <?php echo $__env->make('flash::message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <table class="table" id="tblCategorias" style="width: 100%;">
                <thead>                                        
                    <th><?php echo app('translator')->get('Nombre'); ?></th>
                    <th><?php echo app('translator')->get('Acción'); ?></th>                      
                </thead>
                <tbody>
                </tbody>
            </table> 
        </div>
    </div>
    <div class="modal fade" id="create">    
        <form action="/inventario/categorias/importar" method="POST" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>        
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">
                            <span>×</span>
                        </button>                        
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="file"><?php echo app('translator')->get('Seleccine archivo a cargar'); ?></label>
                            <input type="file" name="file" id="fileInput" class="form-control">                            
                        </div>
                        <div class="progress">
                            <div id="bar" class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
                                <span id="bar-info">0% <?php echo app('translator')->get('Completado'); ?></span>
                            </div>                            
                        </div>
                        <span id="bar-listo"></span>
                        <hr>                      
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" id="button" disabled><?php echo app('translator')->get('Importar datos'); ?></button>
                    </div>
                </div>
            </div>    
        </form>
    </div>
    
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script>
    $('#tblCategorias').DataTable({
    autoWidth: false,
    processing: true,
    serverSide: true,
    ajax: '/inventario/categorias/listar',
    columns: [                
        {data: 'nomCate', name: 'nomCate'},
        {
            data: 'editar', 
            name: 'editar', 
            orderable: false, 
            searchable: false
        }
    ]
});

//Barra de progreso
$("#fileInput").change(function(){
    var msj = "Subiendo archivo";
    var progreso = 0;
    var idIterval = setInterval(function(){   
    // Aumento en 10 el progeso
    progreso +=10;
    $('#bar').css('width', progreso + '%');
    $('#bar-info').text(progreso + '%');
   
    //Si llegó a 100 elimino el interval
    if(progreso == 100){
        clearInterval(idIterval);
        $('#bar-listo').text("Archivo subido correctamente. De click en importar para cargar la información al sistema.");
        progreso = 0;
        $("button").prop("disabled",false);
  }
},1000);
});

</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\andre\Desktop\proyecto\resources\views/inventario/categorias/index.blade.php ENDPATH**/ ?>