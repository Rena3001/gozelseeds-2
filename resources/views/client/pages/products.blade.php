@extends('client.layout.master')
@section('page_title', 'Products')
@section('content')
@php
use Illuminate\Support\Str;
use App\Models\Translation;
$locale = app()->getLocale();
@endphp

<!-- Page Header -->
<section class="page-header clearfix" style="background-image: url({{ asset('assets/images/backgrounds/page-header-bg.jpg') }});">
    <div class="container">
        <div class="page-header__inner text-center clearfix">
            <ul class="thm-breadcrumb">
                <li>
                    <a href="/{{ $locale }}">{{ __('breadcrumb.home') }}</a>
                </li>
                <li>{{ __('breadcrumb.products') }}</li>
            </ul>
            <h2>{{ __('product.title') }}</h2>
        </div>
    </div>
</section>
<!-- Page Header End -->

<section class="shop-one">
    <div class="container">
        <div class="row">

            <!-- SIDEBAR -->
            <div class="col-lg-3">
                <div class="shop-one__sidebar">

                    <!-- SEARCH -->
                    <div class="shop-one__sidebar__item shop-one__sidebar__search">
                        <form action="{{ route('products', $locale) }}" method="GET">
                            <input type="text"
                                name="search"
                                value="{{ request('search') }}"
                                placeholder="{{ __('product.search_placeholder') }}">
                            <button type="submit">
                                <i class="fa fa-search"></i>
                            </button>
                        </form>
                    </div>

                    <!-- CATEGORIES -->
                    <div class="shop-one__sidebar__item shop-one__sidebar__category">
                        <h3 class="shop-one__sidebar__item__title">
                            {{ __('product.categories') }}
                        </h3>

                        <ul class="list-unstyled shop-one__sidebar__category__list">
                            @foreach($categories->whereNull('parent_id') as $category)
                            <li>
                                <a href="{{ route('shop.category', ['locale' => $locale,
                                            'slug'   => $category->slug]) }}"
                                    class="{{ request()->route('slug') === $category->slug ? 'active' : '' }}">
                                    {{ $category->translation?->title }}
                                </a>

                                {{-- Subkateqoriyalar --}}
                                @if($category->children->count())
                                <ul class="list-unstyled pl-3 mt-2">
                                    @foreach($category->children as $child)
                                    <li>
                                        <a href="{{ route('shop.category', ['locale' => $locale,
                                            'slug'   => $child->slug]) }}"
                                            class="{{ request()->route('slug') === $child->slug ? 'active' : '' }}">
                                            — {{ $child->translation?->title }}
                                        </a>
                                    </li>
                                    @endforeach
                                </ul>
                                @endif
                            </li>
                            @endforeach
                        </ul>


                    </div>

                </div>
            </div>
            <!-- /SIDEBAR -->

            <!-- PRODUCTS -->
            <div class="col-lg-9">

                <!-- RESULT COUNT -->
                <div class="row">
                    <div class="col-lg-12 shop-one__sorter">
                        <p class="shop-one__product-count">
                            @if(request()->filled('search'))
                            {{ __('product.search_results_for') }}
                            "<strong>{{ request('search') }}</strong>" —
                            {{ $products->total() }} {{ __('product.results_found') }}
                            @else
                            {{ __('product.showing') }}
                            {{ $products->firstItem() }}–{{ $products->lastItem() }}
                            {{ __('product.of') }} {{ $products->total() }}
                            {{ __('product.results') }}
                            @endif
                        </p>
                    </div>
                </div>

                <!-- PRODUCT LIST -->
                <div class="row">
                    @forelse($products as $product)
                    <div class="col-md-6 col-lg-4">
                        <div class="shop-one__item">

                            <div class="shop-one__image">
                                <a href="{{ route('product.show', [
                                                'locale' => $locale,
                                                'slug'   => $product->slug
                                            ]) }}"><img src="{{ asset('storage/'.$product->image) }}"
                                    alt="{{ $product->translation?->title }}"></a>
                            </div>

                            <div class="shop-one__content text-center">
                                <h3 class="shop-one__title">
                                    <a href="{{ route('product.show', [
                                                'locale' => $locale,
                                                'slug'   => $product->slug
                                            ]) }}">
                                        {{ $product->translation?->title }}
                                    </a>
                                </h3>
                            </div>

                        </div>
                    </div>
                    @empty
                    <div class="col-12">
                        @if(request()->filled('search'))
                        <p>
                            "{{ request('search') }}" —
                            {{ __('product.no_search_results') }}
                        </p>
                        @else
                        <p>{{ __('product.no_products') }}</p>
                        @endif
                    </div>
                    @endforelse
                </div>

                <!-- PAGINATION -->
                <div class="row">
                    <div class="col-12">
                        {{ $products->withQueryString()->links() }}
                    </div>
                </div>

            </div>
            <!-- /PRODUCTS -->

        </div>
    </div>
</section>

@endsection