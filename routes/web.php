<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\home\HomeSliderController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


    Route::get('/', [HomeSliderController::class, 'Homesliderview'])->name('home');



Route::get('/dashboard', function () {
    return view('admin.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
//admin all routes
Route::controller(AdminController::class)->group(function(){
    Route::get('/admin/logout', 'destroy')->name('admin.logout');
    Route::get('/admin/profile', 'profile')->name('admin.profile');
    Route::get('/edit/profile', 'editprofile')->name('edit.profile');
    Route::post('/store/profile', 'storeprofile')->name('store.profile');
    
    Route::get('/edit/password', 'editpassword')->name('edit.password');
    Route::post('/update/password', 'updatepassword')->name('update.password');
});


Route::controller(AdminController::class)->group(function(){
    Route::get('/admin/logout', 'destroy')->name('admin.logout');
    Route::get('/admin/profile', 'profile')->name('admin.profile');
    Route::get('/edit/profile', 'editprofile')->name('edit.profile');
    Route::post('/store/profile', 'storeprofile')->name('store.profile');
    
    Route::get('/edit/password', 'editpassword')->name('edit.password');
    Route::post('/update/password', 'updatepassword')->name('update.password');
});


Route::controller(HomeSliderController::class)->group(function(){
    Route::get('/home/slide', 'HomeSlider')->name('home.slider');
    Route::post('/update/slider', 'UpdateSider')->name('update.slider');
});

require __DIR__.'/auth.php';
