<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['href', 'color' => 'primary']));

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

foreach (array_filter((['href', 'color' => 'primary']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars); ?>

<?php
  $base = 'inline-block px-4 py-2 rounded font-semibold text-sm text-white';
  $colors = [
    'primary' => 'bg-red-800 hover:bg-red-900',
    'secondary' => 'bg-gray-500 hover:bg-gray-600',
    'danger' => 'bg-red-600 hover:bg-red-700',
  ];
?>

<a href="<?php echo e($href); ?>"
   <?php echo e($attributes->merge([
       'class' => $base . ' ' . (isset($colors[$color]) ? $colors[$color] : $colors['primary'])
   ])); ?>>
    <?php echo e($slot); ?>

</a>
<?php /**PATH /var/www/italiaansrestaurant/resources/views/components/link.blade.php ENDPATH**/ ?>