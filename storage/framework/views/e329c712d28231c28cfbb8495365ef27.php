<?php
$extendParams = [];
if(isset($isIframe) && $isIframe == true) {
    $extendParams['disableNavBar'] = true;
    $extendParams['disableTopBar'] = true;
}
?>



<?php $__env->startSection('content'); ?>

    <div class="d-flex">

        <?php echo $__env->make('content::admin.content.index-page-category-tree', [
             'is_blog'=>1,
         ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <div class="module-content col-xxl-10 col-lg-11 col-12 mx-auto">

            <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('admin-posts-list', [])->html();
} elseif ($_instance->childHasBeenRendered('why0bD6')) {
    $componentId = $_instance->getRenderedChildComponentId('why0bD6');
    $componentTag = $_instance->getRenderedChildComponentTagName('why0bD6');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('why0bD6');
} else {
    $response = \Livewire\Livewire::mount('admin-posts-list', []);
    $html = $response->html();
    $_instance->logRenderedChild('why0bD6', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
            <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('admin-content-bulk-options', [])->html();
} elseif ($_instance->childHasBeenRendered('vYB3qTr')) {
    $componentId = $_instance->getRenderedChildComponentId('vYB3qTr');
    $componentTag = $_instance->getRenderedChildComponentTagName('vYB3qTr');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('vYB3qTr');
} else {
    $response = \Livewire\Livewire::mount('admin-content-bulk-options', []);
    $html = $response->html();
    $_instance->logRenderedChild('vYB3qTr', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>

        </div>
    </div>

    <?php echo $__env->make('content::admin.content.index-scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin::layouts.app', $extendParams, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/yahyehassan/Documents/Bloggy/src/PikseraPackages/Post/resources/views/admin/posts/index.blade.php ENDPATH**/ ?>