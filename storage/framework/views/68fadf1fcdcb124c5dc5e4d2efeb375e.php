<?php $__env->startSection('content'); ?>


    <?php if(isset($layout) && $layout): ?>
        <?php echo $__env->make('page::admin.page.edit', ['layout' => $layout], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php else: ?>

    <script>
        window.addEventListener('beforeunload', e => {
            $('.mw-create-page-templates-select-window').html('Loading...')
            mw.tools.loading('.mw-create-page-templates-select-window', true);
        });
    </script>


    <div class="row px-5 mx-5 mw-create-page-templates-select-window">

        <?php
        $parent_page_param = '';
        if(isset($_GET['recommended_content_id'])){
            $parent_page_param .= '&recommended_content_id='.intval($_GET['recommended_content_id']);
        }
        if(isset($_GET['iframe'])){
            $parent_page_param .= '&iframe='.$_GET['iframe'];
        }
        if(isset($_GET['quickContentAdd'])){
            $parent_page_param .= '&quickContentAdd='.$_GET['quickContentAdd'];
        }
        ?>

        <h3 class="main-pages-title"><?php echo e(_e("Types of pages")); ?></h3>
        <small class="text-muted"><?php echo e(_e("Select the type of page to create. You can change the content as well as add new layouts to further develop the functionality")); ?></small>

        <div class="row row-cards px-3">

            <div class="col-xxl-4 col-lg-6 col-12 pe-lg-6 ps-lg-0 pt-3 mb-2">

                <h2 class="mt-3 mb-2 font-weight-bold"><?php echo e(_e("Clean Page")); ?> </h2>

                <a href="<?php echo e(route('admin.page.create')); ?>?layout=clean.php<?php echo e($parent_page_param); ?>" class="card card-link card-link-pop mw-create-page-admin-wrapper">
                    <div id="mw-create-page-card-overlay"></div>

                    <div class="card-body" style="padding: 13px; height: calc(50vh - 80px);">
                        <div class="create-page-clean d-flex justify-content-center align-items-center h-100">
                            <h4 class="font-weight-bold mb-0"><?php echo e(_e("Empty Page")); ?></h4>
                        </div>
                    </div>

                    <span class="btn btn-primary mw-create-page-admin-create-btn">
                        <?php echo e(_e("Create")); ?>

                    </span>

                </a>


            </div>

            <?php $__currentLoopData = $allLayouts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $layout): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                <?php
                    if($layout['layout_file'] == 'clean.php') {
                        continue;
                    }

                  $layout_details_for_new_page = app()->layouts_manager->get_layout_details([
                        'layout_file' => $layout['layout_file'],
                        'active_site_template' => ACTIVE_SITE_TEMPLATE
                    ]);

                    $isDynamic = false;
                    $isShop = false;

                    if(isset($layout_details_for_new_page['content_type']) and $layout_details_for_new_page['content_type'] == 'dynamic'){
                        $isDynamic = true;
                         $isShop = false;
                    }
                    if(isset($layout_details_for_new_page['is_shop']) and $layout_details_for_new_page['is_shop'] != 0){
                        $isDynamic = false;
                        $isShop = true;
                        $showShop = is_shop_module_enabled_for_user();
                        if (!$showShop) {
                            continue;
                        }

                    }

                ?>

                <div class="col-xxl-4 col-lg-6 col-12 pe-lg-6 ps-lg-0 pt-3 mb-2 ">


                    <h2 class="mt-3 mb-2 font-weight-bold">
                        <?php echo e($layout['name']); ?>

                        <?php if($isDynamic): ?>
                            <span class="live-edit-label  d-inline-block"><span class="badge bg-indigo-lt"><?php _e('Dynamic page') ?></span></span>
                        <?php endif; ?>
                        <?php if($isShop): ?>
                            <span class="live-edit-label  d-inline-block"><span class="badge bg-purple-lt"><?php _e('Shop page') ?></span></span>
                        <?php endif; ?>

                    </h2>

                    <div class="card mw-create-page-admin-wrapper">
                        <div id="mw-create-page-card-overlay"></div>
                        <?php
                                $iframe_start = site_url('new-content-preview-'. uniqid());
                            ?>
                            <?php echo $__env->make('page::admin.page.iframe', [
                            'lazyLoad'=>true,
                             'url'=>site_url('new-content-preview-'. uniqid() . '?content_id=0&no_editmode=true&preview_layout=' . $layout['layout_file_preview']
                        )], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <div class="p-2 text-center mw-create-page-admin-create-btn">
                            <a href="<?php echo e(route('admin.page.create')); ?>?layout=<?php echo e($layout['layout_file_preview']); ?><?php echo e($parent_page_param); ?>" class="btn btn-primary">
                                <?php echo e(_e("Create")); ?>

                            </a>
                        </div>
                    </div>

                </div>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </div>
    </div>
    <?php endif; ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin::layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/yahyehassan/Desktop/Bloggy/src/PikseraPackages/Page/resources/views/admin/page/create.blade.php ENDPATH**/ ?>