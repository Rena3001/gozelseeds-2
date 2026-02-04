<?php

namespace App\Nova;

use Laravel\Nova\Resource;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\BelongsTo;
use App\Nova\Category as NovaCategory;

use Laravel\Nova\Fields\BelongsToMany;
use Laravel\Nova\Http\Requests\NovaRequest;

class Category extends Resource
{
    public static $model = \App\Models\Category::class;

    public static $title = 'nova_title';

    public static function relatableQuery(NovaRequest $request, $query)
    {
        return $query->with('translations');
    }
 
    public static $search = [
        'id',
        'slug',
    ];

    public static function label()
    {
        return 'Categories';
    }

    public function fields(NovaRequest $request)
    {
        return [

            ID::make()->sortable(),

            BelongsTo::make(
    'Parent Category',
    'parent',
    NovaCategory::class
)->nullable(),


            Text::make('Slug')
                ->rules('required', 'unique:categories,slug,{{resourceId}}'),

            /* ===== INLINE TRANSLATIONS ===== */

            Text::make('Title (AZ)', 'title_az')
                ->onlyOnForms()
                ->rules('required')
                ->resolveUsing(
                    fn() =>
                    optional($this->translations->firstWhere('locale', 'az'))->title
                )
                ->fillUsing(fn() => null),

            Text::make('Title (EN)', 'title_en')
                ->onlyOnForms()
                ->rules('required')
                ->resolveUsing(
                    fn() =>
                    optional($this->translations->firstWhere('locale', 'en'))->title
                )
                ->fillUsing(fn() => null),

            Text::make('Title (RU)', 'title_ru')
                ->onlyOnForms()
                ->rules('required')
                ->resolveUsing(
                    fn() =>
                    optional($this->translations->firstWhere('locale', 'ru'))->title
                )
                ->fillUsing(fn() => null),
        ];
    }
}
