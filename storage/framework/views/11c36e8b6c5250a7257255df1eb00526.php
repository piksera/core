<div class="row">
    <div class="col-12">

        <div class="mt-4">
            <label class="form-label"><?php _e("Select and type socials links you want to show"); ?></label>
            <small class="text-muted d-block mb-2"><?php _e("Select the social networks you want to see on your site, blog and store"); ?></small>
        </div>


        <?php
            $socialNetworksEnabled = [];
            $socialLinksOptions = get_module_options($this->moduleId);
            if($socialLinksOptions){
                foreach ($socialLinksOptions as $socialLinkOption) {
                    if (strpos($socialLinkOption['option_key'], '_enabled') !== false) {
                        $socialNetworksEnabled[$socialLinkOption['option_key']] =  $socialLinkOption['option_value'];
                    }
                }
            }

        ?>


        <script>
            document.addEventListener('alpine:init', () => {
                Alpine.store('socialNetworksEnabled', <?php echo json_encode($socialNetworksEnabled, 15, 512) ?>);
            });
            document.addEventListener('mw-option-saved', ($event) => {
                let newSocialNetworksEnabled = Alpine.store('socialNetworksEnabled');
                delete newSocialNetworksEnabled[$event.detail.optionKey];
                newSocialNetworksEnabled[$event.detail.optionKey] = $event.detail.optionValue;
                Alpine.store('socialNetworksEnabled', newSocialNetworksEnabled);

                mw.top().app.editor.dispatch('onModuleSettingsChanged', ({'moduleId': '<?php echo e($this->moduleId); ?>'} || {}))
            });
        </script>

        <div x-data>
        <?php $__currentLoopData = $supportedSocialNetworks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $socialNetwork=>$socialNetworkData): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php
                $socialNetworkOptionKeyUrl = $socialNetwork . '_url';
                $socialNetworkOptionKeyEnable = $socialNetwork . '_enabled';
                $socialNetworkIsEnabled = get_option($socialNetworkOptionKeyEnable, $this->moduleId);
            ?>
            <div class="form-check my-3">
                <div class="d-flex flex-wrap align-items-center">
                    <div class="d-flex col-xl-3 col-md-6 col-12">
                        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('piksera-option::toggle', ['value' => 'y','optionKey' => $socialNetworkOptionKeyEnable,'optionGroup' => $moduleId,'module' => 'social_links'])->html();
} elseif ($_instance->childHasBeenRendered('l3096511624-0')) {
    $componentId = $_instance->getRenderedChildComponentId('l3096511624-0');
    $componentTag = $_instance->getRenderedChildComponentTagName('l3096511624-0');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('l3096511624-0');
} else {
    $response = \Livewire\Livewire::mount('piksera-option::toggle', ['value' => 'y','optionKey' => $socialNetworkOptionKeyEnable,'optionGroup' => $moduleId,'module' => 'social_links']);
    $html = $response->html();
    $_instance->logRenderedChild('l3096511624-0', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
                        <div>
                            <label class="form-check-label d-flex align-items-center" for="<?php echo e($socialNetworkOptionKeyEnable); ?>">
                                <i class="mdi <?php echo e($socialNetworkData['icon']); ?> mdi-20px lh-1_0 me-1"></i> <?php echo e(ucwords($socialNetwork)); ?>

                            </label>
                        </div>
                    </div>
                    <div class="col-xl-9 col-md-6 col-12" x-show="$store.socialNetworksEnabled.<?php echo e($socialNetworkOptionKeyEnable); ?> == 1" x-transition>
                        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('piksera-option::text', ['optionKey' => $socialNetworkOptionKeyUrl,'optionGroup' => $moduleId,'module' => 'social_links'])->html();
} elseif ($_instance->childHasBeenRendered('l3096511624-1')) {
    $componentId = $_instance->getRenderedChildComponentId('l3096511624-1');
    $componentTag = $_instance->getRenderedChildComponentTagName('l3096511624-1');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('l3096511624-1');
} else {
    $response = \Livewire\Livewire::mount('piksera-option::text', ['optionKey' => $socialNetworkOptionKeyUrl,'optionGroup' => $moduleId,'module' => 'social_links']);
    $html = $response->html();
    $_instance->logRenderedChild('l3096511624-1', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>

    </div>
</div>
<?php /**PATH /Users/yahyehassan/Documents/Bloggy/userfiles/modules/social_links/src/Providers/../resources/views/livewire/settings.blade.php ENDPATH**/ ?>