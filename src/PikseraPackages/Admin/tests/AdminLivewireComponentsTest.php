<?php

namespace PikseraPackages\Admin\tests;



use PikseraPackages\Admin\Http\Livewire\AdminComponent;
use PikseraPackages\Admin\Http\Livewire\AutoCompleteComponent;
use PikseraPackages\Admin\Http\Livewire\AutoCompleteMultipleSelectComponent;
use PikseraPackages\Admin\Http\Livewire\FilterItemCateogry;
use PikseraPackages\Admin\Http\Livewire\FilterItemComponent;
use PikseraPackages\Admin\Http\Livewire\FilterItemDate;
use PikseraPackages\Admin\Http\Livewire\FilterItemDateRange;
use PikseraPackages\Admin\Http\Livewire\FilterItemMultipleSelectComponent;
use PikseraPackages\Admin\Http\Livewire\FilterItemProduct;
use PikseraPackages\Admin\Http\Livewire\FilterItemTags;
use PikseraPackages\Admin\Http\Livewire\FilterItemUser;
use PikseraPackages\Admin\Http\Livewire\FilterItemValue;
use PikseraPackages\Admin\Http\Livewire\FilterItemValueRange;
use PikseraPackages\Admin\Http\Livewire\FilterItemValueWithOperator;
use PikseraPackages\Admin\Http\Livewire\TagsAutoComplete;
use PikseraPackages\Admin\Http\Livewire\UsersAutoComplete;
use PikseraPackages\User\tests\UserLivewireComponentsAccessTest;

class AdminLivewireComponentsTest extends UserLivewireComponentsAccessTest
{
    public $componentsList = [
        AutoCompleteComponent::class,
        AutoCompleteMultipleSelectComponent::class,
        FilterItemCateogry::class,
        FilterItemComponent::class,
        FilterItemDate::class,
        FilterItemDateRange::class,
        FilterItemMultipleSelectComponent::class,
        FilterItemProduct::class,
        FilterItemTags::class,
        FilterItemUser::class,
        FilterItemValue::class,
        FilterItemValueRange::class,
        FilterItemValueWithOperator::class,
        TagsAutoComplete::class,
        UsersAutoComplete::class,
    ];
 }
