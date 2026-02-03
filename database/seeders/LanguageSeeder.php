<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Language;

class LanguageSeeder extends Seeder
{
    public function run(): void
    {
        $languages = [
            [
                'code' => 'az',
                'label' => 'AZ',
                'name' => 'Azərbaycan',
                'flag' => 'https://flagcdn.com/az.svg',
                'order' => 1,
            ],
            [
                'code' => 'en',
                'label' => 'EN',
                'name' => 'English',
                // İngilis dili üçün GB flag istifadə olunur
                'flag' => 'https://flagcdn.com/gb.svg',
                'order' => 2,
            ],
            [
                'code' => 'ru',
                'label' => 'RU',
                'name' => 'Русский',
                'flag' => 'https://flagcdn.com/ru.svg',
                'order' => 3,
            ]
        ];

        foreach ($languages as $lang) {
            Language::updateOrCreate(
                ['code' => $lang['code']],
                array_merge($lang, ['is_active' => true])
            );
        }
    }
}
