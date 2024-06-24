<?php $__env->startSection('content'); ?>


    <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('admin-marketplace', [])->html();
} elseif ($_instance->childHasBeenRendered('gCQ5RGc')) {
    $componentId = $_instance->getRenderedChildComponentId('gCQ5RGc');
    $componentTag = $_instance->getRenderedChildComponentTagName('gCQ5RGc');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('gCQ5RGc');
} else {
    $response = \Livewire\Livewire::mount('admin-marketplace', []);
    $html = $response->html();
    $_instance->logRenderedChild('gCQ5RGc', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>


    <?php echo $__env->make('content::admin.content.index-scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin::layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/yahyehassan/Desktop/Bloggy/src/PikseraPackages/Marketplace/resources/views/admin/marketplace/index.blade.php ENDPATH**/ ?>