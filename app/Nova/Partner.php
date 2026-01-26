<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;

class Partner extends Resource
{
    public static $model = \App\Models\Partner::class;

    public function fields(NovaRequest $request)
    {
        return [
            Image::make('Logo')
                ->disk('public')
                ->path('partners')
                ->nullable()
                ->prunable()
                ->thumbnail(fn($value) => $value ? asset('storage/' . $value) : null)
                ->preview(fn($value) => $value ? asset('storage/' . $value) : null),

            Text::make('URL')->nullable(),

            Number::make('Order')->default(0),

            Boolean::make('Active', 'is_active'),
        ];
    }
}
