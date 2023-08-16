<section class="about-section" data-scroll='true'>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="section-title">{{__('main.about_title')}}</h2>
            </div>
            @foreach ($abouts as $about)
                <div class="col-12 col-md-6">
                    <div class="content">
                        {!! $about->getText->where('lang', Session('lang'))->first()->text !!}
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>