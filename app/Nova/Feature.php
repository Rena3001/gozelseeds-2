<?php

namespace App\Nova;

use App\Models\Feature as FeatureModel;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;

class Feature extends Resource
{
    public static $model = FeatureModel::class;

    public static $title = 'id';

    public static $search = ['id'];


    public function fields(NovaRequest $request)
    {
        return [

            ID::make()->sortable(),
            Image::make('Image', 'image')
                ->disk('public')
                ->path('features')
                ->creationRules('required')
                ->nullable()
                ->prunable()
                ->thumbnail(fn($value) => $value ? asset('storage/' . $value) : null)
                ->preview(fn($value) => $value ? asset('storage/' . $value) : null),

            Image::make('Background Image', 'background_image')
                ->disk('public')
                ->path('features')
                ->nullable()
                ->prunable()
                ->thumbnail(fn($value) => $value ? asset('storage/' . $value) : null)
                ->preview(fn($value) => $value ? asset('storage/' . $value) : null),

            Text::make('Link')
                ->nullable(),

            Text::make('Button Link')
                ->nullable(),

            Boolean::make('Has Button', 'has_button')
                ->help('Style 2 üçün aktiv et'),

            Boolean::make('Active', 'is_active')
                ->default(true),

            Number::make('Order')
                ->default(0)
                ->sortable(),

            HasMany::make('Translations', 'translations', FeatureTranslation::class),
        ];
    }
}
