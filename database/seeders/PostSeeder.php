<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\PostTranslation;
use Carbon\Carbon;

class PostSeeder extends Seeder
{
    public function run(): void
    {
        /*
        |--------------------------------------------------------------------------
        | POST 1
        |--------------------------------------------------------------------------
        */
        $post1 = Post::create([
            'image' => 'blog/blog-v1-img1.jpg',
            'author' => 'Admin',
            'comments_count' => 2,
            'published_at' => Carbon::create(2024, 7, 30),
            'order' => 1,
            'is_active' => true,
        ]);

        PostTranslation::insert([
            [
                'post_id' => $post1->id,
                'locale' => 'az',
                'title' => 'Ətraf mühit üçün kənd təsərrüfatının rolu',
                'excerpt' => 'Davamlı kənd təsərrüfatı ətraf mühitin qorunmasında mühüm rol oynayır.',
                'content' => 'Davamlı kənd təsərrüfatı təbii resursların qorunmasına, torpağın münbitliyinin saxlanmasına və gələcək nəsillər üçün sağlam mühitin yaradılmasına kömək edir.',
            ],
            [
                'post_id' => $post1->id,
                'locale' => 'en',
                'title' => 'The Role of Agriculture for the Environment',
                'excerpt' => 'Sustainable agriculture plays a key role in environmental protection.',
                'content' => 'Sustainable agriculture helps preserve natural resources, maintain soil fertility, and create a healthy environment for future generations.',
            ],
            [
                'post_id' => $post1->id,
                'locale' => 'ru',
                'title' => 'Роль сельского хозяйства для окружающей среды',
                'excerpt' => 'Устойчивое сельское хозяйство играет важную роль в защите окружающей среды.',
                'content' => 'Устойчивое сельское хозяйство способствует сохранению природных ресурсов, плодородия почвы и здоровой среды для будущих поколений.',
            ],
        ]);

        /*
        |--------------------------------------------------------------------------
        | POST 2
        |--------------------------------------------------------------------------
        */
        $post2 = Post::create([
            'image' => 'blog/blog-v1-img2.jpg',
            'author' => 'Admin',
            'comments_count' => 0,
            'published_at' => Carbon::create(2024, 8, 5),
            'order' => 2,
            'is_active' => true,
        ]);

        PostTranslation::insert([
            [
                'post_id' => $post2->id,
                'locale' => 'az',
                'title' => 'Dayanıqlı inkişaf üçün aqrar strategiyalar',
                'excerpt' => 'Qalib-qalib strategiyalarla kənd təsərrüfatında davamlılıq.',
                'content' => 'Müasir aqrar strategiyalar məhsuldarlığı artırmaqla yanaşı, ekoloji tarazlığı qorumağı hədəfləyir.',
            ],
            [
                'post_id' => $post2->id,
                'locale' => 'en',
                'title' => 'Agricultural Strategies for Sustainable Development',
                'excerpt' => 'Win-win strategies for sustainability in agriculture.',
                'content' => 'Modern agricultural strategies aim to increase productivity while maintaining ecological balance.',
            ],
            [
                'post_id' => $post2->id,
                'locale' => 'ru',
                'title' => 'Аграрные стратегии устойчивого развития',
                'excerpt' => 'Выигрышные стратегии устойчивого сельского хозяйства.',
                'content' => 'Современные аграрные стратегии направлены на повышение продуктивности при сохранении экологического баланса.',
            ],
        ]);
    }
}
