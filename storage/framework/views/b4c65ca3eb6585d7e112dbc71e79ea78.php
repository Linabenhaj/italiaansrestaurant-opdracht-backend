<!DOCTYPE html>
<html lang="nl">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1"/>
  <title>FAQ – Pizzeria Antonio</title>
  <link href="https://fonts.googleapis.com/css2?family=Sigmar+One&family=Outfit:wght@300;400;600;800&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: 'Outfit', sans-serif;
      background: #FFF7D4;
      margin: 0;
    }

    .faq-question {
      cursor: pointer;
      font-weight: 600;
      background-color: #fff7eb;
      padding: 1rem;
      border: 1px solid #eee;
      border-radius: 6px;
      margin-top: 1rem;
      transition: background 0.3s ease;
    }

    .faq-question:hover {
      background-color: #fff0cc;
    }

    .faq-answer {
      display: none;
      padding: 1rem;
      margin-top: -0.5rem;
      background: #fffef6;
      border-left: 4px solid #8B0000;
      border-radius: 0 0 6px 6px;
      color: #444;
    }

    .faq-answer.open {
      display: block;
    }

    form input, form select, form textarea {
      width: 100%;
      padding: .75rem;
      margin-bottom: 1rem;
      border: 1px solid #ccc;
      border-radius: 5px;
      font-family: inherit;
    }

    form button {
      background: #8B0000;
      color: #fff;
      padding: .75rem 1.5rem;
      border: none;
      border-radius: 6px;
      font-size: 1rem;
      cursor: pointer;
    }

    form button:hover {
      background: #a80000;
    }
  </style>
  <script>
    document.addEventListener('DOMContentLoaded', () => {
      const questions = document.querySelectorAll('.faq-question');
      questions.forEach(q => {
        q.addEventListener('click', () => {
          const answer = q.nextElementSibling;
          answer.classList.toggle('open');
        });
      });
    });
  </script>
</head>
<body>

  <?php echo $__env->make('partials.header', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
  <?php echo $__env->make('partials.navbar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

  <main style="max-width: 900px; margin: 2rem auto; padding: 0 1rem;">
    <h1 style="font-family:'Sigmar One', cursive; color:#8B0000; margin-bottom:1.5rem;">Veelgestelde Vragen</h1>

    
    <?php $__currentLoopData = $faqCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <section style="margin-bottom:2.5rem;">
        <h2 style="background:#8B0000; color:#fff; padding:.75rem 1rem; border-radius:4px; font-size:1.25rem;">
          <?php echo e($category->name); ?>

        </h2>

        <?php if($category->faqs->isEmpty()): ?>
          <p style="padding:1rem; color:#555;"><em>Geen vragen in deze categorie.</em></p>
        <?php else: ?>
          <?php $__currentLoopData = $category->faqs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $faq): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div>
              <div class="faq-question"><?php echo e($faq->question); ?></div>
              <div class="faq-answer"><?php echo e($faq->answer); ?></div>
            </div>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
      </section>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    
    <section style="margin-top:3rem; background:#fff; padding:2rem; border-radius:8px; box-shadow:0 0 10px rgba(0,0,0,0.1);">
      <h2 style="font-family:'Sigmar One', cursive; color:#8B0000; margin-bottom:1rem;">Stel je vraag</h2>

      <form action="<?php echo e(route('faq.submit')); ?>" method="POST">
        <?php echo csrf_field(); ?>

        <label for="faq_category_id"><strong>Categorie</strong></label>
        <select name="faq_category_id" id="faq_category_id" required>
          <option value="">— kies een categorie —</option>
          <?php $__currentLoopData = $faqCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($category->id); ?>" <?php echo e(old('faq_category_id') == $category->id ? 'selected' : ''); ?>>
              <?php echo e($category->name); ?>

            </option>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
        <?php $__errorArgs = ['faq_category_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
          <div style="color:#c00; margin-bottom:1rem;"><?php echo e($message); ?></div>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

        <label for="question"><strong>Je vraag</strong></label>
        <textarea name="question" id="question" rows="4" required><?php echo e(old('question')); ?></textarea>
        <?php $__errorArgs = ['question'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
          <div style="color:#c00; margin-bottom:1rem;"><?php echo e($message); ?></div>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

        <button type="submit">Verstuur vraag</button>
      </form>
    </section>
  </main>

</body>
</html>
<?php /**PATH /var/www/italiaansrestaurant/resources/views/faq/index.blade.php ENDPATH**/ ?>