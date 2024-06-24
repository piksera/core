<?php $__env->startSection('content'); ?>


    <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('admin-marketplace', [])->html();
} elseif ($_instance->childHasBeenRendered('OgvAQbT')) {
    $componentId = $_instance->getRenderedChildComponentId('OgvAQbT');
    $componentTag = $_instance->getRenderedChildComponentTagName('OgvAQbT');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('OgvAQbT');
} else {
    $response = \Livewire\Livewire::mount('admin-marketplace', []);
    $html = $response->html();
    $_instance->logRenderedChild('OgvAQbT', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>


    <?php echo $__env->make('content::admin.content.index-scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin::layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/yahyehassan/Documents/Bloggy/src/PikseraPackages/Marketplace/resources/views/admin/marketplace/index.blade.php ENDPATH**/ ?>