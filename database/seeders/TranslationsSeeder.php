<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Translation;

class TranslationsSeeder extends Seeder
{
    public function run(): void
    {
        $translations = [

            // ======================
            // FOOTER - ABOUT
            // ======================
            [
                'group' => 'footer',
                'key'   => 'about_text',
                'values' => [
                    'az' => 'Keyfiyyətli məhsullar və etibarlı xidmət ilə yanınızdayıq.',
                    'en' => 'We are by your side with quality products and reliable service.',
                    'ru' => 'Мы рядом с вами, предлагая качественную продукцию и надежный сервис.',
                ],
            ],

            // ======================
            // FOOTER - BLOGS
            // ======================
            [
                'group' => 'footer',
                'key'   => 'blogs',
                'values' => [
                    'az' => 'Bloqlar',
                    'en' => 'Blogs',
                    'ru' => 'Блоги',
                ],
            ],

            // ======================
            // FOOTER - EXPLORE
            // ======================
            [
                'group' => 'footer',
                'key'   => 'explore',
                'values' => [
                    'az' => 'Kəşf et',
                    'en' => 'Explore',
                    'ru' => 'Навигация',
                ],
            ],

            // ======================
            // FOOTER LINKS
            // ======================
            [
                'group' => 'footer.links',
                'key'   => 'products',
                'values' => [
                    'az' => 'Məhsullar',
                    'en' => 'Products',
                    'ru' => 'Продукция',
                ],
            ],
            [
                'group' => 'footer.links',
                'key'   => 'services',
                'values' => [
                    'az' => 'Xidmətlər',
                    'en' => 'Services',
                    'ru' => 'Услуги',
                ],
            ],
            [
                'group' => 'footer.links',
                'key'   => 'about',
                'values' => [
                    'az' => 'Haqqımızda',
                    'en' => 'About Us',
                    'ru' => 'О нас',
                ],
            ],
            [
                'group' => 'footer.links',
                'key'   => 'contact',
                'values' => [
                    'az' => 'Əlaqə',
                    'en' => 'Contact',
                    'ru' => 'Контакты',
                ],
            ],

            // ======================
            // FOOTER - NEWSLETTER
            // ======================
            [
                'group' => 'footer',
                'key'   => 'newsletter',
                'values' => [
                    'az' => 'Xəbər bülleteni',
                    'en' => 'Newsletter',
                    'ru' => 'Подписка',
                ],
            ],
            [
                'group' => 'footer',
                'key'   => 'newsletter_text',
                'values' => [
                    'az' => 'Yeniliklərdən xəbərdar olmaq üçün abunə olun.',
                    'en' => 'Subscribe to stay updated with our latest news.',
                    'ru' => 'Подпишитесь, чтобы быть в курсе наших новостей.',
                ],
            ],
            [
                'group' => 'footer',
                'key'   => 'email_placeholder',
                'values' => [
                    'az' => 'E-poçt ünvanınız',
                    'en' => 'Your email address',
                    'ru' => 'Ваш email',
                ],
            ],
            [
                'group' => 'footer',
                'key'   => 'go',
                'values' => [
                    'az' => 'Göndər',
                    'en' => 'Submit',
                    'ru' => 'Отправить',
                ],
            ],

            // ======================
            // FOOTER - COPYRIGHT
            // ======================
            [
                'group' => 'footer',
                'key'   => 'copyright',
                'values' => [
                    'az' => 'Bütün hüquqlar qorunur.',
                    'en' => 'All rights reserved.',
                    'ru' => 'Все права защищены.',
                ],
            ],

            // ======================
            // COMPANY NAME
            // ======================
            [
                'group' => 'company',
                'key'   => 'name',
                'values' => [
                    'az' => 'Sayt.az',
                    'en' => 'Sayt.az',
                    'ru' => 'Sayt.az',
                ],
            ],


            // ======================
            // HOME
            // ======================


            [
                'group' => 'watch',
                'key'   => 'video',
                'values' => [
                    'az' => 'Videoya bax',
                    'en' => 'Watch Video',
                    'ru' => 'Смотреть видео',
                ],
            ],

            // ======================
            // PROJECTS
            // ======================
            [
                'group' => 'recently',
                'key'   => 'work',
                'values' => [
                    'az' => 'Son işlərimiz',
                    'en' => 'Recent Work',
                    'ru' => 'Недавние проекты',
                ],
            ],
            [
                'group' => 'explore',
                'key'   => 'project',
                'values' => [
                    'az' => 'Layihələri kəşf et',
                    'en' => 'Explore Projects',
                    'ru' => 'Посмотреть проекты',
                ],
            ],

            // ======================
            // TESTIMONIALS
            // ======================
            [
                'group' => 'our_testimonials',
                'key'   => 'title',
                'values' => [
                    'az' => 'Müştəri rəyləri',
                    'en' => 'Our Testimonials',
                    'ru' => 'Отзывы клиентов',
                ],
            ],
            [
                'group' => 'testimonials',
                'key'   => 'desc',
                'values' => [
                    'az' => 'Müştərilərimizin bizim haqqımızda dedikləri',
                    'en' => 'What our clients say about us',
                    'ru' => 'Что говорят о нас наши клиенты',
                ],
            ],

            // ======================
            // BLOG
            // ======================
            [
                'group' => 'blog',
                'key'   => 'tagline',
                'values' => [
                    'az' => 'Bloq və yeniliklər',
                    'en' => 'Blog & News',
                    'ru' => 'Блог и новости',
                ],
            ],
            [
                'group' => 'blog',
                'key'   => 'title',
                'values' => [
                    'az' => 'Son yazılar',
                    'en' => 'Latest Articles',
                    'ru' => 'Последние статьи',
                ],
            ],

            // ======================
            // CONTACT – SECTION
            // ======================
            [
                'group' => 'contact',
                'key'   => 'with_us',
                'values' => [
                    'az' => 'Bizimlə əlaqə',
                    'en' => 'Contact With Us',
                    'ru' => 'Свяжитесь с нами',
                ],
            ],
            [
                'group' => 'contact',
                'key'   => 'desc',
                'values' => [
                    'az' => 'Suallarınız üçün bizimlə əlaqə saxlayın',
                    'en' => 'Get in touch with us for any questions',
                    'ru' => 'Свяжитесь с нами по любым вопросам',
                ],
            ],

            // ======================
            // CONTACT – FORM
            // ======================
            [
                'group' => 'contact',
                'key'   => 'name',
                'values' => [
                    'az' => 'Adınız',
                    'en' => 'Your Name',
                    'ru' => 'Ваше имя',
                ],
            ],
            [
                'group' => 'contact',
                'key'   => 'email',
                'values' => [
                    'az' => 'E-poçt ünvanı',
                    'en' => 'Email Address',
                    'ru' => 'Электронная почта',
                ],
            ],
            [
                'group' => 'contact',
                'key'   => 'message',
                'values' => [
                    'az' => 'Mesajınız',
                    'en' => 'Your Message',
                    'ru' => 'Ваше сообщение',
                ],
            ],
            [
                'group' => 'contact',
                'key'   => 'send',
                'values' => [
                    'az' => 'Göndər',
                    'en' => 'Send Message',
                    'ru' => 'Отправить',
                ],
            ],

            // ======================
            // services
            // ======================



            [
                'group' => 'page',
                'key'   => 'services_title',
                'values' => [
                    'az' => 'Xidmətlər',
                    'en' => 'Services',
                    'ru' => 'Услуги',
                ],
            ],

            [
                'group' => 'services',
                'key'   => 'tagline',
                'values' => [
                    'az' => 'Biz nə edirik',
                    'en' => 'What we’re doing',
                    'ru' => 'Чем мы занимаемся',
                ],
            ],

            [
                'group' => 'services',
                'key'   => 'default_title',
                'values' => [
                    'az' => 'Xidmət başlığı',
                    'en' => 'Service Title',
                    'ru' => 'Название услуги',
                ],
            ],

            [
                'group' => 'services',
                'key'   => 'default_text',
                'values' => [
                    'az' => 'Xidmətin qısa təsviri burada göstəriləcək.',
                    'en' => 'Service description goes here.',
                    'ru' => 'Краткое описание услуги будет здесь.',
                ],
            ],

            // ======================
            // services-detail
            // ======================

            [
                'group' => 'breadcrumb',
                'key'   => 'service-detail',
                'values' => [
                    'az' => 'Xidmət detalları',
                    'en' => 'Service Details',
                    'ru' => 'Детали услуги',
                ],
            ],

            [
                'group' => 'services',
                'key'   => 'need_this',
                'values' => [
                    'az' => 'Bu xidmətə ehtiyacınız var?',
                    'en' => 'Need this service?',
                    'ru' => 'Нужна эта услуга?',
                ],
            ],

            [
                'group' => 'services',
                'key'   => 'overview',
                'values' => [
                    'az' => 'Xidmət haqqında',
                    'en' => 'Service Overview',
                    'ru' => 'Об услуге',
                ],
            ],


            // ======================
            // PRODUCTS PAGE
            // ======================

            [
                'group' => 'product',
                'key'   => 'title',
                'values' => [
                    'az' => 'Məhsullar',
                    'en' => 'Products',
                    'ru' => 'Товары',
                ],
            ],

            [
                'group' => 'product',
                'key'   => 'search_placeholder',
                'values' => [
                    'az' => 'Məhsul axtar',
                    'en' => 'Search products',
                    'ru' => 'Поиск товара',
                ],
            ],

            [
                'group' => 'product',
                'key'   => 'categories',
                'values' => [
                    'az' => 'Kateqoriyalar',
                    'en' => 'Categories',
                    'ru' => 'Категории',
                ],
            ],

            [
                'group' => 'product',
                'key'   => 'search_results_for',
                'values' => [
                    'az' => 'Axtarış nəticələri',
                    'en' => 'Search results for',
                    'ru' => 'Результаты поиска по',
                ],
            ],

            [
                'group' => 'product',
                'key'   => 'results_found',
                'values' => [
                    'az' => 'nəticə tapıldı',
                    'en' => 'results found',
                    'ru' => 'найдено результатов',
                ],
            ],

            [
                'group' => 'product',
                'key'   => 'showing',
                'values' => [
                    'az' => 'Göstərilir',
                    'en' => 'Showing',
                    'ru' => 'Показано',
                ],
            ],

            [
                'group' => 'product',
                'key'   => 'of',
                'values' => [
                    'az' => '/',
                    'en' => 'of',
                    'ru' => 'из',
                ],
            ],

            [
                'group' => 'product',
                'key'   => 'results',
                'values' => [
                    'az' => 'nəticə',
                    'en' => 'results',
                    'ru' => 'результатов',
                ],
            ],

            [
                'group' => 'product',
                'key'   => 'no_search_results',
                'values' => [
                    'az' => 'uyğun məhsul tapılmadı',
                    'en' => 'no products found',
                    'ru' => 'товары не найдены',
                ],
            ],

            [
                'group' => 'product',
                'key'   => 'no_products',
                'values' => [
                    'az' => 'Məhsul tapılmadı',
                    'en' => 'No products available',
                    'ru' => 'Товары отсутствуют',
                ],
            ],




            // ======================
            // PRODUCT DETAILS PAGE
            // ======================

            [
                'group' => 'breadcrumb',
                'key'   => 'products',
                'values' => [
                    'az' => 'Məhsullar',
                    'en' => 'Products',
                    'ru' => 'Товары',
                ],
            ],

            [
                'group' => 'product',
                'key'   => 'category',
                'values' => [
                    'az' => 'Kateqoriya',
                    'en' => 'Category',
                    'ru' => 'Категория',
                ],
            ],

            [
                'group' => 'product',
                'key'   => 'description',
                'values' => [
                    'az' => 'Məhsul haqqında',
                    'en' => 'Product Description',
                    'ru' => 'Описание продукта',
                ],
            ],
            // ======================
            // CONTACT PAGE (ONLY MISSING)
            // ======================

            [
                'group' => 'breadcrumb',
                'key'   => 'contact',
                'values' => [
                    'az' => 'Əlaqə',
                    'en' => 'Contact',
                    'ru' => 'Контакты',
                ],
            ],

            [
                'group' => 'contact',
                'key'   => 'title',
                'values' => [
                    'az' => 'Bizimlə əlaqə',
                    'en' => 'Contact Us',
                    'ru' => 'Свяжитесь с нами',
                ],
            ],

            [
                'group' => 'getin',
                'key'   => 'touch',
                'values' => [
                    'az' => 'Əlaqə saxlayın',
                    'en' => 'Get In Touch',
                    'ru' => 'Связаться с нами',
                ],
            ],
            // ======================
            // BLOGS PAGE (ONLY MISSING)
            // ======================

            [
                'group' => 'breadcrumb',
                'key'   => 'blogs',
                'values' => [
                    'az' => 'Bloqlar',
                    'en' => 'Blogs',
                    'ru' => 'Блоги',
                ],
            ],

            [
                'group' => 'blogs',
                'key'   => 'title',
                'values' => [
                    'az' => 'Bloqlar',
                    'en' => 'Blogs',
                    'ru' => 'Блоги',
                ],
            ],
            // ======================
            // BLOG DETAILS (ONLY MISSING)
            // ======================

            [
                'group' => 'blog',
                'key'   => 'search',
                'values' => [
                    'az' => 'Bloqda axtar',
                    'en' => 'Search blog',
                    'ru' => 'Поиск по блогу',
                ],
            ],

            [
                'group' => 'blog',
                'key'   => 'latest_posts',
                'values' => [
                    'az' => 'Son yazılar',
                    'en' => 'Latest Posts',
                    'ru' => 'Последние записи',
                ],
            ],
            // ======================
            // ABOUT PAGE (ONLY MISSING)
            // ======================

            [
                'group' => 'breadcrumb',
                'key'   => 'about',
                'values' => [
                    'az' => 'Haqqımızda',
                    'en' => 'About Us',
                    'ru' => 'О нас',
                ],
            ],

            [
                'group' => 'about',
                'key'   => 'title',
                'values' => [
                    'az' => 'Haqqımızda',
                    'en' => 'About Us',
                    'ru' => 'О компании',
                ],
            ],




        ];

        foreach ($translations as $item) {
            foreach ($item['values'] as $locale => $value) {
                Translation::updateOrCreate(
                    [
                        'group'  => $item['group'],
                        'key'    => $item['key'],
                        'locale' => $locale,
                    ],
                    [
                        'value' => $value,
                    ]
                );
            }
        }
    }
}
