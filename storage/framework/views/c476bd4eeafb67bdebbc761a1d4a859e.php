<button class="navbar-toggler d-xl-none" id="sidebar-toggle">
    <span class="navbar-toggler-icon"></span>
</button>

<script>

    

    document.body.addEventListener('click', function(e){
        var sidebar = document.getElementById('admin-sidebar');
        if(!sidebar.contains(e.target)) {
            document.body.classList.remove('sidebar-mobile-toggle')
        }
        
    });

    document.getElementById('sidebar-toggle').addEventListener('click', function(e){
        
        document.body.classList.toggle('sidebar-mobile-toggle');
        e.stopPropagation();
    });


</script>

 

<?php if(user_can_access('module.content.edit')): ?>

<button type="button" class="btn btn-light    border-0 admin-toolbar-buttons"
        data-bs-toggle="modal"  data-bs-target="#modal-add-new-admin" aria-expanded="false">
    <img height="28" width="28" src="<?php print modules_url()?>/microweber/api/libs/mw-ui/assets/img/add-new-button.svg" alt="">
</button>




























<?php endif; ?>
<?php /**PATH /Users/yahyehassan/Documents/Core/src/MicroweberPackages/Admin/Providers/../resources/views/layouts/partials/topbar2-links-left-default.blade.php ENDPATH**/ ?>