<?php $__env->startSection('title', 'Pizzeria Antonio'); ?>

<?php $__env->startSection('content'); ?>
  
  <section style="padding:2rem; text-align:center; background:#fff;">
    <h2 style="font-size:2rem; color:#8B0000;">Welkom bij Pizzeria Antonio</h2>
    <p style="font-size:1.1rem; color:#333;">
      Proef onze authentieke Italiaanse pizza’s, gemaakt met liefde en passie!
    </p>
  </section>

  
  <section style="padding:2rem; background:#fffefe;">
    <h2 style="text-align:center; font-family:'Sigmar One',cursive; color:#8B0000;">Ons Menu</h2>
    <div style="display:grid; grid-template-columns:repeat(auto-fit, minmax(200px, 1fr)); gap:2rem; margin-top:2rem;">
      <?php $__empty_1 = true; $__currentLoopData = $pizzas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pizza): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <div style="
            background:#fff;
            border:1px solid #ccc;
            border-radius:10px;
            padding:1rem;
            text-align:center;
            box-shadow:0 0 10px rgba(0,0,0,0.1);
            display:flex;
            flex-direction:column;
            justify-content:space-between;
            height:400px;
          ">
          <div style="width:100%; height:180px; overflow:hidden; border-radius:8px;">
            <?php if($pizza->image_path): ?>
              <img
                src="<?php echo e(asset('storage/'.$pizza->image_path)); ?>"
                alt="Pizza <?php echo e($pizza->name); ?>"
                style="width:100%; height:100%; object-fit:cover;"
              >
            <?php else: ?>
              <div style="width:100%; height:100%; background:#eee; display:flex; align-items:center; justify-content:center; color:#aaa;">
                Geen afbeelding
              </div>
            <?php endif; ?>
          </div>
          <div>
            <h3 style="margin:1rem 0 .5rem; font-family:'Sigmar One',cursive; color:#8B0008;">
              <?php echo e($pizza->name); ?>

            </h3>
            <p style="color:#444; margin-bottom:1rem;">
              &euro;<?php echo e(number_format($pizza->price,2,',','.')); ?>

            </p>
          </div>
          <div>
            <?php if(auth()->guard()->check()): ?>
              <form action="<?php echo e(route('orders.store')); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <input type="hidden" name="pizza" value="<?php echo e($pizza->id); ?>">
                <button type="submit"
                        style="background:#8B0008; color:#fff; padding:.5rem 1rem; border:none; border-radius:5px; cursor:pointer; width:100%;">
                  Bestellen
                </button>
              </form>
            <?php else: ?>
              <a href="<?php echo e(route('login')); ?>">
                <button type="button"
                        style="background:#8B0008; color:#fff; padding:.5rem 1rem; border:none; border-radius:5px; cursor:pointer; width:100%;">
                  Inloggen om te bestellen
                </button>
              </a>
            <?php endif; ?>
          </div>
        </div>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <p style="text-align:center; color:#777;">Sorry, momenteel geen pizza’s beschikbaar.</p>
      <?php endif; ?>
    </div>
  </section>

  
  <section style="padding:2rem; background:#fffef6;">
    <h2 style="text-align:center; font-family:'Sigmar One',cursive; color:#8B0008;">
      Laatste nieuws
    </h2>
    <div style="display:grid; grid-template-columns:1fr; gap:1.5rem; margin-top:1rem;">
      <?php $__currentLoopData = $newsItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <article style="background:#fff; border-radius:8px; box-shadow:0 2px 8px rgba(0,0,0,0.1); overflow:hidden;">
          <a href="<?php echo e(route('news.show', $item)); ?>" style="text-decoration:none; color:inherit;">
            <div style="width:100%; height:200px; overflow:hidden; background:#eee;">
              <img src="<?php echo e(asset('storage/'.$item->image_path)); ?>"
                   alt="<?php echo e($item->title); ?>"
                   style="width:100%; height:100%; object-fit:cover;">
            </div>
            <div style="padding:1rem;">
              <h3 style="margin:0 0 .5rem; font-family:'Sigmar One',cursive; color:#8B0008; font-size:1.2rem;">
                <?php echo e($item->title); ?>

              </h3>
              <p style="margin:0 0 .75rem; color:#444; font-size:.95rem; line-height:1.4;">
                <?php echo e(Str::limit($item->content,100)); ?>

              </p>
              <small style="color:#777; font-size:.85rem;">
                <?php echo e($item->published_at->format('d-m-Y')); ?>

              </small>
            </div>
          </a>
        </article>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
  </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /var/www/italiaansrestaurant/resources/views/welcome.blade.php ENDPATH**/ ?>