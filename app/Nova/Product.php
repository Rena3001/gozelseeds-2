<?php

namespace App\Nova;

use Laravel\Nova\Resource;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\BelongsToMany;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Trix;
use App\Nova\Category as NovaCategory;
use Laravel\Nova\Http\Requests\NovaRequest;
use App\Models\Category;

class Product extends Resource
{
    public static $model = \App\Models\Product::class;

    // Nova dropdown və relation label üçün
    public static $title = 'nova_title';

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
                ->nullable()
                ->prunable(),

            Text::make('Slug')
                ->rules('required', 'unique:products,slug,{{resourceId}}'),


            Boolean::make('Active', 'is_active')
                ->default(true),

            /* ================= CREATE ÜÇÜN CATEGORY ================= */



            /* ================= UPDATE ÜÇÜN CATEGORIES ================= */

            BelongsToMany::make(
                'Categories',
                'categories',
                \App\Nova\Category::class
            )
                ->rules('required')
                ->help('Məhsulun aid olduğu kateqoriyanı seçin'),


            /* ================= AZ ================= */

            Text::make('Title (AZ)', 'title_az')
                ->onlyOnForms()
                ->rules('required')
                ->resolveUsing(
                    fn() =>
                    optional($this->translations->firstWhere('locale', 'az'))->title
                )
                ->fillUsing(fn() => null),

            Trix::make('Short Description (AZ)', 'short_description_az')
                ->onlyOnForms()
                ->resolveUsing(
                    fn() =>
                    optional($this->translations->firstWhere('locale', 'az'))->short_description
                )
                ->fillUsing(fn() => null),

            Trix::make('Description (AZ)', 'description_az')
                ->onlyOnForms()
                ->resolveUsing(
                    fn() =>
                    optional($this->translations->firstWhere('locale', 'az'))->description
                )
                ->fillUsing(fn() => null),

            /* ================= EN ================= */

            Text::make('Title (EN)', 'title_en')
                ->onlyOnForms()
                ->rules('required')
                ->resolveUsing(
                    fn() =>
                    optional($this->translations->firstWhere('locale', 'en'))->title
                )
                ->fillUsing(fn() => null),

            Trix::make('Short Description (EN)', 'short_description_en')
                ->onlyOnForms()
                ->resolveUsing(
                    fn() =>
                    optional($this->translations->firstWhere('locale', 'en'))->short_description
                )
                ->fillUsing(fn() => null),

            Trix::make('Description (EN)', 'description_en')
                ->onlyOnForms()
                ->resolveUsing(
                    fn() =>
                    optional($this->translations->firstWhere('locale', 'en'))->description
                )
                ->fillUsing(fn() => null),

            /* ================= RU ================= */

            Text::make('Title (RU)', 'title_ru')
                ->onlyOnForms()
                ->rules('required')
                ->resolveUsing(
                    fn() =>
                    optional($this->translations->firstWhere('locale', 'ru'))->title
                )
                ->fillUsing(fn() => null),

            Trix::make('Short Description (RU)', 'short_description_ru')
                ->onlyOnForms()
                ->resolveUsing(
                    fn() =>
                    optional($this->translations->firstWhere('locale', 'ru'))->short_description
                )
                ->fillUsing(fn() => null),

            Trix::make('Description (RU)', 'description_ru')
                ->onlyOnForms()
                ->resolveUsing(
                    fn() =>
                    optional($this->translations->firstWhere('locale', 'ru'))->description
                )
                ->fillUsing(fn() => null),
        ];
    }
}
