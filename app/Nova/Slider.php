<?php

namespace App\Nova;

use App\Models\Slider as SliderModel;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;

class Slider extends Resource
{
    public static $model = SliderModel::class;

    public static $title = 'id';

    public static $search = ['id'];

    public function fields(NovaRequest $request)
    {
        return [

            ID::make()->sortable(),

            Image::make('Background Image', 'image')
                ->disk('public')
                ->path('sliders')
                ->prunable()
                ->rules('required'),

            Text::make('Button URL', 'button_url')
                ->nullable(),

            Number::make('Order', 'order')
                ->default(0)
                ->sortable(),

            Boolean::make('Active', 'is_active'),

            HasMany::make('Translations', 'translations', SliderTranslation::class),
        ];
    }
}
