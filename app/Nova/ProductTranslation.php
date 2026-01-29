<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Trix;
use Laravel\Nova\Http\Requests\NovaRequest;

// App\Nova\ProductTranslation.php
class ProductTranslation extends Resource
{
    public static $model = \App\Models\ProductTranslation::class;
    public static $displayInNavigation = false;


    public static function label()
    {
        return 'Product Translations';
    }

    public function fields(NovaRequest $request)
    {
        return [

            ID::make()->sortable(),

            BelongsTo::make('Product'),

            Select::make('Locale')->options([
                'az' => 'AZ',
                'en' => 'EN',
                'ru' => 'RU',
            ])->rules('required'),

            Text::make('Title')->rules('required'),

            Trix::make('Short Description', 'short_description')
                ->alwaysShow()
                ->help('Məhsulun qısa təsviri (listing üçün)'),
            Trix::make('Description'),
        ];
    }
}
