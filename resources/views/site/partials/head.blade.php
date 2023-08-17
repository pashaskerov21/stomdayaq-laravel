<!DOCTYPE html>
<html lang="az">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $settings->getSettingTranslate->where('lang', Session('lang'))->first()->title }}</title>
    <link rel="icon" href="{{ asset('uploads/settings/' . $settings->favicon) }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />
    <script src="https://kit.fontawesome.com/3cf65b98ce.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('front-assets/css/index.css') }}">
</head>

<body>

    <body>
        <button class="page-scroll-button d-none"><i class="fa-solid fa-arrow-up"></i></button>
        @if ($errors->any())
            <div class="alert-message error">
                <span>Ulduzla işarələnmiş xanaları doldurun !</span>
                <button><i class="fa-solid fa-xmark"></i></button>
            </div>
        @endif
        @if (session('form-success'))
            <div class="alert-message success">
                <span>Qeydiyyat tamamlandı</span>
                <button><i class="fa-solid fa-xmark"></i></button>
            </div>
        @endif
