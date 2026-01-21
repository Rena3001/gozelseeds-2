<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ServiceProvidingQuality;
use App\Models\ServiceProvidingQualityItem;
use App\Models\ServiceProvidingQualityItemTranslation;
use Illuminate\Support\Facades\DB;

class ServiceProvidingQualitySeeder extends Seeder
{
    public function run(): void
    {
        /* =========================
         | MAIN SECTION (ID = 1)
         ========================= */
        $section = ServiceProvidingQuality::create([
            'id'         => 1,
            'bg_image'   => 'providing-quality/providing-quality-one-bg.png',
            'main_image' => 'providing-quality/providing-quality-v1-img.jpg',
            'logo_image' => 'providing-quality/providing-quality.png',
            'is_active'  => true,
            'order'      => 1,
        ]);

        /* =========================
         | TRANSLATIONS
         | ⚠️ TABLE NAME FIXED
         ========================= */
        $translations = [
            'az' => [
                'tagline' => 'Müasir Kənd Təsərrüfatı',
                'title'   => 'Yüksək Keyfiyyətli<br>Məhsullar Təqdim Edirik',
            ],
            'en' => [
                'tagline' => 'Modern Agriculture',
                'title'   => 'Providing High Quality<br>Products',
            ],
            'ru' => [
                'tagline' => 'Современное сельское хозяйство',
                'title'   => 'Высококачественная<br>Продукция',
            ],
        ];

        foreach ($translations as $locale => $data) {
            DB::table('service_providing_translations')->insert([
                'service_providing_id' => $section->id,
                'locale'  => $locale,
                'tagline' => $data['tagline'],
                'title'   => $data['title'],
            ]);
        }

        /* =========================
         | ITEM 1
         ========================= */
        $item1 = ServiceProvidingQualityItem::create([
            'service_providing_quality_id' => $section->id,
            'icon_class' => 'icon-agriculture',
            'order'      => 1,
            'is_active'  => true,
        ]);

        $item1Translations = [
            'az' => [
                'title' => 'Sağlam Qidalar',
                'text'  => 'Təbii və keyfiyyətli kənd təsərrüfatı məhsulları.',
            ],
            'en' => [
                'title' => 'Healthy Foods',
                'text'  => 'Natural and high-quality agricultural products.',
            ],
            'ru' => [
                'title' => 'Здоровое питание',
                'text'  => 'Натуральные и качественные сельхозпродукты.',
            ],
        ];

        foreach ($item1Translations as $locale => $data) {
            ServiceProvidingQualityItemTranslation::create([
                'service_providing_quality_item_id' => $item1->id,
                'locale' => $locale,
                'title'  => $data['title'],
                'text'   => $data['text'],
            ]);
        }

        /* =========================
         | ITEM 2
         ========================= */
        $item2 = ServiceProvidingQualityItem::create([
            'service_providing_quality_id' => $section->id,
            'icon_class' => 'icon-farm',
            'order'      => 2,
            'is_active'  => true,
        ]);

        $item2Translations = [
            'az' => [
                'title' => 'Davamlı İnkişaf',
                'text'  => 'Kənd təsərrüfatında davamlı inkişaf strategiyaları.',
            ],
            'en' => [
                'title' => 'Agriculture Growth',
                'text'  => 'Sustainable growth in agriculture sector.',
            ],
            'ru' => [
                'title' => 'Рост сельского хозяйства',
                'text'  => 'Устойчивое развитие аграрного сектора.',
            ],
        ];

        foreach ($item2Translations as $locale => $data) {
            ServiceProvidingQualityItemTranslation::create([
                'service_providing_quality_item_id' => $item2->id,
                'locale' => $locale,
                'title'  => $data['title'],
                'text'   => $data['text'],
            ]);
        }
    }
}
