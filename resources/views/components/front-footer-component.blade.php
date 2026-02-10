 @php
 use App\Models\Translation;
 $locale = app()->getLocale();
 @endphp
 <!--Start Footer One-->
 <footer class="footer-one">
     <div class="footer-one__top">
         <div class="container">
             <div class="row">
                 <div class="col-xl-12">
                     <div class="footer-one__top-wrapper">
                         <div class="footer-one__bg"><img src="assets/images/backgrounds/footer-one-bg.png" alt=""></div>
                         <div class="row">
                             <!--Start Footer Widget Column-->
                             <div class="col-xl-3 col-lg-6 col-md-6 wow animated fadeInUp" data-wow-delay="0.1s">
                                 <div class="footer-widget__column footer-widget__about">
                                     <div class="footer-widget__about-logo">
                                         <a href="/{{ app()->getLocale() }}"><img src="{{ $settings?->logo_light ? asset('storage/'.$settings->logo_light) : 'https://via.placeholder.com/180x50?text=Logo' }}" alt=""></a>
                                     </div>
                                     <!-- <p class="footer-widget__about-text">
                                         {{ __('footer.about_text') }}
                                     </p> -->

                                     <div class="footer-widget__about-contact-box">
                                         <p class="phone">
                                             <a href="tel:{{ $settings?->phone ?? '123456789' }}">
                                                 <i class="fas fa-phone-square-alt"></i>{{ $settings?->phone ?? '123456789' }}
                                             </a>
                                         </p>
                                         <p>
                                             <a href="mailto:{{ $settings?->email ?? 'admin@admin.com' }}">
                                                 <i class="fa fa-envelope"></i>{{ $settings?->email ?? 'admin@admin.com' }}
                                             </a>
                                         </p>
                                         <p class="text"><i class="fas fa-map-marker-alt"></i> {{ $settings?->translation?->address }}</p>
                                         <p class="text"><i class="fas fa-map-marker-alt"></i> {{ $settings?->translation?->address_turkey }}</p>
                                         <p class="text"><i class="fas fa-map-marker-alt"></i> {{ $settings?->translation?->address_spain }}</p>
                                         <p class="text"><i class="fas fa-map-marker-alt"></i> {{ $settings?->translation?->address_uzbekistan }}</p>


                                     </div>
                                 </div>
                             </div>
                             <!--End Footer Widget Column-->

                             <!--Start Footer Widget Column-->
                             <div class="col-xl-3 col-lg-6 col-md-6 wow animated fadeInUp" data-wow-delay="0.3s">
                                 <div class="footer-widget__column footer-widget__news">
                                     <h2 class="footer-widget__title">{{ __('footer.blogs') }}</h2>
                                     <ul class="footer-widget__news-list">
                                         @foreach($footerPosts as $post)
                                         <li class="footer-widget__news-list-item">
                                             <!-- <div class="footer-widget__news-list-item-img">
                                                 <img src="{{ asset('storage/'.$post->image) }}" alt="">
                                             </div> -->
                                             <div class="footer-widget__news-list-item-title">
                                                 <p>{{ $post->published_at?->format('d M, Y') }}</p>
                                                 <h5>
                                                     <a href="{{ route('blogs.show', ['locale'=>app()->getLocale(), 'post'=>$post->id]) }}">
                                                         {{ $post->translation?->title }}
                                                     </a>
                                                 </h5>
                                             </div>
                                         </li>
                                         @endforeach
                                     </ul>
                                 </div>
                             </div>
                             <!--End Footer Widget Column-->

                             <!--Start Footer Widget Column-->
                             <div class="col-xl-2 col-lg-6 col-md-6 wow animated fadeInUp" data-wow-delay="0.5s">
                                 <div class="footer-widget__column footer-widget__explore">
                                     <h2 class="footer-widget__title">{{ __('footer.explore') }}</h2>
                                     <ul class="footer-widget__explore-list">
                                         <li><a href="{{ route('products', app()->getLocale()) }}">{{ __('footer.links.products') }}</a></li>
                                         <li><a href="{{ route('news', app()->getLocale()) }}">{{ __('menu.news') }}</a></li>

                                         <li><a href="{{ $settings->catalog_link }}">{{ __('footer.links.services') }}</a></li>
                                         <li><a href="{{ route('about', app()->getLocale()) }}">{{ __('footer.links.about') }}</a></li>
                                         <li><a href="{{ route('contact', app()->getLocale()) }}">{{ __('footer.links.contact') }}</a></li>
                                     </ul>
                                 </div>
                             </div>
                             <!--End Footer Widget Column-->

                             <!--Start Footer Widget Column-->
                             <div class="col-xl-4 col-lg-6 col-md-6 wow animated fadeInUp" data-wow-delay="0.7s">
                                 <div class="footer-widget__column footer-widget__newletter">
                                     <h2 class="footer-widget__title">{{ __('footer.newsletter') }}</h2>
                                     <p>{{ __('footer.newsletter_text') }}</p>

                                     <form class="subscribe-form" action="{{ route('subscribe.store', app()->getLocale()) }}" method="POST">
                                         @csrf
                                         <input type="email" name="email" placeholder="{{ __('footer.email_placeholder') }}" required>
                                         <button type="submit">{{__('footer.go')}}</button>
                                     </form>


                                     <div class="footer-widget__about-logo azerbaijan-logo">
                                         <img src="{{asset('/storage/' . $settings?->az_logo)}}" alt="">
                                     </div>
                                 </div>
                             </div>
                             <!--End Footer Widget Column-->
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>


     <!--Start Footer One Bottom-->
     <div class="footer-one__bottom">
         <div class="container">
             <div class="row">
                 <div class="col-xl-12">
                     <div class="footer-one__bottom-inner">
                         <div class="footer-one__bottom-text">
                             <p>&copy; {{__('footer.copyright')}} <a href="{{ $settings?->copyright_link }}">{{__('company.name')}}</a></p>
                         </div>
                         <div class="footer-one__bottom-social-links">
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
                 </div>
             </div>
         </div>
     </div>
     <!--End Footer One Bottom-->
 </footer>
 <!--End Footer One-->