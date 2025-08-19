<?php

// namespace App\Filament\Resources\SubmissionResource\Pages;

// use App\Enums\CompetitionList;
// use App\Filament\Resources\SubmissionResource;
// use App\Models\Submission;
// use Filament\Resources\Components\Tab;
// use Filament\Resources\Pages\ListRecords;
// use Illuminate\Database\Eloquent\Builder;

// class ListSubmissions extends ListRecords
// {
//     protected static string $resource = SubmissionResource::class;

//     public static bool $shouldPersistTabInQueryString = false;

//     protected function getHeaderActions(): array
//     {
//         return [];
//     }

//     public function getTabs(): array
//     {
//         return [
//             'All' => Tab::make('All')
//                 ->badge(Submission::count()),

//             'Kolaborasa' => Tab::make('Kolaborasa')
//                 ->modifyQueryUsing(fn (Builder $query) =>
//                     $query->where('submission_type', CompetitionList::KOLABORASA->value)
//                 )
//                 ->badge(Submission::where('submission_type', CompetitionList::KOLABORASA)->count()),

//             'Modern Dance' => Tab::make('Modern Dance')
//                 ->modifyQueryUsing(fn (Builder $query) =>
//                     $query->where('submission_type', CompetitionList::MODERN_DANCE_COMPETITION->value)
//                 )
//                 ->badge(Submission::where('submission_type', CompetitionList::MODERN_DANCE_COMPETITION)->count()),

//             'Chant Supporter' => Tab::make('Chant Supporter')
//                 ->modifyQueryUsing(fn (Builder $query) =>
//                     $query->where('submission_type', CompetitionList::CHANT_SUPPORTER_COMPETITION->value)
//                 )
//                 ->badge(Submission::where('submission_type', CompetitionList::CHANT_SUPPORTER_COMPETITION)->count()),
//         ];
//     }
// }
