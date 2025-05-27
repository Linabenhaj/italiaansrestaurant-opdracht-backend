<?php $__env->startSection('title', 'Wachtwoord vergeten – Pizzeria Antonio'); ?>

<?php $__env->startSection('content'); ?>
  <main style="padding:2rem; max-width:400px; margin:3rem auto; background:#fff; border-radius:10px; box-shadow:0 4px 12px rgba(0,0,0,0.1);">
    <h1 style="font-family:'Sigmar One',cursive; color:#8B0000; text-align:center; margin-bottom:1.5rem;">
      Wachtwoord vergeten
    </h1>

    <?php if(session('status')): ?>
      <div style="background:#e6ffed; color:#2e7d32; padding:1rem; border-radius:5px; margin-bottom:1rem; text-align:center;">
        <?php echo e(session('status')); ?>

      </div>
    <?php endif; ?>

    <?php if($errors->any()): ?>
      <div style="background:#ffe2e2; color:#c00; padding:1rem; border-radius:5px; margin-bottom:1rem;">
        <ul style="margin:0; padding-left:1.25rem;">
          <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li><?php echo e($error); ?></li>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
      </div>
    <?php endif; ?>

    <form method="POST" action="<?php echo e(route('password.email')); ?>" style="display:grid; gap:1rem;">
      <?php echo csrf_field(); ?>

      <div>
        <label for="email" style="display:block; margin-bottom:.5rem; font-weight:600;">E-mailadres</label>
        <input
          id="email"
          type="email"
          name="email"
          value="<?php echo e(old('email')); ?>"
          required
          autofocus
          style="width:100%; padding:.75rem; border:1px solid #ccc; border-radius:5px;"
        >
      </div>

      <button type="submit"
              style="width:100%; background:#8B0000; color:#fff; padding:.75rem; border:none; border-radius:5px; font-size:1rem; cursor:pointer;">
        Verstuur reset-link
      </button>

      <p style="text-align:center; margin-top:1rem; font-size:.9rem;">
        <a href="<?php echo e(route('login')); ?>" style="color:#8B0000; text-decoration:none;">← Terug naar inloggen</a>
      </p>
    </form>
  </main>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /var/www/italiaansrestaurant/resources/views/auth/forgot-password.blade.php ENDPATH**/ ?>