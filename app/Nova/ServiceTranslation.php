<?php

namespace App\Nova;

use App\Models\ServiceTranslation as ModelsServiceTranslation;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Http\Requests\NovaRequest;

class ServiceTranslation extends Resource
{
    public static $model =ModelsServiceTranslation::class;

    public static $title = 'title';

    public static $search = ['title', 'locale'];

    public function fields(NovaRequest $request)
    {
        return [
            ID::make()->sortable(),

            BelongsTo::make(
                'Service',
                'service',
                Service::class
            ),

            Text::make('Locale')
                ->rules('required', 'max:5'),

            Text::make('Title')
                ->rules('required'),

            Textarea::make('Text')
                ->rules('required'),
        ];
    }
}
