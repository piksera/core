<?php

$editContentLink = '';
$editContentLinkClass = '';
if(isset($content->id)){
    $editContentLink = route('admin.content.edit', $content->id);
}

if($content && method_exists($content, 'editLink')){
   $editContentLink = $content->editLink();
}



if(isset($isIframe) && $isIframe == true) {

    $editContentLinkClass = 'mw-edit-content-link-picture-iframe js-open-in-modal';
}


?>

<a href="<?php echo e($editContentLink); ?>" class="mw-edit-content-link-picture <?php echo e($editContentLinkClass); ?>">
<?php if($content->media()->first()): ?>


    <div class="picture-blade-bg-img border-radius-0 border-0" style="background-image: url('<?php echo e($content->thumbnail(640,480, true)); ?>')">


    </div>
<?php else: ?>
    <?php echo $__env->make('content::admin.content.livewire.components.icon', ['content'=>$content], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?>
</a>
<?php /**PATH /Users/yahyehassan/Documents/Bloggy/src/PikseraPackages/Content/resources/views/admin/content/livewire/components/picture.blade.php ENDPATH**/ ?>