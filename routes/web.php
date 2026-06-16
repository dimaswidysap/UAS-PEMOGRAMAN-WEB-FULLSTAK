<?php

use App\Http\Controllers\Auth\Signup;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('landing-page.index');
})->name('landing-page');


route::get('/signup',function(){
    return view('auth.signup');
})->name('signup-page');

Route::post('create-user',[Signup::class , 'createUser'])->name('create-user');



route::get('/login',function(){
    return view('auth.login');
})->name('login-page');
