@extends('client.layout.master')
@section('page_title', 'Product Details')

@section('content')
@php
use App\Models\Translation;
$locale = app()->getLocale();

@endphp


{{-- PAGE HEADER --}}
<section class="page-header clearfix"
    style="background-image: url({{ asset('assets/images/backgrounds/page-header-bg.jpg') }});">
    <div class="container">
        <div class="page-header__inner text-center clearfix">

            {{-- BREADCRUMB --}}
            <ul class="thm-breadcrumb">
                <li>
                    <a href="{{ route('home', app()->getLocale()) }}">
                        {{ __('breadcrumb.home') }}
                    </a>
                </li>

                <li>
                    <a href="{{ route('products', app()->getLocale()) }}">
                        {{ __('breadcrumb.products') }}
                    </a>
                </li>

                {{-- AKTİV MƏHSULUN ADI --}}
                <li>
                    {{ $product->translation?->title }}
                </li>
            </ul>

            {{-- PAGE TITLE --}}
            <h2>{{ $product->translation?->title }}</h2>

        </div>
    </div>
</section>
{{-- PAGE HEADER END --}}


{{-- PRODUCT DETAILS --}}
<section class="product-details">
    <div class="container">
        <div class="row">

            {{-- IMAGE --}}
            <div class="col-lg-6">
                <div class="product-details__image">
                    <img
                        src="{{ asset('storage/'.$product->image) }}"
                        alt="{{ $product->translation?->title }}">
                </div>
            </div>

            {{-- CONTENT --}}
            <div class="col-lg-6">
                <div class="product-details__content">

                    <div class="product-details__content__top">
                        <h3 class="product-details__content__name">
                            {{ $product->translation?->title }}
                        </h3>
                        <div class="product-details__content__text">
                            <p>{!! $product->translation?->short_description !!}
                            </p>
                        </div><!-- /.product-details__content__text -->

                    </div>

                    {{-- KATEQORİYALAR (istəyə bağlı) --}}
                    @if($product->categories->count())
                    <p class="product-details__categories">
                        <strong>{{ __('product.category') }}:</strong>
                        @foreach($product->categories as $category)
                        <span>{{ $category->translation?->title }}</span>
                        @if(!$loop->last), @endif
                        @endforeach
                    </p>
                    @endif

                </div>
            </div>

        </div>
    </div>
</section>
{{-- PRODUCT DETAILS END --}}


{{-- DESCRIPTION --}}
<section class="product-content">
    <div class="container">

        <h2 class="product-content__title">
            {{ __('product.description') }}
        </h2>

        {!! $product->translation?->description !!}

    </div>
</section>
{{-- DESCRIPTION END --}}
@endsection