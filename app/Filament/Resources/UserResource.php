<?php

namespace App\Filament\Resources;

use Closure;
use Filament\Forms;
use App\Models\User;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Infolists\Infolist;
use Filament\Resources\Resource;
use Filament\Tables\Columns\TextColumn;
use Filament\Infolists\Components\TextEntry;
use App\Filament\Resources\UserResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\UserResource\RelationManagers;
use Cheesegrits\FilamentPhoneNumbers\Infolists\Components\PhoneNumberEntry;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\TernaryFilter;
use Illuminate\Database\Eloquent\Builder;


class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist->schema([

            TextEntry::make('name'),
            TextEntry::make('email'),
            TextEntry::make('instagram_account'),
            TextEntry::make('address')
                ->hidden(fn($record): bool => $record->is_school_account),
            TextEntry::make('school_name')
                ->hidden(fn($record): bool => !$record->is_school_account),
            TextEntry::make('area')
                ->hidden(fn($record): bool => !$record->is_school_account),
            TextEntry::make('position')
                ->hidden(fn($record): bool => !$record->is_school_account),
            TextEntry::make('is_school_account')
                ->label('Jenis akun')
                ->formatStateUsing(fn(string $state): string => $state ? 'Sekolah' : "Pribadi")
                ->badge()
                ->color(fn(string $state): string => $state ? 'success' : "warning"),
            TextEntry::make('competition'),
            PhoneNumberEntry::make('phone_no')
        ]);
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->searchable(),
                TextColumn::make('email')->searchable(),
                // TextColumn::make('address'),
                TextColumn::make('is_school_account')
                    ->label('Jenis akun')
                    ->formatStateUsing(fn(string $state): string => $state ? 'Sekolah' : "Pribadi")
                    ->badge()
                    ->color(fn(string $state): string => $state ? 'success' : "warning"),
                TextColumn::make('competition')

            ])
            ->filters([
                TernaryFilter::make('is_school_account')
                    ->label('Jenis AKun')
                    ->placeholder('Pilih jenis akun')
                    ->trueLabel('Sekolah')
                    ->falseLabel('Pribadi')

            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                // Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    // Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUsers::route('/'),
            // 'create' => Pages\CreateUser::route('/create'),
            'view' => Pages\ViewUser::route('/{record}'),
            // 'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
