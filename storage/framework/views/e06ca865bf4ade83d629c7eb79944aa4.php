

<?php $__env->startSection('title', 'Contact Inbox – Admin Panel'); ?>

<?php $__env->startSection('content'); ?>
<main style="flex:1; padding:2rem; overflow-y:auto;">
  <h1 style="color:#8B0000;">Inbox Contactberichten</h1>
  <p style="color:#555;">Hieronder zie je alle ontvangen berichten van gebruikers.</p>

  <?php if(session('success')): ?>
    <div style="background:#e0ffe0; color:#006600; padding:1rem; border-radius:5px; margin-top:1rem;">
      <?php echo e(session('success')); ?>

    </div>
  <?php endif; ?>

  <?php if($messages->isEmpty()): ?>
    <p style="margin-top:1rem; color:#777;"><em>Er zijn momenteel geen berichten.</em></p>
  <?php else: ?>
    <table style="width:100%; border-collapse:collapse; margin-top:1rem;">
      <thead style="background:#fff4d6;">
        <tr>
          <th style="padding:.75rem; text-align:left;">Naam</th>
          <th style="padding:.75rem; text-align:left;">E-mail</th>
          <th style="padding:.75rem; text-align:left;">Onderwerp</th>
          <th style="padding:.75rem; text-align:left;">Acties</th>
        </tr>
      </thead>
      <tbody>
        <?php $__currentLoopData = $messages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <tr style="border-bottom:1px solid #ccc;">
            <td style="padding:.75rem;"><?php echo e($message->name); ?></td>
            <td style="padding:.75rem;"><?php echo e($message->email); ?></td>
            <td style="padding:.75rem;"><?php echo e($message->subject); ?></td>
            <td style="padding:.75rem;">
              <a href="<?php echo e(route('admin.contact.show', $message->id)); ?>"
                 style="color:#0066cc; text-decoration:none; margin-right:1rem;">Bekijk</a>

              <form method="POST"
                    action="<?php echo e(route('admin.contact.destroy', $message->id)); ?>"
                    style="display:inline;">
                <?php echo csrf_field(); ?>
                <?php echo method_field('DELETE'); ?>
                <button type="submit"
                        onclick="return confirm('Weet je zeker dat je dit bericht wilt verwijderen?')"
                        style="background:none; border:none; color:#c00; cursor:pointer; padding:0;">
                  Verwijder
                </button>
              </form>
            </td>
          </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </tbody>
    </table>
  <?php endif; ?>
</main>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /var/www/italiaansrestaurant/resources/views/admin/contact/inbox.blade.php ENDPATH**/ ?>