<?php $__env->startSection('content'); ?>

    <div class="mx-sm-5 mx-1">
        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('admin::users-list')->html();
} elseif ($_instance->childHasBeenRendered('vGHfxQ0')) {
    $componentId = $_instance->getRenderedChildComponentId('vGHfxQ0');
    $componentTag = $_instance->getRenderedChildComponentTagName('vGHfxQ0');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('vGHfxQ0');
} else {
    $response = \Livewire\Livewire::mount('admin::users-list');
    $html = $response->html();
    $_instance->logRenderedChild('vGHfxQ0', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin::layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/yahyehassan/Documents/Bloggy/src/PikseraPackages/User/Providers/../resources/views/admin/users/index.blade.php ENDPATH**/ ?>