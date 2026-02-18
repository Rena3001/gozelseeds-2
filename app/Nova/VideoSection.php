<?php

namespace App\Nova;

use App\Models\VideoSection as Model;
use Laravel\Nova\Resource;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\HasMany;

class VideoSection extends Resource
{
    public static $model = Model::class;
    public static $title = 'id';

    public function fields(\Laravel\Nova\Http\Requests\NovaRequest $request)
    {
        return [

            ID::make()->sortable(),

            Image::make('Background Video', 'background_image')
                ->disk('public')
                ->path('video-section')
                ->acceptedTypes('video/mp4')
                ->prunable(),

            Boolean::make('Active', 'is_active'),

            HasMany::make('Translations', 'translations', VideoSectionTranslation::class),
        ];
    }
}
