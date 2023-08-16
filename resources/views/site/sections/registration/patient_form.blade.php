<form action="{{route('patient-registration')}}" class="general-form right" method="POST" enctype="multipart/form-data">
    @csrf
    <span class="form-title">{{__('main.patient_form_title')}}</span>
    <div class="form-wrapper">
        <div class="f_component">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="{{__('main.fullname_label')}} *" name="fullname">
                <span class="input-group-text"><i class="fa-solid fa-user"></i></span>
            </div>
        </div>
        <div class="f_component">
            <select class="form-select" name="region">
                <option selected disabled>{{__('main.patient_region_label')}} *</option>
                @foreach ($regions as $region)
                    <option value="{{$region->id}}">{{$region->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="f_component">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="{{__('main.patient_address_label')}} *" name="address">
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
            <span class="f_label">{{__('main.patient_card_front_label')}} *</span>
            <div class="file-input">
                <input type="file" hidden name="card_front">
                <span>{{__('main.download_doc')}}</span>
                <button type="button">{{__('main.download')}}</button>
            </div>
        </div>
        <div class="f_component">
            <span class="f_label">{{__('main.patient_card_back_label')}} *</span>
            <div class="file-input">
                <input type="file" hidden name="card_back">
                <span>{{__('main.download_doc')}}</span>
                <button type="button">{{__('main.download')}}</button>
            </div>
        </div>
        <button type="submit" class="submit-button">{{__('main.send')}}</button>
    </div>
</form>