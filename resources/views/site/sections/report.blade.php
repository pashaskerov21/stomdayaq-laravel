<section class="counter-section" data-scroll='true'>
    <div class="container">
        <h2 class="section-title">{{__('main.report_title')}}</h2>
        <span class="calculation-value">{{__('main.report_subtitle')}} <span>{{$settings->report_total}}</span> AZN</span>
        <div class="row">
            @foreach ($reports as $report)
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="counter-item">
                        <img src="{{asset('uploads/report/'.$report->image)}}" alt="c-icon">
                        <span class="counter-span" data-val="{{$report->count_value}}">0</span>
                        <span class="label">{{$report->getTitle->where('lang',Session('lang'))->first()->title}}</span>
                    </div>
                </div> 
            @endforeach
        </div>
    </div>
</section>