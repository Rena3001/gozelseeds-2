@extends('client.layout.master')
@section('title', __('menu.home'))


@section('content')
@php
use App\Models\Translation;
$locale = app()->getLocale();
$icons = $services->pluck('icon')->toArray();

@endphp


<!--Main Slider Start-->
<section class="main-slider main-slider-one">
    <div class="swiper-container thm-swiper__slider" data-swiper-options='{"slidesPerView": 1, "loop": true, "effect": "fade", "pagination": {
            "el": "#main-slider-pagination",
            "type": "bullets",
            "clickable": true
            },
            "navigation": {
            "nextEl": "#main-slider__swiper-button-next",
            "prevEl": "#main-slider__swiper-button-prev"
            },
            "autoplay": {
            "delay": 7000
            }}'>

        <div class="swiper-wrapper">
            @foreach($sliders as $slider)
            <div class="swiper-slide">

                {{-- Background image --}}
                <div class="image-layer"
                    style="background-image: url({{
                $slider->image
                    ? asset('storage/'.$slider->image)
                    : asset('assets/images/backgrounds/main-slider-v1-1.jpg')
             }})">
                </div>

                <div class="image-layer-overlay"></div>

                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="main-slider-inner">

                                <div class="main-slider__content">

                                    {{-- Tagline --}}
                                    <span class="main-slider-tagline">
                                        {{ $slider->translation?->tagline
                                    ?? "We’re producing natural goods" }}
                                    </span>

                                    {{-- Title --}}
                                    <h2 class="main-slider__title">
                                        {!! $slider->translation?->title
                                        ?? 'Welcome to <br> Agriculture <span>
                                            <span class="leaf">
                                                <img src="'.asset('assets/images/resources/leaf.png').'" alt="">
                                            </span>Farm
                                        </span>' !!}
                                    </h2>

                                    {{-- Text --}}
                                    <p class="main-slider__text">
                                        {{ $slider->translation?->text
                                    ?? 'There are many of passages of lorem Ipsum, but
                                       the majority have suffered alteration in some form.' }}
                                    </p>

                                </div>

                                <!-- <div class="main-slider__button-box">
                                    <div class="arrow-icon">
                                        <img src="{{ asset('assets/images/icon/main-slider__button-arrow.png') }}" alt="">
                                    </div>

                                    {{-- Button --}}
                                    <a href="{{ $slider->button_url ?? '#' }}" class="thm-btn">
                                        {{ __('discover.more')}}
                                    </a>
                                </div> -->

                            </div>
                        </div>
                    </div>
                </div>

            </div>
            @endforeach

        </div>

        <!-- If we need navigation buttons -->
        <div class="swiper-pagination" id="main-slider-pagination"></div>

        <!-- <div class="main-slider__nav">
            <div class="swiper-button-prev" id="main-slider__swiper-button-prev">
                <span class="fa fa-angle-left"></span>
            </div>
            <div class="swiper-button-next" id="main-slider__swiper-button-next">
                <span class="fa fa-angle-left"></span>
            </div>
        </div> -->

    </div>
</section>
<!--Main Slider End-->


@php
/** @var \App\Models\AboutSection|null $about */
$about = $about ?? null;
$t = $about?->translation;
@endphp

<!--About One Start-->
<section class="about-one">


    <div class="container">
        <div class="row">

         <!--Start About One Content-->
            <div class="col-xl-6">
                <div class="about-one__content">

                    <div class="sec-title">
                        <!-- <div class="icon">
                            <img src="{{ $settings?->logo_dark ? asset('storage/'.$settings->logo_dark) : 'https://via.placeholder.com/180x50?text=Logo' }}" alt="">
                        </div> -->

                        <span class="sec-title__tagline">
                            {{ $t?->tagline ?? 'Our introduction' }}
                        </span>

                        <h2 class="sec-title__title">
                            {!! $t?->title ?? 'Pure Agriculture and <br>Organic Form' !!}
                        </h2>
                    </div>

                    <h2 class="about-one__content-title">
                        {{ $t?->subtitle ?? 'We’re Leader in Agriculture Market' }}
                    </h2>

                    <p class="about-one__content-text">
                        {{ $t?->text
                            ?? 'There are many variations of passages of available but the majority have suffered alteration in some form, by injected humour or randomised words even slightly believable.' }}
                    </p>

                    {{-- STATIK CHECKLIST (istəsən sonra admin-ə bağlayarıq) --}}
                    <!-- <ul class="about-one__content-list">

                        @forelse($about?->listItems as $item)
                        <li>
                            <div class="icon">
                                <i class="fa fa-check-circle"></i>
                            </div>
                            <div class="text">
                                <p>{{ $item->text }}</p>
                            </div>
                        </li>
                        @empty
                        {{-- FALLBACK (admin boşdursa) --}}
                        <li>
                            <div class="icon"><i class="fa fa-check-circle"></i></div>
                            <div class="text">
                                <p>Lorem Ipsum is not simply random text</p>
                            </div>
                        </li>
                        <li>
                            <div class="icon"><i class="fa fa-check-circle"></i></div>
                            <div class="text">
                                <p>If you are going to use a passage</p>
                            </div>
                        </li>
                        <li>
                            <div class="icon"><i class="fa fa-check-circle"></i></div>
                            <div class="text">
                                <p>Making this the first true generator on the Internet</p>
                            </div>
                        </li>
                        <li>
                            <div class="icon"><i class="fa fa-check-circle"></i></div>
                            <div class="text">
                                <p>Various versions have evolved over the years</p>
                            </div>
                        </li>
                        @endforelse

                    </ul> -->

                    <!-- Video Box -->
                    <!-- <div class="about-one__content-video-box">
                        <div class="about-one__content-video-box-img-wrapper">
                            <div class="about-one__content-video-box-img">

                                <img
                                    src="{{ $about?->video_image
                                            ? asset('storage/'. $videoSection?->background_image)
                                            : asset('assets/images/resources/about-v1-video-img.jpg') }}"
                                    alt="">

                                <div class="icon">
                                    <a class="video-popup wow zoomIn"
                                        data-wow-delay="300ms"
                                        data-wow-duration="1500ms"
                                        href="{{ $about?->video_url ?? 'https://www.youtube.com/watch?v=8DP4NgupAhI' }}">
                                        <span class="fa fa-play"></span>
                                    </a>
                                </div>

                            </div>
                        </div>

                        <div class="about-one__content-video-box-title">
                            <p>{{ $t?->video_text ?? 'Watch our video' }}</p>
                            <h3>{{ $t?->video_title ?? 'Tips for Ripening your Fruits' }}</h3>
                        </div>

                    </div> -->

                </div>
            </div>
            <!--End About One Content-->

            <!--Start About One Left-->
            <div class="col-xl-6">
                <div class="about-one__left">

                    <div class="about-one__left-img">
                        <div class="about-one__left-img-inner">
                            <img
                                src="{{ $about?->main_image
                                        ? asset('storage/'.$about->main_image)
                                        : asset('assets/images/about/about-v1-img1.jpg') }}"
                                alt="">
                        </div>
                    </div>


                </div>
            </div>
            <!--End About One Left-->
 

        </div>
    </div>
