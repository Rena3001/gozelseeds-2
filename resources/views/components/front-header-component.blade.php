<header class="main-header main-header--one clearfix">
    <div class="main-header--one__wrapper">
        <div class="main-header--one__top clearfix">
            <div class="auto-container">

                <div class="main-header--one__top-left">
                    <div class="text">
                        <p>{{ __('welcome.theme') }}</p>
                    </div>

                    <div class="social-link clearfix">
                        <ul>
                            <li><a href="{{ $settings?->facebook ?? '#' }}"><i class="fab fa-facebook"></i></a></li>
                            <li><a href="{{ $settings?->instagram ?? '#' }}"><i class="fab fa-instagram"></i></a></li>
                            <li><a href="{{ $settings?->youtube ?? '#' }}"><i class="fab fa-youtube"></i></a></li>
                            <li><a href="{{ $settings?->tiktok ?? '#' }}"><i class="fab fa-tiktok"></i></a></li>
                            <li><a href="{{ $settings?->linkedin ?? '#' }}"><i class="fab fa-linkedin"></i></a></li>
                            <li><a href="{{ $settings?->telegram ?? '#' }}"><i class="fab fa-telegram"></i></a></li>
                            <li><a href="{{ $settings?->whatsapp ?? '#' }}"><i class="fab fa-whatsapp"></i></a></li>

                        </ul>
                    </div>
                </div>

                <div class="main-header--one__top-right clearfix">
                    <ul>
                        <li>
                            <div class="icon"><i class="fa fa-envelope"></i></div>
                            <div class="text">
                                <p>
                                    <a href="mailto:{{ $settings?->email ?? 'admin@admin.com' }}">
                                        {{ $settings?->email ?? 'admin@admin.com' }}
                                    </a>
                                </p>
                            </div>
                        </li>

                        <li>
                            <div class="icon"><i class="fa fa-clock"></i></div>
                            <div class="text">
                                <p>{{ __('working.hours') }}</p>
                            </div>
                        </li>
                    </ul>
                </div>

            </div>
        </div>

        <div class="main-header--one__bottom clearfix">
            <div class="auto-container">
                <div class="main-header--one__bottom-inner">

                    <nav class="main-menu main-menu--1">
                        <div class="main-menu__inner">
                            <a href="#" class="mobile-nav__toggler"><i class="fa fa-bars"></i></a>

                            <div class="stricky-one-logo">
                                <div class="logo">
                                    <a href="/{{ app()->getLocale() }}">
                                        <img class="dark-logo"
                                            src="{{ $settings?->logo_dark ? asset('storage/'.$settings->logo_dark) : 'https://via.placeholder.com/180x50?text=Logo' }}"
                                            alt="Logo">

                                        <img class="light-logo"
                                            src="{{ $settings?->logo_light ? asset('storage/'.$settings->logo_light) : 'https://via.placeholder.com/180x50?text=Logo' }}"
                                            alt="Logo">
                                    </a>
                                </div>
                            </div>

                            <div class="main-header--one__bottom-left">
                                <ul class="main-menu__list">
                                    <li><a href="/{{ app()->getLocale() }}">{{ __('menu.home') }}</a></li>
                                    <li><a href="{{ route('about', app()->getLocale()) }}">{{ __('menu.about') }}</a></li>
                                    <li><a href="{{ route('services', app()->getLocale()) }}">{{ __('menu.services') }}</a></li>
                                    <li><a href="{{ route('products', app()->getLocale()) }}">{{ __('menu.products') }}</a></li>
                                    <li><a href="{{ route('blogs', app()->getLocale()) }}">{{ __('menu.blogs') }}</a></li>
                                    <li><a href="{{ route('contact', app()->getLocale()) }}">{{ __('menu.contact') }}</a></li>
                                </ul>
                            </div>
                        </div>
                    </nav>

                    <div class="main-header--one__bottom-middel">
                        <div class="logo">
                            <a href="/{{ app()->getLocale() }}">
                                <img class="dark-logo"
                                    src="{{ $settings?->logo_dark ? asset('storage/'.$settings->logo_dark) : 'https://via.placeholder.com/180x50?text=Logo' }}"
                                    alt="Logo">

                                <img class="light-logo"
                                    src="{{ $settings?->logo_light ? asset('storage/'.$settings->logo_light) : 'https://via.placeholder.com/180x50?text=Logo' }}"
                                    alt="Logo">
                            </a>
                        </div>
                    </div>

                    <div class="main-header--one__bottom-right clearfix">
                        <div class="search-cart">
                            <a href="#" class="search search-toggler"><span class="fa fa-magnifying-glass"></span></a>
                            <!-- <a href="#" class="cart mini-cart__toggler"><span class="icon-shopping-cart"></span></a> -->
                        </div>

                        <div class="contact-box">
                            <div class="icon"><span class="fa fa-phone"></span></div>
                            <div class="text">
                                <p>{{ __('call.anytime') }}</p>
                                <a href="tel:{{ $settings?->phone ?? '123456789' }}">
                                    {{ $settings?->phone ?? '123456789' }}
                                </a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>
</header>