<?php

namespace App\Filament\Resources\SubmissionResource\Pages;

use App\Enums\CompetitionList;
use App\Filament\Resources\SubmissionResource;
use Filament\Actions;
use Filament\Resources\Components\Tab;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;


class ListSubmissions extends ListRecords
{
    protected static string $resource = SubmissionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            // Actions\CreateAction::make(),
        ];
    }

    public function getTabs(): array
    {
        return [
            'All' => Tab::make(),
            'Kolaborasa' => Tab::make()
                ->modifyQueryUsing(fn (Builder $query) => $query->where('submission_type', CompetitionList::KOLABORASA))
            // ->icon('heroicon-m-banknotes')
            ,
            'Chant' => Tab::make()
                ->modifyQueryUsing(fn (Builder $query) => $query->where('submission_type', CompetitionList::CHANTS))
            // ->icon('heroicon-m-scale')
            ,
            'Mascot' => Tab::make()
                ->modifyQueryUsing(fn (Builder $query) => $query->where('submission_type', CompetitionList::MASCOT))
            // ->icon('heroicon-m-user-group')
            ,
            'Cheerleading' => Tab::make()
                ->modifyQueryUsing(fn (Builder $query) => $query->where('submission_type', CompetitionList::CHEERLEADING))
            // ->icon('heroicon-m-squares-plus')
            ,
        ];
    }
}
