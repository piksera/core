<div class="card-body mb-3">

    <script>
        mw.top().win.addEventListener("mw.content-saved", (e) => {
            Livewire.emit('refreshContentList');
        });
    </script>

        <?php if($openLinksInModal): ?>
            <?php echo $__env->make('content::admin.content.livewire.open-links-in-modal-script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>

        <?php echo $__env->make('content::admin.content.livewire.set-tree-active-content', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <div>

            <?php echo $__env->make('content::admin.content.livewire.table-includes.table-tr-reoder-js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <?php if($displayFilters): ?>
                <div class="row py-3">
                    <div class="d-flex align-items-center justify-content-between flex-wrap">

                        <?php echo $__env->make('content::admin.content.livewire.card-header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                        <div class="col-lg-5 col-sm-6 col ms-md-4 me-lg-0 me-4 input-icon">
                            <div class="input-group input-group-flat ">
                                <input type="text" wire:model.debounce.500ms="filters.keyword" placeholder="<?php _e("Search by keyword"); ?>..." class="form-control" autocomplete="off">
                                <span class="input-group-text">
                                    <?php echo $__env->make('content::admin.content.livewire.components.button-filter', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    <div class="dropdown-menu p-2">
                                        <?php if(!empty($dropdownFilters)): ?>
                                            <?php $__currentLoopData = $dropdownFilters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dropdownFilterGroup): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <div class="">
                                                     <h6 class="dropdown-header"><?php echo e($dropdownFilterGroup['groupName']); ?></h6>
                                                    <?php $__currentLoopData = $dropdownFilterGroup['filters']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dropdownFilter): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <div class="dropdown-item">
                                                             <label class=" form-check form-check-inline mb-0">
                                                                <input class="form-check-input me-2" type="checkbox" wire:model="showFilters.<?php echo e($dropdownFilter['key']); ?>" checked="">
                                                                 <span class="form-check-label"><?php echo e($dropdownFilter['name']); ?></span>
                                                            </label>
                                                        </div>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                 </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                    </div>
                                </span>
                            </div>
                        </div>


                        <div class="col-sm-3 col-auto mt-sm-0 text-sm-end text-center d-flex justify-content-sm-end justify-content-center">
                            <?php if($this->contentType == 'page'): ?>
                            <a href="<?php echo e(route('admin.page.create')); ?>" class="btn btn-dark js-open-in-modal">
                                <svg fill="currentColor" class="me-sm-2" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 96 960 960" width="24"><path d="M446.667 856V609.333H200v-66.666h246.667V296h66.666v246.667H760v66.666H513.333V856h-66.666Z"/></svg>
                                <span class="d-sm-block d-none"><?php echo e(_e("New Page")); ?></span>
                            </a>
                            <?php endif; ?>
                            <?php if($this->contentType == 'post'): ?>
                                <a href="<?php echo e(route('admin.post.create')); ?>" class="btn btn-dark js-open-in-modal">
                                    <svg fill="currentColor" class="me-sm-2" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 96 960 960" width="24"><path d="M446.667 856V609.333H200v-66.666h246.667V296h66.666v246.667H760v66.666H513.333V856h-66.666Z"/></svg>
                                    <span class="d-sm-block d-none"><?php echo e(_e("New Post")); ?></span>
                                </a>
                            <?php endif; ?>
                            <?php if($this->contentType == 'product'): ?>
                                <a href="<?php echo e(route('admin.product.create')); ?>" class="btn btn-dark js-open-in-modal">
                                   <svg fill="currentColor" class="me-sm-2" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 96 960 960" width="24"><path d="M446.667 856V609.333H200v-66.666h246.667V296h66.666v246.667H760v66.666H513.333V856h-66.666Z"/></svg>
                                    <span class="d-sm-block d-none"><?php echo e(_e("New Product")); ?></span>
                                </a>
                            <?php endif; ?>
                        </div>


                        <?php if(!empty($appliedFiltersFriendlyNames)): ?>
                            <?php echo $__env->make('content::admin.content.livewire.components.button-clear-filters', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endif; ?>

            <?php if(!empty($cardStats)): ?>
            <div class="row row-cards">
                <?php $__currentLoopData = $cardStats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cardStat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-sm-6 col-lg-3">
                    <div class="card card-sm">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-auto">
                                    <span class="<?php echo e($cardStat['bgClass']); ?> <?php echo e($cardStat['textClass']); ?> avatar">
                                        <i class="<?php echo e($cardStat['icon']); ?>"></i>
                                    </span>
                                </div>
                                <div class="col">
                                    <div class="font-weight-medium">
                                        <strong>
                                            <?php echo e($cardStat['value']); ?>

                                        </strong>
                                    </div>
                                    <div class="text-secondary">
                                        <?php echo e($cardStat['name']); ?>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <?php endif; ?>

            <div class="row py-3 dropdown-filters-if-naked">
                <div class="d-flex flex-wrap">

                    <?php
                        if(!empty($dropdownFilters)) {
                            foreach($dropdownFilters as $dropdownFilterGroup) {
                                foreach($dropdownFilterGroup['filters'] as $dropdownFilter) {
                                    $skipDropdownFilter = false;
                                    if(isset($dropdownFilter['type']) && $dropdownFilter['type'] == 'separator') {
                                        $skipDropdownFilter = true;
                                    }
                                    if (!$skipDropdownFilter) {

                                        if (isset($dropdownFilter['key']) && strpos($dropdownFilter['key'], '.') !== false) {
                                                $dropdownFilterExp = explode('.', $dropdownFilter['key']);
                                                if (isset($showFilters[$dropdownFilterExp[0]][$dropdownFilterExp[1]])) {
                ?>
                <?php echo $__env->make('content::admin.content.livewire.table-filters.' . $dropdownFilterExp[0], [
                   'fieldName'=>$dropdownFilter['name'],
                   'fieldKey'=>$dropdownFilterExp[1],
                   'fieldValue'=>$showFilters[$dropdownFilterExp[0]][$dropdownFilterExp[1]],
                  ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php
                    }
                continue;
            }


                if (isset($showFilters[$dropdownFilter['key']]) && $showFilters[$dropdownFilter['key']]) {
                ?>
                <?php if(isset($dropdownFilter['viewNamespace'])): ?>
                    <?php echo $__env->make($dropdownFilter['viewNamespace'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php else: ?>
                    <?php echo $__env->make('content::admin.content.livewire.table-filters.'.$dropdownFilter['key'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php endif; ?>
                <?php
                    }
                }
            }
    }
}
                ?>

            </div>
        </div>


        <?php if($contents->total() > 0): ?>
            <div class="row py-3">
                <div class="d-flex flex-wrap bulk-actions-show-columns mw-js-loading position-relative mb-1">

                    <div class="col-md-5 col-12 d-flex justify-content-start align-items-center px-0 ">
                        <?php echo $__env->make('content::admin.content.livewire.components.display-as', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>

                    <div class="col-md-7 col-12 d-flex justify-content-end align-items-center mw-filters-sorts-mobile">

                        <button type="button" wire:click="export" class="btn btn-outline-dark btn-sm ms-2">
                            <span wire:loading wire:target="export" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                            <?php echo e(_e('Export')); ?>

                        </button>

                        <?php if($displayType=='table'): ?>
                            <div>
                                <button type="button" class="btn btn-outline-dark btn-sm dropdown-toggle ms-2" data-bs-toggle="dropdown" aria-expanded="false">
                                    <?php echo e(_e('Columns')); ?>

                                </button>
                                <div class="dropdown-menu p-3">
                                    <?php $__currentLoopData = $showColumns; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $column=>$columnShow): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="dropdown-item">
                                            <label wire:key="show-column-<?php echo e($loop->index); ?>"  class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" wire:model="showColumns.<?php echo e($column); ?>">
                                                <span class="form-check-label">
                                                    <?php echo e(_e(ucfirst($column))); ?>

                                                </span>
                                            </label>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                        <?php endif; ?>

                        <div class="ms-2" x-data="{ openSortDropdown: false }">
                            <span @click="openSortDropdown =! openSortDropdown">
                                <svg xmlns="http://www.w3.org/2000/svg" height="20" viewBox="0 -960 960 960" width="20"><path d="M479.788-192Q450-192 429-213.212q-21-21.213-21-51Q408-294 429.212-315q21.213-21 51-21Q510-336 531-314.788q21 21.213 21 51Q552-234 530.788-213q-21.213 21-51 21Zm0-216Q450-408 429-429.212q-21-21.213-21-51Q408-510 429.212-531q21.213-21 51-21Q510-552 531-530.788q21 21.213 21 51Q552-450 530.788-429q-21.213 21-51 21Zm0-216Q450-624 429-645.212q-21-21.213-21-51Q408-726 429.212-747q21.213-21 51-21Q510-768 531-746.788q21 21.213 21 51Q552-666 530.788-645q-21.213 21-51 21Z"/></svg>
                            </span>

                            <span class="table-blade-sortable-elements bg-light shadow-sm align-items-center justify-content-center p-3" style=" display: none;" x-show="openSortDropdown">
                                <?php echo $__env->make('content::admin.content.livewire.components.sort', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                <?php echo $__env->make('content::admin.content.livewire.components.limit', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </span>
                        </div>
                    </div>

                </div>

                <?php if(count($checked) > 0): ?>
                    <div class="mt-3">

                        <?php if(count($checked) == count($contents->items())): ?>
                            <div class="col-md-10 mb-2">
                                You have selected all <?php echo e(count($checked)); ?> items.
                                <button type="button" class="btn btn-link" wire:click="deselectAll"><?php echo e(_e('Deselect All')); ?></button>
                            </div>
                        <?php else: ?>
                            <div>
                                You have selected <?php echo e(count($checked)); ?> items,
                                do you want to select all <?php echo e(count($contents->items())); ?>?
                                <button type="button" class="btn btn-link" wire:click="selectAll"><?php echo e(_e('Select All')); ?></button>
                            </div>
                        <?php endif; ?>

                        <?php if(count($checked) > 0): ?>
                            <div class="pull-left">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-outline-dark btn-sm dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                        <?php echo e(_e('Bulk Actions')); ?>

                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><button class="dropdown-item" type="button" wire:click="multipleMoveToCategory"><?php echo e(_e('Move To Category')); ?></button></li>
                                        <li><button class="dropdown-item" type="button" wire:click="multiplePublish"><?php echo e(_e('Publish')); ?></button></li>
                                        <li><button class="dropdown-item" type="button" wire:click="multipleUnpublish"><?php echo e(_e('Unpublish')); ?></button></li>
                                        <li><button class="dropdown-item" type="button" wire:click="multipleDelete"><?php echo e(_e('Move to trash')); ?></button></li>
                                        <li><button class="dropdown-item" type="button" wire:click="multipleDeleteForever"><?php echo e(_e('Delete Forever')); ?></button></li>
                                        <?php if($isInTrashed): ?>
                                        <li><button class="dropdown-item" type="button" wire:click="multipleUndelete"><?php echo e(_e('Restore from trash')); ?></button></li>
                                        <?php endif; ?>
                                    </ul>
                                </div>
                            </div>
                        <?php endif; ?>

                    </div>
                <?php endif; ?>
            </div>
            <div class="row py-3">
                <div class="col-md-12">

                    <?php if($displayType == 'card'): ?>
                        <?php if(isset($this->displayTypesViews['card'])): ?>
                            <?php echo $__env->make($this->displayTypesViews['card'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php else: ?>
                            <?php echo $__env->make('content::admin.content.livewire.display-types.card', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php endif; ?>
                    <?php endif; ?>

                    <?php if($displayType == 'table'): ?>
                        <?php if(isset($this->displayTypesViews['table'])): ?>
                            <?php echo $__env->make($this->displayTypesViews['table'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php else: ?>
                            <?php echo $__env->make('content::admin.content.livewire.display-types.table', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php endif; ?>
                    <?php endif; ?>

                </div>
            </div>

            <div class="row py-3">
                <div class="d-flex justify-content-center">

                    <div style="width: 100%">
                        <span class="text-muted"><?php echo e($contents->total()); ?> results found</span>
                    </div>

                    <div>
                        <?php echo e($contents->links()); ?>

                    </div>
                </div>
            </div>

        <?php else: ?>
            <?php echo $__env->make('content::admin.content.livewire.no-results-for-filters', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>

    </div>
</div>
<?php /**PATH /Users/yahyehassan/Documents/Bloggy/src/PikseraPackages/Content/resources/views/admin/content/livewire/table.blade.php ENDPATH**/ ?>