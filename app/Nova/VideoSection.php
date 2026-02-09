<?php

namespace App\Nova;

use App\Models\VideoSection as Model;
use Laravel\Nova\Resource;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Panel;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Panel as NovaPanel;

class VideoSection extends Resource
{
    public static $model = Model::class;
    public static $title = 'id';
    public static $search = ['id'];

    public function fields(NovaRequest $request)
    {
        return [

            ID::make()->sortable(),

            Image::make('Background Video', 'background_image')
                ->disk('public')
                ->path('video-section')
                ->acceptedTypes('video/mp4')->prunable()
                ->thumbnail(function ($value) {
                    return $value ? asset('storage/' . $value) : null;
                })
                ->preview(function ($value) {
                    return $value ? asset('storage/' . $value) : null;
                }),

            Boolean::make('Active', 'is_active')->default(true),

            $this->localePanel('az', 'AZ'),
            $this->localePanel('en', 'EN'),
            $this->localePanel('ru', 'RU'),
        ];
    }

    /* ================= LOCALE PANEL ================= */

    protected function localePanel(string $locale, string $label)
    {
        return new NovaPanel($label . ' Content', [

            Text::make('Title')
                ->resolveUsing(fn() => $this->tr($locale)?->title)
                ->fillUsing(
                    fn($req, $model) =>
                    $this->saveTranslation($model, $locale, [
                        'title'       => $req->input("title_$locale"),
                        'video_title' => $req->input("video_title_$locale"),
                        'button_url'  => $req->input("button_url_$locale"),
                        'video_url'   => $req->input("video_url_$locale"),
                    ])
                )
                ->onlyOnForms()
                ->withMeta(['extraAttributes' => ['name' => "title_$locale"]]),

            Text::make('Video Title')
                ->resolveUsing(fn() => $this->tr($locale)?->video_title)
                ->fillUsing(function () {}) // 🔥 ƏSAS FIX
                ->onlyOnForms(),

            Text::make('Button URL')
                ->resolveUsing(fn() => $this->tr($locale)?->button_url)
                ->fillUsing(function () {}) // 🔥
                ->onlyOnForms(),

            Text::make('Video URL')
                ->resolveUsing(fn() => $this->tr($locale)?->video_url)
                ->fillUsing(function () {}) // 🔥
                ->onlyOnForms(),
        ]);
    }

    /* ================= HELPERS ================= */

    protected function tr(string $locale)
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
