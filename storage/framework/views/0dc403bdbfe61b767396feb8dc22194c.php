<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps(['quickContentAdd' => false]) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps(['quickContentAdd' => false]); ?>
<?php foreach (array_filter((['quickContentAdd' => false]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>


<?php
$style = '';
if (isset($isIframe) and $isIframe) {
    $style = 'position:  fixed; z-index: 100; margin-top:0px;  top:0px; width:100%; background-color: var(--tblr-bg-surface)';
}

?>
<?php if (isset($isIframe) and $isIframe) { ?>
    <div style="height: 60px; "></div>
<?php } ?>

    <div class="page-header d-print-none" style="<?php print $style; ?>">
        <div class="row g-2 align-items-center  <?php if(!$quickContentAdd): ?> px-5 <?php endif; ?> mw-100">
            <?php if(!$quickContentAdd): ?>

                <div class="col">
                    <div class="mx-1">
                        <?php echo $__env->yieldContent('topbar2-links-left', \View::make('admin::layouts.partials.topbar2-links-left-default')); ?>
                    </div>
                </div>
            <?php endif; ?>

            <!-- Page title actions -->
            <div class="col-auto ms-auto d-print-none">


                <?php


                    event_trigger('mw.admin.header.toolbar'); ?>

                <ul class="nav d-flex gap-2">
                    <?php echo $__env->yieldContent('topbar2-links-right', \View::make('admin::layouts.partials.topbar2-links-right-default', ['quickContentAdd' => $quickContentAdd])); ?>
                    <?php event_trigger('mw.admin.header.toolbar.ul'); ?>
                </ul>
            </div>
        </div>
    </div>



<div class="modal modal-blur fade hide" id="modal-add-new-admin" tabindex="-1" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header border-0">
                <div class="modal-title settings-title-inside">
                    Add New
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
<?php echo $__env->make('admin::layouts.partials.add-content-buttons', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
        </div>
    </div>
</div>
<?php /**PATH /Users/yahyehassan/Desktop/Bloggy/src/PikseraPackages/Admin/Providers/../resources/views/layouts/partials/topbar2.blade.php ENDPATH**/ ?>