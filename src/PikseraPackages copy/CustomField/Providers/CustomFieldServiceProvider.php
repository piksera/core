<?php
namespace PikseraPackages\CustomField\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;
use PikseraPackages\CustomField\Http\Livewire\CustomFieldAddModalComponent;
use PikseraPackages\CustomField\Http\Livewire\CustomFieldEditModalComponent;
use PikseraPackages\CustomField\Http\Livewire\CustomFieldsListComponent;
use PikseraPackages\CustomField\Models\CustomField;
use PikseraPackages\CustomField\Repositories\CustomFieldRepository;
use PikseraPackages\CustomField\TranslateTables\TranslateCustomFields;
use PikseraPackages\CustomField\TranslateTables\TranslateCustomFieldsValues;


class CustomFieldServiceProvider extends ServiceProvider
{

    public function register()
    {
        $this->loadMigrationsFrom(__DIR__. '/../database/migrations/');

        /**
         * @property CustomFieldRepository $custom_field_repository
         */
        $this->app->bind('custom_field_repository', function () {
            return new CustomFieldRepository();
        });
    }

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {

        View::addNamespace('custom_field', normalize_path(dirname(__DIR__) . '/resources/views'));

        Livewire::component('custom-fields-list', CustomFieldsListComponent::class);
        Livewire::component('custom-field-edit-modal', CustomFieldEditModalComponent::class);
        Livewire::component('custom-field-add-modal', CustomFieldAddModalComponent::class);

        $this->app->translate_manager->addTranslateProvider(TranslateCustomFields::class);
        $this->app->translate_manager->addTranslateProvider(TranslateCustomFieldsValues::class);

       // CustomField::observe(CreatedByObserver::class);
    }
}
