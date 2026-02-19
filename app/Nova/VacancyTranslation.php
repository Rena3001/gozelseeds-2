<?php

namespace App\Nova;

use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Resource;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Trix;

class VacancyTranslation extends Resource
{
    public static $model = \App\Models\VacancyTranslation::class;

    public static $title = 'title';

    public static $search = [
        'title'
    ];

    public function fields(Request $request)
    {
        return [

            ID::make()->sortable(),

            BelongsTo::make('Vacancy'),

            Text::make('Locale')
                ->rules('required'),

            Text::make('Title')
                ->rules('required'),
                Text::make('Slug')
    ->nullable(),

            Trix::make('Description')
                ->alwaysShow(),

            Trix::make('Requirements')
                ->alwaysShow(),

            Text::make('Location')
                ->nullable(),

            Text::make('Category')
                ->nullable(),

            Text::make('Employment Type')
                ->nullable(),

        ];
    }
}
