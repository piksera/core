@if (isset($editorSettings['schema']))
    @foreach ($editorSettings['schema'] as $field)
        <div class="form-group">

            @php
                $placeholder = '';

                if(isset($field['placeholder'])){
                    $placeholder = $field['placeholder'];
                }
            @endphp

            @if($field['type'] == 'text' )
                <label class="live-edit-label" for="{{ $field['name'] }}">{{ $field['label'] }}</label>
                <x-piksera-ui::input placeholder="{{ $placeholder }}" wire:model.defer="itemState.{{ $field['name'] }}" />
            @elseif($field['type'] == 'textarea' )
                <label class="live-edit-label" for="{{ $field['name'] }}">{{ $field['label'] }}</label>
                <x-piksera-ui::textarea placeholder="{{ $placeholder }}" wire:model.defer="itemState.{{ $field['name'] }}"/>
            @elseif($field['type'] == 'image' )
                <x-piksera-ui::media-picker wire:model.defer="itemState.{{ $field['name'] }}"/>
            @elseif($field['type'] == 'file' )
                <x-piksera-ui::file-picker wire:model.defer="itemState.{{ $field['name'] }}"/>
            @elseif($field['type'] == 'select' )
                <label class="live-edit-label" for="{{ $field['name'] }}">{{ $field['label'] }}</label>
                <x-piksera-ui::select wire:model.defer="itemState.{{ $field['name'] }}">
                    @foreach ($field['options'] as $option)
                        <option value="{{ $option['value'] }}">{{ $option['label'] }}</option>
                    @endforeach
                </x-piksera-ui::select>
            @elseif($field['type'] == 'checkbox' )
                <label class="live-edit-label" for="{{ $field['name'] }}">{{ $field['label'] }}</label>
                <x-piksera-ui::checkbox wire:model.defer="itemState.{{ $field['name'] }}"/>
            @elseif($field['type'] == 'radio' )
                <label class="live-edit-label" for="{{ $field['name'] }}">{{ $field['label'] }}</label>
                <x-piksera-ui::radio wire:model.defer="itemState.{{ $field['name'] }}"/>
            @elseif($field['type'] == 'color' )
                <x-piksera-ui::color-picker label="{{$field['name']}}" wire:model.defer="itemState.{{ $field['name'] }}"/>
            @elseif($field['type'] == 'icon' )
                <label class="live-edit-label" for="{{ $field['name'] }}">{{ $field['label'] }}</label>
                <x-piksera-ui::icon-picker wire:model.defer="itemState.{{ $field['name'] }}"/>
            @elseif($field['type'] == 'date' )
                <label class="live-edit-label" for="{{ $field['name'] }}">{{ $field['label'] }}</label>
                <x-piksera-ui::date wire:model.defer="itemState.{{ $field['name'] }}"/>
            @elseif($field['type'] == 'datetime' )
                <label class="live-edit-label" for="{{ $field['name'] }}">{{ $field['label'] }}</label>
                <x-piksera-ui::datetime wire:model.defer="itemState.{{ $field['name'] }}"/>
            @elseif($field['type'] == 'range' )
                <label class="live-edit-label" for="{{ $field['name'] }}">{{ $field['label'] }}</label>
                <x-piksera-ui::range-slider wire:model.defer="itemState.{{ $field['name'] }}"/>
            @elseif($field['type'] == 'time' )
                <label class="live-edit-label" for="{{ $field['name'] }}">{{ $field['label'] }}</label>
                <x-piksera-ui::time wire:model.defer="itemState.{{ $field['name'] }}"/>
            @elseif($field['type'] == 'url' )
                <label class="live-edit-label" for="{{ $field['name'] }}">{{ $field['label'] }}</label>
                <x-piksera-ui::link-picker wire:model.defer="itemState.{{ $field['name'] }}"/>
            @elseif($field['type'] == 'info' )
                <x-piksera-ui::alert type="info"> {{ $field['help'] }} </x-piksera-ui::alert>
            @else
                <label class="live-edit-label" for="{{ $field['name'] }}">{{ $field['label'] }}</label>
                <x-piksera-ui::input placeholder="{{ $placeholder }}" wire:model.defer="itemState.{{ $field['name'] }}"/>
            @endif

            @error($field['name']) <span class="text-danger">{{ $message }}</span> @enderror
        </div>
    @endforeach
@endif
