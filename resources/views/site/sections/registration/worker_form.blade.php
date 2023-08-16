<form action="{{ route('worker-registration') }}" method="POST" class="general-form left" enctype="multipart/form-data">
    @csrf

    <span class="form-title">{{__('main.worker_form_title')}}</span>
    <div class="form-wrapper">
        
        <div class="f_component">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="{{__('main.fullname_label')}} *" name="fullname">
                <span class="input-group-text"><i class="fa-solid fa-user"></i></span>
            </div>
        </div>
        <div class="f_component">
            <span class="f_label">{{__('main.area_label')}} *</span>
            <div class="chekbox-wrapper">
                @foreach ($areas as $area)
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="check_1" value="{{ $area->id }}" name="area[]">
                        <label class="form-check-label" for="check_1">{{ $area->getName->where('lang', Session('lang'))->first()->name }}</label>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="f_component">
            <select class="form-select" name="region">
                <option selected disabled>{{__('main.work_region_label')}} *</option>
                @foreach ($regions as $region)
                    <option value="{{ $region->id }}">{{ $region->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="f_component">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="{{__('main.work_address_label')}} *" name="work_address">
                <span class="input-group-text"><i class="fa-solid fa-house"></i></span>
            </div>
        </div>
        <div class="f_component">
            <div class="input-group">
                <input type="number" class="form-control" placeholder="055XXXXXXX" name="phone">
                <span class="input-group-text"><i class="fa-solid fa-phone"></i></span>
            </div>
        </div>
        <div class="f_component">
            <div class="input-group">
                <input type="email" class="form-control" placeholder="{{__('main.mail_label')}} *" name="mail">
                <span class="input-group-text"><i class="fa-solid fa-envelope"></i></span>
            </div>
        </div>
        <div class="f_component">
            <span class="f_label">{{__('main.photo_label')}} *</span>
            <div class="file-input">
                <input type="file" hidden name="image">
                <span>{{__('main.download_photo')}}</span>
                <button type="button">{{__('main.download')}}</button>
            </div>
        </div>
        <button type="submit" class="submit-button">{{__('main.send')}}</button>
    </div>
</form>
