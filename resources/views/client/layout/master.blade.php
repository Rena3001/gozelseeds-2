<!DOCTYPE html>
<html lang="en">

<head>

    @include('client.layout.includes.head')

    <title>@yield('title', 'Gozelseeds')</title>

    {{-- Əlavə səhifəyə aid CSS faylları üçün yer --}}
    @stack('styles')

</head>

<body class="boxed-wrapper">
    <div class="page-wrapper">

        @include('client.layout.includes.style-switcher')
        @include('client.layout.includes.preloader')
        

        <x-front-header-component />

        @include('client.layout.includes.stricky-header')

        @yield('content')

        <x-front-footer-component />
    </div>
    <a href="#" data-target="html" class="scroll-to-target scroll-to-top"><i class="fa-solid fa-arrow-right"></i></a>

    @include('client.layout.includes.mobile-nav__wrapper')
    @include('client.layout.includes.search-popup')


    <!-- /.search-popup -->

    @include('client.layout.includes.foot')

    {{-- Əlavə səhifəyə aid JS faylları üçün yer --}}
    @stack('scripts')
</body>

</html>