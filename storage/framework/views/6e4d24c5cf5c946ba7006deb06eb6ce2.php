<?php

    $options = [];
    if (isset($isIframe) && $isIframe == true) {
        $options = [
            'disableNavBar' => true,
            'disableTopBar' => true,
        ];
    }
?>



<?php $__env->startSection('content'); ?>

    <div class="col-xxl-10 col-lg-11 col-12 mx-auto">
        <?php
            $isShopAttribute = 0;
            if (isset($isShop)) {
                 $isShopAttribute = 1;
            }
        ?>

        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('admin-category-manage', ['isShop' => ''.e($isShopAttribute).'','is_shop' => ''.e($isShopAttribute).''])->html();
} elseif ($_instance->childHasBeenRendered('LjMkJ41')) {
    $componentId = $_instance->getRenderedChildComponentId('LjMkJ41');
    $componentTag = $_instance->getRenderedChildComponentTagName('LjMkJ41');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('LjMkJ41');
} else {
    $response = \Livewire\Livewire::mount('admin-category-manage', ['isShop' => ''.e($isShopAttribute).'','is_shop' => ''.e($isShopAttribute).'']);
    $html = $response->html();
    $_instance->logRenderedChild('LjMkJ41', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>

    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin::layouts.app', $options, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/yahyehassan/Documents/Core/src/PikseraPackages/Category/resources/views/admin/category/index.blade.php ENDPATH**/ ?>