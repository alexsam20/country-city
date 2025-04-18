<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SubregionResource\Pages;
use App\Filament\Resources\SubregionResource\RelationManagers;
use App\Models\Subregion;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SubregionResource extends Resource
{
    protected static ?string $model = Subregion::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(30),
                Forms\Components\Textarea::make('translations')
                    ->columnSpanFull(),
                Forms\Components\Select::make('region_id')
                    ->relationship('region', 'name')
                    ->required(),
                Forms\Components\TextInput::make('flag')
                    ->required()
                    ->numeric()
                    ->default(1),
                Forms\Components\TextInput::make('wikiDataId')
                    ->maxLength(10),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('region.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('flag')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('wikiDataId')
                    ->searchable(),
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
            'index' => Pages\ListSubregions::route('/'),
            'create' => Pages\CreateSubregion::route('/create'),
            'edit' => Pages\EditSubregion::route('/{record}/edit'),
        ];
    }
}
