<?php

namespace App\Nova;

use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\Date;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\HasMany;
use Illuminate\Http\Request;
use Laravel\Nova\Resource;

class Vacancy extends Resource
{
    public static $model = \App\Models\Vacancy::class;

    public static $title = 'id';

    public static $search = [
        'id'
    ];

    public function fields(Request $request)
    {
        return [

            ID::make()->sortable(),

            Image::make('Image')
                ->disk('public')
                ->path('vacancies')
                ->nullable()              // 🔑 ÇOX VACİB
                ->prunable()
                ->thumbnail(function ($value) {
                    return $value ? asset('storage/' . $value) : null;
                })
                ->preview(function ($value) {
                    return $value ? asset('storage/' . $value) : null;
                }),

            Text::make('Salary')
                ->nullable(),

            Date::make('Deadline')
                ->nullable(),

            Text::make('Email')
                ->rules('nullable', 'email'),

            Boolean::make('Active', 'is_active')
                ->trueValue(1)
                ->falseValue(0)
                ->sortable(),

            Number::make('Order')
                ->default(0)
                ->sortable(),

            HasMany::make('Translations', 'translations', VacancyTranslation::class),

        ];
    }
}
