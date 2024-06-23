<div>

    <div>
        <label class="live-edit-label">{{__('Insert Embed Code')}} </label>
        <livewire:piksera-option::textarea optionKey="source_code" :optionGroup="$moduleId" :module="$moduleType"  />
    </div>

    <div class="mt-3">
        <label class="live-edit-label">{{__('Hide in Live Edit')}} </label>
        <livewire:piksera-option::toggle optionKey="hide_in_live_edit" :optionGroup="$moduleId" :module="$moduleType"  />
    </div>

</div>
