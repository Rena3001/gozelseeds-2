@extends('client.layout.master')

@section('title', $vacancy->translation?->title)

@section('content')
@php
$locale = app()->getLocale();
@endphp

<!--Page Header Start-->
<section class="page-header clearfix"
    style="background-image:url({{ asset('storage/'.$page->header_bg) }});">
    <div class="container">
        <div class="page-header__inner text-center clearfix">

            <ul class="thm-breadcrumb">
                <li>
                    <a href="{{ route('home', $locale) }}">
                        {{ __('breadcrumb.home') }}
                    </a>
                </li>
                <li>
                    <a href="{{ route('vacancies', $locale) }}">
                        {{ __('breadcrumb.vacancies') }}
                    </a>
                </li>
                <li>{{ $vacancy->translation?->title }}</li>
            </ul>

            <h2>{{ $vacancy->translation?->title }}</h2>
        </div>
    </div>
</section>
<!--Page Header End-->



<!--Vacancy Details Start-->
<section class="news-details">
    <div class="container">
        <div class="row">

            <!-- LEFT CONTENT -->
            <div class="col-xl-8 col-lg-7">
                <div class="news-details__left">

                    @if($vacancy->image)
                    <div class="blog-one__single-img mb-4">
                        <img src="{{ asset('storage/'.$vacancy->image) }}"
                            alt="{{ $vacancy->translation?->title }}">
                    </div>
                    @endif

                    <div class="blog-one__single-content">

                        <h2>{{ $vacancy->translation?->title }}</h2>

                        {{-- DESCRIPTION --}}
                        @if($vacancy->translation?->description)
                        <div class="mb-4">
                            <h3>{{ __('vacancies.description') }}</h3>
                            {!! $vacancy->translation->description !!}
                        </div>
                        @endif

                        {{-- REQUIREMENTS --}}
                        @if($vacancy->translation?->requirements)
                        <div class="mb-4">
                            <h3>{{ __('vacancies.requirements') }}</h3>
                            {!! $vacancy->translation->requirements !!}
                        </div>
                        @endif

                    </div>

                </div>
            </div>
            <!-- END LEFT -->



            <!-- RIGHT SIDEBAR -->
            <div class="col-xl-4 col-lg-5">
                <div class="sidebar">

                    <div class="sidebar__single">
                        <div class="title">
                            <h2>{{ __('vacancies.about') }}</h2>
                        </div>

                        <ul class="meta-info">

                            @if($vacancy->translation?->location)
                            <li>
                                <strong>{{ __('vacancies.location') }}:</strong>
                                {{ $vacancy->translation->location }}
                            </li>
                            @endif

                            @if($vacancy->translation?->category)
                            <li>
                                <strong>{{ __('vacancies.category') }}:</strong>
                                {{ $vacancy->translation->category }}
                            </li>
                            @endif

                            @if($vacancy->translation?->employment_type)
                            <li>
                                <strong>{{ __('vacancies.type') }}:</strong>
                                {{ $vacancy->translation->employment_type }}
                            </li>
                            @endif

                            @if($vacancy->salary)
                            <li>
                                <strong>{{ __('vacancies.salary') }}:</strong>
                                {{ $vacancy->salary }}
                            </li>
                            @endif

                            @if($vacancy->deadline)
                            <!-- <li>
                                <strong>{{ __('vacancies.deadline') }}:</strong>
                                {{ $vacancy->deadline->translatedFormat('d F, Y') }}
                            </li> -->
                            @endif

                        </ul>

                        {{-- APPLY BUTTON --}}
                        @if($vacancy->email)
                        <div class="mt-4">
                            <a href="mailto:{{ $vacancy->email }}?subject={{ urlencode($vacancy->translation?->title) }}"
                                class="thm-btn">
                                {{ __('vacancies.apply_now') }}
                            </a>
                        </div>
                        @endif

                    </div>

                </div>
            </div>
            <!-- END SIDEBAR -->

        </div>

    </div>
</section>
<!--Vacancy Details End-->
{{-- LATEST VACANCIES --}}
@if(isset($latestVacancies) && $latestVacancies->count())

<section class="blog-one pt-80 pb-80 vacancy-one">
    <div class="container">

        <div class="sec-title text-center">
            <span class="sec-title__tagline">
                {{ __('vacancies.latest') }}
            </span>
            <h2 class="sec-title__title">
                {{ __('vacancies.other_positions') }}
            </h2>
        </div>

        <div class="blog-slider-wrapper">

            <div class="swiper-container thm-swiper__slider"
                data-swiper-options='{
                    "slidesPerView": 3,
                    "spaceBetween": 30,
                    "loop": true,
                    

                    "slidesPerGroup": 1,
                    "navigation": {
                        "nextEl": "#blog-slider__swiper-button-next",
                        "prevEl": "#blog-slider__swiper-button-prev"
                    },
                    "breakpoints": {
                        "0": { "slidesPerView": 1 },
                        "768": { "slidesPerView": 2 },
                        "1200": { "slidesPerView": 3 }
                    },
                    "autoplay": {
            "delay": 3000,
            "disableOnInteraction": false
        }
                 }'>

                <div class="swiper-wrapper">

                    @foreach($latestVacancies as $item)
                    <div class="swiper-slide">
                        <div class="blog-one__single">

                            @if($item->image)
                            <div class="blog-one__single-img">
                                <img src="{{ asset('storage/'.$item->image) }}"
                                    alt="{{ $item->translation?->title }}">
                                <div class="date-box">
                                    <span>
                                        {{ $item->created_at?->translatedFormat('d F, Y') }}
                                    </span>
                                </div>
                            </div>
                            @endif

                            <div class="blog-one__single-content">

                                <h2>

                                    @if($item->translation?->slug)
                                    <a href="{{ route('vacancies.show', [
        'locale' => $locale,
        'slug' => $item->translation->slug
    ]) }}">
                                        {{ $item->translation?->title }}
                                    </a>
                                    @else
                                    <span>{{ $item->translation?->title }}</span>
                                    @endif

                                </h2>

                                <p>
                                    {!! Str::limit(strip_tags($item->translation?->description), 60) !!}
                                </p>

                                @if($item->email)
                                <a class="thm-btn"
                                    href="mailto:{{ $item->email }}?subject={{ urlencode($item->translation?->title) }}">
                                    {{ __('vacancies.apply_now') }}
                                </a>
                                @endif

                            </div>

                        </div>
                    </div>
                    @endforeach

                </div>

            </div>

            <!-- NAVIGATION -->
            <div class="swiper-button-prev vacancy-prev" id="blog-slider__swiper-button-next"></div>
            <div class="swiper-button-next vacancy-next" id="blog-slider__swiper-button-prev"></div>

        </div>

    </div>
</section>

@endif

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

@endsection