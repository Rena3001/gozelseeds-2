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
            ->fillUsing(function ($request, $model) use ($locale) {
                $this->saveTranslation($model, $locale, [
                    'title'       => $request->input("title_$locale"),
                    'video_title' => $request->input("video_title_$locale"),
                    'button_url'  => $request->input("button_url_$locale"),
                    'video_url'   => $request->input("video_url_$locale"),
                ]);
            })
            ->withMeta(['extraAttributes' => ['name' => "title_$locale"]])
            ->onlyOnForms(),

        Text::make('Video Title')
            ->resolveUsing(fn() => $this->tr($locale)?->video_title)
            ->withMeta(['extraAttributes' => ['name' => "video_title_$locale"]])
            ->fillUsing(function () {})
            ->onlyOnForms(),

        Text::make('Button URL')
            ->resolveUsing(fn() => $this->tr($locale)?->button_url)
            ->withMeta(['extraAttributes' => ['name' => "button_url_$locale"]])
            ->fillUsing(function () {})
            ->onlyOnForms(),

        Text::make('Video URL')
            ->resolveUsing(fn() => $this->tr($locale)?->video_url)
            ->withMeta(['extraAttributes' => ['name' => "video_url_$locale"]])
            ->fillUsing(function () {})
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
