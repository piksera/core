<div>

    @php
        $moduleTemplates = module_templates($moduleType);
    @endphp

    <div

    x-data="{
        showEditTab: 'testimonials'
    }"

     x-init="() => {
        window.livewire.on('switchToMainTab', () => {
            showEditTab = 'testimonials'
        })

         window.livewire.on('editItemById' , (itemId) => {
            showEditTab = 'editTestimonial'
        })


        window.livewire.on('showConfirmDeleteItemById', (itemId) => {
            Livewire.emit('onShowConfirmDeleteItemById', itemId);
        })

        }

"

    @mw-option-saved.window="function() {
        if ($event.detail.optionKey == 'show_testimonials_per_project') {
           Livewire.emit('refreshTestimonials');
       }
    }"

    >

        <div class="d-flex justify-content-between align-items-center collapseNav-initialized form-control-live-edit-label-wrapper">
            <div class="d-flex flex-wrap gap-md-4 gap-3">
                <a href="#" x-on:click="showEditTab = 'testimonials'" :class="{ 'active': showEditTab == 'testimonials' }"
                   class="btn btn-link text-decoration-none mw-admin-action-links mw-adm-liveedit-tabs active">
                    Testimonials
                </a>
                <a href="#" x-on:click="showEditTab = 'settings'" :class="{ 'active': showEditTab == 'settings' }"
                   class="btn btn-link text-decoration-none mw-admin-action-links mw-adm-liveedit-tabs">
                    Settings
                </a>
                @if($moduleTemplates && count($moduleTemplates) >  1)
                    <a href="#" x-on:click="showEditTab = 'design'" :class="{ 'active': showEditTab == 'design' }"
                       class="btn btn-link text-decoration-none mw-admin-action-links mw-adm-liveedit-tabs">
                        Design
                    </a>
                @endif
            </div>
        </div>

        <div x-show="showEditTab=='testimonials'">

            <div class="mt-2 text-right">
                <x-piksera-ui::button-animation type="button" class="mt-2" x-on:click="showEditTab = 'editTestimonial'">
                    @lang('Add new testimonial')
                </x-piksera-ui::button-animation>
            </div>

            @include('piksera-live-edit::module-items-editor-list-items')

        </div>

        <div x-show="showEditTab=='editTestimonial'">
            <script>
                mw.require('forms.js', true);
                setTimeout(function() {
                    mw.form.unsavedChangesCheck('js-testimonials-form');
                }, 300);
            </script>
            <form id="js-testimonials-form" wire:submit.prevent="submit">

                <div class="d-flex align-items-center justify-content-end">
                    <x-piksera-ui::button-animation type="submit">
                        @lang('Save')
                    </x-piksera-ui::button-animation>
                </div>

                @if (isset($editorSettings['schema']))
                    @include('piksera-live-edit::module-items-editor-edit-item-schema-render')
                @endif

                <div class="d-flex align-items-center justify-content-end">
                    <x-piksera-ui::button-animation type="submit">
                        @lang('Save')
                    </x-piksera-ui::button-animation>
                </div>

            </form>
        </div>

        <div x-show="showEditTab=='settings'">

            <div class="mt-3">
                <label class="live-edit-label">
                    {{ _e("Groups") }}
                </label>
                <livewire:piksera-module-testimonials::projects-dropdown :optionGroup="$moduleId" :module="$moduleType"  />
            </div>

            <div class="mt-3">
                <label class="live-edit-label">
                    <?php _e("Maximum number of testimonials to display"); ?>
                </label>
                <livewire:piksera-option::text optionKey="testimonials_limit" :optionGroup="$moduleId" :module="$moduleType"  />
            </div>

            <div class="mt-3">
                <label class="live-edit-label">
                    <?php _e("Maximum number of characters to display"); ?>
                </label>
                <livewire:piksera-option::text optionKey="limit" :optionGroup="$moduleId" :module="$moduleType"  />
            </div>

        </div>

        @if($moduleTemplates && count($moduleTemplates) >  1)
            <div x-show="showEditTab=='design'" x-transition:enter="tab-pane-slide-right-active">
                <div>
                    <livewire:piksera-live-edit::module-select-template :moduleId="$moduleId" :moduleType="$moduleType"/>
                </div>
            </div>
        @endif



        <div>
            <x-piksera-ui::dialog-modal id="dddddaa" wire:key="areYouSureDeleteModalOpened" wire:model="areYouSureDeleteModalOpened">

                <x-slot name="title">
                    <?php _e('Are you sure?'); ?>
                </x-slot>
                <x-slot name="content">
                    <?php _e('Are you sure want to delete this?'); ?>
                </x-slot>

                <x-slot name="footer">
                    <x-piksera-ui::button-animation wire:click="$toggle('areYouSureDeleteModalOpened')" wire:loading.attr="disabled">
                        <?php _e('Cancel'); ?>
                    </x-piksera-ui::button-animation>
                    <x-piksera-ui::button-animation class="text-danger" wire:click="confirmDeleteSelectedItems()" wire:loading.attr="disabled">
                        <?php _e('Delete'); ?>
                    </x-piksera-ui::button-animation>
                </x-slot>
            </x-piksera-ui::dialog-modal>

        </div>

    </div>

</div>
