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
use App\Http\Controllers\customerControl;
use App\Http\Controllers\homepagerender;
use App\Http\Controllers\KostInfo;
use App\Http\Controllers\requestRoom;
use App\Http\Controllers\user;
use App\Http\Middleware\CheckAdmin;
use App\Http\Middleware\RegisterCustomerMiddleware;
use App\Http\Middleware\resetAdminSession;
use FontLib\Table\Type\post;
use Illuminate\Http\Request;

Route::get('/', [homepagerender::class, 'homepage'])->name('homepage');
Route::get('/login' , [customerControl::class , 'ShowLoginForm'])->name('customer.login');
Route::post('/user/getlogin' , [customerControl::class , 'Login']);
Route::get('/signup' ,[customerControl::class , 'ShowSignUpForm'])->name('customer.signup');
Route::post('/customer/store' , [customerControl::class , 'StoreCustomer'])
->middleware(RegisterCustomerMiddleware::class)
->name('customer.store');
;

Route::prefix('admin')->middleware([checkAdminSession::class , CheckAdmin::class])  ->group(function () {
    Route::get('/', [Home::class, 'welcome'])->name('user.dashboard');
    Route::get('/home', [Home::class, 'welcome']);
    Route::get('/kamar' , [Bedroom::class, 'index'])->name('bedroom');
    Route::post('/kamar/store' , [Bedroom::class, 'Store'])->name('bedroom.store');
    Route::get('/kamar/{id}' , [Bedroom::class, 'detail'])->name('bedroom.detail'); 
    Route::get('/kamar/destroy/{id}' , [Bedroom::class , 'Destroy'])->name('bedroom.destroy');
    Route::get('/user' , [Customer::class, 'index'])->name('customer');
    Route::get('/requestRoom' , [requestRoom::class, 'index'])->name('user');
    Route::get('/informasikost' , [KostInfo::class, 'Show'])->name('kostInfo');
    Route::post('/kost/update' , [KostInfo::class, 'Update'])->name('kost.update');
    Route::get('/fasilitas/destroy/{id}' , [KostInfo::class , 'DestroyFasilitas'])->name('fasilitas.destroy');
    Route::post('/fasilitas/store' , [KostInfo::class, 'StoreFasilitas'])->name('fasilitas.store');
    
});

Route::get('/user/login' , function(Request $request){
    return inertia::render('User/Login' , [
        'request' => $request
    ]);
})->name('user.login');

Route::middleware(['web'])->group(function () {
    Route::post('/user/signin', [user::class, 'sessionCreate'])->name('');
});
Route::post('/user/store' , [user::class , 'createUser' ]);
Route::get('/user/signup' , [user::class , 'showRegisterForm' ])->name('user.register');
Route::post('/user/create' , [user::class , 'create' ]);
Route::get('/logout' , [user::class , 'logout'])->name('user.logout');


Route::get('/bedroom/detail/{id}' , [Bedroom::class, 'detailBedroomFromUser'])->name('bedroom.userdetail');