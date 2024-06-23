<div>
    <label class="live-edit-label">{{__('Facebook page URL')}} </label>
    <livewire:piksera-option::text optionKey="fb-page" :optionGroup="$moduleId" :module="$moduleType"  />
<!--    <small class="text-muted">
        {{_e('Example: https://www.facebook.com/Piksera/')}}
    </small>-->
</div>

<div class="mt-3">
    <label class="live-edit-label">{{__('Box width')}} </label>
    <livewire:piksera-option::range-slider min="180" max="500" unit="px" optionKey="width" :optionGroup="$moduleId" :module="$moduleType"  />
</div>

<div class="mt-3">
    <label class="live-edit-label">{{__('Box height')}} </label>
    <livewire:piksera-option::range-slider min="70" max="1500" unit="px" optionKey="height" :optionGroup="$moduleId" :module="$moduleType"  />
</div>


<div class="mt-3">
    <label class="live-edit-label">{{__('Show friends faces')}} </label>
    <livewire:piksera-option::toggle optionKey="friends" :optionGroup="$moduleId" :module="$moduleType"  />
</div>

<div class="mt-3">
    <label class="live-edit-label">{{__('Show timeline')}} </label>
    <livewire:piksera-option::toggle optionKey="timeline" :optionGroup="$moduleId" :module="$moduleType"  />
</div>
