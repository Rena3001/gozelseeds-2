<?php

namespace App\Nova;

use App\Models\SliderTranslation as SliderTranslationModel;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Fields\Trix;
use Laravel\Nova\Http\Requests\NovaRequest;

class SliderTranslation extends Resource
{
    public static $model = SliderTranslationModel::class;

    public static $title = 'locale';

    public static $search = ['locale', 'title'];

    public function fields(NovaRequest $request)
    {
        return [

            ID::make()->sortable(),

            BelongsTo::make('Slider'),

            Select::make('Locale')
                ->options([
                    'az' => 'AZ',
                    'en' => 'EN',
                    'ru' => 'RU',
                ])
                ->displayUsingLabels()
                ->rules('required'),

            Text::make('Tagline')->nullable(),

            Text::make('Title')
                ->rules('required'),

            Trix::make('Text')->nullable(),
        ];
    }
}
