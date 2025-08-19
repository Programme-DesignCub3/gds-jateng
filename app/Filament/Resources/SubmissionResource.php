<?php

namespace App\Filament\Resources;

use App\Enums\CompetitionList;
use App\Filament\Resources\SubmissionResource\Pages;
use App\Models\Submission;
use Filament\Forms\Form;
use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\RepeatableEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Infolist;
use Filament\Resources\Resource;
use Filament\Tables\Table;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Support\Facades\Log;

class SubmissionResource extends Resource
{
    // gunakan fully-qualified class name untuk menghindari masalah autoload/circular
    protected static ?string $model = \App\Models\Submission::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist->schema([
            TextEntry::make('submission_name'),
            TextEntry::make('submission_type'),
            TextEntry::make('submission_desc'),
            TextEntry::make('user.name')
                ->label('pengirim')
                ->default('-'),
            TextEntry::make('user.school_name')
                ->label('nama sekolah')
                ->default('-'),
            TextEntry::make('ig_reel')
                ->label('Reels')
                ->url(fn($state): string => $state)
                ->openUrlInNewTab(),
            ImageEntry::make('thumbnail_path')
                ->label('thumbnail')
                ->disk('submission'),

            RepeatableEntry::make('files_path')
                ->label('Submission file')
                ->schema([
                    ImageEntry::make('')
                        ->disk('submission'),
                    TextEntry::make('')
                        ->url(fn($state): string => asset('storage') . '/' . $state)
                        ->openUrlInNewTab()
                        ->formatStateUsing(fn(string $state): string => asset('storage') . '/' . $state)
                ]),
        ]);
    }

    public static function form(Form $form): Form
    {
        return $form->schema([]);
    }

    public static function table(Table $table): Table
    {
        Log::info('SubmissionResource table method called', [
            'time' => now(),
            'user_id' => auth()->id(),
            'route' => request()->route()?->getName(),
            'query' => request()->query(),
        ]);
        return $table
            ->columns([
                ImageColumn::make('thumbnail_path')->disk('submission'),
                TextColumn::make('submission_name')->searchable(),
                TextColumn::make('submission_type'),
                TextColumn::make('user.name')->default('-')->searchable(),
                TextColumn::make('user.school_name')
                    ->default('-')
                    ->label('nama sekolah')
                    ->searchable(isIndividual: true, isGlobal: false),
                TextColumn::make('created_at')->dateTime('Y-m-d'),
            ])
            ->actions([
                \Filament\Tables\Actions\ViewAction::make(),
            ])
            ->bulkActions([
                \Filament\Tables\Actions\BulkActionGroup::make([]),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSubmissions::route('/'),
            'view' => Pages\ViewSubmission::route('/{record}'),
        ];
    }
}
