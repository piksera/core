<x-piksera-ui::label for="{{$randId}}" :value="$labelText" />
<x-piksera-ui::input id="{{$randId}}" class="block w-full" wire:model.lazy="state.{{$fieldName}}" />
