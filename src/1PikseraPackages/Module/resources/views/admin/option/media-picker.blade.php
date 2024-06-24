<div wire:ignore>
    <x-piksera-ui::media-picker :label="$label" wire:model.debounce.100ms="state.settings.{{ $this->optionKey }}" />
</div>
