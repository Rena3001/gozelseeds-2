<?php

namespace App\Nova;

use App\Nova\ServiceProvidingQualityItem;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Panel;
use Laravel\Nova\Http\Requests\NovaRequest;

class ServiceProvidingQuality extends Resource
{
    public static $model = \App\Models\ServiceProvidingQuality::class;

    public static $title = 'id';

    public static $search = ['id'];

    public function fields(NovaRequest $request)
    {
        return [

            ID::make()->sortable(),

            /* =====================
             | MAIN SECTION
             ===================== */
            new Panel('Main Section', [
                Image::make('Background Image', 'bg_image')
                    ->disk('public')
                    ->path('providing-quality'),

                Image::make('Main Image', 'main_image')
                    ->disk('public')
                    ->path('providing-quality'),

                Image::make('Logo Image', 'logo_image')
                    ->disk('public')
                    ->path('providing-quality'),

                Boolean::make('Active', 'is_active')->default(true),

                Number::make('Order')
                    ->sortable()
                    ->rules('required', 'integer'),
            ]),

            /* =====================
             | TRANSLATIONS
             ===================== */
            new Panel('Section Translations', [
                HasMany::make(
                    'Translations',
                    'translations',
                    ServiceProvidingQualityTranslation::class
                ),
            ]),

            /* =====================
             | ITEMS
             ===================== */
            new Panel('Quality Items', [
                HasMany::make(
                    'Items',
                    'items',
                    ServiceProvidingQualityItem::class
                ),
            ]),
        ];
    }
}
