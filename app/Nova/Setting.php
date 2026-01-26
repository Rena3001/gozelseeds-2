<?php

namespace App\Nova;

use App\Nova\SettingTranslation;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Http\Requests\NovaRequest;

class Setting extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var class-string<\App\Models\Setting>
     */
    public static $model = \App\Models\Setting::class;

    /**
     * The single value that should be used to represent the resource.
     */
    public static $title = 'id';

    /**
     * The columns that should be searched.
     */
    public static $search = ['id'];

    /**
     * Get the fields displayed by the resource.
     */
    public function fields(Request $request)
    {
        return [
            ID::make()->sortable(),

            // =====================
            // BASIC INFO
            // =====================
            Text::make('Email')->sortable(),
            Text::make('Phone'),
            Text::make('Working Hours'),

            Textarea::make('Google Map Iframe', 'map_iframe')
                ->rows(6)
                ->help('Google Maps → Embed map → iframe kodunu tam şəkildə yapışdır')
                ->nullable(),

            // =====================
            // LOGOS
            Image::make('Dark Logo', 'logo_dark')
                ->disk('public')
                ->path('settings')
                ->nullable()
                ->prunable()
                ->thumbnail(function ($value) {
                    return $value ? asset('storage/' . $value) : null;
                })
                ->preview(function ($value) {
                    return $value ? asset('storage/' . $value) : null;
                }),

            Image::make('Light Logo', 'logo_light')
                ->disk('public')
                ->path('settings')
                ->nullable()
                ->prunable()
                ->thumbnail(function ($value) {
                    return $value ? asset('storage/' . $value) : null;
                })
                ->preview(function ($value) {
                    return $value ? asset('storage/' . $value) : null;
                }),
            // =====================
            // SOCIAL LINKS
            // =====================
            Text::make('Facebook')->nullable(),
            Text::make('Instagram')->nullable(),

            Text::make('TikTok', 'tiktok')->nullable(),
            Text::make('LinkedIn', 'linkedin')->nullable(),
            Text::make('Telegram', 'telegram')->nullable(),
            Text::make('WhatsApp', 'whatsapp')->nullable(),
            Text::make('Youtube')->nullable(),

            // =====================
            // FOOTER
            // =====================
            Text::make('Copyright Link', 'copyright_link')
                ->nullable()
                ->help('Example: https://layerdrops.com'),

            // =====================
            // TRANSLATIONS (LOCALE)
            // =====================
            HasMany::make(
                'Translations',
                'translations',
                SettingTranslation::class
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
