<section class="partners-section" data-scroll='true'>
    <div class="container">
        <h2 class="section-title">{{__('main.partner_title')}}</h2>
        <div class="swiper partner-swiper">
            <div class="swiper-wrapper">
                @foreach ($partners as $partner)
                    <div class="swiper-slide">
                        <a class="partner" href="{{$partner->link}}">
                            <img src="{{asset('uploads/partner/'.$partner->image)}}" alt="partner" />
                        </a>
                    </div>
                @endforeach
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </div>
</section>
