<?php $__env->startSection('topbar2-links-right'); ?>
    <?php echo $__env->make('content::admin.content.topbar-parts.links-right', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('topbar2-links-left'); ?>
    <?php echo $__env->make('content::admin.content.topbar-parts.links-left', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <?php if(isset($recommended_content_id) and isset($recommended_category_id) and $content_id == 0): ?>
        <?php
echo app()->parser->process("<module ".app()->format->arrayToHtmlAttributes(['module' => true,'type' => 'content/edit','content_id' => ''.e($content_id).'','content_type' => 'page','parent' => ''.e($recommended_content_id).'','id' => 'main-content-edit-admin','category' => ''.e($recommended_category_id).''])." />");
?>
    <?php else: ?>
        <?php
echo app()->parser->process("<module ".app()->format->arrayToHtmlAttributes(['module' => true,'type' => 'content/edit','content_id' => ''.e($content_id).'','content_type' => 'page','id' => 'main-content-edit-admin'])." />");
?>
    <?php endif; ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin::layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/yahyehassan/Documents/Bloggy/src/PikseraPackages/Page/resources/views/admin/page/edit.blade.php ENDPATH**/ ?>