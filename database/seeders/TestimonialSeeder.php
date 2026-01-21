<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Testimonials;
use App\Models\TestimonialTranslation;

class TestimonialSeeder extends Seeder
{
    public function run(): void
    {
        /*
        |--------------------------------------------------------------------------
        | TESTIMONIAL 1
        |--------------------------------------------------------------------------
        */
        $testimonial1 = Testimonials::create([
            'image' => 'testimonials/user1.jpg',
            'order' => 1,
            'is_active' => true,
        ]);

        TestimonialTranslation::insert([
            [
                'testimonial_id' => $testimonial1->id,
                'locale' => 'az',
                'name' => 'Elvin Məmmədov',
                'position' => 'Fermer',
                'comment' => 'Xidmətinizdən çox razı qaldım. Keyfiyyət və yanaşma əladır.',
            ],
            [
                'testimonial_id' => $testimonial1->id,
                'locale' => 'en',
                'name' => 'Elvin Mammadov',
                'position' => 'Farmer',
                'comment' => 'I am very satisfied with the service. Quality and approach are excellent.',
            ],
            [
                'testimonial_id' => $testimonial1->id,
                'locale' => 'ru',
                'name' => 'Эльвин Мамедов',
                'position' => 'Фермер',
                'comment' => 'Очень доволен сервисом. Отличное качество и подход.',
            ],
        ]);

        /*
        |--------------------------------------------------------------------------
        | TESTIMONIAL 2
        |--------------------------------------------------------------------------
        */
        $testimonial2 = Testimonials::create([
            'image' => 'testimonials/user2.jpg',
            'order' => 2,
            'is_active' => true,
        ]);

        TestimonialTranslation::insert([
            [
                'testimonial_id' => $testimonial2->id,
                'locale' => 'az',
                'name' => 'Nigar Əliyeva',
                'position' => 'Biznes sahibi',
                'comment' => 'Hər detal düşünülüb. Etibarlı və peşəkar komandadır.',
            ],
            [
                'testimonial_id' => $testimonial2->id,
                'locale' => 'en',
                'name' => 'Nigar Aliyeva',
                'position' => 'Business Owner',
                'comment' => 'Everything is well thought out. A reliable and professional team.',
            ],
            [
                'testimonial_id' => $testimonial2->id,
                'locale' => 'ru',
                'name' => 'Нигяр Алиева',
                'position' => 'Владелец бизнеса',
                'comment' => 'Все продумано до мелочей. Надежная и профессиональная команда.',
            ],
        ]);
    }
}
