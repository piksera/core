<div class="d-flex align-items-center ">
    <label class="d-xl-block d-none mx-2"><?php echo e(_e('Sort')); ?></label>
    <select x-on:change="openSortDropdown = false" wire:model.stop="filters.orderBy" class="form-select rounded-0 form-select-sm mw-form-select-filters" style="font-size: 14px;">
        <option value=""><?php echo e(_e('Any')); ?></option>
        <option value="id,desc"><?php echo e(_e('Id Desc')); ?></option>
        <option value="id,asc"><?php echo e(_e('Id Asc')); ?></option>
    </select>
</div>
<?php /**PATH /Users/yahyehassan/Documents/Bloggy/src/PikseraPackages/Content/resources/views/admin/content/livewire/components/sort.blade.php ENDPATH**/ ?>