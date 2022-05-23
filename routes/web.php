<?php

use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Front\IndexController;
use Illuminate\Support\Facades\Route;
use App\Models\User;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
/*  ---------Admin route------------*/

Route::controller(AdminController::class)->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('/login', 'index')->name('login_form');
        Route::post('/login/owner', 'AdminLogin')->name('admin.login');
        Route::get('/dashboard', 'AdminDash')->name('admin.dashboard')->middleware('admin');
        Route::get('/logout', 'AdminLogout')->name('admin.logout');
    });
});
//admin profile 
Route::controller(ProfileController::class)->group(function () {
    Route::prefix('admin/profile')->group(function () {
        Route::get('/view', 'AdminProfile')->name('admin.profile');
        Route::get('/edit', 'ADminProfileEdit')->name('edit.admin.profile');
        Route::post('/store', 'StoreProfileAdmin')->name('store-damin-profile');
        //password route
        Route::get('/change/password', 'PasswordChange')->name('admin.password.edit');
        Route::post('/store/password', 'AdminPassStore')->name('change.password.sdmin');
    });
});



/*  ---------Admin route end--------*/

/*  ---------Frontend route start--------*/



Route::get('/dashboard', function () {
    return view('frontend.index');
})->middleware(['auth'])->name('dashboard');
Route::get('/view/user/profile/', function () {

    return view('frontend.profile.view_profile');
})->name('user.profile.view/');
Route::controller(IndexController::class)->group(function () {
    Route::get('/user/logout/{id}', 'UserLogout')->name('user.logout');
    Route::get('user/profile/update/{id}', 'UserProfileUpdate')->name('uploade.user.profile');
    Route::post('/update/user/profile/{id}', 'UpdateProfile')->name('store.user.profile');
    Route::get('/change/user/password/{id}', 'UserPassword')->name('chnage.user.password');
    Route::post('/password/update/{id}', 'passwordUpdate')->name('change.user.pass');
});
/*  ---------Frontend route end--------*/




require __DIR__ . '/auth.php';
