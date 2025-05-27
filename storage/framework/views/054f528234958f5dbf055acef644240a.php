

<?php $__env->startSection('title', $newsItem->title . ' – Nieuws – Pizzeria Antonio'); ?>

<?php $__env->startSection('content'); ?>
  <main style="padding:2rem; max-width:900px; margin:2rem auto;">
    <article style="background:#fff; padding:2rem; border-radius:10px; box-shadow:0 4px 12px rgba(0,0,0,0.1);">
      <h1 style="font-family:'Sigmar One', cursive; color:#8B0008; font-size:2rem; margin-bottom:0.5rem;">
        <?php echo e($newsItem->title); ?>

      </h1>
      <p style="color:#777; font-size:0.9rem; margin-bottom:1.5rem;">
        Gepubliceerd op <?php echo e($newsItem->published_at->format('d-m-Y')); ?>

      </p>

      <?php if($newsItem->image_path): ?>
        <div style="margin-bottom:1.5rem;">
          <img src="<?php echo e(asset('storage/'.$newsItem->image_path)); ?>"
               alt="<?php echo e($newsItem->title); ?>"
               style="width:100%; max-height:400px; object-fit:cover; border-radius:8px;">
        </div>
      <?php endif; ?>

      <div style="color:#333; line-height:1.7; font-size:1.05rem;">
        <?php echo nl2br(e($newsItem->content)); ?>

      </div>

      <div style="margin-top:2rem; text-align:right;">
        <a href="<?php echo e(route('news.index')); ?>"
           style="color:#8B0008; font-weight:bold; text-decoration:none; border:1px solid #8B0008; padding:.5rem 1rem; border-radius:6px; background:#FFF7D4;">
          &larr; Terug naar nieuws
        </a>
      </div>
    </article>
  </main>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /var/www/italiaansrestaurant/resources/views/news/show.blade.php ENDPATH**/ ?>