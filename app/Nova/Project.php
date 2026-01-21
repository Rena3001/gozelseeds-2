<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Panel;


class Project extends Resource
{
    public static $model = \App\Models\Project::class;

    /**
     * The single value used to represent the resource.
     */
    public static $title = 'id';

    /**
     * The columns that should be searched.
     */
    public static $search = [
        'id',
    ];


    public function fields(Request $request)
    {
        return [

            Image::make('Image', 'image')
                ->disk('public')
                ->path('projects')
                ->prunable(),

            Text::make('Category'),

            Number::make('Order')->default(0),

            Boolean::make('Active', 'is_active')->default(true),

            new Panel('Titles (AZ / EN / RU)', [

                Text::make('Title (AZ)', 'title_az')
                    ->resolveUsing(fn() => $this->translation('az')?->title)
                    ->fillUsing(
                        fn($req, $model, $attr, $key) =>
                        $this->saveTranslation($model, 'az', ['title' => $req[$key]])
                    ),

                Text::make('Title (EN)', 'title_en')
                    ->resolveUsing(fn() => $this->translation('en')?->title)
                    ->fillUsing(
                        fn($req, $model, $attr, $key) =>
                        $this->saveTranslation($model, 'en', ['title' => $req[$key]])
                    ),

                Text::make('Title (RU)', 'title_ru')
                    ->resolveUsing(fn() => $this->translation('ru')?->title)
                    ->fillUsing(
                        fn($req, $model, $attr, $key) =>
                        $this->saveTranslation($model, 'ru', ['title' => $req[$key]])
                    ),
            ]),
        ];
    }

    protected function translation($locale)
    {
        return $this->resource->translations()->where('locale', $locale)->first();
    }

    protected function saveTranslation($model, $locale, array $data)
    {
        if (!$data['title']) return;

        $model->translations()
            ->updateOrCreate(
                ['locale' => $locale],
                $data
            );
    }
}
