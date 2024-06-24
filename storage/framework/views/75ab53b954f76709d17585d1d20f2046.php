<div class="col-lg-3 col-md-6 col-12 p-3" wire:key="<?php echo e($module->id); ?>-<?php echo e(md5($module->module)); ?>">
    <div class="card modules-card" style="min-height:170px">
        <div class="card-body text-center d-flex align-items-center justify-content-center flex-column position-relative">
            <a href="<?php echo e(module_admin_url($module->module)); ?>">
                <div class="mx-auto mb-2" style="width: 40px; height: 40px">
                    <?php echo $module->getIconInline(); ?>

                </div>
                <h3 class="card-title pt-2 mb-0 text-muted">
                    <?php echo e(str_limit(_e($module->name, true), 30)); ?>

                </h3>
            </a>

            <?php if($module->installed == 1): ?>
                <span wire:click="$emit('openModal', 'admin-ask-for-module-uninstall-modal', <?php echo e(json_encode(['moduleId' => $module->id])); ?>)" type="button" class="mdi mdi-close text-danger modules-uninstall-button"></span>
            <?php endif; ?>

            <?php if($module->installed == 0): ?>
                <button wire:click="install('<?php echo e($module->id); ?>')" wire:target="install('<?php echo e($module->id); ?>')" wire:loading.attr="disabled" type="button" class="btn btn-sm btn-outline-success">
                    <div wire:loading wire:target="install('<?php echo e($module->id); ?>')" class="spinner-border spinner-border-sm" role="status">
                        <span class="visually-hidden">Installing...</span>
                    </div>
                    Install
                </button>
            <?php endif; ?>

        </div>
    </div>
</div>
<?php /**PATH /Users/yahyehassan/Desktop/Bloggy/src/PikseraPackages/Module/resources/views/livewire/admin/list-module-card.blade.php ENDPATH**/ ?>