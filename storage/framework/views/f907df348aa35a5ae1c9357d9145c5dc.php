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
} elseif ($_instance->childHasBeenRendered('5UYLiKu')) {
    $componentId = $_instance->getRenderedChildComponentId('5UYLiKu');
    $componentTag = $_instance->getRenderedChildComponentTagName('5UYLiKu');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('5UYLiKu');
} else {
    $response = \Livewire\Livewire::mount('admin-posts-list', []);
    $html = $response->html();
    $_instance->logRenderedChild('5UYLiKu', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
            <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('admin-content-bulk-options', [])->html();
} elseif ($_instance->childHasBeenRendered('3wyeDaw')) {
    $componentId = $_instance->getRenderedChildComponentId('3wyeDaw');
    $componentTag = $_instance->getRenderedChildComponentTagName('3wyeDaw');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('3wyeDaw');
} else {
    $response = \Livewire\Livewire::mount('admin-content-bulk-options', []);
    $html = $response->html();
    $_instance->logRenderedChild('3wyeDaw', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>

        </div>
    </div>

    <?php echo $__env->make('content::admin.content.index-scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin::layouts.app', $extendParams, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/yahyehassan/Documents/Core/src/PikseraPackages/Post/resources/views/admin/posts/index.blade.php ENDPATH**/ ?>