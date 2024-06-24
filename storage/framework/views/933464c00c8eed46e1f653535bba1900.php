<div>

    <?php
    $relType = 'content';
    $relId = 0;
    if (isset($params['content-id'])) {
        $relId = $params['content-id'];
    }
    if (isset($params['for'])) {
        $relType = $params['for'];
    }
    if (isset($params['for-id'])) {
        $relId = $params['for-id'];
    }
    ?>

    <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('custom-fields-list', ['relId' => ''.e($relId).'','relType' => ''.e($relType).''])->html();
} elseif ($_instance->childHasBeenRendered('OKuvxVg')) {
    $componentId = $_instance->getRenderedChildComponentId('OKuvxVg');
    $componentTag = $_instance->getRenderedChildComponentTagName('OKuvxVg');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('OKuvxVg');
} else {
    $response = \Livewire\Livewire::mount('custom-fields-list', ['relId' => ''.e($relId).'','relType' => ''.e($relType).'']);
    $html = $response->html();
    $_instance->logRenderedChild('OKuvxVg', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
</div>
<?php /**PATH /Users/yahyehassan/Desktop/Bloggy/userfiles/modules/custom_fields/src/Providers/../resources/views/admin-module.blade.php ENDPATH**/ ?>