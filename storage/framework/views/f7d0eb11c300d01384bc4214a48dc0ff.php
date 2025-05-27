

<?php $__env->startSection('title', 'Bericht bekijken – Admin Panel'); ?>

<?php $__env->startSection('content'); ?>
<main style="flex:1; padding:2rem; overflow-y:auto; background:#FFF7D4;">
  <h1 style="color:#8B0000;">Bericht van <?php echo e($message->name); ?></h1>

  <div style="margin-top:2rem; background:#fff; padding:2rem; border-radius:8px; box-shadow:0 0 10px rgba(0,0,0,0.1); max-width:700px;">
    <p><strong>Naam:</strong> <?php echo e($message->name); ?></p>
    <p><strong>E-mail:</strong> <a href="mailto:<?php echo e($message->email); ?>" style="color:#0066cc;"><?php echo e($message->email); ?></a></p>
    <p><strong>Onderwerp:</strong> <?php echo e($message->subject); ?></p>
    <p><strong>Bericht:</strong></p>
    <p style="white-space:pre-line;"><?php echo e($message->message); ?></p>

    <div style="margin-top:2rem; display:flex; justify-content:space-between;">
      <a href="<?php echo e(route('admin.contact.index')); ?>" style="text-decoration:none; color:#8B0000;">← Terug naar inbox</a>

      <form method="POST" action="<?php echo e(route('admin.contact.destroy', $message->id)); ?>"
            onsubmit="return confirm('Weet je zeker dat je dit bericht wilt verwijderen?')" style="display:inline;">
        <?php echo csrf_field(); ?>
        <?php echo method_field('DELETE'); ?>
        <button type="submit" style="background:none; border:none; color:#c00; cursor:pointer;">
          Bericht verwijderen
        </button>
      </form>
    </div>
  </div>
</main>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /var/www/italiaansrestaurant/resources/views/admin/contact/show.blade.php ENDPATH**/ ?>