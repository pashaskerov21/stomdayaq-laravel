<section class="contact-section" style="background: url({{asset('front-assets/images/footer/footer-texture-2.png')}}) repeat center top;" data-scroll='true'>
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-4 col-xl-2">
                <a href="{{route('index')}}" class="logo">
                    <img src="{{asset('uploads/settings/'.$settings->logo)}}" alt="logo">
                </a>
            </div>
            <div class="col-12 col-lg-4 col-xl-5">
                <div class="footer-links scroll-links">
                    @foreach ($menues as $menu)
                            <a href="#">{{ $menu->getMenu->where('lang', Session('lang'))->first()->name }}</a>
                    @endforeach
                </div>
            </div>
            <div class="col-12 col-lg-4 col-xl-5 contact-col">
                <div class="contact-wrapper">
                    <a href="{{$settings->location_url}}" class="link"><i class="fa-solid fa-location-dot"></i>{{$settings->location_text}}</a>
                    <a href="#" class="link"><i class="fa-solid fa-phone"></i>{{$settings->phone}}</a>
                    <a href="#" class="link"><i class="fa-solid fa-envelope"></i>{{$settings->mail}}</a>
                </div>
                <div class="c-bottom">
                    <div class="sosial-icons">
                        <a href="{{ $settings->facebook }}"><i class="fa-brands fa-facebook-f"></i></a>
                        <a href="{{ $settings->instagram }}"><i class="fa-brands fa-instagram"></i></a>
                        <a href="{{ $settings->youtube }}"><i class="fa-brands fa-youtube"></i></a>
                    </div>
                    <a href="#" class="card-link"><img src="{{asset('front-assets/images/footer/netty2022.jpg')}}" alt="netty"></a>
                </div>
            </div>            
        </div>
    </div>
</section>