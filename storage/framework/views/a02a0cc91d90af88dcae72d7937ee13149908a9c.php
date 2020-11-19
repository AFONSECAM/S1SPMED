<div class="table-responsive-sm">
    <table class="table table-striped" id="acompañantes-table">
        <thead>
            <tr>
                <th>Tipoid</th>
        <th>Nidacom</th>
        <th>Pape</th>
        <th>Sape</th>
        <th>Pnom</th>
        <th>Snom</th>
        <th>Edad</th>
        <th>Telacom</th>
        <th>Mailacom</th>
        <th>Parpac</th>
        <th>Nidpac</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        <?php $__currentLoopData = $acompañantes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $acompañantes): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($acompañantes->tipoId); ?></td>
            <td><?php echo e($acompañantes->nIdAcom); ?></td>
            <td><?php echo e($acompañantes->pApe); ?></td>
            <td><?php echo e($acompañantes->sApe); ?></td>
            <td><?php echo e($acompañantes->pNom); ?></td>
            <td><?php echo e($acompañantes->sNom); ?></td>
            <td><?php echo e($acompañantes->edad); ?></td>
            <td><?php echo e($acompañantes->telAcom); ?></td>
            <td><?php echo e($acompañantes->mailAcom); ?></td>
            <td><?php echo e($acompañantes->parPac); ?></td>
            <td><?php echo e($acompañantes->nIdPac); ?></td>
                <td>
                    
                    <div class='btn-group'>
                        
                        
                        <?php echo Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => "return confirm('Are you sure?')"]); ?>

                    </div>
                    <?php echo Form::close(); ?>

                </td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</div><?php /**PATH C:\Users\andre\Desktop\proyecto\resources\views/acompañantes/table.blade.php ENDPATH**/ ?>