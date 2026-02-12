    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- favicons Icons -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('assets/images/favicons/apple-touch-icon.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ $settings?->logo_dark ? asset('storage/'.$settings->logo_dark) : 'https://via.placeholder.com/180x50?text=Logo' }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ $settings?->logo_dark ? asset('storage/'.$settings->logo_dark) : 'https://via.placeholder.com/180x50?text=Logo' }}">
    <link rel="manifest" href="{{asset('assets/images/favicons/site.webmanifest')}}">
    <meta name="description" content="Agriox HTML Template For Agriculture Farming Services">

    <!-- fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Averia+Sans+Libre:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700&family=DM+Sans:ital,wght@0,400;0,500;0,700;1,400;1,500;1,700&family=Shadows+Into+Light&display=swap" rel="stylesheet">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous"
        referrerpolicy="no-referrer" />
        <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Merienda:wght@300..900&family=Momo+Signature&display=swap" rel="stylesheet">


    <link rel="stylesheet" href="{{asset('assets/vendors/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendors/animate/animate.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendors/animate/custom-animate.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendors/fontawesome/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendors/jarallax/jarallax.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendors/jquery-magnific-popup/jquery.magnific-popup.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendors/nouislider/nouislider.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendors/nouislider/nouislider.pips.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendors/odometer/odometer.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendors/swiper/swiper.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendors/icomoon-icons/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendors/tiny-slider/tiny-slider.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendors/reey-font/stylesheet.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendors/owl-carousel/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendors/owl-carousel/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendors/twentytwenty/twentytwenty.css')}}">

    <!-- template styles -->
   <link rel="stylesheet" 
      href="{{ asset('assets/css/agriox.css') }}?v={{ filemtime(public_path('assets/css/agriox.css')) }}">


    <!-- RTL CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/agriox-rtl.css')}}">


    <!-- mode css -->
    <link rel="stylesheet" id="jssMode" href="{{asset('assets/css/modes/agriox-light.css')}}">

    <!-- toolbar css -->
    <link rel="stylesheet" href="{{asset('assets/vendors/toolbar/css/toolbar.css')}}">

    @push('styles')
    <style>
        .menu-item-has-children {
    position: relative;
}

.menu-item-has-children > .sub-menu {
    position: absolute;
    top: 100%;
    left: 0;
    min-width: 220px;
    background: #fff;
    opacity: 0;
    visibility: hidden;
    transform: translateY(10px);
    transition: all 0.25s ease;
    box-shadow: 0 10px 25px rgba(0,0,0,0.1);
    z-index: 999;
}

.menu-item-has-children:hover > .sub-menu {
    opacity: 1;
    visibility: visible;
    transform: translateY(0);
}

.sub-menu li a {
    display: block;
    padding: 10px 15px;
    color: #333;
}

.sub-menu li a:hover {
    background: #f5f5f5;
}

    </style>
    @endpush