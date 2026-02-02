<?php

namespace App\Nova;

use Laravel\Nova\Resource;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Panel;

class Project extends Resource
{
    public static $model = \App\Models\Project::class;

    public static $title = 'id';

    public static $search = [
        'id',
    ];

    public function fields(NovaRequest $request)
    {
        return [

            Image::make('Image', 'image')
                ->disk('public')
                ->path('projects')
                ->nullable()
                ->prunable()
                ->thumbnail(fn ($value) => $value ? asset('storage/' . $value) : null)
                ->preview(fn ($value) => $value ? asset('storage/' . $value) : null),

            Text::make('Category'),

            Number::make('Order')->default(0),

            Boolean::make('Active', 'is_active')->default(true),

            new Panel('Titles (AZ / EN / RU)', [

                Text::make('Title (AZ)', 'title_az')
                    ->resolveUsing(fn () => $this->translation('az')?->title)
                    ->fillUsing(fn () => null),

                Text::make('Title (EN)', 'title_en')
                    ->resolveUsing(fn () => $this->translation('en')?->title)
                    ->fillUsing(fn () => null),

                Text::make('Title (RU)', 'title_ru')
                    ->resolveUsing(fn () => $this->translation('ru')?->title)
                    ->fillUsing(fn () => null),
            ]),
        ];
    }

    protected function translation(string $locale)
    {
        return $this->resource
            ->translations()
            ->where('locale', $locale)
            ->first();
    }

    /**
     * CREATE-dən sonra
     */
    public static function afterCreate(NovaRequest $request, $model)
    {
        static::saveTranslations($request, $model);
    }

    /**
     * UPDATE-dən sonra
     */
    public static function afterUpdate(NovaRequest $request, $model)
    {
        static::saveTranslations($request, $model);
    }

    /**
     * 🔥 Translation save OLDUĞU YER
     */
    protected static function saveTranslations(NovaRequest $request, $model)
    {
        foreach (['az', 'en', 'ru'] as $locale) {
            $key = 'title_' . $locale;

            if ($request->filled($key)) {
                $model->translations()->updateOrCreate(
                    ['locale' => $locale],
                    ['title' => $request->input($key)]
                );
            }
        }
    }
}
