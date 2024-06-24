<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps(['type' => 'submit', 'class' => 'btn btn-dark ']) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps(['type' => 'submit', 'class' => 'btn btn-dark ']); ?>
<?php foreach (array_filter((['type' => 'submit', 'class' => 'btn btn-dark ']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

<div class="form-control-live-edit-label-wrapper">

    <button <?php echo e($attributes->merge(['type' => $type, 'class' => $class])); ?>>
        <?php echo e($slot); ?>

    </button>
</div>
<?php /**PATH /Users/yahyehassan/Desktop/Bloggy/src/PikseraPackages/PikseraUI/resources/views/components/button.blade.php ENDPATH**/ ?>