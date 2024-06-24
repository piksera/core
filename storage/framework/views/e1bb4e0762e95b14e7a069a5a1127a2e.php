<div>
    <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('live-edit-template-settings-sidebar', [])->html();
} elseif ($_instance->childHasBeenRendered('ndL4ran')) {
    $componentId = $_instance->getRenderedChildComponentId('ndL4ran');
    $componentTag = $_instance->getRenderedChildComponentTagName('ndL4ran');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('ndL4ran');
} else {
    $response = \Livewire\Livewire::mount('live-edit-template-settings-sidebar', []);
    $html = $response->html();
    $_instance->logRenderedChild('ndL4ran', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
</div>
<?php /**PATH /Users/yahyehassan/Documents/Bloggy/src/PikseraPackages/Template/resources/views/template-settings-sidebar-render-component.blade.php ENDPATH**/ ?>