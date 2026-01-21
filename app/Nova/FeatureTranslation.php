<?php

namespace App\Nova;

use App\Models\FeatureTranslation as FeatureTranslationModel;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Http\Requests\NovaRequest;

class FeatureTranslation extends Resource
{
    public static $model = FeatureTranslationModel::class;

    public static $title = 'locale';

    public static $search = ['locale', 'title', 'description'];

    public function fields(NovaRequest $request)
    {
        return [

            ID::make()->sortable(),

            Select::make('Locale')
                ->options([
                    'az' => 'AZ',
                    'en' => 'EN',
                    'ru' => 'RU',
                ])
                ->displayUsingLabels()
                ->rules('required'),

            Text::make('Title')
                ->rules('required')
                ->help('HTML <br> istifadə edə bilərsən'),

            Textarea::make('Description')
                ->rows(6)
                ->alwaysShow()
                ->help('Bu mətn yalnız service DETAIL səhifəsində göstərilir')
                ->nullable(),
                
            Text::make('Button Text')
                ->nullable(),
        ];
    }
}
