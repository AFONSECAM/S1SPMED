<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <title>Document</title>   
    <style>
        .page-break {
            page-break-after: always;
        }
        </style>
</head>
<body>        
    <img src="<?php echo e(public_path('logo2.jpg')); ?>" style="width: 70px; height: 50px">
    <h4 style="text-align: center;">Listado de Convenios</h4>
    <div style="background-color: #688a7e; height: 16px"></div>
          <br>          
            <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>Codigo</th>
                    <th>Fecha Apertura</th>
                    <th>IPS</th>
                    <th>Nombre</th>
                    <th>Resolución</th>
                    <th>Objeto</th>
                    <th>Duración</th>
                    <th>Costo</th>
                    <th>Estado</th>                
                  </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $convenios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr class="table-danger">
                        <td><?php echo e($value->codConv); ?></td>
                        <td><?php echo e($value->fecAper); ?></td>
                        <td><?php echo e($value->nomIPS); ?></td>
                        <td><?php echo e($value->nomConv); ?></td>
                        <td><?php echo e($value->resolu); ?></td>
                        <td><?php echo e($value->objConv); ?></td>
                        <td><?php echo e($value->durConv); ?></td>
                        <td>$<?php echo e(number_format($value->cosConv, 0)); ?></td> 
                        <td> <?php if($value->estado ==1): ?>
                            Activo
                        <?php else: ?>
                            Culminado
                        <?php endif; ?>
                        </td>                    
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>                    
</body>
</html>






<?php /**PATH C:\Users\andre\Desktop\proyecto\resources\views/pdf/convenios.blade.php ENDPATH**/ ?>