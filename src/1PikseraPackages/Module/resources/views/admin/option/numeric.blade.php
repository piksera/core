<div>
    <x-piksera-ui::input type="number" wire:model.debounce.500ms="state.settings.{{ $this->optionKey }}" />
</div>
