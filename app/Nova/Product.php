<?php

namespace App\Nova;

use Laravel\Nova\Resource;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\BelongsToMany;
use Laravel\Nova\Fields\Trix;
use Laravel\Nova\Http\Requests\NovaRequest;

class Product extends Resource
{
    public static $with = ['translations'];
    public static $model = \App\Models\Product::class;

    // Nova index-də title kimi nə göstərilsin
    public static $title = 'slug';

    public static function label()
    {
        return 'Products';
    }

    public function fields(NovaRequest $request)
    {
        return [

            ID::make()->sortable(),

            /* ================= INDEX TABLE ================= */

            Text::make('Title (AZ)')
                ->onlyOnIndex()
                ->sortable()
                ->resolveUsing(fn() => $this->getTranslationValue('az', 'title') ?? '-'),

            Text::make('Slug')
                ->sortable()
                ->rules('required', 'unique:products,slug,{{resourceId}}'),

            Boolean::make('Active', 'is_active'),

            /* ================= IMAGE ================= */

            Image::make('Image')
                ->disk('public')
                ->path('products')
                ->nullable()
                ->prunable(),

            /* ================= CATEGORIES ================= */

            BelongsToMany::make('Categories'),

            /* ================= AZ ================= */

            Text::make('Title (AZ)')
                ->onlyOnForms()
                ->rules('required')
                ->resolveUsing(
                    fn() =>
                    optional(
                        $this->resource->translations->firstWhere('locale', 'az')
                    )->title
                )
                ->fillUsing(fn() => null),

            Trix::make('Short Description (AZ)')
                ->onlyOnForms()
                ->resolveUsing(
                    fn() =>
                    optional(
                        $this->resource->translations->firstWhere('locale', 'az')
                    )->short_description
                )
                ->fillUsing(fn() => null),

            Trix::make('Description (AZ)')
                ->onlyOnForms()
                ->resolveUsing(
                    fn() =>
                    optional(
                        $this->resource->translations->firstWhere('locale', 'az')
                    )->description
                )
                ->fillUsing(fn() => null),

            Text::make('Title (EN)')
                ->onlyOnForms()
                ->rules('required')
                ->resolveUsing(
                    fn() =>
                    optional(
                        $this->resource->translations->firstWhere('locale', 'en')
                    )->title
                )
                ->fillUsing(fn() => null),

            Trix::make('Short Description (EN)')
                ->onlyOnForms()
                ->resolveUsing(
                    fn() =>
                    optional(
                        $this->resource->translations->firstWhere('locale', 'en')
                    )->short_description
                )
                ->fillUsing(fn() => null),

            Trix::make('Description (EN)')
                ->onlyOnForms()
                ->resolveUsing(
                    fn() =>
                    optional(
                        $this->resource->translations->firstWhere('locale', 'en')
                    )->description
                )
                ->fillUsing(fn() => null),
            Text::make('Title (RU)')
                ->onlyOnForms()
                ->rules('required')
                ->resolveUsing(
                    fn() =>
                    optional(
                        $this->resource->translations->firstWhere('locale', 'ru')
                    )->title
                )
                ->fillUsing(fn() => null),

            Trix::make('Short Description (RU)')
                ->onlyOnForms()
                ->resolveUsing(
                    fn() =>
                    optional(
                        $this->resource->translations->firstWhere('locale', 'ru')
                    )->short_description
                )
                ->fillUsing(fn() => null),

            Trix::make('Description (RU)')
                ->onlyOnForms()
                ->resolveUsing(
                    fn() =>
                    optional(
                        $this->resource->translations->firstWhere('locale', 'ru')
                    )->description
                )
                ->fillUsing(fn() => null),

        ];
    }

    /* ================= HELPERS ================= */

    protected function getTranslationValue(string $locale, string $field)
    {
        if (!$this->resource || !$this->resource->exists) {
            return null;
        }

        return optional(
            $this->resource
                ->translations()
                ->where('locale', $locale)
                ->first()
        )->{$field};
    }
}
