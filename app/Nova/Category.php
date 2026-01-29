<?php

namespace App\Nova;

use App\Models\CategoryTranslation;
use App\Models\Product;
use App\Nova\CategoryTranslation as NovaCategoryTranslation;
use App\Nova\Product as NovaProduct;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\BelongsToMany;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;

// App\Nova\Category.php
class Category extends Resource
{
    public static $model = \App\Models\Category::class;

   public function title()
{
    return optional($this->translation)->title
        ?? optional($this->translations->first())->title
        ?? 'No title';
}
public static function relatableProducts(NovaRequest $request, $query)
{
    return $query->with(['translation', 'translations']);
}

    public static $search = [
        'id',
        'slug',
    ];


    public static function label()
    {
        return 'Categories';
    }
public static function relatableCategories(NovaRequest $request, $query)
{
    return $query->with('translation');
}


    public function fields(NovaRequest $request)
    {
        return [

            ID::make()->sortable(),

            Text::make('Slug')
                ->rules('required', 'unique:categories,slug,{{resourceId}}')
                ->help('URL üçün istifadə olunur'),

            HasMany::make(
                'Translations',
                'translations',
                NovaCategoryTranslation::class
            ),

            BelongsToMany::make(
                'Products',
                'products',
                NovaProduct::class
            ),
        ];
    }
}
