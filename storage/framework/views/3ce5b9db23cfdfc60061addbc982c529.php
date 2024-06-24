<div class="d-flex align-items-center mx-1">
    <label class="d-xl-block d-none mx-2"><?php echo e(_e('Limit')); ?></label>
    <select x-on:change="openSortDropdown = false" class="form-select form-select-sm rounded-0" wire:model="paginate" style="font-size: 14px;">
        <option value="10">10</option>
        <option value="25">25</option>
        <option value="50">50</option>
        <option value="100">100</option>
        <option value="500">500</option>
    </select>
</div>
<?php /**PATH /Users/yahyehassan/Documents/Bloggy/src/PikseraPackages/Content/resources/views/admin/content/livewire/components/limit.blade.php ENDPATH**/ ?>