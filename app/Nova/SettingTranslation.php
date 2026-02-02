<?php

namespace App\Nova;

use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Http\Requests\NovaRequest;

class SettingTranslation extends Resource
{
    public static $model = \App\Models\SettingTranslation::class;

    public static $title = 'locale';

    public static $search = ['locale', 'address'];

    public function fields(NovaRequest $request)
    {
        return [
            ID::make()->sortable(),

            BelongsTo::make(
                'Setting',
                'setting',
                Setting::class
            )->hideFromIndex(),

            Text::make('Locale')
                ->rules('required')
                ->help('az / en / ru'),

            Text::make('Address (Azerbaijan)', 'address')
                ->rules('required'),

            Text::make('Address (Turkey)', 'address_turkey'),

            Text::make('Address (Spain)', 'address_spain'),

            Text::make('Address (Uzbekistan)', 'address_uzbekistan'),



        ];
    }
}
