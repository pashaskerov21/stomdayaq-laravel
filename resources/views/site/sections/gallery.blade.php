<section class="gallery-section" data-scroll='true'>
    <div class="container">
        <h2 class="section-title white">{{__('main.gallery_title')}}</h2>
        <div class="gallery-buttons">
            <button data-id="all">{{__('main.all')}}</button>
            @foreach ($gallerycategories as $category)
                <button data-id="{{ $category->id }}">{{ $category->getName->where('lang', Session('lang'))->first()->name }}</button>
            @endforeach
        </div>
        <div class="row">
            @foreach ($galleryimages as $img)
                <div class="col-12 col-sm-6 col-lg-4 col-xl-3 gallery-img-col" data-category-id="{{$img->category_id}}">
                    <div class="g_item">
                        <div class="image">
                            <img src="{{ asset('uploads/gallery/' . $img->image) }}" alt="gallery-img" />
                        </div>
                        <div class="hover-div">
                            <a href="{{ asset('uploads/gallery/' . $img->image) }}" data-fancybox="">
                                <i class="fa-solid fa-search"></i>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
</section>
