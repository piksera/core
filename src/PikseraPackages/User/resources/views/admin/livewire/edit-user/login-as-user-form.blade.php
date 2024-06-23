
<x-piksera-ui::action-section>
    <x-slot name="title">
        <h5 class="font-weight-bold settings-title-inside"><?php _e('Login as user');?> </h5>

    </x-slot>

    <x-slot name="description">
        <small class="text-muted">
            <?php _e('Login as the user account');?>
        </small>
    </x-slot>

    <x-slot name="content">


    <x-piksera-ui::secondary-button wire:click="confirmUserLogin" wire:loading.attr="disabled">
        <?php _e('Login as user');?>
    </x-piksera-ui::secondary-button>


    <!-- Delete User Confirmation Modal -->
    <x-piksera-ui::dialog-modal wire:model="confirmingUserLogin">
    <x-slot name="title">
        <?php _e('Login as user');?>
    </x-slot>

    <x-slot name="content">
        <?php _e('Are you sure you want to login as the user?');?>

    </x-slot>

        <x-slot name="footer" class="d-flex align-items-center justify-content-between">
            <div>
                <x-piksera-ui::secondary-button wire:click="$toggle('confirmingUserLogin')" wire:loading.attr="disabled">
                    <?php _e('Cancel');?>
                </x-piksera-ui::secondary-button>
            </div>

             <div>
                 <x-piksera-ui::button class="ml-2" wire:click="loginAsUser" wire:loading.attr="disabled">
                     <?php _e('Login as user');?>
                 </x-piksera-ui::button>
             </div>
        </x-slot>

</x-piksera-ui::dialog-modal>
</x-slot>
</x-piksera-ui::action-section>
