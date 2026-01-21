<?php

namespace App\Nova;

use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Panel;
use Laravel\Nova\Http\Requests\NovaRequest;

class ServiceProvidingQualityItem extends Resource
{
    public static $model = \App\Models\ServiceProvidingQualityItem::class;

    public static $title = 'id';

    public function fields(NovaRequest $request)
    {
        return [

            ID::make()->sortable(),

            BelongsTo::make(
                'Section',
                'serviceProvidingQuality',
                ServiceProvidingQuality::class
            ),

            new Panel('Item Settings', [
                Text::make('Icon Class', 'icon_class')
                    ->rules('required'),

                Number::make('Order')
                    ->rules('required', 'integer'),

                Boolean::make('Active', 'is_active')->default(true),
            ]),

            new Panel('Item Translations', [
                HasMany::make(
                    'Translations',
                    'translations',
                    ServiceProvidingQualityItemTranslation::class
                ),
            ]),
        ];
    }
}
