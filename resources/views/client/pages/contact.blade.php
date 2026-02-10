@extends('client.layout.master')

@section('page_title', 'Contact us')

@section('content')
@php
$locale = app()->getLocale();
@endphp


<!--Page Header Start-->
<section class="page-header clearfix"
    style="background-image: url({{ asset('assets/images/backgrounds/page-header-bg.jpg') }});">
    <div class="container">
        <div class="page-header__inner text-center clearfix">

            <!-- BREADCRUMB -->
            <ul class="thm-breadcrumb">
                <li>
                    <a href="{{ route('home', $locale) }}">
                        {{ __('breadcrumb.home') }}
                    </a>
                </li>
                <li>
                    <a href="{{ route('contact', $locale) }}">
                        {{ __('breadcrumb.contact') }}
                    </a>
                </li>
            </ul>

            <h2>{{__('contact.title')}}</h2>
        </div>
    </div>
</section>
<!--Page Header End-->
<!-- <section class="contact-one">
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
                            <button type="submit" class="thm-btn comment-form__btn">{{ __('contact.send') }}</button>
                        </div>
                    </div>
                </form>

                <div class="result"></div>

                <div class="result"></div>
            </div>
        </div>
    </div>
</section> -->
<!-- /.contact-one -->

<section class="contact-page__contact-info clearfix">
    <div class="auto-container">
        <div class="row">
            <div class="col-xl-12">
                <div class="contact-page__contact-info-wrapper">
                    <div class="contact-page__contact-info-title">
                        <h2>{{__('getin.touch')}}</h2>
                    </div>

                    <div class="contact-page__contact-info-list">
                        <ul>
                            <li>
                                <div class="icon">
                                    <span class="fas fa-globe"></span>
                                </div>
                                <div class="title">
                                    <span>{{__('visit.store')}}</span>
                                    <p>{{ $settings?->translation?->address }}</p>
                                    <p>{{ $settings?->translation?->address_turkey }}</p>
                                    <p>{{ $settings?->translation?->address_spain }}</p>
                                    <p>{{ $settings?->translation?->address_uzbekistan }}</p>
                                </div>

                            </li>

                            <li>
                                <div class="icon">
                                    <span class="fa fa-envelope"></span>
                                </div>
                                <div class="title">
                                    <span>{{__('send.email')}}</span>
                                    <p><a href="mailto:{{ $settings?->email ?? 'admin@admin.com' }}">{{ $settings?->email ?? 'admin@admin.com' }}</a></p>
                                </div>
                            </li>

                            <li>
                                <div class="icon phone">
                                    <span class="fas fa-phone-volume"></span>
                                </div>
                                <div class="title">
                                    <span>{{__('call.anytime')}}</span>
                                    <p><a href="tel:{{ $settings?->phone ?? '123456789' }}">{{ $settings?->phone ?? '123456789' }}</a></p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="contact-page-google-map">
    @if(!empty($settings?->map_iframe))
        <iframe
            src="{{ $settings->map_iframe }}"
            width="100%"
            height="455"
            style="border:0;"
            allowfullscreen
            loading="lazy"
            referrerpolicy="no-referrer-when-downgrade">
        </iframe>
    @endif
</section>


@endsection