<?php $__env->startSection('content'); ?>

    <?php
echo app()->parser->process("<module ".app()->format->arrayToHtmlAttributes(['module' => true,'type' => 'admin/dashboard','id' => 'admin-dashboard','class' => 'px-5'])." />");
?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin::layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/yahyehassan/Documents/Bloggy/src/PikseraPackages/Admin/Providers/../resources/views/admin/dashboard.blade.php ENDPATH**/ ?>