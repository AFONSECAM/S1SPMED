<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .page-break{
            page-break-after: always;
        }
        .titulo{
            border: 2px solid red;
            border-radius: 15px;
            padding: 15px;
        }
        .titulo h1{
            text-align: center;
        }
        .titulo p{
            text-align: right;
        }

        .table{
            width: 100%;
            border: 1px solid red;
            text-align: center;
        }
    </style>
</head>
<body>
    <header class="titulo">
        <h1>Informe de Agenda</h1>
        <p>De: <?php echo e($input["txtFechaInicial"]); ?> a <?php echo e($input["txtFechaFinal"]); ?></p>
    </header>
    <div>
        <table class="table">
            <thead>
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
    </div>

    <footer style="position: absolute; bottom:0;">
        <p style="text-align:center;">Informe generado <?php echo e(date("Y-m-d")); ?></p>
    </footer>
</body>
</html><?php /**PATH C:\xampp\htdocs\proyecto\resources\views/pdf/agenda.blade.php ENDPATH**/ ?>