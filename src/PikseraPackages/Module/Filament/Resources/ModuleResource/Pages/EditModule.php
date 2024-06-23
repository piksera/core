<?php

namespace PikseraPackages\Module\Filament\Resources\ModuleResource\Pages;

use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;
use PikseraPackages\Module\Filament\Resources\ModuleResource;

class EditModule extends EditRecord
{
    protected static string $resource = ModuleResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
