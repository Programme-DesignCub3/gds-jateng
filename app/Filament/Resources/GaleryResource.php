<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GaleryResource\Pages;
use App\Filament\Resources\GaleryResource\RelationManagers;
use App\Models\Galery;
use App\Models\GaleryModel;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use GuzzleHttp\Psr7\UploadedFile;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class GaleryResource extends Resource
{
    protected static ?string $model = GaleryModel::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('embed_link')
                    ->label('Embed Link')
                    ->required()
                    ->helperText('Masukkan link embed video dari YouTube atau Instagram. Contoh: https://www.youtube.com/embed/xxxx atau https://www.instagram.com/p/xxxx/embed')
                    ->columnSpanFull(),

                FileUpload::make('thumbnail')
                    ->label('Thumbnail')
                    ->disk('public')
                    ->directory('galery/thumbnails')
                    ->image()
                    ->columnSpanFull(),

                Forms\Components\TextInput::make('title')
                    ->label('Title')
                    ->required()
                    ->columnSpan(6),

                Forms\Components\TextInput::make('subtitle')
                    ->label('Subtitle')
                    ->required()
                    ->nullable()
                    ->columnSpan(6),

                Forms\Components\DatePicker::make('tanggal')
                    ->label('Tanggal')
                    ->required()
                    ->columnSpan(6),

                Forms\Components\Select::make('lokasi')
                    ->label('Region')
                    ->options([
                        'yogyakarta' => 'Yogyakarta',
                        'semarang' => 'Semarang',
                    ])
                    ->required()
                    ->columnSpan(6),
            ])
            ->columns(12);
    }


    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('no')
                    ->label('No')
                    ->rowIndex(),
                Tables\Columns\TextColumn::make('title')
                    ->label('Title'),
                Tables\Columns\TextColumn::make('subtitle')
                    ->label('Subtitle'),
                Tables\Columns\TextColumn::make('tanggal')
                    ->label('Tanggal')
                    ->date(),
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
            'index' => Pages\ListGaleries::route('/'),
            'create' => Pages\CreateGalery::route('/create'),
            'edit' => Pages\EditGalery::route('/{record}/edit'),
        ];
    }
}
