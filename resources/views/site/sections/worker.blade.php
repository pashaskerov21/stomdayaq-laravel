<section class="workers-section" data-scroll='false'>
    <div class="container">
        <h2 class="section-title">{{__('main.workers_title')}}</h2>
        <div class="worker-amount"><span class="number">{{$workers->count()}}</span><span>{{__('main.person')}}</span></div>
        <div class="swiper worker-swiper">
            <div class="swiper-wrapper">
                @foreach ($workers as $worker)
                    <div class="swiper-slide">
                        <div class="worker-card">
                            <div class="card-face front">
                                <img src="{{asset('uploads/worker/'.$worker->image)}}" alt="w-img">
                            </div>
                            <div class="card-face back">
                                <span class="name">{{$worker->getName->where('lang',Session('lang'))->first()->name}}</span>
                                <span class="position">{{$worker->category->first()->getName->where('lang', Session('lang'))->first()->name}}</span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="swiper-button-prev"><i class="fa-solid fa-chevron-left"></i></div>
            <div class="swiper-button-next"><i class="fa-solid fa-chevron-right"></i></div>
        </div>
    </div>
</section>
