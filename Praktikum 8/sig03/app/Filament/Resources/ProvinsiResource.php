<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProvinsiResource\Pages;
use App\Filament\Resources\ProvinsiResource\RelationManagers;
use App\Models\Provinsi;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProvinsiResource extends Resource
{
    protected static ?string $model = Provinsi::class;

    

    // Menentukan label singular untuk resource ini
    public static function label(): string
    {
        return 'Provinsi';  // Label singular
    }

    // Menentukan label plural jika Anda ingin menyesuaikan label untuk jamak (untuk tampilan plural)
    public static function pluralLabel(): string
    {
        return 'Provinsi'; // Bisa tetap "Provinsi" atau "Provinsis", sesuai kebutuhan
    }

    public static function navigationLabel(?string $label = null): void
    {
        if ($label) {
            static::$navigationLabel = $label;
        }
        static::$navigationLabel = 'Provinsi'; // Label navigasi yang diinginkan
    }

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    // Menyesuaikan label di menu navigasi

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(30),
                Forms\Components\TextInput::make('alt_name')
                    ->required()
                    ->maxLength(30),
                Forms\Components\TextInput::make('latitude')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('longitude')
                    ->required()
                    ->numeric(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('alt_name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('latitude')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('longitude')
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
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListProvinsi::route('/'),
            'create' => Pages\CreateProvinsi::route('/create'),
            'edit' => Pages\EditProvinsi::route('/{record}/edit'),
        ];
    }
}
