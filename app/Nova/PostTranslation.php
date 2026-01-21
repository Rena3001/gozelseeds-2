<?php

namespace App\Nova;

use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Http\Requests\NovaRequest;

class PostTranslation extends Resource
{
    public static $model = \App\Models\PostTranslation::class;

    public static $title = 'title';

    public static $search = ['title', 'locale'];

    public function fields(NovaRequest $request)
    {
        return [
            ID::make()->sortable(),

            BelongsTo::make(
                'Post',
                'post',
                Post::class
            )->hideFromIndex(),

            Text::make('Locale')
                ->rules('required')
                ->help('az / en / ru'),

            Text::make('Title')
                ->rules('required'),

            Textarea::make('Excerpt')
                ->hideFromIndex(),

            Textarea::make('Content')
                ->rules('required')
                ->hideFromIndex(),
        ];
    }
}
