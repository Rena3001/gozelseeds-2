<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Partner;

class PartnerSeeder extends Seeder
{
    public function run(): void
    {
        Partner::insert([
            [
                'logo' => 'partners/logo1.png',
                'url' => 'https://partner1.com',
                'order' => 1,
                'is_active' => true,
            ],
            [
                'logo' => 'partners/logo2.png',
                'url' => 'https://partner2.com',
                'order' => 2,
                'is_active' => true,
            ],
        ]);
    }
}
