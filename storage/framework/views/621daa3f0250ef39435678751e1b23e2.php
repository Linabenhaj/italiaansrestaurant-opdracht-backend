
<?php $__env->startSection('title', 'Pizza’s Beheren – Admin Panel'); ?>

<?php $__env->startSection('content'); ?>
<main style="padding:2rem;">
  <h1 style="color:#8B0000;">Pizza-overzicht</h1>

  <a href="<?php echo e(route('admin.pizzas.create')); ?>"
     style="display:inline-block; background:#8B0000; color:white; padding:0.5rem 1rem; border-radius:5px; margin:1rem 0;">
    Nieuwe Pizza
  </a>

  <?php if($pizzas->isEmpty()): ?>
    <p style="color:#555;">Geen pizza’s gevonden.</p>
  <?php else: ?>
    <table style="width:100%; border-collapse:collapse; margin-top:1rem;">
      <thead style="background:#fff4d6;">
        <tr>
          <th style="padding:.75rem;">Foto</th>
          <th style="padding:.75rem;">Naam</th>
          <th style="padding:.75rem;">Prijs</th>
          <th style="padding:.75rem;">Acties</th>
        </tr>
      </thead>
      <tbody>
        <?php $__currentLoopData = $pizzas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pizza): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <tr style="border-bottom:1px solid #ccc;">
            <td style="padding:.75rem;">
              <?php if($pizza->image_path): ?>
                <img src="<?php echo e(asset('storage/'.$pizza->image_path)); ?>" alt="Pizza" style="width:60px; height:60px; object-fit:cover; border-radius:5px;">
              <?php endif; ?>
            </td>
            <td style="padding:.75rem;"><?php echo e($pizza->name); ?></td>
            <td style="padding:.75rem;">&euro;<?php echo e(number_format($pizza->price, 2, ',', '.')); ?></td>
            <td style="padding:.75rem;">
              <a href="<?php echo e(route('admin.pizzas.edit', $pizza)); ?>" style="color:#0066cc;">Bewerk</a>
              <form method="POST" action="<?php echo e(route('admin.pizzas.destroy', $pizza)); ?>" style="display:inline;">
                <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                <button type="submit" style="color:#c00; background:none; border:none; cursor:pointer;"
                        onclick="return confirm('Pizza verwijderen?')">Verwijder</button>
              </form>
            </td>
          </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </tbody>
    </table>

    <div style="margin-top:1rem;"><?php echo e($pizzas->links()); ?></div>
  <?php endif; ?>
</main>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /var/www/italiaansrestaurant/resources/views/admin/pizzas/index.blade.php ENDPATH**/ ?>