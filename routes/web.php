<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\home\HomeSliderController;
use App\Http\Controllers\AboutPageController;
use App\Http\Controllers\ExperienceController;
use App\Http\Controllers\ResumeController;

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
})->middleware(['auth'])->name('dashboard');

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
    Route::post('/update/slider', 'UpdateSlider')->name('update.slider');
});


Route::controller(AboutPageController::class)->group(function(){
    Route::get('/about/', 'AboutShow')->name('aboutpage');
    Route::get('/about/update', 'AboutUpdate')->name('AboutUpdate');
    Route::post('/aboutPage/update', 'AboutPageUpdate')->name('aboutpageupdate');
    route::get('about/skills/add', 'Admin_Skills_Add')->name('skills.add');
    route::post('about/skills/adding', 'Admin_Skills_Adding')->name('skills.adding');
    Route::delete('/skills/{id}', 'deleteSkill')->name('skills.delete');
    route::get('about/education/add', 'Admin_Education_Add')->name('education.add');
    route::post('about/Education/adding', 'Admin_Education_Adding')->name('education.adding');
    Route::delete('/education/delete/{id}', 'deleteEducation')->name('education.delete');
    Route::put('/education/update/{id}', 'updateEducation')->name('education.update');
});

Route::controller(ResumeController::class)->group(function(){
    Route::get('/user/resume', 'ViewResume')->name('resumeview');
});

Route::controller(ExperienceController::class)->group(function(){
    Route::get('/experience/add', 'create')->name('create.experience');
    Route::post('experience/create', 'store')->name('store.experience');
});


require __DIR__.'/auth.php';
