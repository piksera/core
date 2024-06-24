<?php $__env->startSection('topbar2-links-left'); ?>

    <div class="mw-toolbar-back-button-wrapper">
        <div class="main-toolbar mw-modules-toolbar-back-button-holder mb-3 " id="mw-modules-toolbar" style="">
            <a href="<?php echo e(admin_url('users')); ?>">
                <svg fill="currentColor" xmlns="http://www.w3.org/2000/svg" height="28" viewBox="0 96 960 960" width="28"><path d="M480 896 160 576l320-320 47 46.666-240.001 240.001H800v66.666H286.999L527 849.334 480 896Z"></path></svg>
            </a>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="mx-sm-5 mx-1">

        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('admin::edit-user.update-profile-form')->html();
} elseif ($_instance->childHasBeenRendered('ECU6iaO')) {
    $componentId = $_instance->getRenderedChildComponentId('ECU6iaO');
    $componentTag = $_instance->getRenderedChildComponentTagName('ECU6iaO');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('ECU6iaO');
} else {
    $response = \Livewire\Livewire::mount('admin::edit-user.update-profile-form');
    $html = $response->html();
    $_instance->logRenderedChild('ECU6iaO', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
        <?php if (isset($component)) { $__componentOriginal71c6471fa76ce19017edc287b6f4508c = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'piksera-ui::components.section-border','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('piksera-ui::section-border'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal71c6471fa76ce19017edc287b6f4508c)): ?>
<?php $component = $__componentOriginal71c6471fa76ce19017edc287b6f4508c; ?>
<?php unset($__componentOriginal71c6471fa76ce19017edc287b6f4508c); ?>
<?php endif; ?>

        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('admin::edit-user.update-status-and-role-form')->html();
} elseif ($_instance->childHasBeenRendered('sbw9CQX')) {
    $componentId = $_instance->getRenderedChildComponentId('sbw9CQX');
    $componentTag = $_instance->getRenderedChildComponentTagName('sbw9CQX');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('sbw9CQX');
} else {
    $response = \Livewire\Livewire::mount('admin::edit-user.update-status-and-role-form');
    $html = $response->html();
    $_instance->logRenderedChild('sbw9CQX', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
        <?php if (isset($component)) { $__componentOriginal71c6471fa76ce19017edc287b6f4508c = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'piksera-ui::components.section-border','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('piksera-ui::section-border'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal71c6471fa76ce19017edc287b6f4508c)): ?>
<?php $component = $__componentOriginal71c6471fa76ce19017edc287b6f4508c; ?>
<?php unset($__componentOriginal71c6471fa76ce19017edc287b6f4508c); ?>
<?php endif; ?>

        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('admin::edit-user.update-password-form')->html();
} elseif ($_instance->childHasBeenRendered('uENGhCe')) {
    $componentId = $_instance->getRenderedChildComponentId('uENGhCe');
    $componentTag = $_instance->getRenderedChildComponentTagName('uENGhCe');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('uENGhCe');
} else {
    $response = \Livewire\Livewire::mount('admin::edit-user.update-password-form');
    $html = $response->html();
    $_instance->logRenderedChild('uENGhCe', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
        <?php if (isset($component)) { $__componentOriginal71c6471fa76ce19017edc287b6f4508c = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'piksera-ui::components.section-border','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('piksera-ui::section-border'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal71c6471fa76ce19017edc287b6f4508c)): ?>
<?php $component = $__componentOriginal71c6471fa76ce19017edc287b6f4508c; ?>
<?php unset($__componentOriginal71c6471fa76ce19017edc287b6f4508c); ?>
<?php endif; ?>

        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('admin::edit-user.two-factor-authentication-form')->html();
} elseif ($_instance->childHasBeenRendered('Wmfdkan')) {
    $componentId = $_instance->getRenderedChildComponentId('Wmfdkan');
    $componentTag = $_instance->getRenderedChildComponentTagName('Wmfdkan');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('Wmfdkan');
} else {
    $response = \Livewire\Livewire::mount('admin::edit-user.two-factor-authentication-form');
    $html = $response->html();
    $_instance->logRenderedChild('Wmfdkan', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
        <?php if (isset($component)) { $__componentOriginal71c6471fa76ce19017edc287b6f4508c = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'piksera-ui::components.section-border','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('piksera-ui::section-border'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal71c6471fa76ce19017edc287b6f4508c)): ?>
<?php $component = $__componentOriginal71c6471fa76ce19017edc287b6f4508c; ?>
<?php unset($__componentOriginal71c6471fa76ce19017edc287b6f4508c); ?>
<?php endif; ?>


        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('admin::edit-user.logout-other-browser-sessions-form')->html();
} elseif ($_instance->childHasBeenRendered('E27d6SD')) {
    $componentId = $_instance->getRenderedChildComponentId('E27d6SD');
    $componentTag = $_instance->getRenderedChildComponentTagName('E27d6SD');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('E27d6SD');
} else {
    $response = \Livewire\Livewire::mount('admin::edit-user.logout-other-browser-sessions-form');
    $html = $response->html();
    $_instance->logRenderedChild('E27d6SD', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
        <?php if (isset($component)) { $__componentOriginal71c6471fa76ce19017edc287b6f4508c = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'piksera-ui::components.section-border','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('piksera-ui::section-border'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal71c6471fa76ce19017edc287b6f4508c)): ?>
<?php $component = $__componentOriginal71c6471fa76ce19017edc287b6f4508c; ?>
<?php unset($__componentOriginal71c6471fa76ce19017edc287b6f4508c); ?>
<?php endif; ?>


        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('admin::edit-user.delete-user-form')->html();
} elseif ($_instance->childHasBeenRendered('nEOdtIx')) {
    $componentId = $_instance->getRenderedChildComponentId('nEOdtIx');
    $componentTag = $_instance->getRenderedChildComponentTagName('nEOdtIx');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('nEOdtIx');
} else {
    $response = \Livewire\Livewire::mount('admin::edit-user.delete-user-form');
    $html = $response->html();
    $_instance->logRenderedChild('nEOdtIx', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>

    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin::layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/yahyehassan/Desktop/Bloggy/src/PikseraPackages/User/Providers/../resources/views/admin/users/show.blade.php ENDPATH**/ ?>