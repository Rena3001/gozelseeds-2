<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ContactSection;
use App\Models\ContactSectionTranslation;

class ContactSectionSeeder extends Seeder
{
    public function run(): void
    {
        /*
        |--------------------------------------------------------------------------
        | CONTACT SECTION (1 RECORD)
        |--------------------------------------------------------------------------
        */
        $section = ContactSection::create([
            'image_1' => 'contact/contact-1-1.png',
            'image_2' => 'contact/contact-1-2.png',
            'is_active' => true,
        ]);

        /*
        |--------------------------------------------------------------------------
        | TRANSLATIONS (AZ / EN / RU)
        |--------------------------------------------------------------------------
        */
        ContactSectionTranslation::insert([
            [
                'contact_section_id' => $section->id,
                'locale' => 'az',
                'text' => 'Bizimlə əlaqə saxlayaraq suallarınızı və təkliflərinizi rahatlıqla göndərə bilərsiniz.',
                'list_1' => 'Onlayn müraciət üçün sürətli və rahat forma',
                'list_2' => 'Peşəkar komandamız sizə qısa zamanda cavab verir',
                'list_3' => 'Bütün müraciətlər diqqətlə dəyərləndirilir',
            ],
            [
                'contact_section_id' => $section->id,
                'locale' => 'en',
                'text' => 'You can easily contact us to send your questions and suggestions.',
                'list_1' => 'Fast and convenient online contact form',
                'list_2' => 'Our professional team responds quickly',
                'list_3' => 'All inquiries are carefully reviewed',
            ],
            [
                'contact_section_id' => $section->id,
                'locale' => 'ru',
                'text' => 'Вы можете легко связаться с нами, чтобы отправить свои вопросы и предложения.',
                'list_1' => 'Быстрая и удобная онлайн-форма',
                'list_2' => 'Наша профессиональная команда быстро отвечает',
                'list_3' => 'Все обращения тщательно рассматриваются',
            ],
        ]);
    }
}
