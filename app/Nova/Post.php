<?php

namespace App\Nova;

use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\Date;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Http\Requests\NovaRequest;

class Post extends Resource
{
    public static $model = \App\Models\Post::class;

    public static $title = 'id';

    public static $search = ['id'];

    public function fields(NovaRequest $request)
    {
        return [
            ID::make()->sortable(),

            Image::make('Image')
                ->disk('public')
                ->path('blog')
                ->nullable()
                ->prunable()
                ->thumbnail(fn($value) => $value ? asset('storage/' . $value) : null)
                ->preview(fn($value) => $value ? asset('storage/' . $value) : null),

            Text::make('Author')
                ->default('Admin'),

            Number::make('Comments Count')
                ->default(0),

            Date::make('Published At'),

            Number::make('Order')
                ->default(0),

            Boolean::make('Active', 'is_active')
                ->default(true),

            // 🔥 DİLLƏR BURADADIR (AZ / EN / RU)
            HasMany::make(
                'Translations',
                'translations',
                PostTranslation::class
            ),
        ];
    }
}
