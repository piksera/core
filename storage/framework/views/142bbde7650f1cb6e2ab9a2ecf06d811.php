<div class="card col-xxl-11 mx-auto" x-data="{ showFilters: false }">

    <script>
        document.addEventListener('mw.admin.modules.reload_list', function (event) {
            mw.notification.success('<?php echo e(_e("Modules list is reloaded")); ?>');
        });
    </script>

   <div class="card-body">
       <div class="row">
           <div class="d-flex flex-wrap align-items-center justify-content-between mb-4 ps-lg-0">
               <h1 class="mb-0">
                   <svg fill="currentColor" class="me-3" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 96 960 960" width="24"><path d="m390 976-68-120H190l-90-160 68-120-68-120 90-160h132l68-120h180l68 120h132l90 160-68 120 68 120-90 160H638l-68 120H390Zm248-440h86l44-80-44-80h-86l-45 80 45 80ZM438 656h84l45-80-45-80h-84l-45 80 45 80Zm0-240h84l46-81-45-79h-86l-45 79 46 81ZM237 536h85l45-80-45-80h-85l-45 80 45 80Zm0 240h85l45-80-45-80h-86l-44 80 45 80Zm200 120h86l45-79-46-81h-84l-46 81 45 79Zm201-120h85l45-80-45-80h-85l-45 80 45 80Z"></path></svg>
                   <strong><?php echo e(_e("Modules")); ?></strong>
               </h1>
               <div class="col-lg-4 col-12 my-2 my-lg-0 flex-grow-1 flex-md-grow-0">
                   <div class="input-icon position-relative">
                          <span class="input-icon-addon">
                            <svg fill="currentColor" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 96 960 960" width="24"><path d="M796 935 533 672q-30 26-69.959 40.5T378 727q-108.162 0-183.081-75Q120 577 120 471t75-181q75-75 181.5-75t181 75Q632 365 632 471.15 632 514 618 554q-14 40-42 75l264 262-44 44ZM377 667q81.25 0 138.125-57.5T572 471q0-81-56.875-138.5T377 275q-82.083 0-139.542 57.5Q180 390 180 471t57.458 138.5Q294.917 667 377 667Z"/></svg>                          </span>

                       <span wire:loading wire:target="keyword" class="spinner-border spinner-border-sm" role="status" style="position: absolute; right: 15px; top: 15px;">
                               <span class="visually-hidden"><?php _e("Searching"); ?>...</span>
                           </span>
                       <input type="text" class="form-control" placeholder="Search..." wire:keydown.enter="filter" wire:model.lazy="keyword" />

                   </div>
               </div>
               <div>

                   <button x-on:click="showFilters = ! showFilters" type="button" class="btn btn-outline-default">
                       <span x-show="!showFilters"><?php echo e(_e("Show filters")); ?> </span>
                       <span x-show="showFilters"><?php echo e(_e("Hide filters")); ?> </span>
                   </button>

                   <button type="button" class="btn btn-outline-primary mt-md-0 mt-2" wire:click="reloadModules">
                       <div wire:loading wire:target="reloadModules" class="spinner-border spinner-border-sm" role="status">
                           <span class="visually-hidden"><?php echo e(_e("Loading")); ?>...</span>
                       </div>
                       <?php echo e(_e("Reload modules")); ?>

                   </button>

               </div>
           </div>

           <div class="card shadow-sm rounded p-4 mb-4" x-show="showFilters">
               <div class="row d-flex justify-content-between">
                   <div class="col-md-6">
                       <div>
                           <label class="d-block mb-2"><?php echo e(_e("Type")); ?></label>
                           <select class="form-select" wire:model="type" data-width="100%">
                               <option value="live_edit"><?php echo e(_e("Live edit modules")); ?></option>
                               <option value="admin" selected><?php echo e(_e("Admin modules")); ?></option>
                               <option value="advanced"><?php echo e(_e("All modules")); ?></option>
                               <option value="elements"><?php echo e(_e("Elements")); ?></option>
                           </select>
                       </div>
                   </div>
                   <div class="col-md-6">
                       <div>
                           <label class="d-block mb-2"><?php echo e(_e("Status")); ?></label>
                           <select class="form-select" wire:model="installed" data-width="100%">
                               <option value="1"><?php echo e(_e("Installed")); ?></option>
                               <option value="0"><?php echo e(_e("Uninstalled")); ?></option>
                           </select>
                       </div>
                   </div>
               </div>
           </div>

           <div class="row row-cards bg-azure-lt">

               <div>
                   <button type="button"  class="btn btn-outline-primary" wire:click="toggleGroupByCategories()">
                       <?php if($groupByCategories): ?>
                           <?php echo e(_e("Ungroup")); ?>

                       <?php else: ?>
                           <?php echo e(_e("Group")); ?>

                       <?php endif; ?>
                   </button>
               </div>

               <?php if($groupByCategories): ?>
                   <?php $__currentLoopData = $modulesGroups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categories=>$modules): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                       <div>
                            <h2><?php echo e($categories); ?></h2>
                       </div>
                       <?php $__currentLoopData = $modules; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $module): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                           <?php echo $__env->make('module::livewire.admin.list-module-card', ['module' => $module], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php else: ?>
                   <?php $__currentLoopData = $modules; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $module): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                       <?php echo $__env->make('module::livewire.admin.list-module-card', ['module' => $module], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
               <?php endif; ?>

           </div>

       </div>
   </div>

</div>
<?php /**PATH /Users/yahyehassan/Documents/Bloggy/src/PikseraPackages/Module/resources/views/livewire/admin/list-modules.blade.php ENDPATH**/ ?>