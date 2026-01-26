<?php

namespace App\Nova;

use Laravel\Nova\Resource;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Http\Requests\NovaRequest;

class Translation extends Resource
{
    public static $model = \App\Models\Translation::class;

    public static $title = 'key';

    public static $search = [
        'id',
        'group',
        'key',
        'value',
    ];

    public static function label()
    {
        return 'Translations';
    }

    public function fields(NovaRequest $request)
    {
        return [

            ID::make()->sortable(),

            Text::make('Group')
                ->rules('required')
                ->sortable(),

            Text::make('Key')
                ->rules('required')
                ->sortable(),

            Select::make('Locale')
                ->options([
                    'az' => 'Azərbaycan',
                    'ru' => 'Русский',
                    'en' => 'English',
                ])
                ->displayUsingLabels()
                ->rules('required')
                ->sortable(),

            Textarea::make('Value')
                ->alwaysShow()
                ->nullable(),
        ];
    }

    public static function indexQuery(NovaRequest $request, $query)
    {
        return $query->orderBy('group')
                     ->orderBy('key')
                     ->orderBy('locale');
    }
}
