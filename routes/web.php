<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginRegisterController;
use App\Http\Controllers\Dashboard\ExperienceController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/form', [ExperienceController::class, 'showForm'])->name('form');
Route::get('/experiences', [ExperienceController::class, 'getExperiences'])->name('experiences');
Route::post('/submit-form', [ExperienceController::class, 'addExperience'])->name('submit');
Route::put('/experiences/{id}', [ExperienceController::class, 'updateExperience'])->name('experience.update');
Route::delete('/experiences/{id}', [ExperienceController::class, 'deleteExperience'])->name('experience.delete');
Route::get('/experience-update/{id}', [ExperienceController::class, 'updateForm'])->name('experience.update.form');

Route::get('/test', [ExperienceController::class, 'showForm'])->name('test');