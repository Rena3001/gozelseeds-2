<?php

namespace Database\Seeders;

use App\Models\AboutSection;
use App\Models\AboutSectionTranslation;
use App\Models\AboutListItem;
use Illuminate\Database\Seeder;

class AboutSectionSeeder extends Seeder
{
    public function run(): void
    {
     
        // MAIN ABOUT SECTION
        $about = AboutSection::create([
            'main_image'     => 'about/about-v1-img1.jpg',
            'video_image'    => 'about/about-v1-video-img.jpg',
            'counter_number' => 87600,
            'video_url'      => 'https://www.youtube.com/watch?v=8DP4NgupAhI',
            'is_active'      => true,
        ]);

        // TRANSLATIONS
        $translations = [

            'en' => [
                'tagline'       => 'Our introduction',
                'title'         => 'Pure Agriculture and <br>Organic Form',
                'subtitle'      => 'We’re Leader in Agriculture Market',
                'text'          => 'There are many variations of passages of available but the majority have suffered alteration in some form, by injected humour or randomised words even slightly believable.',
                'counter_text'  => 'Successfully Project Completed',
                'video_text'    => 'Watch our video',
                'video_title'   => 'Tips for Ripening your Fruits',
            ],

            'az' => [
                'tagline'       => 'Təqdimatımız',
                'title'         => 'Saf Kənd Təsərrüfatı və <br>Orqanik Məhsullar',
                'subtitle'      => 'Kənd Təsərrüfatı Bazarında Liderik',
                'text'          => 'Mövcud mətnlərin bir çox variantı var, lakin onların əksəriyyəti müəyyən formada dəyişdirilmiş, zarafat və ya təsadüfi sözlər əlavə edilmişdir.',
                'counter_text'  => 'Uğurla Tamamlanan Layihə',
                'video_text'    => 'Videomuza baxın',
                'video_title'   => 'Meyvələrin Yetişməsi üçün Məsləhətlər',
            ],

            'ru' => [
                'tagline'       => 'Наше представление',
                'title'         => 'Чистое сельское хозяйство и <br>Органические продукты',
                'subtitle'      => 'Мы лидеры аграрного рынка',
                'text'          => 'Существует множество вариантов текста, однако большинство из них было изменено различными способами.',
                'counter_text'  => 'Успешно завершённых проектов',
                'video_text'    => 'Смотрите наше видео',
                'video_title'   => 'Советы по созреванию фруктов',
            ],
        ];

        foreach ($translations as $locale => $data) {
            AboutSectionTranslation::create([
                'about_section_id' => $about->id,
                'locale'           => $locale,
                'tagline'          => $data['tagline'],
                'title'            => $data['title'],
                'subtitle'         => $data['subtitle'],
                'text'             => $data['text'],
                'counter_text'     => $data['counter_text'],
                'video_text'       => $data['video_text'],
                'video_title'      => $data['video_title'],
            ]);
        }

        // CHECKLIST ITEMS (about-one__content-list)
        $listItems = [

            'en' => [
                'Lorem Ipsum is not simply random text',
                'If you are going to use a passage',
                'Making this the first true generator on the Internet',
                'Various versions have evolved over the years',
            ],

            'az' => [
                'Lorem Ipsum sadəcə təsadüfi mətn deyil',
                'Bir mətndən istifadə edəcəksinizsə',
                'İnternetdə ilk real generator olmaq',
                'İllər ərzində müxtəlif versiyalar yaranmışdır',
            ],

            'ru' => [
                'Lorem Ipsum — это не просто случайный текст',
                'Если вы собираетесь использовать отрывок',
                'Создание первого настоящего генератора в интернете',
                'Со временем появились различные версии',
            ],
        ];

        foreach ($listItems as $locale => $items) {
            foreach ($items as $index => $text) {
                AboutListItem::create([
                    'about_section_id' => $about->id,
                    'locale'           => $locale,
                    'text'             => $text,
                    'order'            => $index + 1,
                    'is_active'        => true,
                ]);
            }
        }
    }
}
