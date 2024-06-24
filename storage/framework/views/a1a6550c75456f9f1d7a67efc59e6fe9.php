<?php $__env->startSection('content'); ?>

    <div class="mx-sm-5 mx-1">
        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('admin::users-list')->html();
} elseif ($_instance->childHasBeenRendered('G3emU6M')) {
    $componentId = $_instance->getRenderedChildComponentId('G3emU6M');
    $componentTag = $_instance->getRenderedChildComponentTagName('G3emU6M');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('G3emU6M');
} else {
    $response = \Livewire\Livewire::mount('admin::users-list');
    $html = $response->html();
    $_instance->logRenderedChild('G3emU6M', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin::layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/yahyehassan/Desktop/Bloggy/src/PikseraPackages/User/Providers/../resources/views/admin/users/index.blade.php ENDPATH**/ ?>