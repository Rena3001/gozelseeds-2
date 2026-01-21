<?php

namespace App\Nova;

use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;

class AboutListItem extends Resource
{
    public static $model = \App\Models\AboutListItem::class;

    public static $title = 'text';

    public static $search = ['text'];

    public function fields(NovaRequest $request)
    {
        return [

            ID::make()->sortable(),

            BelongsTo::make('About Section', 'aboutSection', AboutSection::class),

            Select::make('Locale')
                ->options([
                    'az' => 'AZ',
                    'en' => 'EN',
                    'ru' => 'RU',
                ])
                ->rules('required'),

            Text::make('Text')
                ->rules('required'),

            Number::make('Order')->default(0),

            Boolean::make('Active', 'is_active'),
        ];
    }
}
