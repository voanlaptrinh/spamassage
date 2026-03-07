<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\ConfigServeController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\DashboadController;
use App\Http\Controllers\Admin\ServicePackageController;
use App\Http\Controllers\Admin\IntroPostController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Clients\HomeController;
use App\Http\Controllers\UploadController;
use App\Models\Contact;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::post('/lien-he', function (\Illuminate\Http\Request $request) {
    $request->validate([
        'name'  => 'required|string|max:255',
        'phone' => 'required|string|max:20',
        'email' => 'nullable|email|max:255',
        'description' => 'nullable|string|max:2000',
    ]);
    Contact::create($request->only('name', 'phone', 'email', 'description'));
    return back()->with('success', 'Yêu cầu của bạn đã được gửi! Chúng tôi sẽ liên hệ sớm nhất.');
})->name('contact.store');


// Auth
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::post('/password/change', [AuthController::class, 'changePassword'])->name('password.change')->middleware('auth');

// Admin routes
Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::prefix('dashboard')->group(function () {
        Route::get('/', [DashboadController::class, 'index'])->name('dashboard.index');
    });
    // Gói dịch vụ
    Route::get('/goi-dich-vu', [ServicePackageController::class, 'index'])->name('goi_dich_vu.index');
    Route::get('/goi-dich-vu/them', [ServicePackageController::class, 'create'])->name('goi_dich_vu.create');
    Route::post('/goi-dich-vu', [ServicePackageController::class, 'store'])->name('goi_dich_vu.store');
    Route::get('/goi-dich-vu/{goiDichVu}/sua', [ServicePackageController::class, 'edit'])->name('goi_dich_vu.edit');
    Route::put('/goi-dich-vu/{goiDichVu}', [ServicePackageController::class, 'update'])->name('goi_dich_vu.update');
    Route::delete('/goi-dich-vu/{goiDichVu}', [ServicePackageController::class, 'destroy'])->name('goi_dich_vu.destroy');

    // Bài viết giới thiệu
    Route::get('/bai-viet', [IntroPostController::class, 'index'])->name('bai_viet.index');
    Route::get('/bai-viet/them', [IntroPostController::class, 'create'])->name('bai_viet.create');
    Route::post('/bai-viet', [IntroPostController::class, 'store'])->name('bai_viet.store');
    Route::get('/bai-viet/{baiViet}/sua', [IntroPostController::class, 'edit'])->name('bai_viet.edit');
    Route::put('/bai-viet/{baiViet}', [IntroPostController::class, 'update'])->name('bai_viet.update');
    Route::delete('/bai-viet/{baiViet}', [IntroPostController::class, 'destroy'])->name('bai_viet.destroy');



    Route::get('/lien-he', [ContactController::class, 'index'])->name('lien_he.index');

    // Banner
    Route::get('/banner', [BannerController::class, 'edit'])->name('banner.edit');
    Route::put('/banner/{banner}', [BannerController::class, 'update'])->name('banner.update');

    Route::prefix('web-config')->name('web-config.')->group(function () {
        Route::get('/', [ConfigServeController::class, 'edit'])->name('edit');
        Route::put('/{id}', [ConfigServeController::class, 'update'])->name('update');
    });
});
Route::post('/upload-image', [UploadController::class, 'uploadImage'])->name('upload-image');
Route::post('/delete-image', [UploadController::class, 'deleteImage'])->name('delete-image');
