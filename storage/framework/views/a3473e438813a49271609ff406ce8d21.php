
<?php $__env->startSection('title', 'FAQ Beheer – Admin Panel'); ?>
<?php $__env->startSection('content'); ?>
<main style="flex:1; padding:2rem; overflow-y:auto; background:#FFF7D4; font-family:'Outfit', sans-serif;">

  <h1 style="font-family:'Sigmar One',cursive; color:#8B0000; margin-bottom:1rem;">FAQ Beheer</h1>
  <p style="color:#555; margin-bottom:2rem;">
    Hier beheer je al je FAQ’s en categorieën.<br>
    Eerst de categorieën, daarna de nieuwe vragen, en ten slotte de beantwoorde vragen.
  </p>

  
  <section style="margin-bottom:3rem;">
    <h2 style="color:#8B0000; margin-bottom:1rem;">Categorieën</h2>
    <?php if (isset($component)) { $__componentOriginald0f1fd2689e4bb7060122a5b91fe8561 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald0f1fd2689e4bb7060122a5b91fe8561 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.button','data' => ['href' => ''.e(route('admin.faq-categories.create')).'','color' => 'primary','style' => 'display:inline-block; background:#8B0000; color:#fff; padding:.75rem 1.5rem; border-radius:5px; text-decoration:none; margin-bottom:1rem;']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => ''.e(route('admin.faq-categories.create')).'','color' => 'primary','style' => 'display:inline-block; background:#8B0000; color:#fff; padding:.75rem 1.5rem; border-radius:5px; text-decoration:none; margin-bottom:1rem;']); ?>
      Nieuwe categorie
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
    <table style="width:100%; border-collapse:collapse;">
      <thead style="background:#fff4d6;">
        <tr>
          <th style="padding:.75rem; text-align:left;">Naam</th>
          <th style="padding:.75rem; text-align:left;">Acties</th>
        </tr>
      </thead>
      <tbody>
        <?php $__empty_1 = true; $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <tr style="border-bottom:1px solid #ccc;">
          <td style="padding:.75rem;"><?php echo e($cat->name); ?></td>
          <td style="padding:.75rem;">
            <a href="<?php echo e(route('admin.faq-categories.edit', $cat)); ?>"
               style="margin-right:1rem; color:#06c; text-decoration:none;">Bewerk</a>
            <form method="POST" action="<?php echo e(route('admin.faq-categories.destroy', $cat)); ?>" style="display:inline;">
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
                Verwijderen
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
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <tr>
          <td colspan="2" style="padding:1rem; color:#555;"><em>Geen categorieën gevonden.</em></td>
        </tr>
        <?php endif; ?>
      </tbody>
    </table>
  </section>

  
  <section style="margin-bottom:3rem;">
    <h2 style="color:#8B0000; margin-bottom:1rem;">Opgestuurde vragen (nog antwoord nodig)</h2>
    <?php if (isset($component)) { $__componentOriginald0f1fd2689e4bb7060122a5b91fe8561 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald0f1fd2689e4bb7060122a5b91fe8561 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.button','data' => ['href' => ''.e(route('admin.faq.create')).'','color' => 'primary','style' => 'display:inline-block; background:#8B0000; color:#fff; padding:.75rem 1.5rem; border-radius:5px; text-decoration:none; margin-bottom:1rem;']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => ''.e(route('admin.faq.create')).'','color' => 'primary','style' => 'display:inline-block; background:#8B0000; color:#fff; padding:.75rem 1.5rem; border-radius:5px; text-decoration:none; margin-bottom:1rem;']); ?>
      Nieuwe vraag
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
    <table style="width:100%; border-collapse:collapse;">
      <thead style="background:#ffeaea;">
        <tr>
          <th style="padding:.75rem; text-align:left;">Categorie</th>
          <th style="padding:.75rem; text-align:left;">Vraag</th>
          <th style="padding:.75rem; text-align:left;">Acties</th>
        </tr>
      </thead>
      <tbody>
        <?php $__empty_1 = true; $__currentLoopData = $pendingFaqs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $faq): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <tr style="border-bottom:1px solid #ccc;">
          <td style="padding:.75rem;"><?php echo e($faq->category->name); ?></td>
          <td style="padding:.75rem;"><?php echo e($faq->question); ?></td>
          <td style="padding:.75rem;">
            <a href="<?php echo e(route('admin.faq.edit', $faq)); ?>"
               style="margin-right:1rem; color:#0a6; text-decoration:none;">Beantwoorden</a>
            <form method="POST" action="<?php echo e(route('admin.faq.destroy', $faq)); ?>" style="display:inline;">
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
                Verwijderen
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
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <tr><td colspan="3" style="padding:1rem; color:#555;"><em>Geen nieuwe vragen.</em></td></tr>
        <?php endif; ?>
      </tbody>
    </table>
  </section>

  
  <section>
    <h2 style="color:#8B0000; margin-bottom:1rem;">Beantwoorde vragen</h2>
    <table style="width:100%; border-collapse:collapse;">
      <thead style="background:#fff4d6;">
        <tr>
          <th style="padding:.75rem; text-align:left;">Categorie</th>
          <th style="padding:.75rem; text-align:left;">Vraag</th>
          <th style="padding:.75rem; text-align:left;">Antwoord</th>
          <th style="padding:.75rem; text-align:left;">Acties</th>
        </tr>
      </thead>
      <tbody>
        <?php $__empty_1 = true; $__currentLoopData = $answeredFaqs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $faq): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <tr style="border-bottom:1px solid #ccc;">
          <td style="padding:.75rem;"><?php echo e($faq->category->name); ?></td>
          <td style="padding:.75rem;"><?php echo e($faq->question); ?></td>
          <td style="padding:.75rem; white-space:pre-wrap;"><?php echo e($faq->answer); ?></td>
          <td style="padding:.75rem;">
            <a href="<?php echo e(route('admin.faq.edit', $faq)); ?>"
               style="margin-right:1rem; color:#06c; text-decoration:none;">Bewerk</a>
            <form method="POST" action="<?php echo e(route('admin.faq.destroy', $faq)); ?>" style="display:inline;">
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
                Verwijderen
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
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <tr><td colspan="4" style="padding:1rem; color:#555;"><em>Nog geen beantwoorde vragen.</em></td></tr>
        <?php endif; ?>
      </tbody>
    </table>
  </section>

</main>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /var/www/italiaansrestaurant/resources/views/admin/faq/index.blade.php ENDPATH**/ ?>