<?php

use App\Http\Controllers\Bedroom;
use App\Http\Controllers\Home;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\signin;
use App\Http\Middleware\checkAdminSession;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;


// Route::group([checkAdminSession::class], function () {
//     Route::get('/', [Home::class, 'welcome']);
// });
Route::middleware([CheckAdminSession::class])->group(function () {
    Route::get('/', [Home::class, 'welcome']);
    Route::get('/kamar' , [Bedroom::class, 'index']);
});


Route::get('/login' , function(){
    return inertia::render('User/Login');
})->name('login');


Route::get('/user/signup' , [signin::class , 'showRegistrationForm' ]);
Route::post('/user/create' , [signin::class , 'create' ]);