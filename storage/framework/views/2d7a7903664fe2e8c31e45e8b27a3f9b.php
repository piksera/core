
<div>
    <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('piksera-module-social-links::settings', ['moduleType' => $moduleType,'moduleId' => $moduleId])->html();
} elseif ($_instance->childHasBeenRendered('YL99V8P')) {
    $componentId = $_instance->getRenderedChildComponentId('YL99V8P');
    $componentTag = $_instance->getRenderedChildComponentTagName('YL99V8P');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('YL99V8P');
} else {
    $response = \Livewire\Livewire::mount('piksera-module-social-links::settings', ['moduleType' => $moduleType,'moduleId' => $moduleId]);
    $html = $response->html();
    $_instance->logRenderedChild('YL99V8P', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
</div>
<?php /**PATH /Users/yahyehassan/Documents/Bloggy/userfiles/modules/social_links/src/Providers/../resources/views/render-livewire-settings.blade.php ENDPATH**/ ?>