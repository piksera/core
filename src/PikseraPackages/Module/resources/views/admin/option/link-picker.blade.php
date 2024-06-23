<div>
    <div wire:ignore>
        <x-piksera-ui::link-picker wire:model.debounce.100ms="state.settings.{{ $this->optionKey }}" />
    </div>
</div>
