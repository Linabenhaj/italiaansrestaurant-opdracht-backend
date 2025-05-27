<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames(([
    'type' => 'text',
    'name',
    'id' => $name,
    'value' => '',
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
    'type' => 'text',
    'name',
    'id' => $name,
    'value' => '',
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars); ?>

<input
    type="<?php echo e($type); ?>"
    name="<?php echo e($name); ?>"
    id="<?php echo e($id); ?>"
    value="<?php echo e(old($name, $value)); ?>"
    <?php echo e($attributes->merge([
        'class' => 'border-gray-300 focus:border-red-800 focus:ring-red-800 rounded-md shadow-sm w-full p-2'
    ])); ?>

/>
<?php /**PATH /var/www/italiaansrestaurant/resources/views/components/input.blade.php ENDPATH**/ ?>