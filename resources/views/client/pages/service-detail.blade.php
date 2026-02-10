 @extends('client.layout.master')
 @section('page_title', 'Services Detail')

 @section('content')
 @php
 use Illuminate\Support\Str;

 use App\Models\Translation;
 $locale = app()->getLocale();
 @endphp

 <!--Page Header Start-->
 <section class="page-header clearfix" style="background-image:url({{ asset('storage/'.$page->header_bg) }});">
     <div class="container">
         <div class="page-header__inner text-center clearfix">
             <ul class="thm-breadcrumb">
                 <li><a href="index-main.html">{{ __('breadcrumb.home') }}</a></li>
                 <li>{{ __('breadcrumb.service-detail') }}</li>
             </ul>
             <h2>{{ __('services.title') }}</h2>
         </div>
     </div>
 </section>
 <!--Page Header End-->
 <!-- Service Details Start -->
 <section class="service-details">
     <div class="container">
         <div class="row g-3">

             <!-- LEFT CONTENT -->
             <div class="col-xl-5 col-lg-7">
                 <div class="service-details__content">

                     @if($feature->image)
                     <div class="service-details__img">
                         <img src="{{ asset('storage/'.$feature->image) }}" alt="">
                     </div>
                     @endif

                     <h3 class="service-details__title">
                         {!! $feature->translation?->title !!}
                     </h3>

                     {{-- OPTIONAL EXTRA CONTENT --}}
                     @if($feature->translation?->long_text)
                     <div class="service-details__text mt-4">
                         {!! $feature->translation->long_text !!}
                     </div>
                     @endif

                 </div>
             </div>

             <!-- RIGHT SIDEBAR -->
             <div class="col-xl-7 col-lg-5">
                 <div class="service-details__sidebar">

                     {{-- CTA BOX --}}
                     @if($feature->has_button)
                     <div class="service-details__sidebar-single">
                         <div class="service-details__sidebar-title">
                             <h3>{{ __('Need This Service?') }}</h3>
                         </div>

                         <a href="{{ $feature->button_link ?? '#' }}" class="thm-btn w-100 text-center">
                             {{ $feature->translation?->button_text ?? __('Discover More') }}
                         </a>
                     </div>
                     @endif

                     <div class="service-details__sidebar-single">
                         <div class="service-details__sidebar-title">
                             <h3>{{ __('service.overview') }}</h3>
                         </div>

                         <div class="service-details__sidebar-text">
                             {{ $feature->translation->description }}
                         </div>
                     </div>

                 </div>
             </div>

         </div>
     </div>
 </section>
 <!-- Service Details End -->

 @endsection
 @push('styles')
 <!-- Styles -->
 <style>
    .service-details{
        padding: 3rem 0 !important;
    }
     .service-details__sidebar-text {
         font-size: 15px;
         line-height: 1.7;
         color: #6c6c6c;
     }
 </style>
 @endpush