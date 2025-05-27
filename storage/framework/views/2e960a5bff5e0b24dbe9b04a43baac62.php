
<?php $__env->startSection('title', 'Nieuwe FAQ – Admin Panel'); ?>
<?php $__env->startSection('content'); ?>
<main style="flex:1; padding:2rem; overflow-y:auto; max-width:600px; margin:auto; background:#FFF7D4; font-family:'Outfit', sans-serif;">
  <h1 style="color:#8B0000; font-family:'Sigmar One', cursive;">Nieuwe vraag toevoegen</h1>

  <a href="<?php echo e(route('admin.faq.index')); ?>"
     style="display:inline-block; margin-bottom:1rem; color:#8B0000; text-decoration:none;">
    &larr; Terug naar FAQ
  </a>

  <form method="POST" action="<?php echo e(route('admin.faq.store')); ?>"
        style="background:#fff; padding:2rem; border-radius:8px; box-shadow:0 0 10px rgba(0,0,0,0.1);">
    <?php echo csrf_field(); ?>

    
    <div style="margin-bottom:1rem;">
      <label for="faq_category_id">Categorie</label><br>
      <select name="faq_category_id" id="faq_category_id" required
              style="width:100%; padding:.5rem; border:1px solid #ccc; border-radius:4px;">
        <option value="" disabled selected>Kies een categorie</option>
        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <option value="<?php echo e($category->id); ?>" <?php echo e(old('faq_category_id') == $category->id ? 'selected' : ''); ?>>
            <?php echo e($category->name); ?>

          </option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </select>
      <?php $__errorArgs = ['faq_category_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div style="color:#c00;"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
    </div>

    
    <div style="margin-bottom:1rem;">
      <label for="question">Vraag</label><br>
      <input type="text" id="question" name="question" value="<?php echo e(old('question')); ?>" required
             style="width:100%; padding:.5rem; border:1px solid #ccc; border-radius:4px;">
      <?php $__errorArgs = ['question'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div style="color:#c00;"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
    </div>

    
    <div style="margin-bottom:1rem;">
      <label for="answer">Antwoord (optioneel)</label><br>
      <textarea id="answer" name="answer" rows="4"
                style="width:100%; padding:.5rem; border:1px solid #ccc; border-radius:4px;"><?php echo e(old('answer')); ?></textarea>
      <?php $__errorArgs = ['answer'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div style="color:#c00;"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
    </div>

    
    <button type="submit"
            style="background:#8B0000; color:#fff; padding:.75rem 1.5rem; border:none; border-radius:5px; cursor:pointer;">
      Opslaan
    </button>
  </form>
</main>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /var/www/italiaansrestaurant/resources/views/admin/faq/create.blade.php ENDPATH**/ ?>