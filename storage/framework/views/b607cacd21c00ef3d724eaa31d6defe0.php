<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps(['id', 'maxWidth']) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps(['id', 'maxWidth']); ?>
<?php foreach (array_filter((['id', 'maxWidth']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>



<!-- Modal -->
<div wire:ignore >

    <?php
        $id = $id ?? md5($attributes->wire('model'));


        $maxWidth = [
            'sm' => ' modal-sm',
            'md' => '',
            'lg' => ' modal-lg',
            'xl' => ' modal-xl',
        ][$maxWidth ?? 'md'];
    ?>


 <script>
     if(typeof window.createModalDialogLivewire<?php echo e($id); ?> === 'undefined') {
         window.createModalDialogLivewire<?php echo e($id); ?> = function (id) {
             var config = {};
             var el = document.getElementById('modal-id-' + id);
             var close = document.getElementById('js-close-modal-' + id);
             var hasModal = false;

             config['show' + id] = <?php if ((object) ($attributes->wire('model')) instanceof \Livewire\WireDirective) : ?>window.Livewire.find('<?php echo e($_instance->id); ?>').entangle('<?php echo e($attributes->wire('model')->value()); ?>')<?php echo e($attributes->wire('model')->hasModifier('defer') ? '.defer' : ''); ?><?php else : ?>window.Livewire.find('<?php echo e($_instance->id); ?>').entangle('<?php echo e($attributes->wire('model')); ?>')<?php endif; ?>;

             return {
                 ...config,
                 show: 'show' + id,
                 init: function () {

                     if (close) {
                         close.addEventListener('click', () => {
                             this.show = false;
                         });
                     }

                     this.$watch(this.show, (value) => {
                         if (value) {
                             el.style.display = 'block';
                             this['mwDialogComponentUi' + id] = mw.dialog({
                                 content: el,
                                 id: 'mwDialogComponentUi' + id,
                                 onremove: () => {
                                     this.show = false;
                                 },
                             });

                             this['mwDialogComponentUi' + id].dialogHeader.style.display = 'none';
                             this['mwDialogComponentUi' + id].dialogContainer.style.padding = '0px';
                         } else {
                             if (this['mwDialogComponentUi' + id]) {
                                 this['mwDialogComponentUi' + id].remove();
                                 this['mwDialogComponentUi' + id] = null;
                             }

                             this.show = false;
                         }
                     });
                 },
             };


         };
     }
 </script>

<div x-data="createModalDialogLivewire<?php echo e($id); ?>('<?php echo e($id); ?>')"
     x-show="show<?php echo e($id); ?>"
     x-init="init()"


    wire:ignore.self

     style="display:none"

    tabindex="-1"
    id="modal-id-<?php echo e($id); ?>"

    x-ref="modal-id-<?php echo e($id); ?>"

>
    <div class="mw-modal">
        <div class="mw-modal-dialog<?php echo e($maxWidth); ?>">
            <?php echo e($slot); ?>



        </div>
    </div>

</div>
</div>
<?php /**PATH /Users/yahyehassan/Desktop/Bloggy/src/PikseraPackages/PikseraUI/resources/views/components/modal.blade.php ENDPATH**/ ?>