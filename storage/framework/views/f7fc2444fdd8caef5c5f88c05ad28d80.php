
<?php $__env->startSection('title', 'Bestellingen – Pizzeria Antonio'); ?>
<?php $__env->startSection('content'); ?>
<main style="flex:1; padding:2rem; overflow-y:auto; background:#FFF7D4; font-family:'Outfit', sans-serif;">
  <h1 style="color:#8B0000; font-family:'Sigmar One', cursive;">Bestellingen</h1>

  <table style="width:100%; border-collapse:collapse; margin-top:1rem;">
    <thead style="background:#ffeaea;">
      <tr>
        <th style="padding:0.75rem; text-align:left;">Order ID</th>
        <th style="padding:0.75rem; text-align:left;">Gebruiker</th>
        <th style="padding:0.75rem; text-align:left;">Details</th>
        <th style="padding:0.75rem; text-align:left;">Datum</th>
        <th style="padding:0.75rem; text-align:left;">Acties</th>
      </tr>
    </thead>
    <tbody>
      <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <tr style="border-bottom:1px solid #ccc;">
        <td style="padding:0.75rem;"><?php echo e($order->id); ?></td>
        <td style="padding:0.75rem;"><?php echo e($order->user->name); ?></td>
        <td style="padding:0.75rem;"><?php echo e(Str::limit($order->details, 40)); ?></td>
        <td style="padding:0.75rem;"><?php echo e($order->created_at->format('d-m-Y')); ?></td>
        <td style="padding:0.75rem;">
          <form method="POST" action="<?php echo e(route('admin.orders.destroy', $order)); ?>" style="display:inline;">
            <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
            <?php if (isset($component)) { $__componentOriginald0f1fd2689e4bb7060122a5b91fe8561 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald0f1fd2689e4bb7060122a5b91fe8561 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.button','data' => ['type' => 'submit','color' => 'danger','style' => 'background:none; border:none; color:#c00; cursor:pointer; padding:0;']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'submit','color' => 'danger','style' => 'background:none; border:none; color:#c00; cursor:pointer; padding:0;']); ?>
              Verwijder
             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginald0f1fd2689e4bb7060122a5b91fe8561)): ?>
<?php $attributes = $__attributesOriginald0f1fd2689e4bb7060122a5b91fe8561; ?>
<?php unset($__attributesOriginald0f1fd2689e4bb7060122a5b91fe8561); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald0f1fd2689e4bb7060122a5b91fe8561)): ?>
<?php $component = $__componentOriginald0f1fd2689e4bb7060122a5b91fe8561; ?>
<?php unset($__componentOriginald0f1fd2689e4bb7060122a5b91fe8561); ?>
<?php endif; ?>
          </form>
        </td>
      </tr>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
  </table>
</main>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /var/www/italiaansrestaurant/resources/views/admin/orders/index.blade.php ENDPATH**/ ?>