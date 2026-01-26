<?php

namespace App\Nova;

use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Http\Requests\NovaRequest;

class Testimonial extends Resource
{
    public static $model = \App\Models\Testimonials::class;

    public static $title = 'id';

    public static $search = ['id'];

    public function fields(NovaRequest $request)
    {
        return [
            ID::make()->sortable(),

            Image::make('Image')
                ->disk('public')
                ->path('testimonials')
                ->nullable()
                ->prunable()
                ->thumbnail(function ($value) {
                    return $value ? asset('storage/' . $value) : null;
                })
                ->preview(function ($value) {
                    return $value ? asset('storage/' . $value) : null;
                }),

            Number::make('Order')
                ->default(0)
                ->sortable(),

            Boolean::make('Active', 'is_active')
                ->default(true),

            // ⭐ BÜTÜN DİLLƏR BURADA
            HasMany::make(
                'Translations',
                'translations',
                TestimonialTranslation::class
            ),
        ];
    }
}
