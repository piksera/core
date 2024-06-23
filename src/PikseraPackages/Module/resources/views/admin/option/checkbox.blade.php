<div>
    <x-piksera-ui::checkbox

        :options="$checkboxOptions"
        wire:model.debounce.100ms="selectedCheckboxes"

    />
</div>
