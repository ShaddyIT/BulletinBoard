<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $__env->yieldContent('title'); ?></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="/styles/main.css" type="text/css">
</head>
<body>
    <div class="container">
        <nav class="navbar navbar-light bg-light">
            <a href="<?php echo e(route('index')); ?>" class="navbar-brand mr-auto">Главная</a>
            <?php if(auth()->guard()->guest()): ?>
            <a href="<?php echo e(route('register')); ?>" class="nav-item nav-link">Регистрация</a>
            <a href="<?php echo e(route('login')); ?>" class="nav-item nav-link">Вход</a>
            <?php endif; ?>
            <?php if(auth()->guard()->check()): ?>
            <a href="<?php echo e(route('home')); ?>" class="nav-item nav-link">Мои объявления</a>
            <form action="<?php echo e(route('logout')); ?>" method="Post" class="form-inline">
                <?php echo csrf_field(); ?>
                <input type="submit" class="btn btn-danger" value='Выход'>
            </form>
            <?php endif; ?>
        </nav>    
        <h1 class="my-3 text-center">Доска объявлений</h1>
        <?php echo $__env->yieldContent('main'); ?>
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    </div>
    
</body>
</html><?php /**PATH /var/www/html/resources/views/layouts/base.blade.php ENDPATH**/ ?>