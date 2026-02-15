@extends('client.layout.master')
@section('title', __('menu.news'))

@section('content')
@php
use App\Models\Translation;
$locale = app()->getLocale();

@endphp

<!--Page Header Start-->
<section class="page-header clearfix" style="background-image:url({{ asset('storage/'.$page->header_bg) }});">
    <div class="container">
        <div class="page-header__inner text-center clearfix">
            <ul class="thm-breadcrumb">
                <li><a href="{{ route('home', app()->getLocale()) }}">{{__('breadcrumb.home')}}</a></li>
                <li>{{__('breadcrumb.blogs')}}</li>
            </ul>
            <h2>{{__('blogs.title')}}</h2>
        </div>
    </div>
</section>
<!--Page Header End-->

<!--Blog One Start-->
<section class="blog-one">
    <div class="blog-one__bg wow slideInDown" data-wow-delay="100ms" data-wow-duration="2500ms"></div>
    <div class="blog-one__shape"></div><!-- /.blog-one__shape -->
    <div class="container">
        <div class="sec-title text-center">
            <div class="icon">
                <img src="{{asset('assets/images/resources/sec-title-icon1.png')}}" alt="">
            </div>
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
                            <a href="{{ route('blogs.show', ['locale' => $locale, 'post' => $post->id]) }}">
                                <i class="fa-solid fa-plus"></i>
                            </a>

                        </div>
                    </div>

                    <div class="blog-one__single-content">
                        
                        <h2><a href="{{ route('blogs.show', ['locale' => $locale, 'post' => $post->id]) }}">
                            {{ $post->translation?->title }}
                        </a></h2>
                    </div>
                </div>
            </div>
            <!--End Single Blog One-->
            @endforeach
        </div>
    </div>
</section>
<!--Blog One End-->



@endsection