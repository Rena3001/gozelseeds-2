<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Vacancy;
use App\Models\VacancyTranslation;
use Carbon\Carbon;

class VacancySeeder extends Seeder
{
    public function run(): void
    {
        // ============================================
        // VACANCY 1
        // ============================================

        $vacancy1 = Vacancy::create([
            'salary' => '1500 - 2000 AZN',
            'deadline' => Carbon::now()->addDays(20),
            'email' => 'hr@company.az',
            'is_active' => true,
            'order' => 1,
        ]);

        VacancyTranslation::insert([

            // AZ
            [
                'vacancy_id' => $vacancy1->id,
                'locale' => 'az',
                'title' => 'Satış Meneceri',
                'description' => 'Şirkətimiz üçün təcrübəli Satış Meneceri axtarırıq.',
                'requirements' => 'Satış sahəsində minimum 2 il təcrübə.',
                'location' => 'Bakı',
                'category' => 'Satış',
                'employment_type' => 'Tam ştat',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // EN
            [
                'vacancy_id' => $vacancy1->id,
                'locale' => 'en',
                'title' => 'Sales Manager',
                'description' => 'We are looking for an experienced Sales Manager.',
                'requirements' => 'Minimum 2 years of experience in sales.',
                'location' => 'Baku',
                'category' => 'Sales',
                'employment_type' => 'Full-time',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // RU
            [
                'vacancy_id' => $vacancy1->id,
                'locale' => 'ru',
                'title' => 'Менеджер по продажам',
                'description' => 'Мы ищем опытного менеджера по продажам.',
                'requirements' => 'Минимум 2 года опыта в продажах.',
                'location' => 'Баку',
                'category' => 'Продажи',
                'employment_type' => 'Полная занятость',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);


        // ============================================
        // VACANCY 2
        // ============================================

        $vacancy2 = Vacancy::create([
            'salary' => '1000 - 1400 AZN',
            'deadline' => Carbon::now()->addDays(15),
            'email' => 'career@company.az',
            'is_active' => true,
            'order' => 2,
        ]);

        VacancyTranslation::insert([

            [
                'vacancy_id' => $vacancy2->id,
                'locale' => 'az',
                'title' => 'Marketinq Mütəxəssisi',
                'description' => 'Marketinq strategiyalarının hazırlanması və icrası.',
                'requirements' => 'Digital marketinq üzrə biliklər.',
                'location' => 'Bakı',
                'category' => 'Marketinq',
                'employment_type' => 'Tam ştat',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'vacancy_id' => $vacancy2->id,
                'locale' => 'en',
                'title' => 'Marketing Specialist',
                'description' => 'Development and execution of marketing strategies.',
                'requirements' => 'Knowledge of digital marketing.',
                'location' => 'Baku',
                'category' => 'Marketing',
                'employment_type' => 'Full-time',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'vacancy_id' => $vacancy2->id,
                'locale' => 'ru',
                'title' => 'Специалист по маркетингу',
                'description' => 'Разработка и реализация маркетинговых стратегий.',
                'requirements' => 'Знание цифрового маркетинга.',
                'location' => 'Баку',
                'category' => 'Маркетинг',
                'employment_type' => 'Полная занятость',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
