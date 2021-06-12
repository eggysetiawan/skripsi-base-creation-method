<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{CreationController, CriteriaController, HomeController, PhotographerController, PortfolioController, ProfileController, ScheduleController, RegisterController, RegistrationController};


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

Route::resource('registrations', RegistrationController::class);

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [HomeController::class, 'index'])->name('home');

    Route::resource('creations', CreationController::class);

    Route::resource('criterias', CriteriaController::class)->middleware('role:admin|superadmin')->parameters([
        'criterias' => 'criteria:slug',
    ]);

    Route::resource('portfolios', PortfolioController::class);

    Route::get('photographers', [PhotographerController::class, 'index'])->name('photographers.index');
    Route::get('photographers/{user:username}', [PhotographerController::class, 'show'])->name('photographer.show');

    Route::resource('profiles', ProfileController::class)->except(['create'])->parameters([
        'profiles' => 'user:username',
    ]);

    Route::resource('schedules', ScheduleController::class);
});
