<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps(['quickContentAdd' => false,'content_type' => false]) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps(['quickContentAdd' => false,'content_type' => false]); ?>
<?php foreach (array_filter((['quickContentAdd' => false,'content_type' => false]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

<div class="d-flex align-items-center">

    <?php
    $showBackButton = true;
    if (isset($isIframe) && $isIframe) {
        $showBackButton = false;
    }
    ?>

    <?php if($showBackButton and $content_type): ?>
    <div class="mw-toolbar-back-button-wrapper me-3">
        <div class="main-toolbar mw-modules-toolbar-back-button-holder mb-3 d-flex align-items-center" id="mw-modules-toolbar" style="">
            <div>
                <a href="<?php echo e(route('admin.'.$content_type.'.index')); ?>">
                    <svg fill="currentColor" xmlns="http://www.w3.org/2000/svg" height="28" viewBox="0 96 960 960" width="28"><path d="M480 896 160 576l320-320 47 46.666-240.001 240.001H800v66.666H286.999L527 849.334 480 896Z"></path></svg>
                </a>
            </div>
        </div>
    </div>
    <div class="mb-3 d-flex align-items-center">
        <a class="tblr-body-color form-label mb-0 text-decoration-none font-weight-bold d-md-block d-none" href="<?php echo e(route('admin.'.$content_type.'.index')); ?>" class="mb-0">
            <?php if($content_id > 0): ?>
                <?php echo e(_e("Edit " . ucfirst($content_type))); ?>

            <?php else: ?>
                <?php echo e(_e("Add " . ucfirst($content_type))); ?>

            <?php endif; ?>
        </a>
        <span class="tblr-body-color form-label mb-0 font-weight-bold ms-1 d-lg-block d-none">
           <?php if($content_id > 0): ?>
                / <?php echo e(content_title($content_id)); ?>


                <a class="tblr-body-color" href="<?php echo e(content_link($content_id)); ?>" target="_blank" data-bs-toggle="tooltip" aria-label="View" data-bs-original-title="View">

<svg xmlns="http://www.w3.org/2000/svg" height="14" viewBox="0 -960 960 960" width="14"><path d="M200-120q-33 0-56.5-23.5T120-200v-560q0-33 23.5-56.5T200-840h280v80H200v560h560v-280h80v280q0 33-23.5 56.5T760-120H200Zm188-212-56-56 372-372H560v-80h280v280h-80v-144L388-332Z"/></svg>


                    </a>


            <?php endif; ?>
        </span>
    </div>
    <?php endif; ?>

</div>
<?php /**PATH /Users/yahyehassan/Desktop/Bloggy/src/PikseraPackages/Content/resources/views/admin/content/topbar-parts/links-left.blade.php ENDPATH**/ ?>