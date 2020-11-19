<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <title>Sedes PDF</title>   
</head>
<body>        
    <img src="<?php echo e(public_path('logo2.jpg')); ?>" style="width: 70px; height: 50px">
    <h4 style="text-align: center;">Listado de Cargos</h4>
    <div style="background-color: #688a7e; height: 16px"></div>
          <br>          
            <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>Nombre</th>
                    <th>Dirección</th>                
                    <th>Teléfono</th> 
                    <th>Estado</th> 
                  </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $sedes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr class="table-danger">
                            <td><?php echo e($value->nomSede); ?></td>
                            <td><?php echo e($value->dirSede); ?></td>
                            <td><?php echo e($value->telSede); ?></td>
                            <td><?php if($value->estado == 1): ?>
                                Abierta
                            <?php else: ?>
                                Cerrada
                            <?php endif; ?></td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>                    
</body>
</html>






<?php /**PATH C:\Users\andre\Desktop\proyecto\resources\views/pdf/sedes.blade.php ENDPATH**/ ?>