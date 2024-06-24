<div class="card-header">
    <div class="col d-flex justify-content-start align-items-center">
        <div class="d-flex align-items-center">

            <h1 class="main-pages-title d-lg-flex card-title">

                <a class="<?php if(isset($currentCategory) and $currentCategory): ?> text-decoration-none <?php else: ?> text-decoration-none <?php endif; ?>" onclick="livewire.emit('deselectAllCategories');return false;">
                    <?php echo e(_e(ucfirst($this->contentType).'s')); ?>

                </a>

                <?php if(isset($currentCategory) and $currentCategory): ?>
                    <span class="form-label text-muted">&nbsp; \ &nbsp;
                    <?php echo e($currentCategory['title']); ?>

                    </span>
                <?php endif; ?>

                <?php if(isset($currentPage) and $currentPage): ?>
                    <span class="form-label text-muted">&nbsp; \ &nbsp;
                    <?php echo e($currentPage['title']); ?>

                    </span>
                <?php endif; ?>

                <?php if($isInTrashed): ?>
                    <span class="form-label text-muted">&nbsp; \ &nbsp;
                  <?php echo e(_e('Trash')); ?>

                    </span>
                <?php endif; ?>






            </h1>

        </div>
        <div>









            <?php
            /*  @if(isset($currentCategory) and $currentCategory)
            <a href="{{category_link($currentCategory['id'])}}" target="_blank" title="{{_e('View category')}}"><span class="fa fa-external-link-alt"></span></a>
            @endif*/

            ?>

        </div>
    </div>
</div>

<?php /**PATH /Users/yahyehassan/Desktop/Bloggy/src/PikseraPackages/Content/resources/views/admin/content/livewire/card-header.blade.php ENDPATH**/ ?>