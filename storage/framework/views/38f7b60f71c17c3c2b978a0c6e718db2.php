<?php $__env->startSection('content'); ?>

    <div class="d-flex">

        <?php echo $__env->make('content::admin.content.index-page-category-tree', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <div class="module-content col-xxl-10 col-lg-11 col-12 mx-auto">

            <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('admin-pages-list', [])->html();
} elseif ($_instance->childHasBeenRendered('HCX17oC')) {
    $componentId = $_instance->getRenderedChildComponentId('HCX17oC');
    $componentTag = $_instance->getRenderedChildComponentTagName('HCX17oC');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('HCX17oC');
} else {
    $response = \Livewire\Livewire::mount('admin-pages-list', []);
    $html = $response->html();
    $_instance->logRenderedChild('HCX17oC', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
            <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('admin-content-bulk-options', [])->html();
} elseif ($_instance->childHasBeenRendered('Cf85bRa')) {
    $componentId = $_instance->getRenderedChildComponentId('Cf85bRa');
    $componentTag = $_instance->getRenderedChildComponentTagName('Cf85bRa');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('Cf85bRa');
} else {
    $response = \Livewire\Livewire::mount('admin-content-bulk-options', []);
    $html = $response->html();
    $_instance->logRenderedChild('Cf85bRa', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>

        </div>
    </div>

    <?php echo $__env->make('content::admin.content.index-scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin::layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/yahyehassan/Documents/Bloggy/src/PikseraPackages/Page/resources/views/admin/page/index.blade.php ENDPATH**/ ?>