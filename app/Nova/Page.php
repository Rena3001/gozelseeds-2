<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Http\Requests\NovaRequest;

class Page extends Resource
{
    public static $model = \App\Models\Page::class;

    public static $title = 'slug';

    public static $search = ['slug'];

    public function fields(Request $request)
    {
        return [
            ID::make()->sortable(),

            // =====================
            // PAGE BASE INFO
            // =====================
            Text::make('Slug')
                ->rules('required')
                ->help('Example: about, contact, services'),

            Boolean::make('Active', 'is_active')
                ->default(true),

            // =====================
            // PAGE HEADER
            // =====================
            Image::make('Header Background', 'header_bg')
                ->disk('public')
                ->path('pages')
                ->nullable()
                ->prunable()
                ->thumbnail(fn($value) => $value ? asset('storage/' . $value) : null)
                ->preview(fn($value) => $value ? asset('storage/' . $value) : null),

            Image::make('Main Image', 'image_main')
                ->disk('public')
                ->path('pages')
                ->nullable()
                ->prunable()
                ->thumbnail(fn($value) => $value ? asset('storage/' . $value) : null)
                ->preview(fn($value) => $value ? asset('storage/' . $value) : null),

            Image::make('Icon Image', 'image_icon')
                ->disk('public')
                ->path('pages')
                ->nullable()
                ->prunable()
                ->thumbnail(fn($value) => $value ? asset('storage/' . $value) : null)
                ->preview(fn($value) => $value ? asset('storage/' . $value) : null),

            // =====================
            // TRANSLATIONS
            // =====================
            HasMany::make(
                'Translations',
                'translations',
                PageTranslation::class
            ),
        ];
    }

    public function cards(NovaRequest $request): array
    {
        return [];
    }

    public function filters(NovaRequest $request): array
    {
        return [];
    }

    public function lenses(NovaRequest $request): array
    {
        return [];
    }

    public function actions(NovaRequest $request): array
    {
        return [];
    }
}
