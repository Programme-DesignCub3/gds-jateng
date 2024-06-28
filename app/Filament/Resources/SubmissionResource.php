<?php

namespace App\Filament\Resources;

use AnourValar\EloquentSerialize\Tests\Models\Post;
use App\Filament\Resources\SubmissionResource\Pages;
use App\Filament\Resources\SubmissionResource\RelationManagers;
use App\Models\Submission;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Infolists\Components\ImageEntry;
use Filament\Tables\Columns\ImageColumn;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Infolist;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SubmissionResource extends Resource
{
    protected static ?string $model = Submission::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist->schema([
            TextEntry::make('submission_name'),
            TextEntry::make('submission_type'),
            TextEntry::make('user.name')
                ->label('pengirim'),
            TextEntry::make('user.is_school_account')
                ->label('Jenis akun user')
                ->formatStateUsing(fn (string $state): string => $state ? 'Sekolah' : "Pribadi")
                ->badge()
                ->color(fn (string $state): string => match ($state) {
                    '0' => 'warning',
                    '1' => 'success',
                }),
            TextEntry::make('user.school_name')
                ->hidden(fn ($record): bool => $record->user['is_school_account'] === 0)
                ->label('nama sekolah'),
            TextEntry::make('ig_reel')
                ->label('Instagram Reels')
                ->url(fn ($state): string => $state)
                ->openUrlInNewTab(),
            ImageEntry::make('thumbnail_path')
                ->label('thumbnail')
                ->disk('submission'),
            TextEntry::make('file_path')
                ->label('video')
                ->url(fn ($state): string => asset('storage/') . $state)
                ->openUrlInNewTab()
                ->formatStateUsing(fn (string $state): string => asset('storage/') . $state)
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

                ImageColumn::make('thumbnail_path')
                    ->disk('submission'),
                TextColumn::make('submission_name')
                    ->searchable(),
                TextColumn::make('submission_type'),
                TextColumn::make('user.name')
                    ->searchable(),
                TextColumn::make('user.is_school_account')
                    ->label('Jenis akun user')
                    ->formatStateUsing(fn (string $state): string => $state ? 'Sekolah' : "Pribadi")
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        '0' => 'warning',
                        '1' => 'success',
                    }),
                TextColumn::make('user.school_name')
                    ->default('-')
                    ->hidden(fn ($livewire) => $livewire->getTableFilterState('user')['value'] === '0')
                    ->label('nama sekolah')
                    ->searchable(
                        isIndividual: true,
                        isGlobal: false
                    ),
                TextColumn::make('created_at')
                    ->dateTime('Y-m-d')
            ])
            ->filters([

                TernaryFilter::make('user')
                    ->relationship('user', 'is_school_account')

                    ->label('Jenis AKun')
                    // ->attribute('status_id')
                    ->placeholder('Pilih jenis akun')
                    ->trueLabel('Sekolah')
                    ->falseLabel('Pribadi')
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                // Tables\Actions\Action::make('download')
                //     //
                //     // ->url(fn ($record) => 'https://goodday-schoolicious-jateng.test/storage/' . $record->file_path)
                //     // ->openUrlInNewTab()
                //     ->icon('heroicon-o-arrow-down-on-square'),
                // // Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListSubmissions::route('/'),
            // 'create' => Pages\CreateSubmission::route('/create'),
            'view' => Pages\ViewSubmission::route('/{record}'),
            // 'edit' => Pages\EditSubmission::route('/{record}/edit'),
        ];
    }
}
