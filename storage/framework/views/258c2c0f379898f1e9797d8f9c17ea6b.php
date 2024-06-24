<?php
 $past_page = site_url();
?>

<?php if(user_can_access('module.content.edit')): ?>
<li class="go-live-edit-nav-item-holder">
    <a href="<?php echo e(admin_url('live-edit')); ?>"
       class="btn btn-light border-0 go-live-edit-href-set admin-toolbar-buttons">
        <img height="28" width="28" src="<?php print modules_url()?>/microweber/api/libs/mw-ui/assets/img/live-edit-button.svg" alt="">
        <span class="  ms-2" style="font-size: 14px; font-weight: bold;">EDIT</span>
    </a>
</li>
<?php endif; ?>
<?php /**PATH /Users/yahyehassan/Documents/Core/src/PikseraPackages/Admin/Providers/../resources/views/layouts/partials/topbar2-links-right-default.blade.php ENDPATH**/ ?>