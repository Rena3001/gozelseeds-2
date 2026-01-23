<?php

namespace App\Nova;

use Laravel\Nova\Resource;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\Textarea;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Http\Requests\NovaRequest;

class ContactInfoSmtp extends Resource
{
    /**
     * The model the resource corresponds to.
     */
    public static $model = \App\Models\ContactInfoSmtp::class;

    /**
     * The single value that should be used to represent the resource.
     */
    public static function label()
    {
        return 'SMTP Settings';
    }
    public static $title = 'from_email';

    /**
     * The columns that should be searched.
     */
    public static $search = [
        'from_email',
        'host',
    ];


    public static function singularLabel()
    {
        return 'SMTP Setting';
    }

    /**
     * Get the fields displayed by the resource.
     */
    public function fields(NovaRequest $request)
    {
        return [

            ID::make()->sortable(),

            Select::make('Mailer', 'mailer')
                ->options([
                    'smtp' => 'SMTP (Microsoft OAuth)',
                ])
                ->default('smtp')
                ->displayUsingLabels()
                ->rules('required'),

            Text::make('Host', 'host')
                ->default('smtp.office365.com')
                ->rules('required'),

            Number::make('Port', 'port')
                ->default(587)
                ->rules('required'),

            Select::make('Encryption', 'encryption')
                ->options([
                    'tls' => 'TLS',
                    'ssl' => 'SSL',
                ])
                ->nullable(),

            Text::make('From Email', 'from_email')
                ->rules('required', 'email'),

            Text::make('From Name', 'from_name')
                ->nullable(),

            Text::make('Client ID', 'client_id')
                ->rules('required'),

            Textarea::make('Client Secret', 'client_secret')
                ->rules('required')
                ->alwaysShow(),

            Text::make('Tenant ID', 'tenant_id')
                ->rules('required'),

            Boolean::make('Active', 'is_active')
                ->trueValue(1)
                ->falseValue(0)
                ->help('Yalnız bir SMTP aktiv olmalıdır'),
        ];
    }

    /**
     * Disable create multiple records (optional but recommended)
     */

    public static function authorizedToCreate(Request $request)
    {
        return \App\Models\ContactInfoSmtp::count() === 0;
    }
}