</section>
<!--About One End-->



<!--Features One Start xidmetler-->
<!-- <section class="features-one clearfix">
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
                                <a href="{{ $feature->link ?? '#' }}">
                                    {!! $feature->translation?->title !!}
                                </a>
                            </h3>
                        </div>
                    </div>

                    <a href="{{ $feature->link ?? '#' }}" class="features-one__single__more">
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
                            <a href="{{ $feature->link ?? '#' }}">
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
</section> -->
<!--Features One End-->


<!--Video One Start-->
<section class="video-one jarallax clearfix" data-jarallax="" data-speed="0.2" data-imgposition="50% 0%">
      <video class="video-bg__video" autoplay muted loop playsinline>
        <source src="{{ asset('storage/'.$videoSection?->background_image) }}" type="video/mp4">
        Your browser does not support the video tag.
    </video>
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





<!--Projects One Start xeberler-->
<!-- <section class="projects-one">
    <div class="auto-container">
        <div class="sec-title text-center">
            <div class="icon">
                <img src="{{ $settings?->logo_dark ? asset('storage/'.$settings->logo_dark) : 'https://via.placeholder.com/180x50?text=Logo' }}" alt="">
            </div>
            <span class="sec-title__tagline">{{__('recently.work')}}</span>
            <h2 class="sec-title__title">{{__('explore.project')}}</h2>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <div class="projects-one__carousel owl-carousel owl-theme owl-dot-type1">
                    @foreach($projects as $project)
                    <div class="projects-one__single wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms">
                        <div class="projects-one__single-img">
                            <img src="{{ asset('storage/'.$project->image) }}" alt="">
                            <div class="overlay-content">
                                <p>{{ $project->category }}</p>
                                <h3><a href="projects-details.html">{!! $project->translation?->title ?? 'Default title' !!}</a></h3>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</section> -->
