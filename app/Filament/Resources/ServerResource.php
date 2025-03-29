<?php

namespace App\Filament\Resources;

use aws;
use Filament\Forms;
use Filament\Tables;
use App\Models\Server;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\ServerProvider;
use Filament\Resources\Resource;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\ServerResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\ServerResource\RelationManagers;

class ServerResource extends Resource
{
    protected static ?string $model = Server::class;

    protected static ?string $navigationIcon = 'heroicon-o-server-stack';
    protected static ?string $navigationLabel = 'Servers';
    protected static ?string $navigationGroup = 'Server Management';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('server_provider_id')
                    ->relationship('serverProvider', 'name')
                    ->required()
                    ->live(), // Ensure changes trigger reactivity
                
                Forms\Components\TextInput::make('name')
                    ->placeholder('Test Server')
                    ->required()
                    ->maxLength(255),
    
                Forms\Components\TextInput::make('access_key')
                    ->requiredIf(fn ($get) => $get('server_provider_id') && ServerProvider::find($get('server_provider_id'))?->slug === 'aws', 'AWS Access Key')
                    ->maxLength(255)
                    ->hidden(fn ($get) => !($get('server_provider_id') && ServerProvider::find($get('server_provider_id'))?->slug === 'aws'))
                    ->requiredIf(fn ($get) => $get('server_provider_id') && ServerProvider::find($get('server_provider_id'))?->slug === 'vps', 'SSH Port is required for VPS servers'),
    
                Forms\Components\TextInput::make('api_key')
                    ->required()
                    ->maxLength(255)
                    ->label(fn ($get) => $get('server_provider_id') && ServerProvider::find($get('server_provider_id'))?->slug === 'aws' ? 'AWS Secret Key' : 'API Key')
                    ->hidden(fn ($get) => ($get('server_provider_id') && ServerProvider::find($get('server_provider_id'))?->slug === 'vps')),
    
                Forms\Components\TextInput::make('ssh_ip_address')
                    ->label('SSH IP Address')
                    ->requiredIf(fn ($get) => $get('server_provider_id') && ServerProvider::find($get('server_provider_id'))?->slug === 'vps', 'SSH IP Address is required for VPS servers')
                    ->maxLength(255)
                    ->visible(fn ($get) => $get('server_provider_id') && ServerProvider::find($get('server_provider_id'))?->slug === 'vps'),
    
                Forms\Components\TextInput::make('ssh_port')
                    ->label('SSH Port')
                    ->requiredIf(fn ($get) => $get('server_provider_id') && ServerProvider::find($get('server_provider_id'))?->slug === 'vps', 'SSH Port is required for VPS servers')
                    ->numeric()
                    ->default(22)
                    ->visible(fn ($get) => $get('server_provider_id') && ServerProvider::find($get('server_provider_id'))?->slug === 'vps'),
    
                Forms\Components\Textarea::make('public_key')
                    ->label('SSH Public Key')
                    ->requiredIf(fn ($get) => $get('server_provider_id') && ServerProvider::find($get('server_provider_id'))?->slug === 'vps', 'SSH Public Key is required for VPS servers')
                    ->visible(fn ($get) => $get('server_provider_id') && ServerProvider::find($get('server_provider_id'))?->slug === 'vps'),
            ]);
    }
    

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name'),
                TextColumn::make('serverProvider.name')->label('Provider'),
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
            'index' => Pages\ListServers::route('/'),
            // 'create' => Pages\CreateServer::route('/create'),
            'edit' => Pages\EditServer::route('/{record}/edit'),
        ];
    }
}
