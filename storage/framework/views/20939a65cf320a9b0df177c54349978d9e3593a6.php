<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <title>Document</title>   
</head>
<body>    
    <div class="col-lg-12 col-md-12 col-sm-12"><br><br></div>
    <h4 class="">Listado de Citas Agendadas</h4>
    <div style="background-color: #688a7e; height: 16px"></div>
          <br>          
            <table>
                <thead >
                  <tr>
                    <th>Codigo</th>
                    <th>Usuario</th>
                    <th>Fecha</th>
                    <th>Hora Inicial</th>
                    <th>Hora Final</th>
                    <th>Descripción</th>
                  </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $agenda; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($value->id); ?></td>
                        <td><?php echo e($value->usuario_id); ?></td>
                        <td><?php echo e($value->fecha); ?></td>
                        <td><?php echo e($value->hora_inicio); ?></td>
                        <td><?php echo e($value->hora_final); ?></td> 
                        <td><?php echo e($value->descripcion); ?></td> 
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>        
</body>
</html>






<?php /**PATH C:\Users\andre\Desktop\proyecto\resources\views/pdf/agenda.blade.php ENDPATH**/ ?>