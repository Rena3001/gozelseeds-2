@extends('client.layout.master')
@section('page_title', 'About us')

@section('content')
@php
use App\Models\Translation;
$locale = app()->getLocale();

@endphp


<!--Page Header Start-->
<section class="page-header clearfix" style="background-image:url({{ asset('storage/'.$page->header_bg) }})">
    <div class="container">
        <div class="page-header__inner text-center clearfix">
            <ul class="thm-breadcrumb">
                <li><a href="/{{ app()->getLocale() }}">{{ __('breadcrumb.home') }}</a></li>
                <li>{{ __('breadcrumb.about') }}</li>
            </ul>
            <h2>{{ __('about.title') }}</h2>
        </div>
    </div>
</section>
<!--Page Header End-->

<!--About Three Start-->
<section class="about-three">
    <div class="about-three__shape"></div><!-- /.about-three__shape -->
    <div class="container">
        <div class="row">
            <!--Start About Three Content Box-->
            <div class="col-xl-6 col-lg-7">
                <div class="about-three__content-box">
                    <div class="sec-title">
                        <div class="icon">
                            <img src="{{$page->header_bg}}" alt="">
                        </div>
                        <span class="sec-title__tagline">
                            {{ $page->translation->tagline }}
                        </span>

                        <h2 class="sec-title__title">
                            {{ $page->translation->content_title }}
                        </h2>
                    </div>
                    <div class="about-three__content-box-inner">
                        <h2>{{ $page->translation->subtitle }}</h2>
                        <p>{{ $page->translation->description }}</p>


                        <div class="about-three__products-list">
                            <ul>
                                <li>
                                   
                                    <h3>{{ $page->translation->feature_1_title }}</h3>
                                    <p>{{ $page->translation->feature_1_text }}</p>
                                </li>

                                <li>
                                    
                                    <h3>{{ $page->translation->feature_2_title }}</h3>
                                    <p>{{ $page->translation->feature_2_text }}</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="about-three__content-box-btn">
                        <a href="{{ route('services', app()->getLocale()) }}" class="thm-btn">{{__('discover.more')}}</a>
                    </div>
                    <div class="about-three__arrow float-bob-y"></div><!-- /.about-three__arrow -->
                </div>
            </div>
            <!--End About Three Content Box-->

            <!--Start About Three Img Box-->
            <div class="col-xl-6 col-lg-5">
                <div class="about-three__img-box">
                    <img src="{{ asset('storage/'.$page->image_icon) }}" class="about-three__img-icon" alt="">
                    <div class="about-three__img-box-img">
                        <div class="about-three__img-box-img-inner">
                            <img src="{{ asset('storage/'.$page->image_main) }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
            <!--End About Three Img Box-->
        </div>
    </div>
</section>
<!--About Three End-->


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

<!--Video One Start-->
<section class="video-one jarallax clearfix" data-jarallax="" data-speed="0.2" data-imgposition="50% 0%" style="background-image: url({{ asset('storage/'.$videoSection?->background_image) }})">
    <div class="video-one-border"></div>
    <div class="video-one-border video-one-border-two"></div>
    <div class="video-one-border video-one-border-three"></div>
    <div class="video-one-border video-one-border-four"></div>
    <div class="video-one-border video-one-border-five"></div>
    <div class="video-one-border video-one-border-six"></div>

    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="video-one__wrpper">
                    <div class="video-one__left">
                        <div class="video-one__leaf"></div><!-- /.video-one__leaf -->
                        <h2 class="video-one__title">{!! $videoSection->translation?->title
                            ?? 'Agriculture Matters to <br>the Future of Development' !!}
                        </h2>
                        <div class="video-one__btn">
                            <a href="{{ $videoSection->button_url ?? '#' }}" class="thm-btn">{{__('discover.more')}}</a>
                        </div>
                    </div>
                    <div class="video-one__right">
                        <div class="icon wow zoomIn" data-wow-delay="300ms" data-wow-duration="1500ms">
                            <a class="video-popup" title=" Video" href="{{ $videoSection->video_url ?? '#' }}">
                                <span class="fa fa-play"></span>
                            </a>
                            <span class="border-animation border-1"></span>
                            <span class="border-animation border-2"></span>
                            <span class="border-animation border-3"></span>
                        </div>
                        <div class="title">
                            <h2>{{__('watch.video')}}</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--Video One End-->


<!--Testimonials One Start-->
<section class="testimonials-one jarallax clearfix" data-jarallax="" data-speed="0.2" data-imgposition="50% 0%" style="background-image: url({{asset('assets/images/backgrounds/Testimonials-v1-bg.jpg')}}">
    <div class="container">
        <div class="row">
            <!--Start Testimonials One Left-->
            <div class="col-xl-4">
                <div class="testimonials-one__left">
                    <div class="testimonials-one__left-bg"></div>
                    <div class="sec-title">
                        <div class="icon">
                            <img src="{{ $settings?->logo_light ? asset('storage/'.$settings->logo_light) : 'https://via.placeholder.com/180x50?text=Logo' }}" alt="">
                        </div>
                        <span class="sec-title__tagline">{{__('our.testimonials')}}</span>
                        <h2 class="sec-title__title">{{__('testimonials.desc')}}</h2>
                    </div>
                </div>
            </div>
            <!--End Testimonials One Left-->

            <!--Start Testimonials One Right-->
            <div class="col-xl-8">
                <div class="testimonials-one__right">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="testimonials-one__carousel owl-carousel owl-theme">
                                @foreach($testimonials as $testimonial)
                                @if($testimonial->translation)
                                <!--Start Single Testimonials One-->
                                <div class="testimonials-one__single">
                                    <p class="testimonials-one__single-text">{{ $testimonial->translation->comment }}</p>
                                    <div class="testimonials-one__single-client-info">
                                        <div class="testimonials-one__single-client-info-img">
                                            <div class="testimonials-one__single-client-info-img-inner">
                                                <img src="{{ asset('storage/'.$testimonial->image) }}" alt="">
                                            </div>
                                            <div class="icon">
                                                <span class="fa-solid fa-quote-right"></span>
                                            </div>
                                        </div>
                                        <div class="testimonials-one__single-client-info-title">
                                            <h4>{{ $testimonial->translation->name }}</h4>
                                            <p>{{ $testimonial->translation->position }}</p>
                                        </div>
                                    </div>
                                </div>
                                @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--End Testimonials One Right-->
        </div>
    </div>
</section>
<!--Testimonials One End-->



@endsection