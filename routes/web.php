<?php

use App\Http\Controllers\Auth\AdminAuth;
use App\Http\Controllers\Admin\Admin;
use App\Http\Controllers\Admin\Category;
use App\Http\Controllers\Admin\AdminRooms;
use App\Http\Controllers\Admin\AdminUsers;
use App\Http\Controllers\Admin\AdminFacilities;
use App\Http\Controllers\User\UserBooking;
use App\Http\Controllers\User\ProfilController;
use App\Http\Controllers\Auth\Signup;
use App\Http\Controllers\Auth\UserLoginController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('landing-page.index');
})->name('landing-page');

route::get('/signup', function () {
    return view('auth.signup');
})->name('signup-page');



Route::prefix('/user')->group(function () {
    // route public
    Route::post('/create-user', [Signup::class, 'createUser'])->name('create-user');
    // menampilkan halaman login
    Route::get('/login',[UserLoginController::class,'showLoginForm'])->name('login-page');
    Route::post('/loginSubmit',[UserLoginController::class,'loginUser'])->name('user-login-submit');
    route::get('/logoutUser',[UserLoginController::class,'userLogout'])->name('user-logout');

    Route::middleware(['auth', 'CheckUser'])->group(function () {
        Route::get('/', [UserBooking::class, 'index'])->name('index-user');
        Route::get('booking/detail/{id}', [UserBooking::class, 'bookingDetail'])->name('booking-detail');
        Route::get('/profil', [ProfilController::class, 'index'])->name('profil-index');
    });
});

Route::prefix('admin')->group(function () {
    // 1. RUTE PUBLIK ADMIN (Tanpa Middleware)

    // Menampilkan halaman login
    Route::get('/login', [AdminAuth::class, 'showLoginForm'])->name('admin.login');
    // Memproses form login
    Route::post('/login', [AdminAuth::class, 'loginAdmin'])->name('admin.login.submit');
    //
    Route::get('/logout', [AdminAuth::class, 'logoutAdmin'])->name('admin-logout');

    // 2. RUTE PROTECTED ADMIN (Wajib Login & Harus Admin)

    Route::middleware(['auth', 'CheckAdmin'])->group(function () {
        // Dashboard
        Route::get('/', [Admin::class, 'index'])->name('dashboard-index');

        // Facilities
        Route::get('/facilities', [AdminFacilities::class, 'index'])->name('facility-index');
        Route::get('/facilities/create', [AdminFacilities::class, 'showFormFacilities'])->name('facility-create');
        Route::post('/facilitiesSubmit', [AdminFacilities::class, 'facilitiesSubmit'])->name('facility-create-submit');
        Route::get('/facilities/detail/{id}', [AdminFacilities::class, 'detailFacilities'])->name('facility-view');
        Route::get('/facilities/update/{id}', [AdminFacilities::class, 'updateFacilitiesForm'])->name('facility-update-form');
        Route::post('/facilitiesUpdate/{id}', [AdminFacilities::class, 'updateFacilities'])->name('facility-update-submit');
        Route::delete('/facilitiesDelete/{id}', [AdminFacilities::class, 'destroyFacilities'])->name('facility-delete');

        // User Management
        Route::get('/users', [AdminUsers::class, 'index'])->name('user-index');
        Route::get('/user/create', [AdminUsers::class, 'showFromUser'])->name('user-create-form');
        Route::post('userSubmit', [AdminUsers::class, 'submitUser'])->name('submit-user');
        Route::get('/user/detail/{id}', [AdminUsers::class, 'detailUser'])->name('user-view');
        Route::get('/user/update/{id}', [AdminUsers::class, 'updateUserForm'])->name('update-user-form');
        Route::post('/updateUser/{id}', [AdminUsers::class, 'updateUser'])->name('user-update-submit');
        Route::delete('/destroyUser/{id}', [AdminUsers::class, 'destroyUser'])->name('destroy-user');

        // Rooms Management
        Route::get('/rooms', [AdminRooms::class, 'index'])->name('index-rooms');
        Route::get('/room/create', [AdminRooms::class, 'showCreateForm'])->name('room-create');
        Route::post('/createroom', [AdminRooms::class, 'create'])->name('room-submit');
        Route::get('/rooms/{id}', [AdminRooms::class, 'view'])->name('room-detail');
        Route::get('/room/{id}', [AdminRooms::class, 'roomUpdateForm'])->name('room-update-form');
        Route::post('/roomupdate/{id}', [AdminRooms::class, 'updateRoom'])->name('room-update-submit');
        Route::delete('/destroyroom/{id}', [AdminRooms::class, 'destroyRoom'])->name('destroy-room');

        // Category Management
        Route::get('/category', [Category::class, 'index'])->name('index-category');
        Route::get('/category/create', [Category::class, 'showCreateForm'])->name('category-create');
        Route::post('/create', [Category::class, 'create'])->name('category-submit');
        Route::get('/category/update/{id}', [Category::class, 'showUpdateForm'])->name('category-update');
       Route::post('/category/update/{id}', [Category::class, 'update'])->name('category-update-submit');
        Route::get('/category/{id}', [Category::class, 'view'])->name('category-view');
        Route::delete('/category/delete/{id}', [Category::class, 'destroy'])->name('category-destroy');
    });
});
