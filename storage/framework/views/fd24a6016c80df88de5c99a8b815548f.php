

<?php $__env->startSection('title', 'Mijn bestellingen'); ?>

<?php $__env->startSection('content'); ?>
  <div style="max-width:800px; margin:2rem auto;">
    <h1 style="font-family:'Sigmar One',cursive; color:#8B0000; text-align:center; margin-bottom:1.5rem;">
      Mijn bestellingen
    </h1>

    <?php if(session('success')): ?>
      <div style="background:#e6ffe6; color:#060; padding:1rem; border-radius:5px; margin-bottom:1rem;">
        <?php echo e(session('success')); ?>

      </div>
    <?php endif; ?>

    <?php if($orders->isEmpty()): ?>
      <p style="text-align:center; color:#777;">Je hebt nog geen bestellingen geplaatst.</p>
    <?php else: ?>
      <table style="width:100%; border-collapse:collapse; margin-bottom:1.5rem;">
        <thead>
          <tr style="background:#ffeaea;">
            <th style="padding:.75rem; text-align:left;">#</th>
            <th style="padding:.75rem; text-align:left;">Items</th>
            <th style="padding:.75rem; text-align:left;">Totaal</th>
            <th style="padding:.75rem; text-align:left;">Datum</th>
            <th style="padding:.75rem; text-align:left;">Acties</th>
          </tr>
        </thead>
        <tbody>
          <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php $linePizzas = $order->pizzas ?? collect(); ?>
            <tr style="border-bottom:1px solid #ddd;">
              <td style="padding:.75rem;"><?php echo e($order->id); ?></td>
              <td style="padding:.75rem;">
                <ul style="margin:0; padding-left:1rem; list-style:disc;">
                  <?php $__currentLoopData = $linePizzas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pizza): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li>
                      <?php echo e($pizza->name); ?> × <?php echo e($pizza->pivot->quantity); ?> —
                      €<?php echo e(number_format($pizza->pivot->price * $pizza->pivot->quantity,2,',','.')); ?>

                    </li>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
              </td>
              <td style="padding:.75rem;">
                € <?php echo e(number_format($order->total_price,2,',','.')); ?>

              </td>
              <td style="padding:.75rem;">
                <?php echo e($order->created_at->format('d-m-Y H:i')); ?>

              </td>
              <td style="padding:.75rem; white-space:nowrap;">
                <form action="<?php echo e(route('orders.destroy', $order)); ?>"
                      method="POST"
                      onsubmit="return confirm('Weet je zeker dat je je bestelling wilt verwijderen?');"
                      style="display:inline;">
                  <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                  <?php if (isset($component)) { $__componentOriginald0f1fd2689e4bb7060122a5b91fe8561 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald0f1fd2689e4bb7060122a5b91fe8561 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.button','data' => ['color' => 'danger','size' => 'sm']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['color' => 'danger','size' => 'sm']); ?>Verwijderen <?php echo $__env->renderComponent(); ?>
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
    <?php endif; ?>
  </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.user', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /var/www/italiaansrestaurant/resources/views/orders/index.blade.php ENDPATH**/ ?>