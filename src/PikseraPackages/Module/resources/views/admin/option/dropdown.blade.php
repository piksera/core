

<div>
    <x-piksera-ui::select name="{{ $this->optionKey }}" wire:model.debounce.100ms="state.settings.{{ $this->optionKey }}" :options="$dropdownOptions" />
</div>
