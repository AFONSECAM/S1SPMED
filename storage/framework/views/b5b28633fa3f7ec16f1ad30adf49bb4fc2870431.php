<div class="table-responsive-sm">
    <table class="table table-striped" id="cargos-table">
        <thead>
            <tr>
                <th>Nombre Cargo</th>
                <th>Salario</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        <?php $__currentLoopData = $cargos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cargo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
            <td><?php echo e($cargo->nomCar); ?></td>
            <td><?php echo e($cargo->salCar); ?></td>
                <td>
                    <?php echo Form::open(['route' => ['cargos.destroy', $cargo->id], 'method' => 'delete']); ?>

                    <div class='btn-group'>
                        <a href="<?php echo e(route('cargos.show', [$cargo->id])); ?>" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>
                        <a href="<?php echo e(route('cargos.edit', [$cargo->id])); ?>" class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                        <?php echo Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => "return confirm('Are you sure?')"]); ?>

                    </div>
                    <?php echo Form::close(); ?>

                </td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</div><?php /**PATH C:\Users\andre\Desktop\proyecto\resources\views/cargos/table.blade.php ENDPATH**/ ?>