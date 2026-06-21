<?php

use App\Http\Controllers\Auth\AdminAuth;
use App\Http\Controllers\Admin\Admin;
use App\Http\Controllers\Admin\Category;
use App\Http\Controllers\Admin\AdminRooms;
use App\Http\Controllers\Admin\AdminUsers;
use App\Http\Controllers\Admin\AdminFacilities;
use App\Http\Controllers\User\UserBooking;
use App\Http\Controllers\Auth\Signup;
use Illuminate\Support\Facades\Route;


Route::prefix('/user')->group(function(){
    Route::get('/booking',[UserBooking::class,'index'])->name('index-user');
    Route::get('booking/detail/{id}',[UserBooking::class,'bookingDetail'])->name('booking-detail');
});

Route::prefix('admin')->group(function () {
    // Menampilkan halaman login
    Route::get('/login', [AdminAuth::class, 'showLoginForm'])->name('admin.login');

    // Memproses form login
    Route::post('/login', [AdminAuth::class, 'login'])->name('admin.login.submit');

    // dashboard
    Route::get('/dashboard', [Admin::class, 'index'])->name('index');

    // facilities
    Route::get('/facilities',[AdminFacilities::class,'index'])->name('facility-index');
    Route::get('/facilities/create',[AdminFacilities::class,'showFormFacilities'])->name('facility-create');
    Route::post('/facilitiesSubmit',[AdminFacilities::class,'facilitiesSubmit'])->name('facility-create-submit');
    Route::get('/facilities/detail/{id}',[AdminFacilities::class,'detailFacilities'])->name('facility-view');
    Route::get('/facilities/update/{id}',[AdminFacilities::class,'updateFacilitiesForm'])->name('facility-update-form');
    Route::post('/facilitiesUpdate/{id}',[AdminFacilities::class,'updateFacilities'])->name('facility-update-submit');
    Route::delete('/facilitiesDelete/{id}',[AdminFacilities::class,'destroyFacilities'])->name('facility-delete');


    // user
    Route::get('/users',[AdminUsers::class,'index'])->name('user-index');
    // create user
    Route::get('/user/create',[AdminUsers::class,'showFromUser'])->name('user-create-form');
    Route::post('userSubmit',[AdminUsers::class,'submitUser'])->name('submit-user');
    // view detail
    Route::get('/user/detail/{id}',[AdminUsers::class,'detailUser'])->name('user-view');
    // rooms
    Route::get('/rooms', [AdminRooms::class, 'index'])->name('index-rooms');
    // create room
    Route::get('/room/create', [AdminRooms::class, 'showCreateForm'])->name('room-create');
    Route::post('/createroom', [AdminRooms::class, 'create'])->name('room-submit');
    // detail rooms
    Route::get('/rooms/{id}', [AdminRooms::class, 'view'])->name('room-detail');
    // update room
    Route::get('/room/{id}', [AdminRooms::class, 'roomUpdateForm'])->name('room-update-form');
    Route::post('/roomupdate/{id}', [AdminRooms::class, 'updateRoom'])->name('room-update-submit');
    // hapus room
    Route::delete('/destroyroom/{id}',[AdminRooms::class,'destroyRoom'])->name('destroy-room');
    // update user
    Route::get('/user/update/{id}',[AdminUsers::class,'updateUserForm'])->name('update-user-form');
    Route::post('/updateUser/{id}',[AdminUsers::class,'updateUser'])->name('user-update-submit');
    // destroy user
    Route::delete('/destroyUser/{id}',[AdminUsers::class,'destroyUser'])->name('destroy-user');

    // category
    Route::get('/category', [Category::class, 'index'])->name('index-category');
    // create
    Route::get('/category/create', [Category::class, 'showCreateForm'])->name('category-create');
    Route::post('/create', [Category::class, 'create'])->name('category-submit');
    // update category
    Route::get('/category/update/{id}', [Category::class, 'showUpdateForm'])->name('category-update');
    Route::post('/update/{id}', [Category::class, 'update'])->name('category-update-submit');
    // category view
    Route::get('/category/{id}', [Category::class, 'view'])->name('category-view');
    // delete
    Route::delete('/category/delete/{id}', [Category::class, 'destroy'])->name('category-destroy');
});

Route::get('/', function () {
    return view('landing-page.index');
})->name('landing-page');

route::get('/signup', function () {
    return view('auth.signup');
})->name('signup-page');

Route::post('create-user', [Signup::class, 'createUser'])->name('create-user');

route::get('/login', function () {
    return view('auth.login');
})->name('login-page');
