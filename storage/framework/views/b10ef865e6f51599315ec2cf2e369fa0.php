<div class="col-md-5 col-12 ps-0 d-flex align-items-center mb-md-0 mb-4">
    
    <div class="btn-group">
        <a href="#" wire:click="setDisplayType('card')" class="btn btn-outline-dark btn-sm border-0 <?php if($displayType=='card'): ?> active <?php endif; ?>">
             <svg fill="currentColor" class="me-1" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg>
            <?php echo e(_e('List')); ?> </a>
        <a href="#" wire:click="setDisplayType('table')" class="btn btn-outline-dark btn-sm border-0 <?php if($displayType=='table'): ?> active <?php endif; ?>">
             <svg fill="currentColor" class="me-1" version="1.1" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                <path d="M20.016 8.016v-4.031h-4.031v4.031h4.031zM20.016 14.016v-4.031h-4.031v4.031h4.031zM20.016 20.016v-4.031h-4.031v4.031h4.031zM14.016 8.016v-4.031h-4.031v4.031h4.031zM14.016 14.016v-4.031h-4.031v4.031h4.031zM14.016 20.016v-4.031h-4.031v4.031h4.031zM8.016 8.016v-4.031h-4.031v4.031h4.031zM8.016 14.016v-4.031h-4.031v4.031h4.031zM8.016 20.016v-4.031h-4.031v4.031h4.031zM20.016 2.016q0.797 0 1.383 0.586t0.586 1.383v16.031q0 0.797-0.586 1.383t-1.383 0.586h-16.031q-0.797 0-1.383-0.586t-0.586-1.383v-16.031q0-0.797 0.586-1.383t1.383-0.586h16.031z"></path>
            </svg> <?php echo e(_e('Details')); ?> </a>
    </div>
</div>
<?php /**PATH /Users/yahyehassan/Documents/Bloggy/src/PikseraPackages/Content/resources/views/admin/content/livewire/components/display-as.blade.php ENDPATH**/ ?>