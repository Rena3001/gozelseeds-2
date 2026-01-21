<?php

namespace App\Nova;

use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Http\Requests\NovaRequest;

class ServiceSectionTranslation extends Resource
{
    public static $model = \App\Models\ServiceSectionTranslation::class;

    public static $title = 'title';

    public static $search = ['title', 'tagline', 'locale'];

    public function fields(NovaRequest $request)
    {
        return [
            ID::make()->sortable(),

            BelongsTo::make(
                'Service Section',
                'section',
                ServiceSection::class
            ),

            Text::make('Locale')
                ->rules('required', 'max:5'),

            Text::make('Tagline')
                ->rules('required'),

            Text::make('Title')
                ->rules('required'),
        ];
    }
}
