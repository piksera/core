<?php $__env->startSection('content'); ?>

<div id="module-admin-wrapper" class="px-5">
    <div class="col-xxl-10 col-lg-11 col-12 mx-auto">

        <?php
echo app()->parser->process("<module ".app()->format->arrayToHtmlAttributes(['module' => true,'type' => ''.e($type).'','view' => 'admin'])." />");
?>

    </div>
</div>



<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin::layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/yahyehassan/Documents/Bloggy/src/PikseraPackages/Module/resources/views/admin/view.blade.php ENDPATH**/ ?>