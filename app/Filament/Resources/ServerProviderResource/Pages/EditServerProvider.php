<?php

namespace App\Filament\Resources\ServerProviderResource\Pages;

use App\Filament\Resources\ServerProviderResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditServerProvider extends EditRecord
{
    protected static string $resource = ServerProviderResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
