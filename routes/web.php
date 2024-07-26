<?php

use App\Http\Controllers\Bedroom;
use App\Http\Controllers\Home;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\signin;
use App\Http\Middleware\checkAdminSession;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\Customer;
use App\Http\Controllers\homepagerender;
use App\Http\Controllers\requestRoom;
use App\Http\Controllers\user;
use App\Http\Middleware\CheckAdmin;
use Illuminate\Http\Request;

Route::get('/', [homepagerender::class, 'homepage'])->name('homepage');

Route::prefix('admin')->middleware([checkAdminSession::class , CheckAdmin::class])->group(function () {
    Route::get('/', [Home::class, 'welcome'])->name('user.dashboard');
    Route::get('/home', [Home::class, 'welcome']);
    Route::get('/kamar' , [Bedroom::class, 'index'])->name('bedroom');
    Route::post('/kamar/store' , [Bedroom::class, 'Store'])->name('bedroom.store');
    Route::get('/kamar/{id}' , [Bedroom::class, 'detail'])->name('bedroom.detail'); 
    Route::get('/kamar/destroy/{id}' , [Bedroom::class , 'Destroy'])->name('bedroom.destroy');
    Route::get('/user' , [Customer::class, 'index'])->name('customer');
    Route::get('/requestRoom' , [requestRoom::class, 'index'])->name('user');

});

Route::get('/user/login' , function(Request $request){
    return inertia::render('User/Login' , [
        'request' => $request
    ]);
})->name('user.login');

Route::middleware(['web'])->group(function () {
    Route::post('/user/signin', [user::class, 'sessionCreate'])->name('');
});
// Route::post('/user/signin' , [user::class , 'sessionCreate' ]);
Route::post('/user/store' , [user::class , 'createUser' ]);
Route::get('/user/signup' , [user::class , 'showRegisterForm' ])->name('user.register');
Route::post('/user/create' , [user::class , 'create' ]);
Route::get('/logout' , [user::class , 'logout'])->name('user.logout');

