<?php

namespace App\Nova;

use App\Models\VideoSection as Model;
use Laravel\Nova\Resource;
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
                ->nullable()
                ->prunable(),

            Boolean::make('Active', 'is_active')
                ->default(true),

            /* ================= AZ ================= */
            new Panel('AZ Content', [
                Text::make('Title (AZ)', 'az_title')
                    ->resolveUsing(fn () => $this->getTranslation('az')?->title)
                    ->fillUsing(fn ($req, $model, $attr, $reqAttr) =>
                        $this->saveTranslation($model, 'az', [
                            'title' => $req[$reqAttr],
                            'button_url' => $req['az_button_url'] ?? null,
                            'video_url' => $req['az_video_url'] ?? null,
                        ])
                    ),

                Text::make('Button URL (AZ)', 'az_button_url')
                    ->resolveUsing(fn () => $this->getTranslation('az')?->button_url),

                Text::make('Video URL (AZ)', 'az_video_url')
                    ->resolveUsing(fn () => $this->getTranslation('az')?->video_url),
            ]),

            /* ================= EN ================= */
            new Panel('EN Content', [
                Text::make('Title (EN)', 'en_title')
                    ->resolveUsing(fn () => $this->getTranslation('en')?->title)
                    ->fillUsing(fn ($req, $model, $attr, $reqAttr) =>
                        $this->saveTranslation($model, 'en', [
                            'title' => $req[$reqAttr],
                            'button_url' => $req['en_button_url'] ?? null,
                            'video_url' => $req['en_video_url'] ?? null,
                        ])
                    ),

                Text::make('Button URL (EN)', 'en_button_url')
                    ->resolveUsing(fn () => $this->getTranslation('en')?->button_url),

                Text::make('Video URL (EN)', 'en_video_url')
                    ->resolveUsing(fn () => $this->getTranslation('en')?->video_url),
            ]),

            /* ================= RU ================= */
            new Panel('RU Content', [
                Text::make('Title (RU)', 'ru_title')
                    ->resolveUsing(fn () => $this->getTranslation('ru')?->title)
                    ->fillUsing(fn ($req, $model, $attr, $reqAttr) =>
                        $this->saveTranslation($model, 'ru', [
                            'title' => $req[$reqAttr],
                            'button_url' => $req['ru_button_url'] ?? null,
                            'video_url' => $req['ru_video_url'] ?? null,
                        ])
                    ),

                Text::make('Button URL (RU)', 'ru_button_url')
                    ->resolveUsing(fn () => $this->getTranslation('ru')?->button_url),

                Text::make('Video URL (RU)', 'ru_video_url')
                    ->resolveUsing(fn () => $this->getTranslation('ru')?->video_url),
            ]),
        ];
    }

    /* ================= HELPERS ================= */

    protected function getTranslation(string $locale)
    {
        return $this->resource
            ->translations()
            ->where('locale', $locale)
            ->first();
    }

    protected function saveTranslation($model, string $locale, array $data)
    {
        if (!array_filter($data)) return;

        $model->translations()->updateOrCreate(
            ['locale' => $locale],
            $data
        );
    }
}