<!--Projects One End-->

<!--Testimonials One Start-->
<!--
<section class="testimonials-one jarallax clearfix" data-jarallax="" data-speed="0.2" data-imgposition="50% 0%" style="background-image: url({{asset('assets/images/backgrounds/Testimonials-v1-bg.jpg')}}">
    <div class="container">
        <div class="row">
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
            <div class="col-xl-8">
                <div class="testimonials-one__right">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="testimonials-one__carousel owl-carousel owl-theme">
                                @foreach($testimonials as $testimonial)
                                @if($testimonial->translation)
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
        </div>
    </div>
</section>

-->
<!--Testimonials One End-->





<!--Blog One Start-->
<section class="blog-one">
    <div class="blog-one__bg wow slideInDown" data-wow-delay="100ms" data-wow-duration="2500ms"></div>
    
    <div class="container">
        <div class="sec-title text-center">
            <!-- <div class="icon">
                <img src="{{ $settings?->logo_dark ? asset('storage/'.$settings->logo_dark) : 'https://via.placeholder.com/180x50?text=Logo' }}" alt="">
            </div> -->
            <span class="sec-title__tagline">{{ __('blog.tagline') }}</span>
            <h2 class="sec-title__title">{{ __('blog.title') }}</h2>
        </div>
        <div class="row">
            @foreach($posts as $post)
            <!--Start Single Blog One-->
            <div class="col-xl-4 col-lg-4  wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
                <div class="blog-one__single">
                    <div class="blog-one__single-img">
                        <img src="{{ asset('storage/'.$post->image) }}" alt="">
                        <div class="date-box">
                            <span>{{ $post->published_at?->translatedFormat('d F, Y') }}
                            </span>
                        </div>
                        <div class="overlay-icon">
                            <a href="{{ route('blogs.show', ['locale' => $locale, 'post' => $post->slug]) }}">
                                <i class="fa-solid fa-plus"></i>
                            </a>

                        </div>
                    </div>

                    <div class="blog-one__single-content">

                        <h2><a href="{{ route('blogs.show', ['locale' => $locale, 'post' => $post->slug]) }}">{{ $post->translation->title }}</a></h2>
                    </div>
                </div>
            </div>
            <!--End Single Blog One-->
            @endforeach
        </div>
    </div>
</section>
<!--Blog One End-->



<!--Kateqoriyalar start-->
<section class="services-one">
    <div class="services-one__bg wow slideInDown"
        data-wow-delay="100ms"
        data-wow-duration="2500ms"></div>

    <div class="container">

        {{-- SECTION TITLE --}}
        <div class="sec-title text-center">
            <!-- <div class="icon">
                <img src="{{ $settings?->logo_dark ? asset('storage/'.$settings->logo_dark) : 'https://via.placeholder.com/180x50?text=Logo' }}" alt="">
            </div> -->

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
                            <img src="{{ asset('storage/'.$service->icon) }}" alt="" class="service-icon-img">
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


