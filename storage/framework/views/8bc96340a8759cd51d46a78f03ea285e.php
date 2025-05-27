

<?php $__env->startSection('title', 'Profielen – Pizzeria Antonio'); ?>

<?php $__env->startSection('content'); ?>
<main style="padding:2rem; max-width:1000px; margin:auto;">
  <h1 style="font-family:'Sigmar One',cursive; color:#8B0008; margin-bottom:1.5rem;">
    Alle profielen
  </h1>

  <ul style="list-style:none; padding:0; display:grid; grid-template-columns:repeat(auto-fit,minmax(200px,1fr)); gap:1.5rem;">
    <?php $__empty_1 = true; $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
      <li style="background:#fff; border-radius:8px; box-shadow:0 1px 4px rgba(0,0,0,0.1); overflow:hidden;">
        <a href="<?php echo e(route('users.show', $user)); ?>" style="text-decoration:none; color:inherit; display:block;">
          <div style="height:140px; background:#eee; display:flex; align-items:center; justify-content:center;">
            <?php if($user->profile_picture): ?>
              <img src="<?php echo e(asset('storage/'.$user->profile_picture)); ?>"
                   alt="<?php echo e($user->name); ?>"
                   style="max-height:100%; object-fit:cover;">
            <?php else: ?>
              <span style="color:#777;">Geen foto</span>
            <?php endif; ?>
          </div>
          <div style="padding:1rem;">
            <h2 style="margin:0; font-size:1.1rem; color:#8B0008;">
              <?php echo e($user->name); ?>

            </h2>
            <p style="margin:.5rem 0 0; font-size:.9rem; color:#555;">
              @<em><?php echo e($user->username); ?></em>
            </p>
          </div>
        </a>
      </li>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
      <li style="color:#777; text-align:center;">Geen profielen gevonden.</li>
    <?php endif; ?>
  </ul>

  <div style="margin-top:2rem; text-align:center;">
    <?php echo e($users->links()); ?>

  </div>
</main>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /var/www/italiaansrestaurant/resources/views/users/index.blade.php ENDPATH**/ ?>