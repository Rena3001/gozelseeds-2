
    <div class="mobile-nav__wrapper">
        <div class="mobile-nav__overlay mobile-nav__toggler"></div>
        <!-- /.mobile-nav__overlay -->
        <div class="mobile-nav__content">
            <span class="mobile-nav__close mobile-nav__toggler"><i class="fa fa-times"></i></span>

            <div class="logo-box">
                <a href="/{{ app()->getLocale() }}" aria-label="logo image"><img src="{{ $settings?->logo_dark ? asset('storage/'.$settings->logo_dark) : 'https://via.placeholder.com/180x50?text=Logo' }}" width="155" alt=""></a>
            </div>
            <!-- /.logo-box -->
            <div class="mobile-nav__container"></div>
            <!-- /.mobile-nav__container -->

            <ul class="mobile-nav__contact list-unstyled">
                <li>
                    <i class="fa fa-envelope"></i>
                    <a href="mailto:{{ $settings?->email ?? 'admin@admin.com' }}">{{ $settings?->email ?? 'admin@admin.com' }}</a>
                </li>
                <li>
                    <i class="fa fa-phone"></i>
                    <a href="tel:{{ $settings?->phone ?? '123456789' }}">{{ $settings?->phone ?? '123456789' }}</a>
                </li>
            </ul><!-- /.mobile-nav__contact -->
            <div class="mobile-nav__top">
                <div class="mobile-nav__social">
                    <a href="{{ $settings?->facebook ?? '#' }}" class="fab fa-facebook-f"></a>
                    <a href="{{ $settings?->instagram ?? '#' }}" class="fab fa-instagram"></a>
                    <a href="{{ $settings?->linkedin ?? '#' }}" class="fab fa-linkedin-in"></a>
                    <a href="{{ $settings?->youtube ?? '#' }}" class="fab fa-youtube"></a>
                    <a href="{{ $settings?->tiktok ?? '#' }}" class="fab fa-tiktok"></a>
                    <a href="{{ $settings?->telegram ?? '#' }}" class="fab fa-telegram"></a>
                    <a href="{{ $settings?->whatsapp ?? '#' }}" class="fab fa-whatsapp"></a>

                </div><!-- /.mobile-nav__social -->
            </div><!-- /.mobile-nav__top -->
        </div>
        <!-- /.mobile-nav__content -->
    </div>