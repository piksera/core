<?php $__env->startSection('content'); ?>

    <div class="d-flex">

        <?php echo $__env->make('content::admin.content.index-page-category-tree', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <div class="module-content col-xxl-10 col-lg-11 col-12 mx-auto">

            <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('admin-pages-list', [])->html();
} elseif ($_instance->childHasBeenRendered('VCJd8lw')) {
    $componentId = $_instance->getRenderedChildComponentId('VCJd8lw');
    $componentTag = $_instance->getRenderedChildComponentTagName('VCJd8lw');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('VCJd8lw');
} else {
    $response = \Livewire\Livewire::mount('admin-pages-list', []);
    $html = $response->html();
    $_instance->logRenderedChild('VCJd8lw', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
            <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('admin-content-bulk-options', [])->html();
} elseif ($_instance->childHasBeenRendered('3LkhIOR')) {
    $componentId = $_instance->getRenderedChildComponentId('3LkhIOR');
    $componentTag = $_instance->getRenderedChildComponentTagName('3LkhIOR');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('3LkhIOR');
} else {
    $response = \Livewire\Livewire::mount('admin-content-bulk-options', []);
    $html = $response->html();
    $_instance->logRenderedChild('3LkhIOR', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>

        </div>
    </div>

    <?php echo $__env->make('content::admin.content.index-scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin::layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/yahyehassan/Desktop/Bloggy/src/PikseraPackages/Page/resources/views/admin/page/index.blade.php ENDPATH**/ ?>