<div>
    <x-piksera-ui::checkbox-single
        wire:model.debounce.300ms="state.settings.{{ $this->optionKey }}"
        name="{{$optionName}}"
        value="{{$optionValue}}"
    />

</div>
