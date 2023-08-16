<header>
    <nav class="general-nav">
        <div class="container">
            <div class="inner">
                <a href="{{ route('index') }}" class="logo">
                    <img src="{{ asset('uploads/settings/' . $settings->logo) }}" alt="logo">
                </a>
                <div class="menu">
                    <div class="nav-links scroll-links">
                        @foreach ($menues as $menu)
                            <a href="#" class="link">{{ $menu->getMenu->where('lang', Session('lang'))->first()->name }}</a>
                        @endforeach
                    </div>
                    <div class="icons d-xl-none">
                        <div class="lang-flags">
                            <a href="{{ url($lang['az']) }}"><img src="{{ asset('front-assets/images/flags/flag-az.png') }}" alt="flag"></a>
                            <a href="{{ url($lang['en']) }}"><img src="{{ asset('front-assets/images/flags/flag-en.png') }}" alt="flag"></a>
                            <a href="{{ url($lang['ru']) }}"><img src="{{ asset('front-assets/images/flags/flag-ru.png') }}" alt="flag"></a>
                        </div>
                        <div class="sosial-icons">
                            <a href="{{ $settings->facebook }}"><i class="fa-brands fa-facebook-f"></i></a>
                            <a href="{{ $settings->instagram }}"><i class="fa-brands fa-instagram"></i></a>
                            <a href="{{ $settings->youtube }}"><i class="fa-brands fa-youtube"></i></a>
                        </div>
                    </div>
                </div>
                <button class="menu-button d-xl-none">
                    <i class="fa-solid fa-bars"></i>
                    <i class="fa-solid fa-xmark"></i>
                </button>
                <div class="right d-none d-xl-flex">
                    <div class="lang-flags">
                        <a href="{{ url($lang['az']) }}"><img src="{{ asset('front-assets/images/flags/flag-az.png') }}" alt="flag"></a>
                        <a href="{{ url($lang['en']) }}"><img src="{{ asset('front-assets/images/flags/flag-en.png') }}" alt="flag"></a>
                        <a href="{{ url($lang['ru']) }}"><img src="{{ asset('front-assets/images/flags/flag-ru.png') }}" alt="flag"></a>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</header>
