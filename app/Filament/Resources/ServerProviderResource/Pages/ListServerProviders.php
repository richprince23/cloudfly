<?php

namespace App\Filament\Resources\ServerProviderResource\Pages;

use App\Filament\Resources\ServerProviderResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListServerProviders extends ListRecords
{
    protected static string $resource = ServerProviderResource::class;

    protected function getHeaderActions(): array
    {
        return [
            // Actions\CreateAction::make(),
        ];
    }
}
