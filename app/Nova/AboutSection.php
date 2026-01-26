<?php

namespace App\Nova;

use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Panel;
use Laravel\Nova\Http\Requests\NovaRequest;

class AboutSection extends Resource
{
    public static $model = \App\Models\AboutSection::class;

    public static $title = 'id';

    public static $search = ['id'];

    public function fields(NovaRequest $request)
    {
        return [

            ID::make()->sortable(),

            new Panel('Images', [
                Image::make('Main Image', 'main_image')
                    ->disk('public')
                    ->path('about')
                    ->nullable()
                    ->prunable()
                    ->thumbnail(fn($value) => $value ? asset('storage/' . $value) : null)
                    ->preview(fn($value) => $value ? asset('storage/' . $value) : null),

                Image::make('Video Image', 'video_image')
                    ->disk('public')
                    ->path('about')
                    ->nullable()
                    ->prunable()
                    ->thumbnail(fn($value) => $value ? asset('storage/' . $value) : null)
                    ->preview(fn($value) => $value ? asset('storage/' . $value) : null),
            ]),

            new Panel('Counter & Video', [
                Number::make('Counter Number', 'counter_number')
                    ->default(0),

                Text::make('Video URL', 'video_url')
                    ->nullable(),
            ]),

            Boolean::make('Active', 'is_active')
                ->trueValue(1)
                ->falseValue(0),

            HasMany::make(
                'Translations',
                'translations',
                AboutSectionTranslation::class
            ),
            HasMany::make(
                'Checklist Items',
                'listItems',
                AboutListItem::class
            ),
        ];
    }
}
