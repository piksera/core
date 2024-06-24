<?php

namespace PikseraPackages\Option\tests;

use Illuminate\Support\Facades\Event;
use PikseraPackages\Core\tests\TestCase;
use PikseraPackages\Option\Events\OptionWasCreated;
use PikseraPackages\Option\Events\OptionIsCreating;
use PikseraPackages\Option\Events\OptionIsUpdating;
use PikseraPackages\Option\Events\OptionWasDeleted;
use PikseraPackages\Option\Events\OptionWasRetrieved;
use PikseraPackages\Option\Events\OptionWasUpdated;
use PikseraPackages\Option\Facades\Option as OptionFacade;
use PikseraPackages\Option\Models\Option;

class OptionsModelTest extends TestCase
{
    public function testOptionsEvents()
    {
        Event::fake();
        $model = new Option();
        $model->option_key = 'test';
        $model->option_value = 'test';
        $model->option_group = 'test';
        $model->save();
        Event::assertDispatched(OptionIsCreating::class);
        Event::assertDispatched(OptionWasCreated::class);

        //test OptionIsUpdating
        $model->option_value = 'test2';
        $model->save();
        Event::assertDispatched(OptionWasUpdated::class);
        Event::assertDispatched(OptionIsUpdating::class);

        //test OptionWasRetrieved
        $model->get();
        Event::assertDispatched(OptionWasRetrieved::class);

        //test OptionWasDeleted
        $model->delete();
        Event::assertDispatched(OptionWasDeleted::class);


    }
}
