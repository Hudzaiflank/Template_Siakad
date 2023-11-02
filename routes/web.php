<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use Faker\Guesser\Name;
use App\Http\Controllers\Backend\UserController;

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
    return view('welcome'); // auth.login ==> ini waktu akses link awal di arahin ke login bukan ke laravel lagi
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.index');
    })->name('dashboard');
});

Route::get('/admin/logout', [AdminController::class, 'Logout'])->name('admin.logout');


//ini buat route user management

Route::prefix('users')->group(function () {

    Route::get('/view', [UserController::class, 'UserView'])->name('user.view');

    //* UserView itu method baru, masukin method di usercontroller nya

    Route::get('/add', [UserController::class, 'UserAdd'])->name('users.add');
});


//end of user management