<!DOCTYPE html>
<html lang="nl">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $__env->yieldContent('title', 'Admin – Pizzeria Antonio'); ?></title>
  <link href="https://fonts.googleapis.com/css2?family=Sigmar+One&family=Outfit:wght@300;400;600;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="<?php echo e(asset('css/admin.css')); ?>">
</head>
<body style="margin:0; font-family:'Outfit',sans-serif; background:#FFF7D4; display:flex; min-height:100vh;">
  <?php echo $__env->make('admin.partials.sidebar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
  <?php echo $__env->yieldContent('content'); ?>
</body>
</html><?php /**PATH /var/www/italiaansrestaurant/resources/views/admin/layout.blade.php ENDPATH**/ ?>