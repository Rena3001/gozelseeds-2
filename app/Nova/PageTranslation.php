<?php

namespace App\Nova;

use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Http\Requests\NovaRequest;

class PageTranslation extends Resource
{
    public static $model = \App\Models\PageTranslation::class;

    public static $title = 'locale';

    public static $search = ['locale', 'title'];

    public function fields(NovaRequest $request)
    {
        return [
            ID::make()->sortable(),

            BelongsTo::make(
                'Page',
                'page',
                Page::class
            )->hideFromIndex(),

            // =====================
            // LOCALE
            // =====================
            Text::make('Locale')
                ->rules('required')
                ->help('az / en / ru'),


            // =====================
            // ABOUT CONTENT
            // =====================
            Text::make('Tagline')->nullable(),

            Text::make('Content Title')->nullable(),

            Text::make('Subtitle')->nullable(),

            Textarea::make('Description')
                ->hideFromIndex(),

            // =====================
            // FEATURES
            // =====================
            Text::make('Feature 1 Title')->nullable(),
            Textarea::make('Feature 1 Text')->hideFromIndex(),

            Text::make('Feature 2 Title')->nullable(),
            Textarea::make('Feature 2 Text')->hideFromIndex(),

           
        ];
    }
}
