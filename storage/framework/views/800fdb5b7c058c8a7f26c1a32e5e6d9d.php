<!DOCTYPE html>
<html lang="nl">
<head>
  <meta charset="UTF-8"/>
  <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1"/>
  <title><?php echo $__env->yieldContent('title'); ?> – Pizzeria Antonio</title>
  <link href="https://fonts.googleapis.com/css2?family=Sigmar+One&family=Outfit:wght@300;400;600;800&display=swap" rel="stylesheet">
  <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css','resources/js/app.js']); ?>
  <link rel="stylesheet" href="<?php echo e(asset('css/styl.css')); ?>">
</head>
<body style="margin:0; font-family:'Outfit',sans-serif; background:#FFF7D4;">

<?php echo $__env->make('partials.header', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<?php echo $__env->make('partials.navbar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

  <main style="padding:2rem; max-width:800px; margin:2rem auto;">
    <?php echo $__env->yieldContent('content'); ?>
  </main>

  <?php echo $__env->make('partials.footer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

</body>
</html>
<?php /**PATH /var/www/italiaansrestaurant/resources/views/layouts/app.blade.php ENDPATH**/ ?>