<nav style="background:#8B0008; padding:1rem 0;">
  <div style="max-width:1200px; margin:0 auto; display:flex; align-items:center; gap:2rem; font-family:'Outfit',sans-serif;">

    <?php if(auth()->guard()->guest()): ?>
      <a href="<?php echo e(route('home')); ?>"             style="color:#F6E27F; text-decoration:none;">Home</a>
      <a href="<?php echo e(route('news.index')); ?>"       style="color:#F6E27F; text-decoration:none;">Nieuws</a>
      <a href="<?php echo e(route('faq.public')); ?>"       style="color:#F6E27F; text-decoration:none;">FAQ</a>
      <a href="<?php echo e(route('contact.form')); ?>"     style="color:#F6E27F; text-decoration:none;">Contact</a>
<a href="<?php echo e(route('users.index')); ?>" style="color:#F6E27F; text-decoration:none;">
  Profielen
</a>


      <div style="margin-left:auto; display:flex; gap:2rem;">
        <a href="<?php echo e(route('login')); ?>"    style="color:#F6E27F; text-decoration:none;">Inloggen</a>
        <a href="<?php echo e(route('register')); ?>" style="color:#F6E27F; text-decoration:none;">Registreren</a>
      </div>
    <?php else: ?>
      <a href="<?php echo e(route('home')); ?>"             style="color:#F6E27F; text-decoration:none;">Home</a>
      <a href="<?php echo e(route('news.index')); ?>"       style="color:#F6E27F; text-decoration:none;">Nieuws</a>
      <a href="<?php echo e(route('faq.public')); ?>"       style="color:#F6E27F; text-decoration:none;">FAQ</a>
      <a href="<?php echo e(route('contact.form')); ?>"     style="color:#F6E27F; text-decoration:none;">Contact</a>
<a href="<?php echo e(route('users.index')); ?>" style="color:#F6E27F; text-decoration:none;">
  Profielen
</a>
      <a href="<?php echo e(route('orders.index')); ?>"     style="color:#F6E27F; text-decoration:none;">Mijn bestellingen</a>
      <a href="<?php echo e(route('user.dashboard')); ?>"   style="color:#F6E27F; text-decoration:none;">Dashboard</a>

      <form method="POST" action="<?php echo e(route('logout')); ?>" style="margin-left:auto;">
        <?php echo csrf_field(); ?>
        <button type="submit"
                style="background:none; border:none; color:#F6E27F; cursor:pointer; font:inherit;">
          Uitloggen
        </button>
      </form>
    <?php endif; ?>
  </div>
</nav>
<?php /**PATH /var/www/italiaansrestaurant/resources/views/partials/navbar.blade.php ENDPATH**/ ?>