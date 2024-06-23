<div>

    <form wire:submit.prevent="submit" >

        <div class="d-flex align-items-center justify-content-between">

            <x-piksera-ui::button-animation type="submit">@lang('Save')</x-piksera-ui::button-animation>
        </div>

        @if (isset($editorSettings['schema']))
            @include('piksera-live-edit::module-items-editor-edit-item-schema-render')
        @endif


        <div class="d-flex align-items-center justify-content-between">

            <x-piksera-ui::button-animation type="submit">@lang('Save')</x-piksera-ui::button-animation>
        </div>
    </form>

</div>
