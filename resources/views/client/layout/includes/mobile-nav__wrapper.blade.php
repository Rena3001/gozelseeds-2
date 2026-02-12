
    <div class="mobile-nav__wrapper">
        <div class="mobile-nav__overlay mobile-nav__toggler"></div>
        <!-- /.mobile-nav__overlay -->
        <div class="mobile-nav__content">
            
            <span class="mobile-nav__close mobile-nav__toggler"><i class="fa fa-times"></i></span>

            <div class="logo-box">
                <a href="/{{ app()->getLocale() }}" aria-label="logo image">
                   <img src="{{ $settings?->logo_light ? asset('storage/'.$settings->logo_light) : 
                                            'https://via.placeholder.com/180x50?text=Logo' }}" alt="">
                </a>
            </div> 
            <div class="language-switcher-select">
                         @php
                         $currentLang = $languages->firstWhere('code', app()->getLocale());
                         @endphp
                         <img src="{{ $currentLang->flag }}" class="lang-flag">

                         <select id="langSwitcher" class="lang-dropdown"
                             onchange="location.href=this.value">
                             @foreach($languages as $lang)

                             <option value="/{{ $lang->code }}{{ $cleanPath }}"

                                 {{ app()->getLocale() === $lang->code ? 'selected' : '' }}>
                                 <img src="{{ $currentLang->flag }}" class="lang-flag">

                                 {{ $lang->label }}
                             </option>
                             @endforeach
                         </select>
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