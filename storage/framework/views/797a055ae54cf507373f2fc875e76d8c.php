<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames(([
    'name',
    'rows' => 4,
    'required' => false,
]));

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

foreach (array_filter(([
    'name',
    'rows' => 4,
    'required' => false,
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars); ?>

<textarea
    name="<?php echo e($name); ?>"
    id="<?php echo e($name); ?>"
    rows="<?php echo e($rows); ?>"
    <?php echo e($attributes->merge(['class' => 'w-full p-2 border rounded'])); ?>

    <?php if($required): ?> required <?php endif; ?>
><?php echo e(old($name)); ?></textarea>
<?php /**PATH /var/www/italiaansrestaurant/resources/views/components/textarea.blade.php ENDPATH**/ ?>