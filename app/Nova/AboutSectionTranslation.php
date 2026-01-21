<?php

namespace App\Nova;

use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Http\Requests\NovaRequest;

class AboutSectionTranslation extends Resource
{
    public static $model = \App\Models\AboutSectionTranslation::class;

    public static $title = 'locale';

    public static $search = ['locale', 'title'];

    public function fields(NovaRequest $request)
    {
        return [

            ID::make()->sortable(),

            BelongsTo::make('About Section', 'aboutSection', AboutSection::class),

            Select::make('Locale')
                ->options([
                    'az' => 'AZ',
                    'en' => 'EN',
                    'ru' => 'RU',
                ])
                ->displayUsingLabels()
                ->rules('required'),

            Text::make('Tagline')
                ->nullable(),

            Text::make('Title')
                ->nullable(),

            Text::make('Subtitle')
                ->nullable(),

            Textarea::make('Text')
                ->nullable(),

            Text::make('Counter Text')
                ->nullable(),

            Text::make('Video Title')
                ->nullable(),

            Text::make('Video Text')
                ->nullable(),
        ];
    }
}
