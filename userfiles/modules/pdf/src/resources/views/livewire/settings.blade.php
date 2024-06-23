<div>

    <div>
        <label class="live-edit-label">{{__('Choose your Pdf file to upload')}} </label>
        <livewire:piksera-option::file-picker optionKey="pdf" :optionGroup="$moduleId" :module="$moduleType"  />
    </div>

    <div class="mt-3">
        <label class="live-edit-label">{{__('Set border color to Pdf view')}} </label>
        <livewire:piksera-option::color-picker optionKey="border" :optionGroup="$moduleId" :module="$moduleType"  />
    </div>

    <div class="mt-3">
        <label class="live-edit-label">{{__('Allow users to download the Pdf file')}} </label>
        <livewire:piksera-option::toggle optionKey="download" :optionGroup="$moduleId" :module="$moduleType"  />
    </div>

</div>
