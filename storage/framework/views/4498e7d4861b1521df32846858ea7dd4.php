<?php $__env->startSection('content'); ?>

<div class=" col-xl-10 col-12 mx-xl-auto px-xl-0 px-3">
    <div class="card-header d-flex flex-wrap align-items-center justify-content-between">
        <div class="">
            <?php
echo app()->parser->process("<module ".app()->format->arrayToHtmlAttributes(['module' => true,'type' => 'admin/modules/info_module_title','for-module' => 'contact_form'])." />");
?>
        </div>


    </div>
    <div class="card">
       <div class="card-body">
           <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('contact-form.list')->html();
} elseif ($_instance->childHasBeenRendered('MJRmE54')) {
    $componentId = $_instance->getRenderedChildComponentId('MJRmE54');
    $componentTag = $_instance->getRenderedChildComponentTagName('MJRmE54');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('MJRmE54');
} else {
    $response = \Livewire\Livewire::mount('contact-form.list');
    $html = $response->html();
    $_instance->logRenderedChild('MJRmE54', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
       </div>
    </div>

</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin::layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/yahyehassan/Documents/Bloggy/userfiles/modules/contact_form/src/resources/views/livewire//admin/contact-form/index.blade.php ENDPATH**/ ?>