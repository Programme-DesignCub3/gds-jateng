<?php

namespace App\Filament\Resources\SubmissionResource\Pages;

use App\Filament\Resources\SubmissionResource;
use Filament\Actions\Action;
use Filament\Resources\Pages\ViewRecord;
use Illuminate\Support\Facades\Storage;

class ViewSubmission extends ViewRecord
{
    protected static string $resource = SubmissionResource::class;

    protected function getHeaderActions(): array
    {
        return [

            Action::make('download')
                ->action(
                    fn ($record) => Storage::disk('public')
                        ->download($record->file_path)
                )
                ->icon('heroicon-o-arrow-down-on-square'),

        ];
    }
}
