

<?php $__env->startSection('content'); ?>
  <div style="background:#fff; border-radius:10px; box-shadow:0 4px 12px rgba(0,0,0,0.1); padding:2rem;">
    <h1 style="font-family:'Sigmar One',cursive; color:#8B0000; margin-bottom:1rem;">
      Dashboard Gebruiker
    </h1>

    <section style="display:flex; gap:2rem; align-items:center; margin-bottom:2rem;">
      <?php if(auth()->user()->profile_picture): ?>
        <img src="<?php echo e(asset('storage/' . auth()->user()->profile_picture)); ?>"
             alt="Profielfoto" style="width:120px; height:120px; object-fit:cover; border-radius:50%;">
      <?php else: ?>
        <div style="width:120px; height:120px; background:#eee; border-radius:50%; display:flex; align-items:center; justify-content:center; color:#777;">
          Geen foto
        </div>
      <?php endif; ?>

      <div>
        <p><strong>Naam:</strong> <?php echo e(auth()->user()->name); ?></p>
        <p><strong>Gebruikersnaam:</strong> <?php echo e(auth()->user()->username); ?></p>
        <p><strong>E-mail:</strong> <?php echo e(auth()->user()->email); ?></p>
      </div>
    </section>

    <section style="background:#fffef6; padding:1rem; border-radius:6px; margin-bottom:2rem;">
      <h2 style="font-family:'Sigmar One',cursive; color:#8B0000; margin-bottom:.5rem;">Persoonlijke gegevens</h2>
      <p>
        <strong>Geboortedatum:</strong>
        <?php echo e(auth()->user()->birthday ? \Carbon\Carbon::parse(auth()->user()->birthday)->format('d-m-Y') : 'Niet opgegeven'); ?>

      </p>
      <p><strong>Over mij:</strong> <?php echo e(auth()->user()->about ?? 'Geen extra info'); ?></p>
    </section>

    <div style="text-align:right;">
      <?php if (isset($component)) { $__componentOriginald0f1fd2689e4bb7060122a5b91fe8561 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald0f1fd2689e4bb7060122a5b91fe8561 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.button','data' => ['color' => 'primary','onclick' => 'location.href=\''.e(route('user.edit')).'\'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['color' => 'primary','onclick' => 'location.href=\''.e(route('user.edit')).'\'']); ?>
        Profiel bewerken
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
    </div>
  </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.user', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /var/www/italiaansrestaurant/resources/views/user/dashboard.blade.php ENDPATH**/ ?>