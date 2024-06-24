<div class="row">
    <script>mw.require('admin_package_manager.js');</script>

    <div class="px-5 col-xxl-10 mx-auto">

        <div class="mb-3">
           <div class="row">
               <div class="d-flex align-items-center justify-content-between px-2 flex-wrap mb-4">
                   <div class="col-xl-4 col-md-8 col-12 px-1">
                       <h1><?php _e("Marketplace"); ?></h1>
                       <small class="text-muted"><?php _e("Find Templates, Modules, Licenses and Updates"); ?></small>
                   </div>


                   <div class="col-xl-3 col-md-4 col-12 my-2 my-md-0 flex-grow-1  flex-md-grow-0 px-1 my-xl-0 my-3">

                       <div class="input-icon position-relative">
                          <span class="input-icon-addon">
                            <svg fill="currentColor" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 96 960 960" width="24"><path d="M796 935 533 672q-30 26-69.959 40.5T378 727q-108.162 0-183.081-75Q120 577 120 471t75-181q75-75 181.5-75t181 75Q632 365 632 471.15 632 514 618 554q-14 40-42 75l264 262-44 44ZM377 667q81.25 0 138.125-57.5T572 471q0-81-56.875-138.5T377 275q-82.083 0-139.542 57.5Q180 390 180 471t57.458 138.5Q294.917 667 377 667Z"/></svg>                          </span>

                           <span wire:loading wire:target="keyword" class="spinner-border spinner-border-sm" role="status" style="position: absolute; right: 15px; top: 15px;">
                               <span class="visually-hidden"><?php _e("Searching"); ?>...</span>
                           </span>
                           <input type="text" class="form-control" placeholder="Search..." wire:keydown.enter="filter" wire:model.lazy="keyword" />

                       </div>
                   </div>
                   <div class="col-xl-4 col-12 px-1 text-xl-end mt-xl-0 mt-2">
                       <button type="button" class="btn btn-link fs-3 text-decoration-none mw-admin-action-links tblr-body-color font-weight-bold me-3" wire:click="reloadPackages">
                           <div wire:loading wire:target="reloadPackages" class="spinner-border spinner-border-sm" role="status">
                               <span class="visually-hidden"><?php _e("Loading"); ?>...</span>
                           </div>
                           <svg class="me-2" fill="currentColor" xmlns="http://www.w3.org/2000/svg" height="20" viewBox="0 0 24 24" width="20" ><path d="M0 0h24v24H0V0z" fill="none"/><path d="M17.65 6.35C16.2 4.9 14.21 4 12 4c-4.42 0-7.99 3.58-7.99 8s3.57 8 7.99 8c3.73 0 6.84-2.55 7.73-6h-2.08c-.82 2.33-3.04 4-5.65 4-3.31 0-6-2.69-6-6s2.69-6 6-6c1.66 0 3.14.69 4.22 1.78L13 11h7V4l-2.35 2.35z"/></svg>
                           <?php _e("Reload packages"); ?>
                       </button>
                       <button type="button" class="btn btn-link fs-3 text-decoration-none mw-admin-action-links tblr-body-color font-weight-bold" onclick="mw.admin.admin_package_manager.show_licenses_modal();">
                           <svg class="me-2" fill="currentColor" xmlns="http://www.w3.org/2000/svg" height="20" viewBox="0 -960 960 960" width="20"><path d="m385-412 36-115-95-74h116l38-119 37 119h117l-95 74 35 115-94-71-95 71ZM244-40v-304q-45-47-64.5-103T160-560q0-136 92-228t228-92q136 0 228 92t92 228q0 57-19.5 113T716-344v304l-236-79-236 79Zm236-260q109 0 184.5-75.5T740-560q0-109-75.5-184.5T480-820q-109 0-184.5 75.5T220-560q0 109 75.5 184.5T480-300ZM304-124l176-55 176 55v-171q-40 29-86 42t-90 13q-44 0-90-13t-86-42v171Zm176-86Z"/></svg>
                           <?php _e("Licenses"); ?>

                       </button>
                   </div>
               </div>

               <div class="col-12">
                   <div class="d-flex justify-content-center gap-2">
                       <button type="button" id="js-packages-tab-template" class="btn <?php if($category == 'piksera-template'): ?> btn-dark <?php else: ?> btn-outline-dark <?php endif; ?>" wire:click="filterCategory('piksera-template')">
                           <div wire:loading wire:target="filterCategory('piksera-template')" class="spinner-border spinner-border-sm" role="status">
                               <span class="visually-hidden"><?php _e("Loading"); ?>...</span>
                           </div>

                           <svg class="me-2" fill="currentColor" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="M180-120q-24 0-42-18t-18-42v-600q0-24 18-42t42-18h600q24 0 42 18t18 42v600q0 24-18 42t-42 18H180Zm0-60h600v-600H180v600Zm0-600v600-600Zm183 470 117-71 117 71-31-133 104-90-137-11-53-126-53 126-137 11 104 90-31 133Z"/></svg>

                           <?php _e("Templates"); ?>
                       </button>

                       <button type="button" id="js-packages-tab-module" class="btn <?php if($category == 'piksera-module'): ?> btn-dark <?php else: ?> btn-outline-dark <?php endif; ?>" wire:click="filterCategory('piksera-module')">
                           <div wire:loading wire:target="filterCategory('piksera-module')" class="spinner-border spinner-border-sm" role="status">
                               <span class="visually-hidden"><?php _e("Loading"); ?>...</span>
                           </div>

                           <svg class="me-2" fill="currentColor" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 96 960 960" width="24"><path d="m390 976-68-120H190l-90-160 68-120-68-120 90-160h132l68-120h180l68 120h132l90 160-68 120 68 120-90 160H638l-68 120H390Zm248-440h86l44-80-44-80h-86l-45 80 45 80ZM438 656h84l45-80-45-80h-84l-45 80 45 80Zm0-240h84l46-81-45-79h-86l-45 79 46 81ZM237 536h85l45-80-45-80h-85l-45 80 45 80Zm0 240h85l45-80-45-80h-86l-44 80 45 80Zm200 120h86l45-79-46-81h-84l-46 81 45 79Zm201-120h85l45-80-45-80h-85l-45 80 45 80Z"></path></svg>

                           <?php _e("Modules"); ?>
                       </button>
                   </div>
               </div>

               <div class="col-12">
                   <div class="row row-cards px-0 mt-4">

                       <?php if($marketplacePagination->count() > 0): ?>


                           <?php $__currentLoopData = $marketplacePagination; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $marketItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                               <div class="col-sm-6 col-lg-4" id="mw-market-item-<?php print crc32(json_encode($marketItem)) ?>">
                                   <div class="card my-1 mx-1 card-sm card-link card-stacked">

                                       <?php if(isset($marketItem['extra']['_meta']['screenshot'])): ?>
                                           <button id="js-install-package-<?php echo $marketItem['target-dir']; ?>" type="button" class="border-0 d-block" onclick="Livewire.emit('openModal', 'admin-marketplace-item-modal', <?php echo e(json_encode(['name'=>$marketItem['name']])); ?>)">
                                               <?php if($marketItem['type'] == 'piksera-module'): ?>
                                                   <div style="background-image:url(<?php echo e($marketItem['extra']['_meta']['screenshot']); ?>);width: 100%;height: 180px;background-repeat:no-repeat;background-size: contain;background-position: center;" class="card-img-top">
                                                   </div>
                                               <?php else: ?>
                                                   <div style="background-image:url(<?php echo e($marketItem['extra']['_meta']['screenshot']); ?>);width: 100%;height: 180px;background-size: cover;background-position: top;" class="card-img-top">
                                                   </div>
                                               <?php endif; ?>
                                           </button>
                                       <?php else: ?>
                                           <button id="js-install-package-<?php echo $marketItem['target-dir']; ?>" type="button" class="border-0 d-block" onclick="Livewire.emit('openModal', 'admin-marketplace-item-modal', <?php echo e(json_encode(['name'=>$marketItem['name']])); ?>)">
                                               <div class="card-img-top text-center">
                                                   <i class="mdi mdi-view-grid-plus text-muted"
                                                      style="opacity:0.5;font-size:126px;margin-left: 15px;"></i>
                                               </div>
                                           </button>
                                       <?php endif; ?>

                                       <div class="card-body">
                                           <div class="d-flex justify-content-start align-items-center">
                                               <div>
                                                   <b>
                                                       <?php echo e($marketItem['description']); ?>

                                                   </b>
                                               </div>
                                           </div>
                                           <div class="mt-2">

                                               <?php if($marketItem['available_for_install'] && !$marketItem['current_install']): ?>
                                                   <span class="badge bg-lime-lt">
                                                       <?php echo e(_e('Available for install')); ?>

                                                   </span>
                                               <?php else: ?>

                                                   <?php if($marketItem['current_install']): ?>
                                                       <span class="badge bg-lime-lt js-install-package-is-installed-badge-<?php echo $marketItem['target-dir']; ?>"   >
                                                       <?php echo e(_e('Installed')); ?>

                                                   </span>
                                                   <?php endif; ?>

                                                   <?php if($marketItem['is_paid']): ?>
                                                       <span class="badge bg-orange-lt">
                                                       <?php echo e(_e('Premium')); ?>

                                                   </span>
                                                   <?php else: ?>
                                                       <span class="badge bg-lime-lt">
                                                       <?php echo e(_e('Free')); ?>

                                                   </span>
                                                   <?php endif; ?>

                                               <?php endif; ?>

                                                   <?php if($marketItem['has_update']): ?>
                                                       <a href="#" class="badge bg-yellow-lt" onclick="Livewire.emit('openModal', 'admin-marketplace-item-modal', <?php echo e(json_encode(['name'=>$marketItem['name']])); ?>)">
                                                           <?php echo e(_e('Update Available')); ?>

                                                       </a>
                                                   <?php endif; ?>
                                           </div>
                                       </div>
                                   </div>
                               </div>
                           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                           <div class="d-flex justify-content-center mt-4">
                               <?php echo $marketplacePagination->links('livewire-tables::specific.bootstrap-4.pagination'); ?>

                           </div>


                       <?php else: ?>
                           <div class="col-12 text-center mt-7">
                              <h2>
                                  <?php _e("No results found"); ?>
                              </h2>
                           </div>
                       <?php endif; ?>

                   </div>
               </div>
           </div>
        </div>
    </div>
</div>
<?php /**PATH /Users/yahyehassan/Documents/Bloggy/src/PikseraPackages/Marketplace/resources/views/admin/marketplace/livewire/index.blade.php ENDPATH**/ ?>