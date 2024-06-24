<div class="px-4 px-sm-0">
    <div class="d-flex justify-content-between">
        <div>
            <h3 class="h5">
                <?php echo e($title); ?>

            </h3>
            <?php if(isset($description)): ?>
            <p class="mt-1 text-muted">
                <?php echo e($description); ?>

            </p>
            <?php endif; ?>
        </div>

        <div>
            <?php echo e($aside ?? ''); ?>

        </div>
    </div>
</div>
<?php /**PATH /Users/yahyehassan/Desktop/Bloggy/src/PikseraPackages/PikseraUI/resources/views/components/section-title.blade.php ENDPATH**/ ?>