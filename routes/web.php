<?php
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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

Route::get('/', function () {
    return view('auth.login');
});




Route::get('/home',[HomeController::class, 'index'])->name('home');

Route::get('/admin/logout',[HomeController::class, 'Adminlogout'])->name('admin.logout');
Route::get('/admin/login',[HomeController::class, 'Adminlogin'])->name('admin.login');
Route::get('/admin/profile',[HomeController::class, 'Adminprofile'])->name('admin.profile');
Route::post('/admin/profile_update',[HomeController::class, 'AdminprofileUpdate'])->name('admin.profile_update');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

