<?php

namespace PikseraPackages\User\Filament\Resources\UserResource\Pages;

use Filament\Resources\Pages\CreateRecord;
use PikseraPackages\User\Filament\Resources\UserResource;

class CreateUser extends CreateRecord
{
    protected static string $resource = UserResource::class;

}
