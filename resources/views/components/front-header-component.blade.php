 @php
 use App\Models\Translation;
 $locale = app()->getLocale();
 @endphp

 <header class="main-header main-header--one clearfix">
     <div class="main-header--one__wrapper">
         <div class="main-header--one__top clearfix">
             <div class="auto-container">

                 <div class="main-header--one__top-left">
                     <!-- <div class="text">
                         <p>{{ __('welcome.theme') }}</p>
                     </div> -->

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
                     <div class="language-switcher-select">
                         @php
                         $currentLang = $languages->firstWhere('code', app()->getLocale());
                         @endphp
                         <img src="{{ $currentLang->flag }}" class="lang-flag">

                         <select id="langSwitcher" class="lang-dropdown"
                             onchange="location.href=this.value">
                             @foreach($languages as $lang)

                             <option value="/{{ $lang->code }}{{ $cleanPath }}"

                                 {{ app()->getLocale() === $lang->code ? 'selected' : '' }}>
                                 <img src="{{ $currentLang->flag }}" class="lang-flag">

                                 {{ $lang->label }}
                             </option>
                             @endforeach
                         </select>
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
                                     <li><a href="{{ $settings->catalog_link }}" target="_blank">{{ __('menu.services') }}</a></li>
                                     <li class="menu-item-has-children">
                                         <a href="{{ route('products', app()->getLocale()) }}">
                                             {{ __('menu.products') }}
                                         </a>

                                         <ul class="sub-menu">
                                             @foreach($categories as $category)
                                             @if(is_null($category->parent_id))
                                             <li>
                                                 <a href="{{ route('shop.category', ['locale' => $locale,
                                            'slug'   => $category->slug]) }}">
                                                     {{ $category->translation?->title }}
                                                 </a>
                                             </li>
                                             @endif
                                             @endforeach
                                         </ul>

                                     </li>

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
                             <a href="javascript:void(0)" class="search search-toggler" id="headerSearchToggle">
                                 <span class="fa fa-magnifying-glass"></span>
                             </a>

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