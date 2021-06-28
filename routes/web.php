<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ScoreController;
use App\Http\Controllers\{CreationController, CriteriaController, HomeController, PhotographerController, PortfolioController, ProfileController, QuestionController, ScheduleController, RegisterController, RegistrationController, QuestionnaireController};


Route::resource('registrations', RegistrationController::class);

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::view('about', 'about')->name('about');

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

    Route::resource('questions', QuestionController::class);

    Route::resource('questionnaires', QuestionnaireController::class);

    Route::prefix('scores')->name('scores.')->group(function () {
        Route::get('{user:username}/rating', [ScoreController::class, 'rating'])->name('rating');
        Route::post('rating/{user:username}/store', [ScoreController::class, 'storeRating'])->name('rating.store');
        Route::get('{user:username}/edit', [ScoreController::class, 'edit'])->name('edit');
        Route::patch('{user:username}/update', [ScoreController::class, 'update'])->name('update');
    });

    Route::resource('schedules', ScheduleController::class);
});
