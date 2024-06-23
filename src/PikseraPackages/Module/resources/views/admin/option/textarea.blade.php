<div>
    <x-piksera-ui::textarea name="{{ $this->optionKey }}"  wire:model.debounce.500ms="state.settings.{{ $this->optionKey }}" />
</div>
