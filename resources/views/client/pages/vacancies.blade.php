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
                    <div class="blog-one__single-content">

                        <!-- TITLE -->
                        <h2>
                            <a href="{{ route('vacancies.show', ['locale' => $locale,$vacancy->translation?->slug]) }}">

                                {{ $vacancy->translation?->title }}
                            </a>
                        </h2>

                        <!-- SHORT INFO -->
                        <p>
                            {{ Str::limit(strip_tags($vacancy->translation?->description), 120) }}
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

@endsection
