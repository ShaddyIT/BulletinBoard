<?php $__env->startSection('title', 'Главная'); ?>
<?php $__env->startSection('main'); ?>
    <h2><?php echo e($bb->title); ?></h2>
    <p><?php echo e($bb->content); ?></p>
    <p><?php echo e($bb->price); ?> руб.</p>
    <p>Автор: <?php echo e($bb->user->name); ?></p>
    <form action = "<?php echo e(route('bb.destroy', ['bb'=>$bb->id])); ?>" method='POST'>
        <?php echo csrf_field(); ?>
        <?php echo method_field('DELETE'); ?>
        <input type='submit' class='btn btn-danger' value='Удалить'>
    </form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/bb_delete.blade.php ENDPATH**/ ?>