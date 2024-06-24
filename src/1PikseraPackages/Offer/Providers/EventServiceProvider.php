<?php

namespace PikseraPackages\Offer\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use PikseraPackages\Content\Models\Content;
use PikseraPackages\Content\Events\ContentWasCreated;
use PikseraPackages\Content\Events\ContentWasUpdated;
use PikseraPackages\Product\Events\ProductWasCreated;
use PikseraPackages\Product\Events\ProductWasUpdated;
use PikseraPackages\Offer\Listeners\AddSpecialPriceProductListener;
use PikseraPackages\Offer\Listeners\EditSpecialPriceProductListener;
use PikseraPackages\Product\Models\Product;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        ProductWasCreated::class => [
            AddSpecialPriceProductListener::class
        ],
        ProductWasUpdated::class => [
            EditSpecialPriceProductListener::class
        ]
        , ContentWasCreated::class => [
            AddSpecialPriceProductListener::class
        ],
        ContentWasUpdated::class => [
            EditSpecialPriceProductListener::class
        ]
    ];

    public function register()
    {

       /* event_bind('mw.database.content.save.after.data', function ($special_price) {


            if (isset($special_price['id']) and $special_price['id']) {
                if (isset($special_price['special_price']) and $special_price['special_price']) {
                    // $content = Product::findOrFail($special_price['id']);
                    $content = app()->make(Product::class);
                    $content = $content::findOrFail($special_price['id']);
                    // dd($content);
                    //   dd($content->getData());
                    $toSave = [];
                    //  $toSave['content_data'] = $content->getData();
                    $toSave['id'] = $special_price['id'];
                    $content->fill($special_price);
                    $content->save();
                    //  ProductWasUpdated::dispatch($content);
                    //event('eloquent.updated: \PikseraPackages\Product\Models\Product', $content);

                    //
                    //   $user->save();

                    // event('eloquent.updated: App\User', $user);
                }
            }


        });
*/

        parent::register();
    }
}
