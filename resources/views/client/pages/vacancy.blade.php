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

                    <div class="blog-one__single-content blog-details">

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
                                <li>
                                    <strong>{{ __('vacancies.deadline') }}:</strong>
                                    {{ $vacancy->deadline->translatedFormat('d F, Y') }}
                                </li>
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

@endsection
