<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ServerProviderResource\Pages;
use App\Filament\Resources\ServerProviderResource\RelationManagers;
use App\Models\ServerProvider;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ServerProviderResource extends Resource
{
    protected static ?string $model = ServerProvider::class;

    protected static bool $shouldRegisterNavigation = false;
    

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
               
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('slug'),
                Tables\Columns\TextColumn::make('description'),
                Tables\Columns\ImageColumn::make('image'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\Action::make('select')->label('Select')->url(fn (ServerProvider $record) => route('filament.admin.resources.server-providers.edit', $record->id)),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    // Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListServerProviders::route('/'),
            'create' => Pages\CreateServerProvider::route('/create'),
            'edit' => Pages\EditServerProvider::route('/{record}/edit'),
        ];
    }
}
