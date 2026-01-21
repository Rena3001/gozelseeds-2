<?php

namespace App\Nova;

use App\Models\VideoSection as Model;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Panel;
use Laravel\Nova\Http\Requests\NovaRequest;

class VideoSection extends Resource
{
    public static $model = Model::class;

    public static $title = 'id';

    public static $search = ['id'];

    public static function label()
    {
        return 'Video Section';
    }

    public function fields(NovaRequest $request)
    {
        return [

            ID::make()->sortable(),

            Image::make('Background Image', 'background_image')
                ->disk('public')
                ->path('video-section')
                ->creationRules('required')
                ->prunable(),

            Text::make('Button URL', 'button_url')
                ->nullable(),

            Text::make('Video URL', 'video_url')
                ->creationRules('required'),

            Boolean::make('Active', 'is_active')
                ->default(true),

            // 🌐 AZ
            new Panel('AZ Content', [
                Text::make('Title (AZ)', 'az_title')
                    ->resolveUsing(fn () => $this->translation('az')?->title)
                    ->fillUsing(fn ($req, $model, $attr, $reqAttr) =>
                        $this->saveTranslation($model, 'az', 'title', $req[$reqAttr])
                    ),


            ]),

            // 🌐 EN
            new Panel('EN Content', [
                Text::make('Title (EN)', 'en_title')
                    ->resolveUsing(fn () => $this->translation('en')?->title)
                    ->fillUsing(fn ($req, $model, $attr, $reqAttr) =>
                        $this->saveTranslation($model, 'en', 'title', $req[$reqAttr])
                    ),


            ]),

            // 🌐 RU
            new Panel('RU Content', [
                Text::make('Title (RU)', 'ru_title')
                    ->resolveUsing(fn () => $this->translation('ru')?->title)
                    ->fillUsing(fn ($req, $model, $attr, $reqAttr) =>
                        $this->saveTranslation($model, 'ru', 'title', $req[$reqAttr])
                    ),

            ]),
        ];
    }

    /* ================= HELPERS ================= */

    protected function translation(string $locale)
    {
        return $this->resource
            ->translations()
            ->where('locale', $locale)
            ->first();
    }

    protected function saveTranslation($model, $locale, $field, $value)
    {
        if (!$value) return;

        $translation = $model->translations()
            ->firstOrCreate(['locale' => $locale]);

        $translation->$field = $value;
        $translation->save();
    }
}
