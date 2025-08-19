<?php

namespace App\Filament\Resources\SubmissionResource\Pages;

use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;
use App\Enums\CompetitionList;
use Filament\Resources\Components\Tab;
use App\Filament\Resources\SubmissionResource;

class ListSubmissions extends ListRecords
{
    protected static string $resource = SubmissionResource::class;

    public function getTabs(): array
    {
        return [
            'All' => Tab::make()
                ->modifyQueryUsing(fn (Builder $query) => $query)
                ->label('All'),

            'kolaborasa' => Tab::make()
                ->modifyQueryUsing(fn (Builder $query) =>
                    $query->where('submission_type', CompetitionList::KOLABORASA->value)
                )
                ->label('Kolaborasa'),

            'modern-dance-competition' => Tab::make()
                ->modifyQueryUsing(fn (Builder $query) =>
                    $query->where('submission_type', CompetitionList::MODERN_DANCE_COMPETITION->value)
                )
                ->label('Modern Dance'),

            'chant-supporter-competition' => Tab::make()
                ->modifyQueryUsing(fn (Builder $query) =>
                    $query->where('submission_type', CompetitionList::CHANT_SUPPORTER_COMPETITION->value)
                )
                ->label('Chant Supporter'),
        ];
    }
}