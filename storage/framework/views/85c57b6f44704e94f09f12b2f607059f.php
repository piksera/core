<?php $__env->startSection('content'); ?>

    <style>
        .preview_frame_container.preview-in-self {
            height: calc(80vh - 80px);
            pointer-events: none;
        }
        .preview_frame_container {
            position: relative;
            overflow: hidden;
            pointer-events: none;
        }
        .preview_frame_container.preview-in-self iframe {
            height: calc(160vh - 160px) !important;
            pointer-events: none;
        }
        .preview_frame_container iframe {
            pointer-events: none;
            width: 200%;
            transform: scale(.5);
            top: 0;
            position: absolute;
            left: 0;
            transform-origin: 0 0;
            border: 1px solid silver;
            transition: .3s;
        }
    </style>
<div class="col-xxl-10 col-lg-11 col-12 mx-auto px-lg-0 px-5">
    <h3 class="main-pages-title"><?php _e("Design") ?>

    </h3>

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="d-flex align-items-start flex-wrap justify-content-between mb-4 px-0">
                    <div class="col-lg-4 col-12 mb-xl-0 mb-2">

                       <h2 class="mb-0">
                           <?php echo e($templateName); ?>

                       </h2>
                       <a class="tblr-body-color text-decoration-none mw-admin-action-links btn btn-link" href="#"
                          onclick="Livewire.emit('openModal', 'admin-template-update-modal')"
                          class="font-weight-bolder">
                        <?php echo e('Version'); ?> : <?php echo e($templateVersion); ?>

                       </a>

                        <div class="d-flex align-items-center flex-wrap gap-3">
                            <a class="tblr-body-color font-weight-bold text-decoration-none mw-admin-action-links btn btn-link fs-3" href="<?php echo e(admin_url('settings?group=general')); ?>">

                                <svg fill="currentColor" class="me-1" xmlns="http://www.w3.org/2000/svg" height="20" viewBox="0 -960 960 960" width="20"><path d="M180-180h44l443-443-44-44-443 443v44Zm614-486L666-794l42-42q17-17 42-17t42 17l44 44q17 17 17 42t-17 42l-42 42Zm-42 42L248-120H120v-128l504-504 128 128Zm-107-21-22-22 44 44-22-22Z"/></svg>
                                <?php _e("Site Details") ?>
                            </a>
                            <a class="tblr-body-color font-weight-bold text-decoration-none mw-admin-action-links btn btn-link fs-3" href="<?php echo e(admin_url('marketplace?keyword=&category=piksera-template')); ?>">
                                <svg fill="currentColor" class="me-1" xmlns="http://www.w3.org/2000/svg" height="20" viewBox="0 -960 960 960" width="20"><path d="M840-519v339q0 24-18 42t-42 18H179q-24 0-42-18t-18-42v-339q-28-24-37-59t2-70l43-135q8-27 28-42t46-15h553q28 0 49 15.5t29 41.5l44 135q11 35 1.5 70T840-519Zm-270-31q29 0 49-19t16-46l-25-165H510v165q0 26 17 45.5t43 19.5Zm-187 0q28 0 47.5-19t19.5-46v-165H350l-25 165q-4 26 14 45.5t44 19.5Zm-182 0q24 0 41.5-16.5T263-607l26-173H189l-46 146q-10 31 8 57.5t50 26.5Zm557 0q32 0 50.5-26t8.5-58l-46-146H671l26 173q3 24 20.5 40.5T758-550ZM179-180h601v-311q1 1-6.5 1H758q-25 0-47.5-10.5T666-533q-16 20-40 31.5T573-490q-30 0-51.5-8.5T480-527q-15 18-38 27.5t-52 9.5q-31 0-55-11t-41-32q-24 21-47 32t-46 11h-13.5q-6.5 0-8.5-1v311Zm601 0H179h601Z"/></svg>
                                <?php _e("Template Store") ?>
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-8 col-12 text-md-end text-center" id="mw-design-page-icons" style="display: none;">
                        <a href="<?php echo e(route('admin.page.create')); ?>" class="btn btn-outline-dark fs-3 me-2 mw-admin-bold-outline-dark">
                            <svg fill="currentColor" class="me-sm-2" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 96 960 960" width="24"><path d="M446.667 856V609.333H200v-66.666h246.667V296h66.666v246.667H760v66.666H513.333V856h-66.666Z"/></svg>
                            <span class="d-sm-block d-none"><?php echo e(_e("New Page")); ?></span>
                        </a>

                        <a href="" target="_new" class="js-layout-preview btn btn-outline-dark fs-3 me-2 mw-admin-bold-outline-dark" >
                            <svg class="me-md-2" fill="currentColor" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"><path d="M0 0h24v24H0V0z" fill="none"></path><path d="M12 6c3.79 0 7.17 2.13 8.82 5.5C19.17 14.87 15.79 17 12 17s-7.17-2.13-8.82-5.5C4.83 8.13 8.21 6 12 6m0-2C7 4 2.73 7.11 1 11.5 2.73 15.89 7 19 12 19s9.27-3.11 11-7.5C21.27 7.11 17 4 12 4zm0 5c1.38 0 2.5 1.12 2.5 2.5S13.38 14 12 14s-2.5-1.12-2.5-2.5S10.62 9 12 9m0-2c-2.48 0-4.5 2.02-4.5 4.5S9.52 16 12 16s4.5-2.02 4.5-4.5S14.48 7 12 7z"></path></svg>
                            <span class="d-md-block d-none">
                                <?php echo e(_e("Preview")); ?>

                            </span>

                        </a>

                        <a href="" class="js-layout-customize btn btn-outline-dark fs-3 mw-admin-bold-outline-dark">

                        </a>
                    </div>
                </div>

                <div class="card mb-4">

                   <div class="card-body p-0">
                       <div class="row p-0">
                           <div class="card-header d-flex flex-wrap align-items-center justify-content-between px-0">
                              <div class="col-xl-3 col-lg-4 col-md-6 col-12">
                                  <label  class="form-label"><?php echo e('Website pages'); ?></label>
                                  <select class="js-select-layout form-select">
                                      <?php $__currentLoopData = $allLayouts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $layout): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                          <?php if(isset($layout['pages']) && count($layout['pages']) > 1): ?>
                                          <optgroup label="<?php echo e($layout['name']); ?>">
                                              <?php $__currentLoopData = $layout['pages']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                  <option data-edit-url="<?php echo e($page['edit_url']); ?>" value="<?php echo e($page['preview_url']); ?>"><?php echo e($page['name']); ?></option>
                                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                          </optgroup>
                                          <?php else: ?>
                                              <option data-create-url="<?php echo e($layout['create_url']); ?>" data-edit-url="<?php echo e($layout['edit_url']); ?>" value="<?php echo e($layout['preview_url']); ?>"><?php echo e($layout['name']); ?></option>
                                          <?php endif; ?>
                                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                  </select>
                              </div>

                               <div class="col-xl-9 text-end mw-design-page-prev-next-buttons-wrapper mt-md-0 mt-3 mx-md-0 mx-auto">

                                   <button type="button" class="js-previous-layout mw-design-page-prev-next-buttons btn btn-link me-2 tblr-body-color" data-bs-toggle="tooltip" aria-label="<?php echo e(_e("Previous")); ?>" data-bs-original-title="<?php echo e(_e("Previous")); ?>">

                                       <svg fill="currentColor" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="M480-160 160-480l320-320 42 42-248 248h526v60H274l248 248-42 42Z"/></svg>

                                   </button>
                                   <button type="button" class="js-next-layout mw-design-page-prev-next-buttons btn btn-link tblr-body-color" data-bs-toggle="tooltip" aria-label="<?php echo e(_e("Next")); ?>" data-bs-original-title="<?php echo e(_e("Next")); ?>">

                                       <svg fill="currentColor" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="m480-160-42-43 247-247H160v-60h525L438-757l42-43 320 320-320 320Z"/></svg>

                                   </button>
                               </div>
                           </div>


                           <script>
                               $(document).ready(function () {
                                    $('.js-select-layout').change(function () {
                                       selectLayout();
                                    });
                                   $('.js-previous-layout').click(function () {
                                       var currentLayoutIndex = $('.js-select-layout').prop('selectedIndex');
                                       var previousLayoutIndex = currentLayoutIndex - 1;
                                       if (previousLayoutIndex < 0) {
                                           previousLayoutIndex = $('.js-select-layout option').length - 1;
                                       }
                                       var previousLayout = $('.js-select-layout option').eq(previousLayoutIndex).val();
                                       $('.js-select-layout').val(previousLayout).trigger('change');
                                   });
                                   $('.js-next-layout').click(function () {
                                        var currentLayoutIndex = $('.js-select-layout').prop('selectedIndex');
                                        var nextLayoutIndex = currentLayoutIndex + 1;
                                        if (nextLayoutIndex > $('.js-select-layout option').length - 1) {
                                            nextLayoutIndex = 0;
                                        }
                                        var nextLayout = $('.js-select-layout option').eq(nextLayoutIndex).val();
                                        $('.js-select-layout').val(nextLayout).trigger('change');
                                   });
                                   function selectLayout()
                                   {
                                       var livePreviewUrl =  $('.js-select-layout').find(':selected').val();
                                       var createUrl = $('.js-select-layout').find(':selected').data('create-url');
                                       var editUrl = $('.js-select-layout').find(':selected').data('edit-url');

                                       $('.preview_frame_small').attr('src', livePreviewUrl);
                                       $('.js-layout-preview').attr('href', livePreviewUrl);

                                        var createIconSvg = '<svg class="me-md-2" fill="currentColor" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="M450-200v-250H200v-60h250v-250h60v250h250v60H510v250h-60Z"/></svg>'
                                       var customizeIconSvg = '<svg class="me-md-2" fill="currentColor" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="M480-80q-82 0-155-31.5t-127.5-86Q143-252 111.5-325T80-480q0-85 32-158t87.5-127q55.5-54 130-84.5T489-880q79 0 150 26.5T763.5-780q53.5 47 85 111.5T880-527q0 108-63 170.5T650-294h-75q-18 0-31 14t-13 31q0 27 14.5 46t14.5 44q0 38-21 58.5T480-80Zm0-400Zm-233 26q20 0 35-15t15-35q0-20-15-35t-35-15q-20 0-35 15t-15 35q0 20 15 35t35 15Zm126-170q20 0 35-15t15-35q0-20-15-35t-35-15q-20 0-35 15t-15 35q0 20 15 35t35 15Zm214 0q20 0 35-15t15-35q0-20-15-35t-35-15q-20 0-35 15t-15 35q0 20 15 35t35 15Zm131 170q20 0 35-15t15-35q0-20-15-35t-35-15q-20 0-35 15t-15 35q0 20 15 35t35 15ZM480-140q11 0 15.5-4.5T500-159q0-14-14.5-26T471-238q0-46 30-81t76-35h73q76 0 123-44.5T820-527q0-132-100-212.5T489-820q-146 0-247.5 98.5T140-480q0 141 99.5 240.5T480-140Z"></path></svg>'

                                       if (editUrl.length > 3) {
                                           $('.js-layout-customize').html(customizeIconSvg + '<span class="d-md-block d-none"><?php echo e(_e("Customize")); ?></span>');
                                           $('.js-layout-customize').attr('href', editUrl);
                                       } else {
                                           $('.js-layout-customize').attr('href', createUrl);
                                           $('.js-layout-customize').html(createIconSvg + '<?php echo e(_e("Add")); ?>');
                                       }

                                       $('#mw-design-page-icons').show();
                                   }
                                   selectLayout();
                               });
                           </script>

                           <div class="mt-3 px-0">
                               <div class="preview_frame_container preview-in-self">
                                   <iframe class="preview_frame_small"></iframe>
                               </div>
                           </div>
                       </div>
                   </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin::layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/yahyehassan/Desktop/core/src/PikseraPackages/Page/resources/views/admin/page/design.blade.php ENDPATH**/ ?>