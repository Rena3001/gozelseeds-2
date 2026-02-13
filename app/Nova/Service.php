<?php

namespace App\Nova;

use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Http\Requests\NovaRequest;

class Service extends Resource
{
    public static $model = \App\Models\Service::class;

    public static $title = 'id';

    public static $search = ['id', 'icon'];

    public function fields(NovaRequest $request)
    {
        return [
            ID::make()->sortable(),

            Image::make('Image')
                ->disk('public')
                ->path('services')
                ->creationRules('required')
                ->updateRules('nullable')
                ->prunable()
                ->thumbnail(fn($value) => $value ? asset('storage/' . $value) : null)
                ->preview(fn($value) => $value ? asset('storage/' . $value) : null),

            Image::make('Icon')
                ->disk('public')
                ->path('services/icons')
                ->prunable()
                ->creationRules('required')   // ✔ yalnız create üçün
                ->updateRules('nullable')
                ->help('PNG/JPG ikon yüklə (SVG yox)')
                ->thumbnail(function ($value) {
                    return $value ? asset('storage/' . $value) : null;
                })
                ->preview(function ($value) {
                    return $value ? asset('storage/' . $value) : null;
                }),

            Text::make('Link')
                ->default('services-details.html'),

            Number::make('Order')
                ->sortable(),

            Boolean::make('Active', 'is_active'),

            HasMany::make(
                'Translations',
                'translations',
                ServiceTranslation::class
            ),
        ];
    }
}
