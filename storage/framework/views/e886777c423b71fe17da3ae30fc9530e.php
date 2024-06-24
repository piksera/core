<div class="col-xxl-10 col-md-11 col-12 px-md-0 px-2 mx-auto">

    <div class="card mb-7">
        <div class="card-body">
            <div <?php echo e($attributes->merge(['class' => 'row'])); ?>>

                <div class="col-xl-3 mb-xl-0 mb-3">

                    <?php if (isset($component)) { $__componentOriginal71c6471fa76ce19017edc287b6f4508c = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'piksera-ui::components.section-title','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('piksera-ui::section-title'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                         <?php $__env->slot('title', null, []); ?> <h5 class="font-weight-bold settings-title-inside"><?php echo e($title); ?></h5> <?php $__env->endSlot(); ?>
                       <?php if(isset($description)): ?>
                         <?php $__env->slot('description', null, []); ?> 
                            <small class="text-muted">
                                <?php echo e($description); ?>

                            </small>
                         <?php $__env->endSlot(); ?>
                        <?php endif; ?>
                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal71c6471fa76ce19017edc287b6f4508c)): ?>
<?php $component = $__componentOriginal71c6471fa76ce19017edc287b6f4508c; ?>
<?php unset($__componentOriginal71c6471fa76ce19017edc287b6f4508c); ?>
<?php endif; ?>
                </div>

                <div class="col-xl-9">
                    <div class="card bg-azure-lt ">
                        <div class="card-body ">
                            <div class="row">
                                <div class="col-12">
                                    <?php echo e($content); ?>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php /**PATH /Users/yahyehassan/Desktop/Bloggy/src/PikseraPackages/PikseraUI/resources/views/components/action-section.blade.php ENDPATH**/ ?>