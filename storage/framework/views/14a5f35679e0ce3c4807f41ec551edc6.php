

<?php $__env->startSection('title', 'Nieuwe Categorie – Admin Panel'); ?>
<?php $__env->startSection('content'); ?>
<main style="flex:1; padding:2rem; max-width:600px; margin:auto; background:#FFF7D4; font-family:'Outfit', sans-serif;">
  <h1 style="color:#8B0000;">Nieuwe FAQ-categorie</h1>
  <a href="<?php echo e(route('admin.faq-categories.index')); ?>" style="display:inline-block; margin-bottom:1rem; color:#8B0000; text-decoration:none;">
    &larr; Terug naar categorieën
  </a>

  <form method="POST" action="<?php echo e(route('admin.faq-categories.store')); ?>"
        style="background:#fff; padding:2rem; border-radius:8px; box-shadow:0 0 10px rgba(0,0,0,0.1);">
    <?php echo csrf_field(); ?>

    <div style="margin-bottom:1rem;">
      <label for="name" style="display:block; margin-bottom:.5rem;">Naam categorie</label>
      <input
        type="text"
        name="name"
        id="name"
        value="<?php echo e(old('name')); ?>"
        required
        style="width:100%; padding:.5rem; border:1px solid #ccc; border-radius:4px;"
      >
      <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
        <div style="color:#c00;"><?php echo e($message); ?></div>
      <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
    </div>

    <button type="submit"
            style="background:#8B0000; color:#fff; padding:.75rem 1.5rem; border:none; border-radius:5px; cursor:pointer;">
      Opslaan
    </button>
  </form>
</main>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /var/www/italiaansrestaurant/resources/views/admin/faq-categories/create.blade.php ENDPATH**/ ?>