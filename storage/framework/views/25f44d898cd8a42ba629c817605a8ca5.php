<?php $__env->startSection('content'); ?>
    <div id="module-admin-wrapper" class="col-xxl-10 col-lg-11 col-12 mx-auto">

        <?php if(isset($_REQUEST['ddd'])): ?>
          <?php
echo app()->parser->process("<module ".app()->format->arrayToHtmlAttributes(['module' => true,'type' => 'admin/modules'])." />");
?>
        <?php endif; ?>

        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('admin-modules-list', [])->html();
} elseif ($_instance->childHasBeenRendered('21gGlJI')) {
    $componentId = $_instance->getRenderedChildComponentId('21gGlJI');
    $componentTag = $_instance->getRenderedChildComponentTagName('21gGlJI');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('21gGlJI');
} else {
    $response = \Livewire\Livewire::mount('admin-modules-list', []);
    $html = $response->html();
    $_instance->logRenderedChild('21gGlJI', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>

    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin::layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/yahyehassan/Documents/Core/src/MicroweberPackages/Module/resources/views/admin/index.blade.php ENDPATH**/ ?>