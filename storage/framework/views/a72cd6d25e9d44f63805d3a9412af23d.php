<?php $__env->startSection('content'); ?>
<div class="d-flex">

    <?php echo $__env->make('content::admin.content.index-page-category-tree', [
       'is_shop'=>1,
   ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="module-content col-xxl-10 col-lg-11 col-12 mx-auto">

        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('admin-products-list', [])->html();
} elseif ($_instance->childHasBeenRendered('FXTE1jG')) {
    $componentId = $_instance->getRenderedChildComponentId('FXTE1jG');
    $componentTag = $_instance->getRenderedChildComponentTagName('FXTE1jG');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('FXTE1jG');
} else {
    $response = \Livewire\Livewire::mount('admin-products-list', []);
    $html = $response->html();
    $_instance->logRenderedChild('FXTE1jG', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('admin-content-bulk-options', [])->html();
} elseif ($_instance->childHasBeenRendered('YD52YIy')) {
    $componentId = $_instance->getRenderedChildComponentId('YD52YIy');
    $componentTag = $_instance->getRenderedChildComponentTagName('YD52YIy');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('YD52YIy');
} else {
    $response = \Livewire\Livewire::mount('admin-content-bulk-options', []);
    $html = $response->html();
    $_instance->logRenderedChild('YD52YIy', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>

    </div>
</div>

<?php echo $__env->make('content::admin.content.index-scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin::layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/yahyehassan/Desktop/Bloggy/src/PikseraPackages/Product/resources/views/admin/product/index.blade.php ENDPATH**/ ?>