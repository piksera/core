<div>
    <script>

        Livewire.on('closeMwTopDialogIframe', () => {
            let dialog = mw.top().dialog.get('#mw-livewire-component-iframe');
            if (dialog) {
                dialog.remove();
            }
        });

        Livewire.on('openMwTopDialogIframe', (componentName, jsonParams) => {

            let params = [];
            if (jsonParams) {
                jsonParams.componentName = componentName;
                params = new URLSearchParams(jsonParams).toString();
            }
            let mwNativeModal = mw.top().dialogIframe({
                url: "<?php echo e(route('admin.livewire.components.render-component')); ?>?" + params,
                width: 900,
                height: 900,
                id: 'mw-livewire-component-iframe',
                skin: 'square_clean',
                center: false,
                resize: true,
                overlayClose: true,
                draggable: true
            });
            mwNativeModal.dialogHeader.style.display = 'none';
        });

        // simple modal
        Livewire.on('closeModal', (force = false, skipPreviousModals = 0, destroySkipped = false) => {
            let openedModals = document.querySelectorAll('.js-modal-livewire');
            for (let i = 0; i < openedModals.length; i++) {
                let openedModalId = openedModals[i].getAttribute('wire:key');
                let modal = document.getElementById("js-modal-livewire-id-" + openedModalId);
                if(modal) {
                    modal.style.display = "none";
                    Livewire.emit('destroyComponent', openedModalId);
                }
            }
        });

        Livewire.on('activeModalComponentChanged', (data) => {
            let modal = document.getElementById("js-modal-livewire-id-" + data.id);
            modal.style.display = "block";
            if (data.modalSettings) {
                modal.querySelector('.js-modal-livewire-content').style.width = data.modalSettings.width;
            }
        });
    </script>
    <style>

        .js-modal-livewire {
            display: none;
            position: fixed;
            z-index: 1100;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgb(0,0,0);
            background-color: rgba(0,0,0,0.4);
        }

        .js-modal-livewire-content {
            margin: auto;
            background-color: #fff;
            width: 100%;
            overflow: auto;
        }
        @media only screen and (min-width: 600px) {
            .js-modal-livewire {
                padding-top: 100px;
            }
            .js-modal-livewire-content {
                max-width: 480px;
                max-height: calc(100vh - 100px);
            }
        }
        @media only screen and (min-width: 768px) {
            .js-modal-livewire {
                padding-top: 8%;
            }
            .js-modal-livewire-content {
                max-height: calc(100vh - 100px);
                overflow: auto;
            }
        }
    </style>
    <div>
        <?php $__empty_1 = true; $__currentLoopData = $components; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $component): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="js-modal-livewire" id="js-modal-livewire-id-<?php echo e($id); ?>" wire:key="<?php echo e($id); ?>">
                <div class="js-modal-livewire-content">
                    <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount($component['name'], $component['attributes'])->html();
} elseif ($_instance->childHasBeenRendered($id)) {
    $componentId = $_instance->getRenderedChildComponentId($id);
    $componentTag = $_instance->getRenderedChildComponentTagName($id);
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild($id);
} else {
    $response = \Livewire\Livewire::mount($component['name'], $component['attributes']);
    $html = $response->html();
    $_instance->logRenderedChild($id, $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <?php endif; ?>
    </div>
</div>
<?php /**PATH /Users/yahyehassan/Documents/Core/src/PikseraPackages/Livewire/resources/views/mw-modal.blade.php ENDPATH**/ ?>