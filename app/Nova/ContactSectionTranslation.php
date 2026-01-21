<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Http\Requests\NovaRequest;

class ContactSectionTranslation extends Resource
{
    public static $model = \App\Models\ContactSectionTranslation::class;

    public function fields(NovaRequest $request)
    {
        return [
            Text::make('Locale')->help('az / en / ru'),

            Textarea::make('Text')->rules('required'),

            Text::make('List 1')->nullable(),
            Text::make('List 2')->nullable(),
            Text::make('List 3')->nullable(),
        ];
    }
}