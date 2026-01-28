<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenuTranslationSeeder extends Seeder
{
    public function run(): void
    {
        $translations = [
            // ABOUT
            ['group' => 'menu', 'key' => 'about', 'locale' => 'az', 'value' => 'Haqqımızda'],
            ['group' => 'menu', 'key' => 'about', 'locale' => 'en', 'value' => 'About Us'],
            ['group' => 'menu', 'key' => 'about', 'locale' => 'ru', 'value' => 'О нас'],

            // SERVICES
            ['group' => 'menu', 'key' => 'services', 'locale' => 'az', 'value' => 'Xidmətlər'],
            ['group' => 'menu', 'key' => 'services', 'locale' => 'en', 'value' => 'Services'],
            ['group' => 'menu', 'key' => 'services', 'locale' => 'ru', 'value' => 'Услуги'],

            // PRODUCTS
            ['group' => 'menu', 'key' => 'products', 'locale' => 'az', 'value' => 'Məhsullar'],
            ['group' => 'menu', 'key' => 'products', 'locale' => 'en', 'value' => 'Products'],
            ['group' => 'menu', 'key' => 'products', 'locale' => 'ru', 'value' => 'Продукты'],

            // BLOGS
            ['group' => 'menu', 'key' => 'blogs', 'locale' => 'az', 'value' => 'Bloqlar'],
            ['group' => 'menu', 'key' => 'blogs', 'locale' => 'en', 'value' => 'Blogs'],
            ['group' => 'menu', 'key' => 'blogs', 'locale' => 'ru', 'value' => 'Блог'],

            // CONTACT
            ['group' => 'menu', 'key' => 'contact', 'locale' => 'az', 'value' => 'Əlaqə'],
            ['group' => 'menu', 'key' => 'contact', 'locale' => 'en', 'value' => 'Contact'],
            ['group' => 'menu', 'key' => 'contact', 'locale' => 'ru', 'value' => 'Контакты'],
        ];

        foreach ($translations as $item) {
            DB::table('translations')->updateOrInsert(
                [
                    'group'  => $item['group'],
                    'key'    => $item['key'],
                    'locale' => $item['locale'],
                ],
                [
                    'value' => $item['value'],
                ]
            );
        }
    }
}
