<div class="table-responsive-sm">
    <table class="table table-striped" id="recaudos-table">
        <thead>
            <tr>
                <th>Código</th>
                <th>Fecha</th>
                <th>Concepto</th>
                <th>Valor</th>
                <th colspan="3">Acciones</th>
            </tr>
        </thead>
        <tbody>
        <?php $__currentLoopData = $recaudos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $recaudos): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($recaudos->codReca); ?></td>
                <td><?php echo e($recaudos->fecReca); ?></td>
                <td><?php echo e($recaudos->concep); ?></td>
                <td><?php echo e($recaudos->valor); ?></td>
                <td>
                    <?php echo Form::open(['route' => ['recaudos.destroy', $recaudos->id], 'method' => 'delete']); ?>

                    <div class='btn-group'>
                        <a href="<?php echo e(route('recaudos.show', [$recaudos->id])); ?>" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>
                        <a href="<?php echo e(route('recaudos.edit', [$recaudos->id])); ?>" class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                        <?php echo Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => "return confirm('Are you sure?')"]); ?>

                    </div>
                    <?php echo Form::close(); ?>

                </td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</div><?php /**PATH C:\Users\andre\Desktop\proyecto\resources\views/recaudos/table.blade.php ENDPATH**/ ?>