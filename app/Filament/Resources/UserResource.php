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
use Illuminate\Database\Eloquent\Builder;
use Filament\Infolists\Components\TextEntry;
use App\Filament\Resources\UserResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\UserResource\RelationManagers;
use Cheesegrits\FilamentPhoneNumbers\Infolists\Components\PhoneNumberEntry;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist->schema([

            TextEntry::make('name')
                ->icon('heroicon-o-user-circle'),

            TextEntry::make('email')
                ->icon('heroicon-o-envelope'),

            TextEntry::make('instagram_account')
                ->icon('heroicon-o-camera'),

            TextEntry::make('address')
                ->icon('heroicon-o-home')
                ->hidden(fn ($record): bool => $record->is_school_account),

            TextEntry::make('school_name')
                ->icon('heroicon-o-home')
                ->hidden(fn ($record): bool => !$record->is_school_account),

            TextEntry::make('area')
                ->icon('heroicon-o-home')
                ->hidden(fn ($record): bool => !$record->is_school_account),

            TextEntry::make('position')
                ->icon('heroicon-o-home')
                ->hidden(fn ($record): bool => !$record->is_school_account),

            PhoneNumberEntry::make('phone_no')
                ->icon('heroicon-o-phone')

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
                TextColumn::make('name'),
                TextColumn::make('email'),
                TextColumn::make('is_school_account')
                    ->label('Jenis akun')
                // ->
                // ->badge()
                // ->color()


            ])
            ->filters([
                //
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
        return [
            //
        ];
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
