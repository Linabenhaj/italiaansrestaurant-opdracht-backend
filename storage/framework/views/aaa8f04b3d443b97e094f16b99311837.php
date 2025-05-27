<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['type' => 'submit', 'color' => 'primary', 'href' => null]));

foreach ($attributes->all() as $__key => $__value) {
    if (in_array($__key, $__propNames)) {
        $$__key = $$__key ?? $__value;
    } else {
        $__newAttributes[$__key] = $__value;
    }
}

$attributes = new \Illuminate\View\ComponentAttributeBag($__newAttributes);

unset($__propNames);
unset($__newAttributes);

foreach (array_filter((['type' => 'submit', 'color' => 'primary', 'href' => null]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars); ?>

<?php
  $base = 'inline-block px-4 py-2 rounded font-semibold text-sm';
  $colors = [
    'primary' => 'bg-red-800 hover:bg-red-900 text-white',
    'danger' => 'bg-red-600 hover:bg-red-700 text-white',
    'secondary' => 'bg-gray-500 hover:bg-gray-600 text-white',
  ];
  $finalClass = $base . ' ' . ($colors[$color] ?? $colors['primary']);
?>

<?php if($href): ?>
  <a href="<?php echo e($href); ?>"
     <?php echo e($attributes->merge(['class' => $finalClass])); ?>>
    <?php echo e($slot); ?>

  </a>
<?php else: ?>
  <button type="<?php echo e($type); ?>"
          <?php echo e($attributes->merge(['class' => $finalClass])); ?>>
    <?php echo e($slot); ?>

  </button>
<?php endif; ?>
<?php /**PATH /var/www/italiaansrestaurant/resources/views/components/button.blade.php ENDPATH**/ ?>