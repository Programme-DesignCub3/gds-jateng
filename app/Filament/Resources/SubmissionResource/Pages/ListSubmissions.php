<?php

namespace App\Filament\Resources\SubmissionResource\Pages;

use App\Enums\CompetitionList;
use App\Filament\Resources\SubmissionResource;
use App\Models\Submission;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;

class ListSubmissions extends ListRecords
{
    protected static string $resource = SubmissionResource::class;

    protected function getHeaderActions(): array
    {
        $base = SubmissionResource::getUrl('index');

        $is = fn (string $t) => request()->get('tab', 'all') === $t;

        return [
            Actions\Action::make('All (' . Submission::count() . ')')
                ->url($base)
                ->color($is('all') ? 'primary' : 'secondary'),

            Actions\Action::make('Kolaborasa (' . Submission::where('submission_type', CompetitionList::KOLABORASA->value)->count() . ')')
                ->url($base . '?tab=kolaborasa')
                ->color($is('kolaborasa') ? 'primary' : 'secondary'),

            Actions\Action::make('Modern Dance (' . Submission::where('submission_type', CompetitionList::MODERN_DANCE_COMPETITION->value)->count() . ')')
                ->url($base . '?tab=modern-dance')
                ->color($is('modern-dance') ? 'primary' : 'secondary'),

            Actions\Action::make('Chant Supporter (' . Submission::where('submission_type', CompetitionList::CHANT_SUPPORTER_COMPETITION->value)->count() . ')')
                ->url($base . '?tab=chant-supporter')
                ->color($is('chant-supporter') ? 'primary' : 'secondary'),
        ];
    }

    protected function getTableQuery(): Builder
    {
        $query = Submission::query();

        return match (request()->get('tab', 'all')) {
            'kolaborasa' => $query->where('submission_type', CompetitionList::KOLABORASA->value),
            'modern-dance' => $query->where('submission_type', CompetitionList::MODERN_DANCE_COMPETITION->value),
            'chant-supporter' => $query->where('submission_type', CompetitionList::CHANT_SUPPORTER_COMPETITION->value),
            default => $query,
        };
    }

    public function getTabs(): array
    {
        return [];
    }
}
