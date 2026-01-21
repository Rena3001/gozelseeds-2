<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jarallax@1.12.8/dist/jarallax.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/jquery.appear@1.0.1/jquery.appear.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/jquery-circle-progress@1.2.2/dist/circle-progress.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/magnific-popup@1.1.0/dist/jquery.magnific-popup.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/nouislider@15.7.0/dist/nouislider.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/wnumb@1.2.0/wNumb.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/odometer@0.4.8/odometer.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/tiny-slider@2.9.4/dist/min/tiny-slider.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>
<script>new WOW().init();</script>

<script src="https://cdn.jsdelivr.net/npm/isotope-layout@3.0.6/dist/isotope.pkgd.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-countdown@2.2.0/dist/jquery.countdown.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/twentytwenty@1.0.0/js/jquery.twentytwenty.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery.event.move@2.0.0/js/jquery.event.move.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/parallax-js@3.1.0/dist/parallax.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/tilt.js@1.2.1/dest/tilt.jquery.min.js"></script>


<script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>

<script src="http://maps.google.com/maps/api/js?key=AIzaSyATY4Rxc8jNvDpsK8ZetC7JyN4PFVYGCGM"></script>

<!-- template js -->
<script src="{{asset('assets/js/agriox.js')}}"></script>


<!-- toolbar js -->
<script src="{{asset('assets/vendors/toolbar/js/js.cookie.min.js')}}"></script>
<script src="{{asset('assets/vendors/toolbar/js/jQuery.style.switcher.min.js')}}"></script>
<script src="{{asset('assets/vendors/toolbar/js/toolbar.lang.js')}}"></script>
<script src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

<script src="{{asset('assets/vendors/toolbar/js/toolbar.js')}}"></script>
<script>
    document.querySelectorAll('.thm-swiper__slider').forEach(function(el) {
        const options = JSON.parse(el.getAttribute('data-swiper-options'));
        new Swiper(el, options);
    });
</script>