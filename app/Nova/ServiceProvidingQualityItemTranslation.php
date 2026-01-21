<?php

namespace App\Nova;

use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Http\Requests\NovaRequest;

class ServiceProvidingQualityItemTranslation extends Resource
{
    public static $model = \App\Models\ServiceProvidingQualityItemTranslation::class;

    public static $title = 'locale';

    public function fields(NovaRequest $request)
    {
        return [
            ID::make()->sortable(),

            BelongsTo::make(
                'Item',
                'item',
                ServiceProvidingQualityItem::class
            )->hideWhenCreating(),

            Select::make('Locale')
                ->options([
                    'az' => 'AZ',
                    'en' => 'EN',
                    'ru' => 'RU',
                ])
                ->rules('required'),

            Text::make('Title')->rules('required'),

            Textarea::make('Text')
                ->alwaysShow()
                ->rules('required'),
        ];
    }
}
