<?php

namespace PikseraPackages\Product;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;
use PikseraPackages\Database\Observers\BaseModelObserver;
use PikseraPackages\Product\Http\Livewire\Admin\ContentBulkOptions;
use PikseraPackages\Product\Http\Livewire\Admin\ProductsList;
use PikseraPackages\Product\Http\Livewire\Admin\ProductsTable;
use PikseraPackages\Product\Http\Livewire\ProductsAutoComplete;
use PikseraPackages\Product\Models\Product;
use PikseraPackages\Product\Validators\PriceValidator;

class ProductServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Livewire::component('admin-products-list', ProductsList::class);
      // Livewire::component('admin-products-autocomplete', ProductsAutoComplete::class);

        Product::observe(BaseModelObserver::class);
      //  Product::observe(ProductObserver::class); ->moved to CustomFieldsTrait

        View::addNamespace('product', __DIR__ . '/resources/views');

        $this->loadRoutesFrom(__DIR__ . '/routes/web.php');
        $this->loadRoutesFrom(__DIR__ . '/routes/api.php');

        \Validator::extendImplicit('price', PriceValidator::class.'@validate', 'Invalid price value!');
    }

}
