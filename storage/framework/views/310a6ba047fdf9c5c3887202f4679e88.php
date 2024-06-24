<?php
$options =[
    'disableTopBar' => true,
    'disableNavBar' => true,
    'iframeMode' => true,
];

if(isset($_GET['disableTopBar']) and $_GET['disableTopBar']){
    $options['disableTopBar'] = intval($_GET['disableTopBar']);
}
if(isset($_GET['disableNavBar']) and $_GET['disableNavBar']){
    $options['disableNavBar'] = intval($_GET['disableNavBar']);
}

if(isset($_GET['iframeMode']) and $_GET['iframeMode']){
    $options['iframeMode'] = intval($_GET['iframeMode']);
}

?>
<?php echo $__env->make('admin::layouts.partials.header',$options, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


<?php if (! empty(trim($__env->yieldContent('content')))): ?>
    <main class="module-main-holder col-lg-12">
        <?php echo $__env->yieldContent('content' ); ?>
    </main>
<?php endif; ?>


<?php echo $__env->make('admin::layouts.partials.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /**PATH /Users/yahyehassan/Documents/Bloggy/src/PikseraPackages/Admin/Providers/../resources/views/layouts/iframe.blade.php ENDPATH**/ ?>