<?php

namespace App\Nova;

use App\Models\ProductTranslation;
use App\Nova\ProductTranslation as NovaProductTranslation;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\BelongsToMany;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;

// App\Nova\Product.php
class Product extends Resource
{
    public static $model = \App\Models\Product::class;

    public static function label()
    {
        return 'Products';
    }

    public function fields(NovaRequest $request)
    {
        return [

            ID::make()->sortable(),

            Image::make('Image')
                ->disk('public')
                ->path('products')
                ->prunable(),

            Text::make('Slug')
                ->rules('required', 'unique:products,slug,{{resourceId}}'),

            Boolean::make('Active', 'is_active')
                ->default(true),

            BelongsToMany::make(
                'Categories',
                'categories',
                Category::class
            ),

            HasMany::make(
                'Translations',
                'translations',
                NovaProductTranslation::class
            ),
        ];
    }
}