<!-- 
<section class="contact-one">
    <div class="container">
        <div class="sec-title text-center">
            <div class="icon">
                <img src="{{ $settings?->logo_dark ? asset('storage/'.$settings->logo_dark) : 'https://via.placeholder.com/180x50?text=Logo' }}" alt="">
            </div>
            <span class="sec-title__tagline">{{__('contact.with_us')}}</span>
            <h2 class="sec-title__title">{{__('contact.desc')}}</h2>
        </div>
        <div class="row">
            <div class="col-lg-6">
                @if($contactSection && $contactSection->translation)
                <div class="contact-one__content">

                    <p class="contact-one__text">
                        {{ $contactSection->translation->text }}
                    </p>

                    <ul class="list-unstyled ml-0 contact-one__lists">
                        @foreach(['list_1','list_2','list_3'] as $item)
                        @if($contactSection->translation->$item)
                        <li>
                            <i class="fa fa-check-circle"></i>
                            {{ $contactSection->translation->$item }}
                        </li>
                        @endif
                        @endforeach
                    </ul>

                    <div class="contact-one__images">
                        <div class="contact-one__images__shape"></div>

                        @if($contactSection->image_1)
                        <img src="{{ asset('storage/'.$contactSection->image_1) }}"
                            class="contact-one__images-1">
                        @endif

                        @if($contactSection->image_2)
                        <img src="{{ asset('storage/'.$contactSection->image_2) }}"
                            class="contact-one__images-2">
                        @endif
                    </div>

                </div>
                @endif
             
            </div>
            <div class="col-lg-6">
                @if(session('status') === 'success')
                <div class="alert alert-success">
                    {{ __('contact.success') }}
                </div>
                @endif

                @if(session('status') === 'error')
                <div class="alert alert-danger">
                    {{ __('contact.error') }}
                </div>
                @endif
                <form method="POST"
                    action="{{ route('contact.send', ['locale' => app()->getLocale()]) }}"
                    class="contact-one__form comment-one__form"
                    enctype="multipart/form-data">


                    @csrf

                    <div class="row">
                        <div class="col-xl-12">
                            <div class="comment-form__input-box">
                                <input type="text" placeholder="{{ __('contact.name') }}" name="name" required>
                            </div>
                        </div>

                        <div class="col-xl-12">
                            <div class="comment-form__input-box">
                                <input type="email" placeholder="{{ __('contact.email') }}" name="email" required>
                            </div>
                        </div>

                        <div class="col-xl-12">
                            <div class="comment-form__input-box">
                                <input type="file" name="cv" accept=".pdf,.doc,.docx" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xl-12 col-lg-12">
                            <div class="comment-form__input-box">
                                <textarea name="message" placeholder="{{ __('contact.message') }}" required></textarea>
                            </div>
                            <button type="submit" class="thm-btn comment-form__btn">
                                {{ __('contact.send') }}
                            </button>
                        </div>
                    </div>
                </form>


                <div class="result"></div>

                <div class="result"></div>
            </div>
        </div>
    </div>
</section> 
-->


<!--Company Logos One Start-->
<section class="company-logos-one">
    <div class="container">
        @php
        $swiperOptions = [
        'spaceBetween' => 100,
        'slidesPerView' => 5,
        'autoplay' => ['delay' => 5000],
        'breakpoints' => [
        0 => ['spaceBetween' => 20, 'slidesPerView' => 2],
        375 => ['spaceBetween' => 20, 'slidesPerView' => 2],
        575 => ['spaceBetween' => 20, 'slidesPerView' => 3],
        767 => ['spaceBetween' => 30, 'slidesPerView' => 4],
        991 => ['spaceBetween' => 40, 'slidesPerView' => 5],
        1199 => ['spaceBetween' => 40, 'slidesPerView' => 5],
        ],
        ];
        @endphp

        <div class="thm-swiper__slider swiper" data-swiper-options='@json($swiperOptions)'>

            <div class=" swiper-wrapper">
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





@endsection