<?php
$dropdownActive = false;
foreach($item->getChildren() as $subItem) {

    if (!empty($subItem->getExtra('routes'))) {
        if (in_array(Route::currentRouteName(), $subItem->getExtra('routes'))) {
            $dropdownActive = true;
        }
    }

    if ($subItem->getAttribute('route') == Route::currentRouteName()) {
        $dropdownActive = true;
    }
    if (request()->getUri() == $subItem->getUri()) {
        $dropdownActive = true;
    }
}
?>

<li class="nav-item dropdown">
    <a href="<?php if(!empty($subItem->getAttribute('route'))): ?> <?php echo e(route($subItem->getAttribute('route'))); ?> <?php else: ?> <?php echo e($subItem->getUri()); ?> <?php endif; ?>" class="nav-link fs-3 dropdown-toggle" <?php if($dropdownActive): ?> x-init="setTimeout(function() { $el.classList.add('active'); }, 300);" <?php endif; ?> data-bs-toggle="dropdown" data-bs-auto-close="false" role="button" aria-expanded="true">
        <?php echo $item->getAttribute('icon'); ?>

        <div x-init="setTimeout(function() { $el.classList.remove('placeholder'); $el.classList.remove('placeholder-xs'); }, 300);" class="placeholder placeholder-xs">
            <span class="badge-holder">
                <?php echo e(_e($item->getName())); ?>

            </span>
        </div>
    </a>
    <div class="dropdown-menu" <?php if($dropdownActive): ?> x-init="setTimeout(function() { $el.classList.add('show'); }, 300);" <?php endif; ?> data-bs-popper="static">
        <div class="dropdown-menu-columns">
            <div class="dropdown-menu-column">
                <?php $__currentLoopData = $item->getChildren(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="dropdown-menu-column-item">
                    <?php
                    $subItemIsActive = false;
                    if ($subItem->getAttribute('route') == Route::currentRouteName()) {
                        $subItemIsActive = true;
                    }
                    if (!empty($subItem->getExtra('routes'))) {
                        if (in_array(Route::currentRouteName(), $subItem->getExtra('routes'))) {
                            $subItemIsActive = true;
                        }
                    }
                    ?>

                    <a href="<?php if(!empty($subItem->getAttribute('route'))): ?> <?php echo e(route($subItem->getAttribute('route'))); ?> <?php else: ?> <?php echo e($subItem->getUri()); ?> <?php endif; ?>" class="dropdown-item  <?php if($subItemIsActive): ?> active <?php endif; ?>">

                        <?php if($subItem->hasChildren()): ?>
                          <?php
/*  <span class="add-new add-new-hamburger dropdown-menu-column-item--tree-open">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20px" height="20px" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg>

                           </span>*/
?>
                        <?php endif; ?>

                        <span>
                            <?php echo e(_e($subItem->getName())); ?>

                       </span>

                        <?php if($subItem->hasChildren()): ?>
                            <span data-href="" class="add-new add-new-dots" data-bs-toggle="tooltip" title="">
                             <svg fill="currentColor" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 96 960 960" width="24"><path d="M240 656q-33 0-56.5-23.5T160 576q0-33 23.5-56.5T240 496q33 0 56.5 23.5T320 576q0 33-23.5 56.5T240 656Zm240 0q-33 0-56.5-23.5T400 576q0-33 23.5-56.5T480 496q33 0 56.5 23.5T560 576q0 33-23.5 56.5T480 656Zm240 0q-33 0-56.5-23.5T640 576q0-33 23.5-56.5T720 496q33 0 56.5 23.5T800 576q0 33-23.5 56.5T720 656Z"/></svg>
                            </span>
                        <?php endif; ?>
                    </a>

                    <?php if($subItem->hasChildren()): ?>
                        <div class="mw-admin-sidebar-navigation-menu">
                            <div class="card card-sm">
                                <div class="card-body">
                                    <nav class="nav flex-column">
                                        <?php $__currentLoopData = $subItem->getChildren(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subItemChildren): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <a class="mw-admin-action-links btn btn-link text-decoration-none fs-5" aria-current="page"
                                               href="<?php if(!empty($subItemChildren->getAttribute('route'))): ?> <?php echo e(route($subItemChildren->getAttribute('route'))); ?> <?php else: ?> <?php echo e($subItemChildren->getUri()); ?> <?php endif; ?>">
                                                <?php echo e(_e($subItemChildren->getName())); ?>

                                            </a>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                         
                                    </nav>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>

                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
</li>
<?php /**PATH /Users/yahyehassan/Desktop/Bloggy/src/PikseraPackages/Admin/Providers/../resources/views/layouts/partials/navbar-dropdown-link.blade.php ENDPATH**/ ?>