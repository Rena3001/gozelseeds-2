    <!-- style switcher -->
    <div class="style-switcher">
        <a href="#" id="switcher-toggler"><i class="fa fa-cog"></i></a>

        <h3>{{ __('layout.options') }}</h3>

        <!-- Language Switch -->
        <div class="language-feature">
    <a href="/az" class="ltr-switcher {{ app()->getLocale() === 'az' ? 'active' : '' }}">
        AZ
    </a>

    <a href="/en" class="ltr-switcher {{ app()->getLocale() === 'en' ? 'active' : '' }}">
        EN
    </a>

    <a href="/ru" class="ltr-switcher {{ app()->getLocale() === 'ru' ? 'active' : '' }}">
        RU
    </a>
</div>

    </div>
    <!-- end style switcher -->
