<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\Environment;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\EnvironmentResource\Pages;
use App\Filament\Resources\EnvironmentResource\RelationManagers;

class EnvironmentResource extends Resource
{
    protected static ?string $model = Environment::class;

    protected static ?string $navigationIcon = 'heroicon-o-cloud';
    protected static ?string $navigationGroup = 'Server Management';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                TextInput::make('slug')
                    ->required()
                    ->maxLength(255)->regex('/^[a-z0-9]+(?:-[a-z0-9]+)*$/'),
                TextInput::make('description')
                    ->maxLength(255),
                Select::make('status')
                    ->options([
                        'active' => 'Active',
                        'inactive' => 'Inactive',
                    ])
                    ->default('inactive'),
                Select::make('server_id')
                    ->relationship('server', 'name')
                    ->default('vps'),
                // TextInput::make('region')->requiredIf('server_id', 'vps', false),
                TextInput::make('os')
                    ->default('ubuntu-22.04'),
                TextInput::make('machine_type')
                    ->default('t3.micro'),
                    
                    
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListEnvironments::route('/'),
            // 'create' => Pages\CreateEnvironment::route('/create'),
            'edit' => Pages\EditEnvironment::route('/{record}/edit'),
        ];
    }
}
