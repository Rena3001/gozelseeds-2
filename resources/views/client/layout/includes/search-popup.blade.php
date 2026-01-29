<div class="search-popup">
    <div class="search-popup__overlay search-toggler"></div>
    <!-- /.search-popup__overlay -->

    <div class="search-popup__content">
        <form action="{{ route('products', app()->getLocale()) }}" method="GET">
            <label for="search" class="sr-only">
                {{ __('product.search_placeholder') }}
            </label>

            <input
                type="text"
                id="search"
                name="search"
                value="{{ request('search') }}"
                placeholder="{{ __('product.search_placeholder') }}"
                required
            >

            <button type="submit" aria-label="search submit" class="thm-btn2">
                <i class="fa fa-search" aria-hidden="true"></i>
            </button>
        </form>
    </div>
    <!-- /.search-popup__content -->
</div>
