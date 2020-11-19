<!-- Codreca Field -->
<div class="form-group col-sm-6">
    <?php echo Form::label('codReca', 'Codreca:'); ?>

    <?php echo Form::text('codReca', null, ['class' => 'form-control','maxlength' => 10,'maxlength' => 10]); ?>

</div>

<!-- Fecreca Field -->
<div class="form-group col-sm-6">
    <?php echo Form::label('fecReca', 'Fecreca:'); ?>

    <?php echo Form::date('fecReca', null, ['class' => 'form-control','id'=>'fecReca']); ?>

</div>

<?php $__env->startPush('scripts'); ?>
   <script type="text/javascript">
           $('#fecReca').datetimepicker({
               format: 'YYYY-MM-DD HH:mm:ss',
               useCurrent: true,
               icons: {
                   up: "icon-arrow-up-circle icons font-2xl",
                   down: "icon-arrow-down-circle icons font-2xl"
               },
               sideBySide: true
           })
       </script>
<?php $__env->stopPush(); ?>


<!-- Concep Field -->
<div class="form-group col-sm-6">
    <?php echo Form::label('concep', 'Concep:'); ?>

    <?php echo Form::text('concep', null, ['class' => 'form-control','maxlength' => 50,'maxlength' => 50]); ?>

</div>

<!-- Valor Field -->
<div class="form-group col-sm-6">
    <?php echo Form::label('valor', 'Valor:'); ?>

    <?php echo Form::number('valor', null, ['class' => 'form-control']); ?>

</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    <?php echo Form::submit('Save', ['class' => 'btn btn-primary']); ?>

    <a href="<?php echo e(route('recaudos.index')); ?>" class="btn btn-secondary">Cancel</a>
</div>
<?php /**PATH C:\Users\andre\Desktop\proyecto\resources\views/recaudos/fields.blade.php ENDPATH**/ ?>