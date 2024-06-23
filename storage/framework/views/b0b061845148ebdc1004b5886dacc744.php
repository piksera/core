<?php
$options['disableNavBar'] = false;
$options['disableTopBar'] = false;

if (isset($disableNavBar)) {
    $options['disableNavBar'] = $disableNavBar;
}
if (isset($disableTopBar)) {
    $options['disableTopBar'] = $disableTopBar;
}
?>

<?php echo $__env->make('admin::layouts.partials.header',$options, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php if (! empty(trim($__env->yieldContent('content')))): ?>

     <main class="module-main-holder page-wrapper px-3" id="admin-side-content">

         <?php if($options['disableTopBar'] == false): ?>
         <div>
             <?php echo $__env->make('admin::layouts.partials.topbar2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
         </div>
         <?php endif; ?>

       <div class="<?php if(isset($options['iframe'])): ?> page-body-iframe <?php else: ?> page-body <?php endif; ?>"  >
           <?php echo $__env->yieldContent('content'); ?>
       </div>
        <?php if(!isset($options['disableNavBar']) or !$options['disableNavBar']): ?>
            <?php echo $__env->make('admin::layouts.partials.copyright', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>
    </main>
<?php endif; ?>


<?php echo $__env->make('admin::layouts.partials.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php /**PATH /Users/yahyehassan/Documents/Core/src/MicroweberPackages/Admin/Providers/../resources/views/layouts/app.blade.php ENDPATH**/ ?>