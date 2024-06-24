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
} elseif ($_instance->childHasBeenRendered('vihWLkV')) {
    $componentId = $_instance->getRenderedChildComponentId('vihWLkV');
    $componentTag = $_instance->getRenderedChildComponentTagName('vihWLkV');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('vihWLkV');
} else {
    $response = \Livewire\Livewire::mount('custom-fields-list', ['relId' => ''.e($relId).'','relType' => ''.e($relType).'']);
    $html = $response->html();
    $_instance->logRenderedChild('vihWLkV', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
</div>
<?php /**PATH /Users/yahyehassan/Documents/Bloggy/userfiles/modules/custom_fields/src/Providers/../resources/views/admin-module.blade.php ENDPATH**/ ?>