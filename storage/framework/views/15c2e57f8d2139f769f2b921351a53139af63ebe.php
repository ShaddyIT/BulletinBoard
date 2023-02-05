<?php $__env->startSection('title', 'Мои объявления'); ?>

<?php $__env->startSection('main'); ?>
<h2 style="text-align:center">Добро пожаловать <?php echo e(Auth::user()->name); ?>!</h2>
<p class='text-right'><a href="<?php echo e(route('bb.add')); ?>">Добавить объявление</a>
<?php if(count($bbs) > 0): ?>
<table class="table table-stripped">
    <thead>
        <tr>
            <th>Товар</th>
            <th>Цена, руб.</th>
            <th colspan="2">&nbsp;</th>
        </tr>
    </thead>
    <tbody>
        <?php $__currentLoopData = $bbs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bb): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><h3><?php echo e($bb->title); ?></h3></td>
            <td><?php echo e($bb->price); ?></td>
            <td>
                <a href="<?php echo e(route('bb.edit', ['bb'=>$bb->id])); ?>">Изменить</a>
            </td>
            <td>
                <a href="<?php echo e(route('bb.delete', ['bb'=>$bb->id])); ?>">Удалить</a>
            </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>
<?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/home.blade.php ENDPATH**/ ?>