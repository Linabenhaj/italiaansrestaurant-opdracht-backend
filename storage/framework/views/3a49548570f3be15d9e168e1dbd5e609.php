
<?php $__env->startSection('title', 'Admin Dashboard – Pizzeria Antonio'); ?>

<?php $__env->startSection('content'); ?>
<main style="flex:1; padding:2rem; overflow-y:auto; display:flex; flex-direction:column; min-height:100vh; background:#FFF7D4;">
  <div style="margin-bottom:2rem;">
    <h1 style="font-family:'Sigmar One', cursive; font-size:2rem; color:#8B0000;">Welkom, <?php echo e($admin->name ?? 'Admin'); ?></h1>
    <p style="color:#555;">Ingelogd als: <?php echo e($admin->email ?? 'admin@ehb.be'); ?></p>
  </div>

  <section style="display:grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap:2rem;">
    <!-- Totaal Gebruikers -->
    <div style="background:#FFE5EC; padding:2rem; border-radius:12px; box-shadow:0 2px 6px rgba(0,0,0,0.1); text-align:center;">
      <h3 style="font-size:1.4rem; font-weight:bold; margin-bottom:1rem;">Totaal gebruikers</h3>
      <p style="font-size:2.5rem; color:#8B0000; margin:0;"><?php echo e($userCount); ?></p>
    </div>

    <!-- Openstaande FAQ's -->
    <div style="background:#FFF4D6; padding:2rem; border-radius:12px; box-shadow:0 2px 6px rgba(0,0,0,0.1); text-align:center;">
      <h3 style="font-size:1.4rem; font-weight:bold; margin-bottom:1rem;">Openstaande FAQ’s</h3>
      <p style="font-size:2.5rem; color:#8B0000; margin:0;"><?php echo e($pendingFaqs); ?></p>
    </div>

    <!-- Contactberichten -->
    <div style="background:#E0FFE0; padding:2rem; border-radius:12px; box-shadow:0 2px 6px rgba(0,0,0,0.1); text-align:center;">
      <h3 style="font-size:1.4rem; font-weight:bold; margin-bottom:1rem;">Contactberichten</h3>
      <p style="font-size:2.5rem; color:#8B0000; margin:0;"><?php echo e($contactCount); ?></p>
    </div>

    <!-- Totaal Bestellingen -->
    <div style="background:#D6F0FF; padding:2rem; border-radius:12px; box-shadow:0 2px 6px rgba(0,0,0,0.1); text-align:center;">
      <h3 style="font-size:1.4rem; font-weight:bold; margin-bottom:1rem;">Totaal bestellingen</h3>
      <p style="font-size:2.5rem; color:#8B0000; margin:0;"><?php echo e($orderCount); ?></p>
    </div>
  </section>
</main>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /var/www/italiaansrestaurant/resources/views/admin/dashboard.blade.php ENDPATH**/ ?>