<?php

namespace App\Nova;

use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Http\Requests\NovaRequest;

class TestimonialTranslation extends Resource
{
    public static $model = \App\Models\TestimonialTranslation::class;

    public static $title = 'locale';

    public static $search = ['locale', 'name'];

    public function fields(NovaRequest $request)
    {
        return [
            ID::make()->sortable(),

            BelongsTo::make(
                'Testimonial',
                'testimonial',
                Testimonial::class
            )->hideFromIndex(),

            Text::make('Locale')
                ->rules('required')
                ->help('az / en / ru'),

            Text::make('Name')
                ->rules('required'),

            Text::make('Position')
                ->nullable(),

            Textarea::make('Comment')
                ->rules('required'),
        ];
    }
}
