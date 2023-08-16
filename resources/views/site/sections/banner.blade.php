<section class="banner-section" data-scroll='true'>
    <div class="swiper banner-swiper">
        <div class="swiper-wrapper">
            @foreach ($banners as $banner)
                <div class="swiper-slide">
                    <div class="banner-slide" style="background-image: url('{{ asset('uploads/banner/' . $banner->image) }}');">
                        @if ($banner->content_status)
                            <div class="content">
                                <div class="container">
                                    <div class="text">
                                        {!! $banner->getTexts->where('lang', Session('lang'))->first()->text !!}
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
        <div class="swiper-button-prev"><i class="fa-solid fa-chevron-left"></i></div>
        <div class="swiper-button-next"><i class="fa-solid fa-chevron-right"></i></div>
    </div>
</section>
