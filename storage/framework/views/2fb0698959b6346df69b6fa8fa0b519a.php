 

<?php $__env->startSection('page-title', 'Bewerk Nieuwsitem'); ?>

<?php $__env->startSection('admin-content'); ?>
  <div style="margin-bottom:1rem;">
    <a href="<?php echo e(route('admin.news.index')); ?>" style="color:#8B0000; text-decoration:none;">&larr; Terug naar nieuwsbeheer</a>
  </div>

  <?php if($errors->any()): ?>
    <div style="background:#ffe2e2; color:#c00; padding:1rem; border-radius:5px; margin-bottom:1rem;">
      <ul style="margin:0;padding-left:1.25rem;">
        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $err): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <li><?php echo e($err); ?></li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </ul>
    </div>
  <?php endif; ?>

  <form method="POST" action="<?php echo e(route('admin.news.update', $news)); ?>" enctype="multipart/form-data" style="max-width:600px; margin:auto;">
    <?php echo csrf_field(); ?> <?php echo method_field('PUT'); ?>

    <div style="margin-bottom:1rem;">
      <label for="title">Titel</label><br>
      <input id="title" name="title" type="text" value="<?php echo e(old('title', $news->title)); ?>" required style="width:100%; padding:.5rem; border:1px solid #ccc; border-radius:4px;">
    </div>

    <?php if($news->image_path): ?>
      <div style="margin-bottom:1rem;">
        <label>Huidige afbeelding</label><br>
        <img src="<?php echo e(asset('storage/'.$news->image_path)); ?>"
             alt="Huidige afbeelding"
             style="max-width:100%; border-radius:4px; box-shadow:0 2px 6px rgba(0,0,0,0.1);">
      </div>
    <?php endif; ?>

    <div style="margin-bottom:1rem;">
      <label for="image">Nieuwe afbeelding (optioneel)</label><br>
      <input id="image" name="image" type="file">
    </div>

    <div style="margin-bottom:1rem;">
      <label for="content">Content</label><br>
      <textarea id="content" name="content" rows="6" required style="width:100%; padding:.5rem; border:1px solid #ccc; border-radius:4px;"><?php echo e(old('content', $news->content)); ?></textarea>
    </div>

    <div style="margin-bottom:1rem;">
      <label for="published_at">Publicatiedatum</label><br>
      <input id="published_at" name="published_at" type="date" value="<?php echo e(old('published_at', $news->published_at->toDateString())); ?>" style="padding:.5rem; border:1px solid #ccc; border-radius:4px;">
    </div>

    <button type="submit" style="background:#8B0000; color:#fff; padding:.5rem 1rem; border:none; border-radius:5px; cursor:pointer;">
      Bijwerken
    </button>
  </form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /var/www/italiaansrestaurant/resources/views/admin/news/edit.blade.php ENDPATH**/ ?>