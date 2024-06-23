<?php

namespace PikseraPackages\User\Providers;

use Filament\PluginServiceProvider;
use PikseraPackages\User\Filament\Pages\Profile;
use PikseraPackages\User\Filament\Resources\UserResource;
use PikseraPackages\User\Filament\Widgets\UsersStatsWidget;
use Spatie\LaravelPackageTools\Package;

class UserFilamentServiceProvider extends PluginServiceProvider
{
    public static string $name = 'user';

    protected function getWidgets(): array
    {
        return [
            UsersStatsWidget::class
        ];
    }

    protected function getResources(): array
    {

        return [
            UserResource::class,
        ];
    }

    protected function getPages(): array
    {
        return [
            Profile::class
        ];
    }


}
