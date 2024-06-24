<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps(['disabled' => false]) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps(['disabled' => false]); ?>
<?php foreach (array_filter((['disabled' => false]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

<div class="form-control-live-edit-label-wrapper">
    <label class="form-switch">
        <div>
            <input type="checkbox" class="form-check-input" <?php echo e($disabled ? 'disabled' : ''); ?> <?php echo $attributes->merge(); ?> />
        </div>
        <div>
            <?php echo e($slot); ?>

        </div>
    </label>
</div>
<?php /**PATH /Users/yahyehassan/Documents/Bloggy/src/PikseraPackages/PikseraUI/resources/views/components/toggle.blade.php ENDPATH**/ ?>