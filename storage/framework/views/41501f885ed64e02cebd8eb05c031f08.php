 <aside class="navbar navbar-vertical navbar-expand-xl admin-dashboard-left-nav " id="admin-sidebar">


    <div class="container-fluid" >


        <h1 class="navbar-brand">
            <?php
            if (mw()->ui->admin_logo != false):
                $logo = mw()->ui->admin_logo;
            elseif (mw()->ui->admin_logo_login() != false):
                $logo = mw()->ui->admin_logo_login();
            else:
                $logo = modules_url() . 'piksera/api/libs/mw-ui/assets/img/logo.svg';
            endif;
            ?>
            <a class="w-100 mb-md-3" href="<?php print admin_url(); ?>">
                <img alt="" src="<?php print $logo; ?>">
            </a>

        </h1>


        <div class="  navbar-collapse overflow-x-hidden" id="sidebar-menu">
            <ul class="navbar-nav navbar-nav-padding" id="mw-admin-main-navigation">

                <?php event_trigger('mw.admin.sidebar.li.first'); ?>

                <?php $__currentLoopData = \PikseraPackages\Admin\Facades\AdminManager::getMenu('left_menu_top'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if(method_exists($item, 'getChildren') && !empty($item->getChildren())): ?>
                        <?php echo $__env->make('admin::layouts.partials.navbar-dropdown-link', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php else: ?>
                        <?php echo $__env->make('admin::layouts.partials.navbar-link', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                <?php $__currentLoopData = \PikseraPackages\Admin\Facades\AdminManager::getMenu('left_menu_bottom'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if(method_exists($item, 'items')): ?>
                        <?php echo $__env->make('admin::layouts.partials.navbar-dropdown-link', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php else: ?>
                        <?php if($loop->first): ?>
                            <?php echo $__env->make('admin::layouts.partials.navbar-link', ['class'=>'mt-auto'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php else: ?>
                            <?php echo $__env->make('admin::layouts.partials.navbar-link', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php endif; ?>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                <?php event_trigger('mw.admin.sidebar.li.last'); ?>


            </ul>

            <hr class="thin">

            <?php echo $__env->make('admin::layouts.partials.navbar-bottom-menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        </div>

    </div>



    <script>

        var handleConfirmBeforeLeave = function (c) {
            if (mw.askusertostay) {
                mw.confirm(mw.lang("You have unsaved changes. Do you want to save them first") + '?',
                    function () {

                        c.call(undefined, true)
                    },
                    function (){
                        mw.askusertostay = false;
                        c.call(undefined, false)
                    });
            } else {
                c.call(undefined, false)
            }
        };
        $(document).ready(function () {

            var setSidebarSize = function(size, init) {
                size = parseFloat(size);
                if(!size || isNaN(size)){
                    size = 240
                }



                $('#pages-tree-container').css('transition', 'none')
                $('.mw-admin-toggle-tree-navigation').css({
                    'left':  size,
                    'transition':  'none',
                })
                $('#pages-tree-container').width(size - 20)
                $('#pages-tree-container, .mw-admin-toggle-tree-navigation').css('transition', '')

                if(init) {
                    $("#admin-sidebar").width(size)
                } else {
                    mw.storage.set('mw-admin-sidebar-size', size);
                }
            }

            var sidebarSize = mw.storage.get('mw-admin-sidebar-size');


            setSidebarSize(sidebarSize, true)


            $("#admin-sidebar").resizable({
                maxWidth: 550,
                handles: 'e',
                minWidth: 250,
                resize: function(e, ui) {

                    setSidebarSize(ui.size.width)


                }
            })



            mw.$('.go-live-edit-href-set').each(function () {
                var el = $(this);

                if(self !== top){
                    el.attr('target', '_parent');
                }


                var href = el.attr('href');

                if (href.indexOf("editmode") === -1) {
                    href = href + ((href.indexOf('?') === -1 ? '?' : '&') + 'editmode:y');

                    el.attr('href', href);

                }
            }).on('mousedown touchstart', function (event){
                var el = this;

                if(event.which === 1 || event.type === 'touchstart') {
                    handleConfirmBeforeLeave(function (shouldSave){
                        if(shouldSave) {
                            var edit_cont_form =  $('#quickform-edit-content');
                            var edit_cont_form_is_disabled_btn =  $('#js-admin-save-content-main-btn').attr('disabled');
                            var edit_cont_title =  $('#content-title-field').val();
                            if (edit_cont_form.length /*&& mw.edit_content && edit_cont_title && !edit_cont_form_is_disabled_btn*/) {
                                event.stopPropagation();
                                event.preventDefault();
                                mw.askusertostay = false;
                                mw.edit_content.saving = false;
                                if($(this).hasClass('go-live-edit-href-set-view')){
                                    mw.edit_content.handle_form_submit('n');
                                } else {
                                    mw.edit_content.handle_form_submit('y');
                                }
                            }
                        } else {
                            mw.askusertostay = false;
                            var newHref = el.getAttribute('href');

                            location.href =newHref;

                        }
                    });
                }

            });

            ;(() => {
                const nav = document.querySelector('#sidebar-menu');
                document.addEventListener('click', e => {
                    if(!nav.contains(e.target)) {
                        document.querySelectorAll('.mw-admin-sidebar-navigation-menu.active').forEach(node => node.classList.remove('active'))
                    }
                })
                document.querySelectorAll('#sidebar-menu .add-new').forEach(node => {
                    node.addEventListener('click', e => {

                        e.preventDefault();
                        e.stopPropagation();
                        var target = node.parentElement.nextElementSibling;
                        if(target) {
                            document.querySelectorAll('.mw-admin-sidebar-navigation-menu').forEach(node => {
                                if(node !== target) {
                                    node.classList.remove('active');
                                } else {
                                    node.classList.toggle('active');
                                }
                            })
                        }
                    })
                })

            })();



        });
    </script>
</aside>
<?php /**PATH /Users/yahyehassan/Desktop/core/src/PikseraPackages/Admin/Providers/../resources/views/layouts/partials/navbar.blade.php ENDPATH**/ ?>