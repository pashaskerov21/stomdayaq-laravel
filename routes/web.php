<?php

use App\Http\Controllers\AdminPanel\AboutController;
use App\Http\Controllers\AdminPanel\ApplicationAreaController;
use App\Http\Controllers\AdminPanel\BannerController;
use App\Http\Controllers\AdminPanel\DashboardController;
use App\Http\Controllers\AdminPanel\GalleryCategoryController;
use App\Http\Controllers\AdminPanel\GalleryImagesController;
use App\Http\Controllers\AdminPanel\MenuController;
use App\Http\Controllers\AdminPanel\PartnerController;
use App\Http\Controllers\AdminPanel\PatientRegistrationController as AdminPanelPatientRegistrationController;
use App\Http\Controllers\AdminPanel\RegionController;
use App\Http\Controllers\AdminPanel\ReportController;
use App\Http\Controllers\AdminPanel\SettingController;
use App\Http\Controllers\AdminPanel\WorkerCategoryController;
use App\Http\Controllers\AdminPanel\WorkerController;
use App\Http\Controllers\AdminPanel\WorkerRegistrationController as AdminPanelWorkerRegistrationController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\UserController;
use App\Http\Controllers\View\PatientRegistrationController;
use App\Http\Controllers\View\SiteController;
use App\Http\Controllers\View\WorkerRegistrationController;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => '/admin', 'as' => 'admin.'], function () {

    Route::group(['middleware' => 'isLogin'], function () {
        Route::get('/login', [AuthController::class, 'index'])->name('login');
        Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
    });
    Route::group(['middleware' => 'notLogin'], function () {
        Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

        Route::resource('account', AuthController::class);
        Route::resource('users', UserController::class);

        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

        Route::get('/settings', [SettingController::class, 'index'])->name('settings');
        Route::post('/settings/update', [SettingController::class, 'update'])->name('settings.update');

        Route::resource('menu', MenuController::class);
        Route::get('/menu-sort', [MenuController::class, 'sort'])->name('menu.sort');

        Route::resource('banner', BannerController::class);
        Route::get('/banner-sort', [BannerController::class, 'sort'])->name('banner.sort');

        Route::resource('about', AboutController::class);
        Route::get('/about-sort', [AboutController::class, 'sort'])->name('about.sort');

        Route::resource('partner', PartnerController::class);
        Route::get('/partner-sort', [PartnerController::class, 'sort'])->name('partner.sort');

        Route::resource('worker-categories', WorkerCategoryController::class);
        Route::get('/worker-categories-sort', [WorkerCategoryController::class, 'sort'])->name('worker-categories.sort');

        Route::resource('worker', WorkerController::class);
        Route::get('/worker-sort', [WorkerController::class, 'sort'])->name('worker.sort');

        Route::resource('gallery-categories', GalleryCategoryController::class);
        Route::get('/gallery-categories-sort', [GalleryCategoryController::class, 'sort'])->name('gallery-categories.sort');

        Route::resource('gallery', GalleryImagesController::class);
        Route::get('/gallery-sort', [GalleryImagesController::class, 'sort'])->name('gallery.sort');

        Route::resource('report', ReportController::class);
        Route::get('/report-sort', [ReportController::class, 'sort'])->name('report.sort');

        Route::resource('region', RegionController::class);
        Route::get('/region-sort', [RegionController::class, 'sort'])->name('region.sort');

        Route::resource('application-area', ApplicationAreaController::class);
        Route::get('/application-area-sort', [ApplicationAreaController::class, 'sort'])->name('application-area.sort');

        Route::resource('workers-registration', AdminPanelWorkerRegistrationController::class);
        Route::resource('patients-registration', AdminPanelPatientRegistrationController::class);
    });
});


$locale = Request::segment(1);

if (in_array($locale, ['en', 'ru'])) {
    $locale = Request::segment(1);
} else {
    $locale = '';
}

Route::group([
    'prefix' => $locale, function ($locale = null) {
        return $locale;
    }, 'where' => ['locale' => '[a-zA-Z]{2}'], 'middleware' => 'setLocale'
], function () {
    Route::get('/', [SiteController::class, 'index'])->name('index');
    Route::post('/worker-registration', [WorkerRegistrationController::class, 'register'])->name('worker-registration');
    Route::post('/patient-registration', [PatientRegistrationController::class, 'register'])->name('patient-registration');
});
