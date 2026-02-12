 @extends('client.layout.master')
@section('title', __('menu.services'))


 @section('content')
 @php
 use App\Models\Translation;
 $locale = app()->getLocale();
 $icons = $services->pluck('icon')->toArray();
 @endphp

 <!--Page Header Start-->
 <section class="page-header clearfix" style="background-image:url({{ asset('storage/'.$page->header_bg) }});">
     <div class="container">
         <div class="page-header__inner text-center clearfix">
             <ul class="thm-breadcrumb">
                 <li><a href="index-main.html">{{ __('breadcrumb.home') }}</a></li>
                 <li>{{ __('breadcrumb.services') }}</li>
             </ul>
             <h2>
                 {!! $feature->translation?->title ?? __('services.title') !!}
             </h2>

         </div>
     </div>
 </section>
 <!--Page Header End-->

 <!--Features One Start xidmetler-->
 <section class="features-one features-one--services clearfix">
     <div class="container">
         <div class="row">

             @foreach($features as $feature)
             <div class="col-xl-4 col-lg-4 wow fadeInUp animated">

                 {{-- NORMAL CARD --}}
                 @if(!$feature->has_button)
                 <div class="features-one__single">
                     <div class="features-one__single-img">
                         <img src="{{ asset('storage/'.$feature->image) }}" alt="">

                         <div class="features-one__single-title text-center">
                             <h3>
                                 <a href="{{ route('service.show', [
    'locale' => app()->getLocale(),
    'slug'   => $feature->slug
]) }}">
                                     {!! $feature->translation?->title !!}
                                 </a>

                             </h3>
                         </div>
                     </div>

                     <a href="{{ route('service.show', [
    'locale' => app()->getLocale(),
    'slug'   => $feature->slug
]) }}" class="features-one__single__more">
                         <span class="fa fa-angle-right"></span>
                     </a>
                 </div>
                 @endif


                 {{-- STYLE 2 CARD (WITH BUTTON) --}}
                 @if($feature->has_button)
                 <div class="features-one__single style2 text-center">

                     @if($feature->background_image)
                     <div class="features-one__single-bg"
                         style="background-image: url({{ asset('storage/'.$feature->background_image) }});">
                     </div>
                     @endif

                     <div class="features-one__single-img">
                         <img src="{{ asset('storage/'.$feature->image) }}" alt="">
                     </div>

                     <div class="features-one__single-title text-center">
                         <h3>
                             <a href="{{ route('service.show', [
    'locale' => app()->getLocale(),
    'slug'   => $feature->slug
]) }}">
                                 {!! $feature->translation?->title !!}
                             </a>

                         </h3>
                     </div>


                     <div class="button">
                         <a href="{{ $feature->button_link ?? '#' }}" class="thm-btn">
                             {{ $feature->translation?->button_text ?? __('Discover More') }}
                         </a>
                     </div>
                 </div>
                 @endif

             </div>
             @endforeach

         </div>
     </div>
 </section>
 <!--Features One End-->


 <!--Company Logos One Start-->
 <section class="company-logos-one">
     <div class="container">
         <div class="thm-swiper__slider swiper-container" data-swiper-options='{"spaceBetween": 100, "slidesPerView": 5, "autoplay": { "delay": 5000 }, "breakpoints": {
                "0": {
                    "spaceBetween": 20,
                    "slidesPerView": 2
                },
                "375": {
                    "spaceBetween": 20,
                    "slidesPerView": 2
                },
                "575": {
                    "spaceBetween": 20,
                    "slidesPerView": 3
                },
                "767": {
                    "spaceBetween": 30,
                    "slidesPerView": 4
                },
                "991": {
                    "spaceBetween": 40,
                    "slidesPerView": 5
                },
                "1199": {
                    "spaceBetween": 40,
                    "slidesPerView": 5
                }
            }}'>
             <div class="swiper-wrapper">
                 @foreach($partners as $partner)
                 <div class="swiper-slide">
                     @if($partner->url)
                     <a href="{{ $partner->url }}" target="_blank" rel="nofollow noopener">
                         <img src="{{ asset('storage/'.$partner->logo) }}" alt="Partner logo">
                     </a>
                     @else
                     <img src="{{ asset('storage/'.$partner->logo) }}" alt="Partner logo">
                     @endif
                 </div>
                 @endforeach
             </div>
         </div>
     </div>
 </section>
 <!--Company Logos One End-->


 <!--Providing Quality One Start-->
 <section class="providing-quality-one clearfix">
     <div class="providing-quality-one__bg"><img src="{{ asset('storage/'.$section->bg_image) }}" alt=""></div>

     <div class="providing-quality-one__shape"></div><!-- /.providing-quality-one__shape -->

     <div class="container-fullwidth">
         <div class="row">
             <!--Start Providing Quality One Img-->
             <div class="col-xl-6 providing-quality-one__image-block clearfix">
                 <div class="providing-quality-one__image__line float-bob-y"></div>
                 <!-- /.providing-quality-one__image__line -->
                 <img src="{{ asset('storage/'.$section->main_image) }}" alt="">
                 <div class="providing-quality-one__logo">
                     <img src="{{ asset('storage/'.$section->logo_image) }}" alt="">
                 </div>
             </div>
             <!--End Providing Quality One Img-->

             <!--Start Providing Quality One Content Box-->
             <div class="col-xl-6">
                 <div class="providing-quality-one__content-box">
                     <div class="sec-title">
                         <div class="icon">
                             <img src="{{ $settings?->logo_dark ? asset('storage/'.$settings->logo_dark) : 'https://via.placeholder.com/180x50?text=Logo' }}" alt="">
                         </div>
                         <span class="sec-title__tagline">{{ $section->translation?->tagline }}</span>
                         <h2 class="sec-title__title">{!! nl2br($section->translation?->title) !!}</h2>
                     </div>

                     <ul class="providing-quality-one__content-box-list">
                         @foreach($section->items as $item)
                         <li class="providing-quality-one__content-box-list-item">
                             <div class="icon">
                                 <span class="{{ $item->icon_class }}"></span>
                             </div>
                             <div class="text">
                                 <h3>{{ $item->translation?->title }}</h3>
                                 <p>{{ $item->translation?->text }}</p>
                             </div>
                         </li>
                         @endforeach
                     </ul>
                 </div>
             </div>
             <!--End Providing Quality One Content Box-->
         </div>
     </div>
 </section>
 <!--Providing Quality One End-->

 <!--Kateqoriyalar start-->
 <section class="services-one">
     <div class="services-one__bg wow slideInDown"
         data-wow-delay="100ms"
         data-wow-duration="2500ms"></div>

     <div class="container">

         {{-- SECTION TITLE --}}
         <div class="sec-title text-center">
             <div class="icon">
                 <img src="{{ $settings?->logo_dark ? asset('storage/'.$settings->logo_dark) : 'https://via.placeholder.com/180x50?text=Logo' }}" alt="">
             </div>

             <span class="sec-title__tagline">
                 {{ $serviceSection->translation?->tagline ?? 'What we’re doing' }}
             </span>

             <h2 class="sec-title__title">
                 {{ $serviceSection->translation?->title }}
             </h2>
         </div>

         {{-- SERVICES LIST --}}
         <div class="row">
             @foreach($services as $service)
             <div class="col-xl-3 col-lg-6 wow fadeInUp"
                 data-wow-delay="{{ $loop->index * 100 }}ms"
                 data-wow-duration="1000ms">

                 <div class="services-one__single">

                     {{-- IMAGE --}}
                     <div class="services-one__single-img">
                         <div class="services-one__single-img-inner">
                             <img src="{{ asset('storage/'.$service->image) }}" alt="">
                         </div>
                     </div>

                     {{-- CONTENT --}}
                     <div class="services-one__single-content text-center">

                         <div class="services-one__single-img-icon">
                             <span class="{{ $service->icon }}"></span>
                         </div>



                         {{-- TITLE --}}
                         <h3>
                             <a href="{{ $service->link ?? '#' }}">
                                 {!! $service->translation?->title ?? 'Service Title' !!}
                             </a>
                         </h3>

                         {{-- TEXT --}}
                         <p>
                             {{ $service->translation?->text ?? 'Service description goes here.' }}
                         </p>

                         {{-- READ MORE --}}
                         <a href="{{ $service->link ?? '#' }}"
                             class="read-more-btn">
                             <span class="fa fa-angle-right"></span>
                         </a>

                     </div>
                 </div>
             </div>
             @endforeach
         </div>

     </div>
 </section>
 <!--Kateqoriyalar end-->

 @endsection