@extends('client.layout.master')

@section('title', __('menu.vacancies'))

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
                <li>{{ __('breadcrumb.vacancies') }}</li>
            </ul>

            <h2>{{ __('vacancies.title') }}</h2>
        </div>
    </div>
</section>
<!--Page Header End-->



<!--Vacancies Start-->
<section class="blog-one">
    <div class="blog-one__bg wow slideInDown"></div>
    <div class="container">
        <div class="sec-title text-center">
            <div class="icon">
                <img src="{{ asset('assets/images/resources/sec-title-icon1.png') }}" alt="">
            </div>
            <span class="sec-title__tagline">{{ __('vacancies.tagline') }}</span>
            <h2 class="sec-title__title">{{ __('vacancies.title') }}</h2>
        </div>

        <div class="row">
            @foreach($vacancies as $vacancy)
            <div class="col-xl-4 col-lg-4 wow fadeInUp">
                <div class="blog-one__single">

                    <!-- IMAGE -->
                    @if($vacancy->image)
                    <div class="blog-one__single-img">
                        <img src="{{ asset('storage/'.$vacancy->image) }}" alt="">
                        <div class="date-box">
                            <span>{{ $vacancy->created_at?->translatedFormat('d F, Y') }}</span>
                        </div>
                    </div>
                    @endif

                    <!-- CONTENT -->
                    <div class="blog-one__single-content vacancy-btn">

                        <!-- TITLE -->
                        <h2>
                            @if($vacancy->translation?->slug)
                            <a href="{{ route('vacancies.show', [
        'locale' => $locale,
        'slug' => $vacancy->translation->slug
    ]) }}">
                                {{ $vacancy->translation?->title }}
                            </a>
                            @else
                            <span>{{ $vacancy->translation?->title }}</span>
                            @endif

                        </h2>

                        <!-- SHORT INFO -->
                        <p>
                            {!! Str::limit(strip_tags($vacancy->translation?->description), 60) !!}
                        </p>

                        <!-- APPLY BUTTON -->
                        @if($vacancy->email)
                        <a class="thm-btn"
                            href="mailto:{{ $vacancy->email }}?subject={{ urlencode($vacancy->translation?->title) }}">
                            {{ __('vacancies.apply_now') }}
                        </a>
                        @endif

                    </div>

                </div>
            </div>
            @endforeach
        </div>

    </div>
</section>
<!--Vacancies End-->

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