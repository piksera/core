<?php $__env->startSection('content'); ?>
<div class="d-flex">

    <?php echo $__env->make('content::admin.content.index-page-category-tree', [
       'is_shop'=>1,
   ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="module-content col-xxl-10 col-lg-11 col-12 mx-auto">

        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('admin-products-list', [])->html();
} elseif ($_instance->childHasBeenRendered('IIGpyuI')) {
    $componentId = $_instance->getRenderedChildComponentId('IIGpyuI');
    $componentTag = $_instance->getRenderedChildComponentTagName('IIGpyuI');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('IIGpyuI');
} else {
    $response = \Livewire\Livewire::mount('admin-products-list', []);
    $html = $response->html();
    $_instance->logRenderedChild('IIGpyuI', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('admin-content-bulk-options', [])->html();
} elseif ($_instance->childHasBeenRendered('D2p1Of9')) {
    $componentId = $_instance->getRenderedChildComponentId('D2p1Of9');
    $componentTag = $_instance->getRenderedChildComponentTagName('D2p1Of9');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('D2p1Of9');
} else {
    $response = \Livewire\Livewire::mount('admin-content-bulk-options', []);
    $html = $response->html();
    $_instance->logRenderedChild('D2p1Of9', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>

    </div>
</div>

<?php echo $__env->make('content::admin.content.index-scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin::layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/yahyehassan/Documents/Core/src/MicroweberPackages/Product/resources/views/admin/product/index.blade.php ENDPATH**/ ?>