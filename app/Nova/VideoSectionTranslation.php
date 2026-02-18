<?php

namespace App\Nova;

use App\Models\VideoSectionTranslation as Model;
use Laravel\Nova\Resource;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\BelongsTo;

class VideoSectionTranslation extends Resource
{
    public static $model = Model::class;
    public static $title = 'title';

    public function fields(\Laravel\Nova\Http\Requests\NovaRequest $request)
    {
        return [

            ID::make()->sortable(),

            BelongsTo::make('Video Section', 'videoSection', VideoSection::class),

            Text::make('Locale')
                ->rules('required'),

            Text::make('Title'),

            Text::make('Video Title'),

            Text::make('Button URL'),

            Text::make('Video URL'),
        ];
    }
}
