
<?php $__env->startSection('title', 'Pizza Bewerken – Admin Panel'); ?>

<?php $__env->startSection('content'); ?>
<main style="padding:2rem;">
  <h1 style="color:#8B0000;">Pizza Bewerken: <?php echo e($pizza->name); ?></h1>

  <form method="POST" action="<?php echo e(route('admin.pizzas.update', $pizza)); ?>" enctype="multipart/form-data"
        style="background:#fff; padding:1.5rem; border-radius:8px; max-width:600px;">
    <?php echo csrf_field(); ?>
    <?php echo method_field('PUT'); ?>

    <label>Naam</label>
    <input type="text" name="name" value="<?php echo e(old('name', $pizza->name)); ?>" required style="width:100%; padding:0.5rem; margin-bottom:1rem;">

    <label>Prijs (&euro;)</label>
    <input type="number" step="0.01" name="price" value="<?php echo e(old('price', $pizza->price)); ?>" required style="width:100%; padding:0.5rem; margin-bottom:1rem;">

    <label>Foto wijzigen (optioneel)</label>
    <input type="file" name="image_path" style="margin-bottom:1rem;">

    <button type="submit" style="background:#8B0000; color:white; padding:0.5rem 1rem; border:none; border-radius:5px;">Bijwerken</button>
  </form>
</main>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /var/www/italiaansrestaurant/resources/views/admin/pizzas/edit.blade.php ENDPATH**/ ?>