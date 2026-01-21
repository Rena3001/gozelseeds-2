<?php

namespace App\Nova;

use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Http\Requests\NovaRequest;

class ContactSection extends Resource
{
    public static $model = \App\Models\ContactSection::class;

    public function fields(NovaRequest $request)
    {
        return [
            Image::make('Image 1', 'image_1')
                ->disk('public')
                ->path('contact'),

            Image::make('Image 2', 'image_2')
                ->disk('public')
                ->path('contact'),

            Boolean::make('Active', 'is_active'),

            HasMany::make(
                'Translations',
                'translations',
                ContactSectionTranslation::class
            ),
        ];
    }
}
