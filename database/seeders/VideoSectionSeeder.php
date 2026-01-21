<?php

namespace Database\Seeders;

use App\Models\VideoSection;
use App\Models\VideoSectionTranslation;
use Illuminate\Database\Seeder;

class VideoSectionSeeder extends Seeder
{
    public function run(): void
    {
        // MAIN SECTION
        $videoSection = VideoSection::create([
            'background_image' => 'video-one-bg.jpg',
            'button_url'       => '#',
            'video_url'        => 'https://www.youtube.com/watch?v=8DP4NgupAhI',
            'is_active'        => true,
        ]);

        // TRANSLATIONS
        $translations = [

            'en' => [
                'title'        => 'Agriculture Matters to <br>the Future of Development',
                
                'video_title'  => 'Watch the video',
            ],

            'az' => [
                'title'        => 'Kənd təsərrüfatı <br>Gələcəyin əsasını təşkil edir',
              
                'video_title'  => 'Videoya bax',
            ],

            'ru' => [
                'title'        => 'Сельское хозяйство <br>— основа будущего развития',
              
                'video_title'  => 'Смотреть видео',
            ],
        ];

        foreach ($translations as $locale => $data) {
            VideoSectionTranslation::create([
                'video_section_id' => $videoSection->id,
                'locale'           => $locale,
                'title'            => $data['title'],
                'video_title'      => $data['video_title'],
            ]);
        }
    }
}
