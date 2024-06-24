<?php
$isCurrent = false;
if (request()->getUri() == $item->getUri()) {
    $isCurrent = true;
}

if ($item->getAttribute('route') == Route::currentRouteName()) {
    $isCurrent = true;
}
?>


<li class="nav-item <?php if(isset($class)): ?> <?php echo e($class); ?> <?php endif; ?>">
    <a href="<?php echo e($item->getUri()); ?>" <?php if($item->getAttribute('target') ): ?> target="<?php echo $item->getAttribute('target'); ?>" <?php endif; ?>" class="nav-link fs-3" <?php if($isCurrent): ?> x-init="setTimeout(function() { $el.classList.add('active'); }, 300);" <?php endif; ?> >

        <?php echo $item->getAttribute('icon'); ?>

        <span>
           <div x-init="setTimeout(function() { $el.classList.remove('placeholder'); $el.classList.remove('placeholder-xs'); }, 300);" class="placeholder placeholder-xs">
               <?php echo e(_e($item->getName())); ?>

           </div>
        </span>

    </a>
</li>
<?php /**PATH /Users/yahyehassan/Documents/Core/src/PikseraPackages/Admin/Providers/../resources/views/layouts/partials/navbar-link.blade.php ENDPATH**/ ?>