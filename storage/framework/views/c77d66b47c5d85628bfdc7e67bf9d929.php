
<?php $__env->startSection('title', 'Gebruikersbeheer – Admin Panel'); ?>
<?php $__env->startSection('content'); ?>
<main style="flex:1; padding:2rem; overflow-y:auto; background:#FFF7D4; min-height:100vh; font-family:'Outfit', sans-serif;">
  <h1 style="color:#8B0000; font-family:'Sigmar One', cursive;">Gebruikersbeheer</h1>
  <p style="color:#555;">Hieronder zie je alle gebruikers en kun je beheren:</p>

  <?php if (isset($component)) { $__componentOriginald0f1fd2689e4bb7060122a5b91fe8561 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald0f1fd2689e4bb7060122a5b91fe8561 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.button','data' => ['href' => ''.e(route('admin.users.create')).'','color' => 'primary','style' => 'display:inline-block; margin-bottom:1rem; background:#8B0000; color:#fff; padding:0.5rem 1rem; border-radius:5px; text-decoration:none;']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => ''.e(route('admin.users.create')).'','color' => 'primary','style' => 'display:inline-block; margin-bottom:1rem; background:#8B0000; color:#fff; padding:0.5rem 1rem; border-radius:5px; text-decoration:none;']); ?>
    Nieuwe gebruiker
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

  <table style="width:100%; margin-top:1rem; border-collapse:collapse;">
    <thead style="background:#fff4d6;">
      <tr>
        <th style="padding:0.75rem;">ID</th>
        <th style="padding:0.75rem;">Foto</th>
        <th style="padding:0.75rem;">Naam</th>
        <th style="padding:0.75rem;">Gebruikersnaam</th>
        <th style="padding:0.75rem;">E-mail</th>
        <th style="padding:0.75rem; text-align:center;">Admin?</th>
        <th style="padding:0.75rem;">Acties</th>
      </tr>
    </thead>
    <tbody>
      <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr style="border-bottom:1px solid #ccc;">
          <td style="padding:0.75rem;"><?php echo e($user->id); ?></td>
          <td style="padding:0.75rem;">
            <?php if($user->profile_picture): ?>
              <img src="<?php echo e(asset('storage/'.$user->profile_picture)); ?>"
                   alt="Foto <?php echo e($user->name); ?>"
                   style="width:50px; height:50px; object-fit:cover; border-radius:50%;">
            <?php else: ?>
              <div style="width:50px;height:50px;background:#ccc;border-radius:50%;"></div>
            <?php endif; ?>
          </td>
          <td style="padding:0.75rem;"><?php echo e($user->name); ?></td>
          <td style="padding:0.75rem;"><?php echo e($user->username); ?></td>
          <td style="padding:0.75rem;"><?php echo e($user->email); ?></td>
          <td style="padding:0.75rem; text-align:center;">
            <?php if($user->id === 1): ?>
              Ja
            <?php else: ?>
              <form method="POST"
                    action="<?php echo e($user->is_admin ? route('admin.users.demote', $user) : route('admin.users.promote', $user)); ?>"
                    style="display:inline;">
                <?php echo csrf_field(); ?>
               <input type="checkbox" onchange="this.form.submit()" <?php echo e($user->is_admin == 1 ? 'checked' : ''); ?>>
              </form>
            <?php endif; ?>
          </td>
          <td style="padding:0.75rem;">
            <a href="<?php echo e(route('admin.users.edit', $user)); ?>"
               style="margin-right:0.5rem; color:#06c; text-decoration:none;">Bewerk</a>
            <?php if($user->id !== 1): ?>
              <form method="POST" action="<?php echo e(route('admin.users.destroy', $user)); ?>" style="display:inline;">
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
            <?php endif; ?>
          </td>
        </tr>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
  </table>

  <div style="margin-top:1rem; text-align:center;">
    <?php echo e($users->links()); ?>

  </div>
</main>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /var/www/italiaansrestaurant/resources/views/admin/users/index.blade.php ENDPATH**/ ?>