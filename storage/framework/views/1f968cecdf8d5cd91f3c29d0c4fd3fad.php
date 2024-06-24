<div class="manage-item-main-top">

    <a href="<?php echo e($content->editLink()); ?>" class="js-open-in-modal form-label font-weight-bold text-break-line-1 text-decoration-none manage-post-item-title mb-0">
        <?php echo e($content->title); ?>

    </a>

    <?php
    $parentPages = app()->content_manager->get_parents($content->id);
    ?>

    <?php if(!empty($parentPages)): ?>
        <div class="text-muted">
        <?php $__currentLoopData = $parentPages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $parentPageId): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <a onclick="livewire.emit('selectPageFromTableList', <?php echo e($parentPageId); ?>);return false;" href="#" class="my-1 d-block text-muted mw-products-breadcrumb">
                <?php echo e(content_title($parentPageId)); ?>

            </a>
            <?php if(!$loop->last): ?>
                <span class="mx-1">/</span>
            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    <?php endif; ?>

    <div>
        <?php if($content->categories->count() > 0): ?>
            <span class="manage-post-item-cats-inline-list">
            <?php
                $iCategory = 0;
            ?>
                <?php $__currentLoopData = $content->categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($category->parent): ?>

                        <a onclick="livewire.emit('selectCategoryFromTableList', <?php echo e($category->parent->id); ?>);return false;" href="?filters[category]=<?php echo e($category->parent->id); ?>&showFilters[category]=1"
                           class="btn btn-link btn-sm p-0">
                        <?php echo e($category->parent->title); ?>

                     </a>

                        <?php
                            $iCategory++;
                            if ($content->categories->count() !== $iCategory) {
                                echo ", ";
                            }
                        ?>

                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
         </span>
        <?php endif; ?>

        <div>
            <small class="text-muted" style="font-size: 12px !important;">
                <?php echo e(_e("Updated")); ?>: <?php echo e($content->updated_at->format('M d, Y, h:i A')); ?>

            </small>
        </div>
    </div>

</div>
<?php /**PATH /Users/yahyehassan/Desktop/Bloggy/src/PikseraPackages/Content/resources/views/admin/content/livewire/components/title-and-categories.blade.php ENDPATH**/ ?>