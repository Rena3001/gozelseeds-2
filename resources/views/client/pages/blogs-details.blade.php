@extends('client.layout.master')

@section('page_title', 'Blog Details')

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
                    <a href="{{ route('news', $locale) }}">
                        {{ __('breadcrumb.blogs') }}
                    </a>
                </li>
                <li>
                    {{ $post->translation?->title }}
                </li>
            </ul>

            <h2>{{ $post->translation?->title }}</h2>
        </div>
    </div>
</section>
<!--Page Header End-->


<!--Blog Details Start-->
<section class="news-details">
    <div class="container">
        <div class="row">

            <!-- LEFT CONTENT -->
            <div class="col-xl-8 col-lg-7">
                <div class="news-details__left">

                    <div class="blog-one__single">

                        <!-- IMAGE -->
                        @if($post->image)
                        <div class="blog-one__single-img">
                            <img src="{{ asset('storage/'.$post->image) }}"
                                 alt="{{ $post->translation?->title }}">
                        </div>
                        @endif

                        <!-- CONTENT -->
                        <div class="blog-one__single-content blog-details">

                            <!-- META -->
                            <ul class="meta-info">
                                @if($post->published_at)
                                    <li>
                                        <i class="far fa-clock"></i>
                                        {{ $post->published_at->translatedFormat('d F, Y') }}
                                    </li>
                                @endif

                                @if($post->author)
                                    <li>
                                        <i class="far fa-user-circle"></i>
                                        {{ $post->author }}
                                    </li>
                                @endif
                            </ul>

                            <h2>{{ $post->translation?->title }}</h2>

                            {{-- MAIN CONTENT --}}
                            {!! $post->translation?->content !!}
                        </div>
                    </div>

                </div>
            </div>
            <!-- END LEFT -->

            <!-- SIDEBAR -->
            <div class="col-xl-4 col-lg-5">
                <div class="sidebar">

                    <!-- SEARCH -->
                    <div class="sidebar__single sidebar__search">
                        <form action="{{ route('blogs', $locale) }}" method="GET"
                              class="sidebar__search-form">
                            <input type="search"
                                   name="search"
                                   value="{{ request('search') }}"
                                   placeholder="{{ __('blog.search') }}">
                            <button type="submit">
                                <span class="fa fa-search"></span>
                            </button>
                        </form>
                    </div>

                    <!-- LATEST POSTS -->
                    @if(isset($latestPosts) && $latestPosts->count())
                        <div class="sidebar__single sidebar__latest-posts">
                            <div class="title">
                                <h2>{{ __('blog.latest_posts') }}</h2>
                            </div>

                            <ul class="sidebar__latest-posts-list">
                                @foreach($latestPosts as $latest)
                                    <li class="sidebar__latest-posts-list-item">
                                        <div class="img-box">
                                            <img src="{{ asset('storage/'.$latest->image) }}"
                                                 alt="{{ $latest->translation?->title }}">
                                        </div>
                                        <div class="title">
                                            <h4>
                                                <a href="{{ route('blogs.show', [
                                                    'locale' => $locale,
                                                    'post' => $latest->id
                                                ]) }}">
                                                    {{ $latest->translation?->title }}
                                                </a>
                                            </h4>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                </div>
            </div>
            <!-- END SIDEBAR -->

        </div>
    </div>
</section>
<!--Blog Details End-->

@endsection
