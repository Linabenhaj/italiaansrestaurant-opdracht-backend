

<?php $__env->startSection('title', $user->name.' – Profiel'); ?>

<?php $__env->startSection('content'); ?>
<main style="padding:2rem; max-width:600px; margin:2rem auto; background:#fff; border-radius:10px; box-shadow:0 4px 12px rgba(0,0,0,0.1);">
  <h1 style="font-family:'Sigmar One',cursive; color:#8B0008; margin-bottom:1rem;">
    <?php echo e($user->name); ?>

  </h1>

  <div style="text-align:center; margin-bottom:2rem;">
    <?php if($user->profile_picture): ?>
      <img src="<?php echo e(asset('storage/'.$user->profile_picture)); ?>"
           alt="<?php echo e($user->name); ?>"
           style="width:160px; height:160px; object-fit:cover; border-radius:50%;">
    <?php else: ?>
      <div style="width:160px; height:160px; background:#eee; border-radius:50%; display:inline-flex; align-items:center; justify-content:center; color:#777;">
        Geen profielfoto
      </div>
    <?php endif; ?>
  </div>

  <p><strong>Gebruikersnaam:</strong> <?php echo e($user->username); ?></p>
  <p><strong>E-mail:</strong> <?php echo e($user->email); ?></p>
  <p><strong>Geboortedatum:</strong> <?php echo e($user->birthday ?? 'Niet opgegeven'); ?></p>
  <p><strong>Over mij:</strong> <?php echo e($user->about ?? 'Geen extra info'); ?></p>

  
  <div style="margin-top:2rem; text-align:center;">
    <a href="<?php echo e(route('home')); ?>"
       style="display:inline-block; color:#8B0008; font-weight:bold; text-decoration:none; background:#FFF7D4; border:1px solid #8B0008; padding:.5rem 1rem; border-radius:6px;">
      &larr; Terug naar Home
    </a>
  </div>
</main>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /var/www/italiaansrestaurant/resources/views/users/show.blade.php ENDPATH**/ ?>