<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;

// App\Nova\CategoryTranslation.php
class CategoryTranslation extends Resource
{
    public static $model = \App\Models\CategoryTranslation::class;

    public static function label()
    {
        return 'Category Translations';
    }

    public function fields(NovaRequest $request)
    {
        return [

            ID::make()->sortable(),

            BelongsTo::make('Category'),

            Select::make('Locale')->options([
                'az' => 'AZ',
                'en' => 'EN',
                'ru' => 'RU',
            ])->rules('required'),

            Text::make('Title')
                ->rules('required'),
        ];
    }
}
