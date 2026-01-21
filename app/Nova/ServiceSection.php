<?php

namespace App\Nova;

use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Http\Requests\NovaRequest;

class ServiceSection extends Resource
{
    public static $model = \App\Models\ServiceSection::class;

    public static $title = 'id';

    public static $search = ['id'];

    public function fields(NovaRequest $request)
    {
        return [
            ID::make()->sortable(),

            Boolean::make('Active', 'is_active'),
            
            HasMany::make(
                'Translations',
                'translations',
                ServiceSectionTranslation::class
            ),
        ];
    }
}
