<div>
    <x-piksera-ui::simple-text-editor name="{{ $this->optionKey }}"  wire:model.debounce.500ms="state.settings.{{ $this->optionKey }}" />
</div>
