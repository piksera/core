<?php $__env->startSection('content'); ?>
<div class="d-flex">

    <?php echo $__env->make('content::admin.content.index-page-category-tree', [
       'is_shop'=>1,
   ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="module-content col-xxl-10 col-lg-11 col-12 mx-auto">

        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('admin-products-list', [])->html();
} elseif ($_instance->childHasBeenRendered('eLvG4U5')) {
    $componentId = $_instance->getRenderedChildComponentId('eLvG4U5');
    $componentTag = $_instance->getRenderedChildComponentTagName('eLvG4U5');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('eLvG4U5');
} else {
    $response = \Livewire\Livewire::mount('admin-products-list', []);
    $html = $response->html();
    $_instance->logRenderedChild('eLvG4U5', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('admin-content-bulk-options', [])->html();
} elseif ($_instance->childHasBeenRendered('4oGYoQp')) {
    $componentId = $_instance->getRenderedChildComponentId('4oGYoQp');
    $componentTag = $_instance->getRenderedChildComponentTagName('4oGYoQp');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('4oGYoQp');
} else {
    $response = \Livewire\Livewire::mount('admin-content-bulk-options', []);
    $html = $response->html();
    $_instance->logRenderedChild('4oGYoQp', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>

    </div>
</div>

<?php echo $__env->make('content::admin.content.index-scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin::layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/yahyehassan/Documents/Bloggy/src/PikseraPackages/Product/resources/views/admin/product/index.blade.php ENDPATH**/ ?>