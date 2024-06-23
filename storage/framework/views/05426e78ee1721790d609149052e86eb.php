<?php $__env->startSection('content'); ?>

    <div class="d-flex">

        <?php echo $__env->make('content::admin.content.index-page-category-tree', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <div class="module-content col-xxl-10 col-lg-11 col-12 mx-auto">

            <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('admin-pages-list', [])->html();
} elseif ($_instance->childHasBeenRendered('djNAEpu')) {
    $componentId = $_instance->getRenderedChildComponentId('djNAEpu');
    $componentTag = $_instance->getRenderedChildComponentTagName('djNAEpu');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('djNAEpu');
} else {
    $response = \Livewire\Livewire::mount('admin-pages-list', []);
    $html = $response->html();
    $_instance->logRenderedChild('djNAEpu', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
            <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('admin-content-bulk-options', [])->html();
} elseif ($_instance->childHasBeenRendered('g5yoOIH')) {
    $componentId = $_instance->getRenderedChildComponentId('g5yoOIH');
    $componentTag = $_instance->getRenderedChildComponentTagName('g5yoOIH');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('g5yoOIH');
} else {
    $response = \Livewire\Livewire::mount('admin-content-bulk-options', []);
    $html = $response->html();
    $_instance->logRenderedChild('g5yoOIH', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>

        </div>
    </div>

    <?php echo $__env->make('content::admin.content.index-scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin::layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/yahyehassan/Documents/Core/src/MicroweberPackages/Page/resources/views/admin/page/index.blade.php ENDPATH**/ ?>